<?php \Core\View::render('layout/header'); ?>

<div
    class="row justify-content-center">
    <div
        class="col">
        <?php if(\App\Helpers\SessionHelper::isLoggedIn()): ?>
        <h1 class="text-center">
           Welcome <?= \App\Helpers\SessionHelper::role(); ?>!
        </h1>
        <?php else: ?>
        <h1 class="text-center">
            Home
            page
        </h1>
        <?php endif; ?>
    </div>
</div>

<?php \Core\View::render('layout/footer'); ?>
