<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand"
           href="<?= url(); ?>">
            <img src="<?= IMG_URL . '/TV-icon.ico' ?>" alt="" width="25" height="25" class="d-inline-block align-text-top">
            Home</a>
        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex justify-content-end"
             id="navbarNav">
            <ul class="navbar-nav">
                <?php if(!\App\Helpers\SessionHelper::isLoggedIn()): ?>
                    <li class="nav-item">
                        <a href="<?= url('auth/login'); ?>" class="nav-link">Login</a>
                    </li>
                <?php else: ?>
                
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>