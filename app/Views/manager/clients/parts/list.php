<table class="table table-bordered">
    <thead>
    <tr>
        <th scope="col">
            ID
        </th>
        <th scope="col">
            Full
            name
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
    <?php if (!empty($clients)): ?>
        <?php foreach ($clients as $client): ?>
            <tr>
                <th scope="row"><?= $client->id ?></th>
                <td><?= $client->name . ' ' . $client->surname ?></td>
                <td><?= $client->email ?></td>
                <td><?= $client->phone ?></td>
                <td>
                    <a href="<?= url('manager/orders/create?client=' . $client->id); ?>"
                       class="btn btn-primary">New Order</a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
    </tbody>
</table>