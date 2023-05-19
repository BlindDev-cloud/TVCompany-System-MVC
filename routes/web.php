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

