<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Services\AuthService;
use App\Helpers\SessionHelper;
use Core\Controller;
use Core\View;

class AuthController extends Controller
{
    public function login(): void
    {
        View::render('auth/login');
    }

    public function logout(): void
    {
        SessionHelper::destroy();
        redirect();
    }

    public function verify(): void
    {
        $fields = filter_input_array(INPUT_POST, $_POST, true);

        AuthService::call($fields);

        redirect();
    }

    public function before(string $action): bool
    {
        if ($action === 'login' && SessionHelper::isLoggedIn()) {
            return false;
        }

        return parent::before($action);
    }
}