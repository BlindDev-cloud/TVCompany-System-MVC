<?php

declare(strict_types=1);

namespace App\Services;

use App\Helpers\SessionHelper;
use App\Models\Order;
use App\Validators\CreateOrderValidator;
use Core\BaseException;

class CreateOrderService
{
    public static function call(array $fields): void
    {
        $validator = new CreateOrderValidator();

        $validator->validate($fields);

        if (!$validator->producerExists((int)$fields['producer_id'])
            || !$validator->clientExists((int)$fields['client_id'])) {
            SessionHelper::setAlert('id', 'danger', 'Client or producer do not exist');
        }

        if (SessionHelper::hasAlerts()) {
            SessionHelper::setFormData($fields);
            redirectBack();
        }

        $fields['manager_id'] = SessionHelper::id();

        Order::createOrder($fields);
    }
}