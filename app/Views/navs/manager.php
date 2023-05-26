<div class="dropdown">
    <button class="btn dropdown-toggle text-light"
            style="background-color: #002030;"
            type="button"
            id="dropdownMenuButtonCategories"
            data-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="true">
        Clients
    </button>
    <ul class="dropdown-menu"
        aria-labelledby="dropdownMenuButtonCategories">
        <li>
            <a class="dropdown-item"
               href="<?= url('manager/clients'); ?>">
                All Clients
            </a>
        </li>
        <li>
            <a class="dropdown-item"
               href="<?= url('manager/clients/register'); ?>">
                Register
            </a>
        </li>
        <li>
            <a class="dropdown-item"
               href="<?= url('manager/clients/find_client'); ?>">
                Find
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
        Orders
    </button>
    <ul class="dropdown-menu"
        aria-labelledby="dropdownMenuButtonCategories">
        <li>
            <a class="dropdown-item"
               href="<?= url('manager/orders'); ?>">
                My Orders
            </a>
        </li>
    </ul>
</div>
