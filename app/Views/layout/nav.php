<nav
    class="navbar navbar-expand-lg navbar-dark">
    <div
        class="container-fluid">
        <a class="navbar-brand"
           href="<?= url(); ?>">
            <img
                src="<?= IMG_URL . '/TV-icon.ico' ?>"
                alt=""
                width="25"
                height="25"
                class="d-inline-block align-text-top">
            Home</a>
        <?php if (\App\Helpers\SessionHelper::isLoggedIn()): ?>
            <?php $role = \App\Helpers\SessionHelper::get('account')['role']; ?>
            <?php if(isRoleRoute()): ?>
                <?php require_once VIEW_DIR . '/navs/' . $role . '.php'; ?>
            <?php endif; ?>
        <?php endif; ?>
        <div
            class="collapse navbar-collapse d-flex justify-content-end"
            id="navbarNav">
            <ul class="navbar-nav">
                <?php if (!\App\Helpers\SessionHelper::isLoggedIn()): ?>
                    <li class="nav-item">
                        <a href="<?= url('auth/login'); ?>"
                           class="nav-link">Login</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a href="<?= url($role .'/dashboard'); ?>"
                           class="nav-link">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= url('auth/logout'); ?>"
                           class="nav-link">Logout</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>