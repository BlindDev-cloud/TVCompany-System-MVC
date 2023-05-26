<?php

declare(strict_types=1);

namespace App\Validators;

use App\Models\Employee;

class UpdateEmployeeValidator extends CreateEmployeeValidator
{
    public function __construct()
    {
        $this->addErrors([
            'id' => [
                'type' => 'warning',
                'message' => 'Invalid id'
            ]
        ]);

        $this->addRules([
            'id' => '/^\d{1,}$/'
        ]);
    }

    public function employeeExistsById(int $id): bool
    {
        return (bool)Employee::find($id);
    }
}