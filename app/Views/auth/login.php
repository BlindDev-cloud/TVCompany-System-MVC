<?php \Core\View::render('layout/header'); ?>

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
                    Login</h5>
                <div
                    class="card-body">
                    <form
                        action="<?= url('auth/verify') ?>"
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

<?php \Core\View::render('layout/footer'); ?>
