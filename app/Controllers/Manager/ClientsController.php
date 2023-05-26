<?php

declare(strict_types=1);

namespace App\Controllers\Manager;

use App\Helpers\SessionHelper;
use App\Models\Client;
use App\Services\RegisterClientService;
use Core\View;

class ClientsController extends BaseController
{
    public function index(): void
    {
        $clients = Client::select()->get();
        View::render('manager/clients/index', compact('clients'));
    }

    public function register(): void
    {
        View::render('manager/clients/register');
    }

    public function store(): void
    {
        RegisterClientService::call($this->fields);

        redirect('manager/clients');
    }

    public function findClient(): void
    {
        View::render('manager/clients/find');
    }

    public function getClient(): void
    {
        $phone_validator = '/^(0|84)(2(0[3-9]|1[0-6|8|9]|2[0-2|5-9]|3[2-9]|4[0-9]|5[1|2|4-9]|6[0-3|9]|7[0-7]|8[0-9]|9[0-4|6|7|9])|3[2-9]|5[5|6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])([0-9]{7})$/';

        if(!preg_match($phone_validator, $this->fields['phone'])){
            SessionHelper::setAlert('phone', 'warning', 'Invalid phone');
            SessionHelper::setFormData($this->fields);
            redirectBack();
        }

        $clients = Client::select()
            ->where('phone', $this->fields['phone'])
            ->get();

        View::render('manager/clients/index', compact('clients'));
    }
}