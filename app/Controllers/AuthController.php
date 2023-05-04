<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Helpers\SessionHelper;
use App\Models\Account;
use App\Validators\AuthValidator;
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

        $validator = new AuthValidator();
        $validator->validate($fields);

        if(SessionHelper::hasAlerts()){
            SessionHelper::setFormData($fields);
            redirectBack();
        }

        if(!$validator->accountExists($fields['email'])){
            SessionHelper::setAlert('email', 'danger', 'Account does not exist');
            SessionHelper::setFormData($fields);
            redirectBack();
        }

        $account = Account::findBy('email', $fields['email']);

        if(!password_verify($fields['password'], $account->password)){
            SessionHelper::setAlert('password', 'danger', 'Invalid email or password');
            SessionHelper::setFormData($fields);
            redirectBack();
        }

        SessionHelper::setAccount($account->id);

        redirect();
    }

    public function before(string $action): bool
    {
        if($action === 'login' && SessionHelper::isLoggedIn()){
            return false;
        }

        return parent::before($action);
    }
}