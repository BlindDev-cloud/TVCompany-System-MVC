<?php

namespace App\Controllers\Producer;

use App\Helpers\SessionHelper;
use App\Models\Order;
use App\Models\OrderAssignemt;
use App\Models\OrdersInfoView;
use App\Services\AddPlanService;
use Core\View;

class OrdersController extends BaseController
{
    public function index(): void
    {
        $producerOrders = OrderAssignemt::employeeOrdersIds(SessionHelper::id());
        $orders = [];

        foreach ($producerOrders as $producerOrder) {
            $orders[] = OrdersInfoView::getOrderInfo($producerOrder->id, 'manager');
        }

        View::render('producer/orders/index', compact('orders'));
    }

    public function add(int $id): void
    {
        if(!Order::find($id)){
            redirectBack();
        }

        View::render('producer/orders/addPlan', ['order_id' => $id]);
    }

    public function store(): void
    {
        AddPlanService::call($this->fields);

        redirect('producer/orders');
    }

}