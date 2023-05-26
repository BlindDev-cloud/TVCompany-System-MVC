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
                            action="<?= url('admin/accounts/store') ?>"
                            method="POST">
                            <div
                                class="mb-3">
                                <label
                                    for="email"
                                    class="form-label">Email
                                    address</label>
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
                                    for="password"
                                    class="form-label">Password</label>
                                <input
                                    type="password"
                                    name="password"
                                    class="form-control"
                                    id="password">
                            </div>
                            <div
                                class="mb-3">
                                <label
                                    for="role"
                                    class="form-label">Role</label>
                                <select
                                    class="form-select form-select-lg w-100"
                                    name="role"
                                    id="role">
                                    <option
                                        selected><?= $data['role'] ?? 'Select role'; ?></option>
                                    <?php foreach ($roles as $role): ?>
                                        <option
                                            value="<?= $role->value; ?>">
                                            <?= $role->value; ?>
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