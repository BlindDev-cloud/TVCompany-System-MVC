<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Account;
use App\Models\Employee;

class AssignmentOfEmployeService
{
    public static function call(array $fields): void
    {
        $accountId = (int)$fields['accountId'];
        $employeeId = (int)$fields['employeeId'];

        if (!Account::find($accountId) && !Employee::find($employeeId)) {
            redirect('admin/employees/assigning');
        }

        $data = [
            'employee_id' => $employeeId
        ];

        Account::update($accountId, $data);
    }
}