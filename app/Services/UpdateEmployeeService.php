<?php

declare(strict_types=1);

namespace App\Services;

use App\Helpers\SessionHelper;
use App\Models\Employee;
use App\Validators\UpdateEmployeeValidator;

class UpdateEmployeeService
{
    public static function call(array $fields): void
    {
        $validator = new UpdateEmployeeValidator();

        $validator->validate($fields);

        if (!$validator->validatePosition($fields['position'])) {
            SessionHelper::setAlert('position', 'warning', 'Invalid position');
        }

        if(SessionHelper::hasAlerts()){
            redirectBack();
        }

        $id = (int)$fields['id'];

        if (!$validator->employeeExists($fields['email'])) {
            SessionHelper::setAlert('email', 'danger', 'Employee does not exist');
            redirectBack();
        }

        Employee::update($id, $fields);
    }
}