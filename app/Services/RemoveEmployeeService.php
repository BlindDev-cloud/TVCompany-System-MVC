<?php

declare(strict_types=1);

namespace App\Services;

use App\Helpers\SessionHelper;
use App\Models\Employee;
use App\Validators\UpdateEmployeeValidator;

class RemoveEmployeeService
{
    public static function call(array $fields): void
    {
        $validator = new UpdateEmployeeValidator();

        $validator->validate($fields);

        if(SessionHelper::hasAlerts()){
            redirectBack();
        }

        $id = (int)$fields['id'];

        if (!$validator->employeeExistsById($id)) {
            redirectBack();
        }

        Employee::delete($id);
    }
}