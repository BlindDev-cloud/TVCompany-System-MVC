<?php

use Core\Router;

Router::add('', ['controller' => 'App\Controllers\HomeController', 'action' => 'index', 'method' => 'GET']);

Router::add('auth/login', ['controller' => 'App\Controllers\AuthController', 'action' => 'login', 'method' => 'GET']);
Router::add('auth/verify', ['controller' => 'App\Controllers\AuthController', 'action' => 'verify', 'method' => 'POST']);
Router::add('auth/logout', ['controller' => 'App\Controllers\AuthController', 'action' => 'logout', 'method' => 'GET']);


Router::add('admin/dashboard', ['controller' => 'App\Controllers\Admin\DashboardController', 'action' => 'index', 'method' => 'GET']);

Router::add('admin/employees', ['controller' => 'App\Controllers\Admin\EmployeesController', 'action' => 'index', 'method' => 'GET']);
Router::add('admin/employees/add', ['controller' => 'App\Controllers\Admin\EmployeesController', 'action' => 'add', 'method' => 'GET']);
Router::add('admin/employees/store', ['controller' => 'App\Controllers\Admin\EmployeesController', 'action' => 'store', 'method' => 'POST']);
Router::add('admin/employees/edit', ['controller' => 'App\Controllers\Admin\EmployeesController', 'action' => 'edit', 'method' => 'GET']);
Router::add('admin/employees/update', ['controller' => 'App\Controllers\Admin\EmployeesController', 'action' => 'update', 'method' => 'POST']);

Router::add('admin/accounts', ['controller' => 'App\Controllers\Admin\AccountsController', 'action' => 'index', 'method' => 'GET']);
Router::add('admin/accounts/assigning', ['controller' => 'App\Controllers\Admin\AccountsController', 'action' => 'assigning', 'method' => 'GET']);
Router::add('admin/accounts/assignment', ['controller' => 'App\Controllers\Admin\AccountsController', 'action' => 'assignment', 'method' => 'POST']);
Router::add('admin/accounts/create', ['controller' => 'App\Controllers\Admin\AccountsController', 'action' => 'create', 'method' => 'GET']);
Router::add('admin/accounts/store', ['controller' => 'App\Controllers\Admin\AccountsController', 'action' => 'store', 'method' => 'POST']);


Router::add('manager/dashboard', ['controller' => 'App\Controllers\Manager\DashboardController', 'action' => 'index', 'method' => 'GET']);

Router::add('manager/clients', ['controller' => 'App\Controllers\Manager\ClientsController', 'action' => 'index', 'method' => 'GET']);
Router::add('manager/clients/register', ['controller' => 'App\Controllers\Manager\ClientsController', 'action' => 'register', 'method' => 'GET']);
Router::add('manager/clients/store', ['controller' => 'App\Controllers\Manager\ClientsController', 'action' => 'store', 'method' => 'POST']);
Router::add('manager/clients/find_client', ['controller' => 'App\Controllers\Manager\ClientsController', 'action' => 'findClient', 'method' => 'GET']);
Router::add('manager/clients/get_client', ['controller' => 'App\Controllers\Manager\ClientsController', 'action' => 'getClient', 'method' => 'POST']);

Router::add('manager/orders', ['controller' => 'App\Controllers\Manager\OrdersController', 'action' => 'index', 'method' => 'GET']);
Router::add('manager/orders/create', ['controller' => 'App\Controllers\Manager\OrdersController', 'action' => 'create', 'method' => 'GET']);
Router::add('manager/orders/store', ['controller' => 'App\Controllers\Manager\OrdersController', 'action' => 'store', 'method' => 'POST']);
Router::add('manager/orders/start', ['controller' => 'App\Controllers\Manager\OrdersController', 'action' => 'start', 'method' => 'GET']);
Router::add('manager/orders/deny', ['controller' => 'App\Controllers\Manager\OrdersController', 'action' => 'deny', 'method' => 'GET']);
Router::add('manager/orders/complete', ['controller' => 'App\Controllers\Manager\OrdersController', 'action' => 'complete', 'method' => 'GET']);


Router::add('producer/dashboard', ['controller' => 'App\Controllers\Producer\DashboardController', 'action' => 'index', 'method' => 'GET']);

Router::add('producer/orders', ['controller' => 'App\Controllers\Producer\OrdersController', 'action' => 'index', 'method' => 'GET']);
Router::add('producer/orders/add_plan', ['controller' => 'App\Controllers\Producer\OrdersController', 'action' => 'add', 'method' => 'GET']);
Router::add('producer/orders/store_plan', ['controller' => 'App\Controllers\Producer\OrdersController', 'action' => 'store', 'method' => 'POST']);

Router::add('producer/releases/upload', ['controller' => 'App\Controllers\Producer\ReleasesController', 'action' => 'upload', 'method' => 'GET']);
Router::add('producer/releases/store', ['controller' => 'App\Controllers\Producer\ReleasesController', 'action' => 'store', 'method' => 'POST']);


