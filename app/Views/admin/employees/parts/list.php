<table class="table table-bordered">
    <thead>
    <tr>
        <th scope="col">
            ID
        </th>
        <th scope="col">
            Full name
        </th>
        <th scope="col">
            Position
        </th>
        <th scope="col">
            Email
        </th>
        <th scope="col">
            Phone
        </th>
        <th scope="col">
            Actions
        </th>
    </tr>
    </thead>
    <tbody>
    <?php if (!empty($employees)): ?>
        <?php foreach ($employees as $employee): ?>
            <tr>
                <th scope="row"><?= $employee->id ?></th>
                <td><?= $employee->name . ' ' . $employee->surname ?></td>
                <td><?= $employee->position ?></td>
                <td><?= $employee->email ?></td>
                <td><?= $employee->phone ?></td>
                <td>
                    <?php if(!empty($account)):  ?>
                        <div class="d-inline-flex">
                            <form action="<?= url('admin/accounts/assignment'); ?>"
                                  method="POST">
                                <input type="hidden"
                                       name="employeeId"
                                       class="form-control"
                                       value="<?= $employee->id ?>">
                                <input type="hidden"
                                       name="accountId"
                                       class="form-control"
                                       value="<?= $account ?>">
                                <button type="submit"
                                        class="btn btn-secondary">
                                    Assign
                                </button>
                            </form>
                        </div>
                    <?php else: ?>
                    <a href="<?= url('admin/employees/edit?id=' . $employee->id); ?>"
                       class="btn btn-primary">Edit</a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
    </tbody>
</table>