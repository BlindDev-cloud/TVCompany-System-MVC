<?php

declare(strict_types=1);

namespace App\Validators;

use App\Models\Account;

class AuthValidator extends Base\BaseValidator
{
    protected array $errors = [
        'email' => [
            'type' => 'danger',
            'message' => 'Invalid email or password'
        ],
        'password' => [
            'type' => 'danger',
            'message' => 'Invalid email or password'
        ]
    ];

    protected array $rules = [
        'email' => '/^[a-zA-Z0-9.!#$%&\'*+\/\?^_`{|}~-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i',
        'password' => '/[a-zA-Z0-9.!#$%&\'*+\/\?^_`{|}~-]{8,}/'
    ];

    public function accountExists(string $email): bool
    {
        return (bool)Account::findBy('email', $email);
    }
}