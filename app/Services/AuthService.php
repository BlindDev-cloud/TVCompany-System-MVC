<?php

declare(strict_types=1);

namespace App\Services;

use App\Helpers\SessionHelper;
use App\Models\Account;
use App\Models\Role;
use App\Validators\AuthValidator;

class AuthService
{
    public static function call(array $fields): void
    {
        $validator = new AuthValidator();
        $validator->validate($fields);

        if (SessionHelper::hasAlerts()) {
            SessionHelper::setFormData($fields);
            redirectBack();
        }

        if (!$validator->accountExists($fields['email'])) {
            SessionHelper::setAlert('email', 'danger', 'Account does not exist');
            SessionHelper::setFormData($fields);
            redirectBack();
        }

        $account = Account::findBy('email', $fields['email']);

        if (!password_verify($fields['password'], $account->password)) {
            SessionHelper::setAlert('password', 'danger', 'Invalid email or password');
            SessionHelper::setFormData($fields);
            redirectBack();
        }

        SessionHelper::setAccountData($account->id, [
            'role' => $account->role,
            'employee' => $account->employee_id
        ]);
    }
}