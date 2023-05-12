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
Router::add('admin/employees/remove', ['controller' => 'App\Controllers\Admin\EmployeesController', 'action' => 'remove', 'method' => 'POST']);

