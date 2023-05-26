<?php Core\View::render('layout/header'); ?>

    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <?php if (!empty($orders)): ?>
                    <?php require_once VIEW_DIR . '/manager/orders/parts/list.php'; ?>
                <?php else: ?>
                    <h3>You have no orders</h3>
                <?php endif; ?>
            </div>
        </div>
    </div>

<?php Core\View::render('layout/footer'); ?>