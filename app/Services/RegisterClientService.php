<?php

declare(strict_types=1);

namespace App\Services;

use App\Helpers\SessionHelper;
use App\Models\Client;
use App\Models\Employee;
use App\Validators\CreateEmployeeValidator;
use App\Validators\RegisterClientValidator;
use Core\BaseException;

class RegisterClientService
{
    public static function call(array $fields): void
    {
        $validator = new RegisterClientValidator();

        $validator->validate($fields);

        if (SessionHelper::hasAlerts()) {
            SessionHelper::setFormData($fields);
            redirectBack();
        }

        if ($validator->clientExists($fields['email'])) {
            SessionHelper::setAlert('email', 'danger', 'Employee already exists');
            SessionHelper::setFormData($fields);
            redirectBack();
        }

        if (!Client::create($fields)) {
            throw new BaseException('Internal Server Error', 500);
        }
    }
}