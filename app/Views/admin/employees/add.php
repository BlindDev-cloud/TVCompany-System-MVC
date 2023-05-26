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
                        Add
                        employee</h5>
                    <div
                        class="card-body">
                        <form
                            action="<?= url('admin/employees/store') ?>"
                            method="POST">
                            <div
                                class="mb-3">
                                <label
                                    for="name"
                                    class="form-label">Name</label>
                                <input
                                    type="text"
                                    name="name"
                                    class="form-control"
                                    id="name"
                                    aria-describedby="emailHelp"
                                    value="<?= $data['name'] ?? ''; ?>"
                                >
                            </div>
                            <div
                                class="mb-3">
                                <label
                                    for="surname"
                                    class="form-label">Surname</label>
                                <input
                                    type="text"
                                    name="surname"
                                    class="form-control"
                                    id="surname"
                                    aria-describedby="emailHelp"
                                    value="<?= $data['surname'] ?? ''; ?>"
                                >
                            </div>
                            <div
                                class="mb-3">
                                <label
                                    for="email"
                                    class="form-label">Email</label>
                                <input
                                    type="email"
                                    name="email"
                                    class="form-control"
                                    id="email"
                                    aria-describedby="emailHelp"
                                    value="<?= $data['email'] ?? ''; ?>"
                                >
                            </div>
                            <div
                                class="mb-3">
                                <label
                                    for="phone"
                                    class="form-label">Phone
                                    number (+38)</label>
                                <input
                                    type="text"
                                    name="phone"
                                    class="form-control"
                                    id="phone"
                                    aria-describedby="emailHelp"
                                    value="<?= $data['phone'] ?? ''; ?>"
                                >
                            </div>
                            <div
                                class="mb-3">
                                <label
                                    for="position"
                                    class="form-label">Position</label>
                                <select
                                    class="form-select form-select-lg w-100"
                                    name="position"
                                    id="position">
                                    <option
                                        selected><?= $data['position'] ?? 'Select position'; ?></option>
                                    <?php foreach ($positions as $position): ?>
                                        <option
                                            value="<?= $position->value; ?>">
                                            <?= $position->value; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
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