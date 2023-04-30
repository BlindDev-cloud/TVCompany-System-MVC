<?php

declare(strict_types=1);

namespace App\Controllers;

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
        redirect();
    }
}