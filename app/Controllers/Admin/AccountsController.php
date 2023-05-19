<?php

declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Models\Account;
use App\Models\Employee;
use App\Enums\Role;
use App\Services\AssignmentOfEmployeService;
use App\Services\CreateAccountService;
use App\Validators\CreateAccountValidator;
use Core\View;

class AccountsController extends BaseController
{
    public function index(): void
    {
        $accounts = Account::select([
            'employees.id',
            'employees.name',
            'employees.surname',
            'accounts.id',
            'accounts.email',
            'accounts.employee_id',
            'accounts.role'
        ])
            ->join('employees', 'employee_id', 'LEFT')
            ->get();

        View::render('admin/accounts/index', ['accounts' => $accounts]);
    }

    public function assigning(int $id): void
    {
        if (!$account = Account::find($id)) {
            redirect('admin/accounts');
        }

        $employees = Employee::select()
            ->where('position', $account->role)
            ->get();

        View::render('admin/employees/index', [
            'employees' => $employees,
            'account' => $account->id
        ]);
    }

    public function assignment(): void
    {
        AssignmentOfEmployeService::call($this->fields);

        redirect('admin/accounts');
    }

    public function create(): void
    {
        $roles = Role::all();
        View::render('admin/accounts/create', compact('roles'));
    }

    public function store(): void
    {
        CreateAccountService::call($this->fields);

        redirect('admin/accounts');
    }
}