<div class="dropdown">
    <button class="btn dropdown-toggle text-light"
            style="background-color: #002030;"
            type="button"
            id="dropdownMenuButtonCategories"
            data-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="true">
        Employees
    </button>
    <ul class="dropdown-menu"
        aria-labelledby="dropdownMenuButtonCategories">
        <li>
            <a class="dropdown-item"
               href="<?= url('admin/employees'); ?>">
                All Employees
            </a>
        </li>
        <li>
            <a class="dropdown-item"
               href="<?= url('admin/employees/add'); ?>">
                Add Employee
            </a>
        </li>
    </ul>
</div>

<div class="dropdown">
    <button class="btn dropdown-toggle text-light"
            style="background-color: #002030;"
            type="button"
            id="dropdownMenuButtonCategories"
            data-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="true">
        Accounts
    </button>
    <ul class="dropdown-menu"
        aria-labelledby="dropdownMenuButtonCategories">
        <li>
            <a class="dropdown-item"
               href="<?= url('admin/accounts'); ?>">
                All Accounts
            </a>
        </li>
        <li>
            <a class="dropdown-item"
               href="<?= url('admin/accounts/create'); ?>">
                New Account
            </a>
        </li>
    </ul>
</div>
