<?php Core\View::render('layout/header'); ?>

    <div
            class="container">
        <div
                class="row">
            <div
                    class="col-12 d-flex align-items-center justify-content-center">
                <div
                        class="card w-50 mt-5 bg-dark">
                    <h5 class="card-header">
                        Upload Release</h5>
                    <div
                            class="card-body">
                        <form
                                action="<?= url('producer/releases/store') ?>"
                                method="POST"
                                enctype="multipart/form-data">
                            <div
                                    class="mb-3">
                                <label for="video"
                                       class="form-label">Video</label>
                                <input type="file"
                                       name="video"
                                       class="form-control"
                                       id="video">
                            </div>
                            <input
                                    type="hidden"
                                    name="order_id"
                                    class="form-control"
                                    value="<?= $order_id; ?>"
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