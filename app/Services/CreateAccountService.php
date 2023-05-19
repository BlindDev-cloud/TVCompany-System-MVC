<?php

declare(strict_types=1);

namespace App\Services;

use App\Helpers\SessionHelper;
use App\Models\Account;
use App\Validators\CreateAccountValidator;
use Core\BaseException;

class CreateAccountService
{
    public static function call(array $fields): void
    {
        $validator = new CreateAccountValidator();

        $validator->validate($fields);

        if (!$validator->checkRole($fields['role'])) {
            SessionHelper::setAlert('role', 'warning', 'Invalid role');
        }

        if (SessionHelper::hasAlerts()) {
            SessionHelper::setFormData($fields);
            redirectBack();
        }

        if ($validator->accountExists($fields['email'])) {
            SessionHelper::setAlert('email', 'danger', 'Account already exists');
            SessionHelper::setFormData($fields);
            redirectBack();
        }

        $fields['password'] = password_hash($fields['password'], PASSWORD_BCRYPT);

        if (!Account::create($fields)) {
            throw new BaseException('Internal Server Error', 500);
        }
    }
}