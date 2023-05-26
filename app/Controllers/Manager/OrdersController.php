<?php

declare(strict_types=1);

namespace App\Controllers\Manager;

use App\Helpers\SessionHelper;
use App\Models\Account;
use App\Models\Client;
use App\Models\Order;
use App\Models\OrderAssignemt;
use App\Models\OrdersIdsView;
use App\Models\OrdersInfoView;
use App\Services\CreateOrderService;
use App\Validators\CreateOrderValidator;
use Core\View;
use MongoDB\Driver\ClientEncryption;

class OrdersController extends BaseController
{
    public function index(): void
    {
        $managerOrders = OrderAssignemt::employeeOrdersIds(SessionHelper::id());
        $orders = [];

        foreach ($managerOrders as $managerOrder) {
            $orders[] = OrdersInfoView::getOrderInfo($managerOrder->id, 'producer');
        }

        View::render('manager/orders/index', compact('orders'));
    }

    public function create(int $client): void
    {
        if(!Client::find($client)){
            redirectBack();
        }

        $producers = Account::select([
            'employees.id',
            'employees.name',
            'employees.surname',
            'accounts.id',
            'accounts.employee_id',
            'accounts.role'
        ])
            ->join('employees', 'employee_id', 'INNER')
            ->where('role', 'producer')
            ->get();

        View::render('manager/orders/create', [
            'client_id' => $client,
            'producers' => $producers
        ]);
    }

    public function store(): void
    {
        CreateOrderService::call($this->fields);

        redirect('manager/orders');
    }

    public function start(int $id): void
    {
        if(!Order::find($id)){
            redirectBack();
        }

        Order::setStatus($id, 'recording');

        redirectBack();
    }

    public function deny(int $id): void
    {
        if(!Order::find($id)){
            redirectBack();
        }

        Order::setStatus($id, 'denial');

        redirectBack();
    }

    public function complete(int $id): void
    {
        if(!Order::find($id)){
            redirectBack();
        }

        Order::setStatus($id, 'completed');

        redirectBack();
    }
}