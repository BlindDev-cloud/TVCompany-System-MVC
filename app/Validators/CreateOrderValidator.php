<?php

declare(strict_types=1);

namespace App\Validators;

use App\Models\Account;
use App\Models\Client;
use App\Validators\Base\BaseValidator;

class CreateOrderValidator extends BaseValidator
{
    protected array $errors = [
        'topic' => [
            'type' => 'warning',
            'message' => 'Topic must be at least 2 symbols long'
        ],
        'description' => [
            'type' => 'warning',
            'message' => 'Description must be at least 5 symbols long'
        ]
    ];

    protected array $rules = [
        'topic' => '/[\w\s\t\r\n^\p{L}._\-\?,\!]{2,100}/',
        'description' => '/[\w\s\t\r\n^\p{L}._\-\?,\!]{5,}/'
    ];

    public function producerExists(int $id): bool
    {
        return (bool)Account::find($id);
    }

    public function clientExists(int $id): bool
    {
        return (bool)Client::find($id);
    }
}