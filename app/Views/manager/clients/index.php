<?php Core\View::render('layout/header'); ?>

    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <?php if (!empty($clients)): ?>
                    <?php require_once VIEW_DIR . '/manager/clients/parts/list.php'; ?>
                <?php else: ?>
                    <h3>There are no clients :(</h3>
                <?php endif; ?>
            </div>
        </div>
    </div>

<?php Core\View::render('layout/footer'); ?>