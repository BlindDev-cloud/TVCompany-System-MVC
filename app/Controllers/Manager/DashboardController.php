<?php

namespace App\Controllers\Manager;

use Core\View;

class DashboardController extends BaseController
{
    public function index(): void
    {
        View::render('manager/dashboard');
    }
}