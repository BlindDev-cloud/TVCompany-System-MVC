<?php

namespace App\Validators;

use App\Enums\Position;
use App\Helpers\SessionHelper;
use App\Models\Employee;

class CreateEmployeeValidator extends Base\BaseValidator
{
    protected array $errors = [
        'name' => [
            'type' => 'warning',
            'message' => 'Invalid name'
        ],
        'surname' => [
            'type' => 'warning',
            'message' => 'Invalid surname'
        ],
        'email' => [
            'type' => 'danger',
            'message' => 'Invalid email'
        ],
        'phone' => [
            'type' => 'danger',
            'message' => 'Invalid phone'
        ]
    ];

    protected array $rules = [
        'name' => '/[\w\s\t\r\n^\p{L}._\-\?,\!]{2,50}/i',
        'surname' => '/[\w\s\t\r\n^\p{L}._\-\?,\!]{2,50}/i',
        'email' => '/^[a-zA-Z0-9.!#$%&\'*+\/\?^_`{|}~-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i',
        'phone' => '/^(0|84)(2(0[3-9]|1[0-6|8|9]|2[0-2|5-9]|3[2-9]|4[0-9]|5[1|2|4-9]|6[0-3|9]|7[0-7]|8[0-9]|9[0-4|6|7|9])|3[2-9]|5[5|6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])([0-9]{7})$/'
    ];

    public function employeeExists(string $email): bool
    {
        return (bool)Employee::findBy('email', $email);
    }

    public function validatePosition(string $selectedPosition): bool
    {
        $positions = Position::all();

        foreach ($positions as $position){
            if($selectedPosition === $position->value){
                return true;
            }
        }

        return false;
    }
}