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
                        New
                        Orders</h5>
                    <div
                            class="card-body">
                        <form
                                action="<?= url('manager/orders/store') ?>"
                                method="POST">
                            <div
                                    class="mb-3">
                                <label
                                        for="topic"
                                        class="form-label">Topic</label>
                                <input
                                        type="text"
                                        name="topic"
                                        class="form-control"
                                        id="topic"
                                        aria-describedby="emailHelp"
                                        placeholder="Topic"
                                        value="<?= $data['topic'] ?? ''; ?>"
                                >
                            </div>
                            <div
                                    class="mb-3">
                                <label
                                        for="description"
                                        class="form-label">Description</label>
                                <textarea
                                        class="form-control"
                                        name="description"
                                        id="description"
                                        cols="30"
                                        rows="10"
                                        placeholder="Description"><?=
                                        $data['description'] ?? ''
                                    ?></textarea>
                            </div>
                            <div
                                    class="mb-3">
                                <label
                                        for="producer_id"
                                        class="form-label">Producer</label>
                                <select
                                        class="form-select form-select-lg w-100"
                                        name="producer_id"
                                        id="producer_id">
                                    <option
                                            selected><?= $data['producer_id'] ?? 'Select producer'; ?></option>
                                    <?php foreach ($producers as $producer): ?>
                                        <option
                                                value="<?= $producer->id; ?>">
                                            <?= $producer->name . ' ' . $producer->surname; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <input
                                    type="hidden"
                                    name="client_id"
                                    value="<?= $client_id ?? null; ?>"
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