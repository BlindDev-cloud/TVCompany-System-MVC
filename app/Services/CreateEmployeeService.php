<?php

declare(strict_types=1);

namespace App\Services;

use App\Helpers\SessionHelper;
use App\Models\Employee;
use App\Validators\CreateEmployeeValidator;
use Core\BaseException;

class CreateEmployeeService
{
    public static function call(array $fields): void
    {
        $validator = new CreateEmployeeValidator();

        $validator->validate($fields);

        if (!$validator->validatePosition($fields['position'])) {
            SessionHelper::setAlert('position', 'warning', 'Invalid position');
        }

        if (SessionHelper::hasAlerts()) {
            SessionHelper::setFormData($fields);
            redirectBack();
        }

        if ($validator->employeeExists($fields['email'])) {
            SessionHelper::setAlert('email', 'danger', 'Employee already exists');
            SessionHelper::setFormData($fields);
            redirectBack();
        }

        if (!Employee::create($fields)) {
            throw new BaseException('Internal Server Error', 500);
        }
    }
}