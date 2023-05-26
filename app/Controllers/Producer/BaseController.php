<?php

namespace App\Controllers\Producer;

use App\Helpers\SessionHelper;

class BaseController extends \Core\Controller
{
    protected ?array $fields = [];

    public function before(string $action): bool
    {
        if(!SessionHelper::isLoggedIn() || !SessionHelper::isMatchingRole('producer')){
            return false;
        }

        $this->fields = filter_input_array(INPUT_POST, $_POST, true);

        return SessionHelper::isMatchingRole('producer');
    }
}