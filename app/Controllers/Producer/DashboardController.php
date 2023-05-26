<?php

namespace App\Controllers\Producer;

use Core\View;

class DashboardController extends BaseController
{
    public function index(): void
    {
        View::render('producer/dashboard');
    }
}