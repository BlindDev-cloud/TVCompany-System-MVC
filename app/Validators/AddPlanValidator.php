<?php

declare(strict_types=1);

namespace App\Validators;

class AddPlanValidator extends Base\BaseValidator
{
    protected array $errors = [
        'cost' => [
            'type' => 'danger',
            'message' => 'Invalid cost'
        ],
        'deadline' => [
            'type' => 'danger',
            'message' => 'Invalid deadline'
        ]
    ];

    protected array $rules = [
        'cost' => '/^\d{1,}(\.\d{2})?$/',
        'deadline' => '/^\d{4}-\d{2}-\d{2}$/'
    ];
}