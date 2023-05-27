<table class="table table-bordered">
    <thead>
    <tr>
        <th scope="col">
            ID
        </th>
        <th scope="col">
            Email
        </th>
        <th scope="col">
            Role
        </th>
        <th scope="col">
            Employee
        </th>
        <th scope="col">
            Actions
        </th>
    </tr>
    </thead>
    <tbody>
    <?php if (!empty($accounts)): ?>
        <?php foreach ($accounts as $account): ?>
            <tr>
                <th scope="row"><?= $account->id ?></th>
                <td><?= $account->email ?></td>
                <td><?= $account->role ?></td>
                <td><?= (isset($account->name)) ? $account->name . ' ' . $account->surname : 'Unsigned' ?></td>
                <td>
                    <a href="<?= url('admin/accounts/assigning?id=' . $account->id); ?>"
                       class="btn btn-secondary">Assign employee</a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
    </tbody>
</table>