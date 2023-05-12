<?php

declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Enums\Position;
use App\Models\Employee;
use App\Services\CreateEmployeeService;
use App\Services\RemoveEmployeeService;
use App\Services\UpdateEmployeeService;
use Core\View;

class EmployeesController extends BaseController
{
    public function index(): void
    {
        $employees = Employee::select()->get();
        View::render('admin/employees/index', ['employees' => $employees]);
    }

    public function add(): void
    {
        $positions = Position::all();
        View::render('admin/employees/add', ['positions' => $positions]);
    }

    public function store(): void
    {
        CreateEmployeeService::call($this->fields);

        redirect('admin/employees');
    }

    public function edit(int $id): void
    {
        $employee = Employee::find($id);
        $positions = Position::all();
        View::render('admin/employees/edit', compact('employee', 'positions'));
    }

    public function update(): void
    {
        UpdateEmployeeService::call($this->fields);

        redirect('admin/employees');
    }

    public function remove(): void
    {
        RemoveEmployeeService::call($this->fields);

        redirect('admin/employees');
    }
}
