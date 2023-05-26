<table class="table table-bordered">
    <thead>
    <tr>
        <th scope="col">
            ID
        </th>
        <th scope="col">
            Topic
        </th>
        <th scope="col">
            Description
        </th>
        <th scope="col">
            Cost
        </th>
        <th scope="col">
            Deadline
        </th>
        <th scope="col">
            Client
        </th>
        <th scope="col">
            Manager
        </th>
        <th scope="col">
            Status
        </th>
        <th scope="col">
            Actions
        </th>
    </tr>
    </thead>
    <tbody>
    <?php if (!empty($orders)): ?>
        <?php foreach ($orders as $order): ?>
            <tr>
                <?php $order = array_shift($order); ?>
                <th scope="row"><?= $order->id ?></th>
                <td><?= $order->topic ?></td>
                <td><?= $order->description ?></td>
                <td><?= $order->cost ?></td>
                <td><?= $order->deadline ?></td>
                <td><?= $order->client_name . ' ' . $order->client_surname . ' (' . $order->client_phone . ')' ?></td>
                <td><?= $order->employee_name . ' ' . $order->employee_surname ?></td>
                <td><?= $order->status ?></td>
                <td>
                    <?php if ($order->status == 'planning'): ?>
                        <a href="<?= url('producer/orders/add_plan?id=' . $order->id); ?>"
                           class="btn btn-primary">Add Plan</a>
                    <?php endif; ?>
                    <?php if ($order->status == 'recording'): ?>
                        <a href="<?= url('producer/releases/upload?id=' . $order->id); ?>"
                           class="btn btn-primary">Upload Release</a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
    </tbody>
</table>