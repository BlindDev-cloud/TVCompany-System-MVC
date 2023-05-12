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
                    <a href="<?= url('admin/employees/edit?id=' . $employee->id); ?>"
                       class="btn btn-secondary">Edit</a>
                    <div class="d-inline-flex ml-5">
                        <form action="<?= url('admin/employees/remove'); ?>"
                              method="POST">
                            <input type="hidden"
                                   name="id"
                                   id="id"
                                   class="form-control"
                                   value="<?= $employee->id ?>">
                            <button type="submit"
                                    class="btn btn-danger">
                                Remove
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
    </tbody>
</table>