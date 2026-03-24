<?php
$cart_count = (int)(session()->get('cart_count') ?? 0);
$current_uri = uri_string();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thrift Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@700;900&family=Crimson+Pro:wght@600;700&family=Poppins:wght@300;400;500&family=Roboto:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('public/css/includes/header_view.css') ?>">
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🎀</text></svg>">

   

</head>
<body>
<?php if (session()->get('show_loader')): ?>
    <?php session()->remove('show_loader'); ?>
    <div id="page-loader">
        <div class="loader-content">
            <div class="loader-logo">🎀</div>
            <div class="loader-name">ThriftSter</div>
            <div class="petals-wrap">
                <span class="petal">🌸</span>
                <span class="petal">🌸</span>
                <span class="petal">🌸</span>
                <span class="petal">🌸</span>
                <span class="petal">🌸</span>
                <span class="petal">🌸</span>
                <span class="petal">🌸</span>
                <span class="petal">🌸</span>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="<?= base_url('public/css/includes/loader.css') ?>">
    <script>
        window.addEventListener('load', () => {
            setTimeout(() => {
                document.getElementById('page-loader').classList.add('hidden');
            }, 2000);
        });
    </script>
<?php endif; ?>
<header class="site-header">
    <div class="header-inner container-fluid px-3 px-md-4">

        <a href="<?= base_url('/') ?>" class="logo-link" aria-label="Go to homepage">
            <div class="logo-badge">
                <img src="public/assets/header/logo.png"
                     alt="Logo"
                     class="logo-img"
                     onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
                <span class="logo-fallback" style="display:none;">✿</span>
            </div>
            <div class="logo-text-wrap">
                <span class="logo-name">Thrift<span class="logo-accent">Ster</span></span>
                <span class="logo-tagline">Unique Finds. Timeless Pieces.</span>
            </div>
        </a>

        <form class="search-form" action="<?= base_url('/search') ?>" method="GET" role="search">
            <div class="search-wrapper">
                <input
                    type="search"
                    name="q"
                    class="search-input"
                    placeholder="Search for unique finds..."
                    value="<?= htmlspecialchars($_GET['q'] ?? '') ?>"
                    aria-label="Search products"
                    autocomplete="off"
                >
                <button type="submit" class="search-btn" aria-label="Search">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </form>

        <nav class="header-nav" aria-label="Main navigation">

            <div class="nav-item-wrap">
                <a href="<?= base_url('/products_catalog_view') ?>"
                   class="nav-link-custom <?= $current_uri === 'products_catalog_view' ? 'active' : '' ?>">
                    <span>Product Catalog</span>
                </a>
            </div>

            <div class="nav-item-wrap dropdown">
                <a href="#"
                   class="nav-link-custom <?= in_array($current_uri, ['auth/login','auth/register','account']) ? 'active' : '' ?>"
                   id="authDropdown"
                   data-bs-toggle="dropdown"
                   aria-expanded="false">
                    <i class="bi bi-person"></i>
                    <span>
                        <?php if (session()->get('user_id')): ?>
                            <?= htmlspecialchars(session()->get('user_name') ?? 'My Account') ?>
                        <?php else: ?>
                            Login / Register
                        <?php endif; ?>
                    </span>
                    <i class="bi bi-chevron-down nav-chevron"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-custom dropdown-menu-end" aria-labelledby="authDropdown">
                    <?php if (session()->get('user_id')): ?>
                        <li><a class="dropdown-item-custom" href="<?= base_url('/account') ?>">
                            <i class="bi bi-person-circle"></i> My Account
                        </a></li>
                        <li><a class="dropdown-item-custom" href="<?= base_url('/orders') ?>">
                            <i class="bi bi-bag-check"></i> My Orders
                        </a></li></li>
                        <li><hr class="dropdown-divider-custom"></li>
                        <li><a class="dropdown-item-custom logout" href="<?= base_url('/auth/logout') ?>">
                            <i class="bi bi-box-arrow-right"></i> Sign Out
                        </a></li>
                    <?php else: ?>
                        <li><a class="dropdown-item-custom" href="<?= base_url('/auth/login') ?>">
                            <i class="bi bi-box-arrow-in-right"></i> Login
                        </a></li>
                        <li><a class="dropdown-item-custom" href="<?= base_url('/auth/register') ?>">
                            <i class="bi bi-person-plus"></i> Create Account
                        </a></li>
                    <?php endif; ?>
                </ul>
            </div>

            <a href="<?= base_url('/cart') ?>" class="cart-btn <?= $current_uri === 'cart' ? 'active' : '' ?>" aria-label="View cart">
                <div class="cart-icon-wrap">
                    <i class="bi bi-bag"></i>
                    <?php if ($cart_count > 0): ?>
                        <span class="cart-badge"><?= $cart_count > 99 ? '99+' : $cart_count ?></span>
                    <?php endif; ?>
                </div>
            </a>

        </nav>
    </div>
</header>