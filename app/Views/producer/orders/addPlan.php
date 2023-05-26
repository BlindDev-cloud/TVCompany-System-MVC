<?php Core\View::render('layout/header'); ?>

<?php
$data = \App\Helpers\SessionHelper::getFlush('data');
?>

    <div
        class="container">
        <div
            class="row">
            <div
                class="col-12 d-flex align-items-center justify-content-center">
                <div
                    class="card w-50 mt-5 bg-dark">
                    <h5 class="card-header">
                        Create new account</h5>
                    <div
                        class="card-body">
                        <form
                            action="<?= url('producer/orders/store_plan') ?>"
                            method="POST">
                            <div
                                class="mb-3">
                                <label
                                    for="cost"
                                    class="form-label">Cost</label>
                                <input
                                    type="number"
                                    step="0.01"
                                    name="cost"
                                    class="form-control"
                                    id="cost"
                                    aria-describedby="emailHelp"
                                    value="<?= $data['cost'] ?? ''; ?>"
                                >
                            </div>
                            <div
                                class="mb-3">
                                <label
                                    for="deadline"
                                    class="form-label">Deadline (yyyy-mm-dd)</label>
                                <input
                                    type="text"
                                    name="deadline"
                                    class="form-control"
                                    id="deadline"
                                    value="<?= $data['deadline'] ?? ''; ?>"
                                >
                            </div>
                            <input
                                    type="hidden"
                                    name="id"
                                    class="form-control"
                                    value="<?= $order_id ?? $data['order_id']; ?>"
                            >
                            <?php \Core\View::render('alerts'); ?>
                            <button
                                type="submit"
                                class="btn btn-primary">
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php Core\View::render('layout/footer'); ?>