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
                        Find a client</h5>
                    <div
                        class="card-body">
                        <form
                            action="<?= url('manager/clients/get_client') ?>"
                            method="POST">
                            <div
                                class="mb-3">
                                <label
                                    for="phone"
                                    class="form-label">Phone number</label>
                                    <div class="row ml-1 d-flex align-items-center">
                                        +38&nbsp;
                                        <input
                                            type="text"
                                            name="phone"
                                            class="form-control col-11"
                                            id="phone"
                                            aria-describedby="emailHelp"
                                            value="<?= $data['phone'] ?? ''; ?>"
                                        >
                                </div>
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