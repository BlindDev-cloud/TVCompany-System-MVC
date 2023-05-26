<?php

declare(strict_types=1);

namespace App\Services;

use App\Helpers\SessionHelper;
use App\Models\Order;
use App\Validators\AddPlanValidator;

class AddPlanService
{
    public static function call(array $fields): void
    {
        $validator = new AddPlanValidator();

        $validator->validate($fields);

        if(SessionHelper::hasAlerts()){
            SessionHelper::setFormData($fields);
            redirectBack();
        }

        $id = (int)$fields['id'];
        unset($fields['id']);

        Order::update($id, $fields);
    }
}