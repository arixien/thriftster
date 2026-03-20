<?php
/**
 * header_view.php
 * Thriftster - Site Header
 * Colors: #E6A7B2, #E2B4B8, #D2C4BC, #E0CCD8, #EDCED4
 * Fonts: Cinzel Bold, Crimson Pro Bold, Poppins Regular
 */

// Cart item count (to be replaced with session/DB logic)
$cart_count = isset($_SESSION['cart_count']) ? (int)$_SESSION['cart_count'] : 0;

// Active nav detection
$current_page = basename($_SERVER['PHP_SELF'], '.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thrift Store</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <!-- Google Fonts: Cinzel, Crimson Pro, Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@700;900&family=Crimson+Pro:wght@600;700&family=Poppins:wght@300;400;500&family=Roboto:wght@300;400&display=swap" rel="stylesheet">

    <!-- Custom Header CSS -->
    <link rel="stylesheet" href="css/includes/header_view.css">
</head>
<body>

<!-- ===== SITE HEADER ===== -->
<header class="site-header">
    <div class="header-inner container-fluid px-3 px-md-4">

        <!-- ── LEFT: Logo ── -->
        <a href="index.php" class="logo-link" aria-label="Go to homepage">
            <div class="logo-badge">
                <img src="assets/logo.png"
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

        <!-- ── CENTER: Search Bar ── -->
        <form class="search-form" action="search.php" method="GET" role="search">
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

        <!-- ── RIGHT: Nav + Cart ── -->
        <nav class="header-nav" aria-label="Main navigation">

            <!-- Product Catalog -->
            <div class="nav-item-wrap">
                <a href="catalog.php"
                   class="nav-link-custom <?= $current_page === 'catalog' ? 'active' : '' ?>">
                    <span>Product Catalog</span>
                </a>
            </div>

            <!-- Login / Register -->
            <div class="nav-item-wrap dropdown">
                <a href="#"
                   class="nav-link-custom <?= in_array($current_page, ['login','register','account']) ? 'active' : '' ?>"
                   id="authDropdown"
                   data-bs-toggle="dropdown"
                   aria-expanded="false">
                    <i class="bi bi-person"></i>
                    <span>
                        <?php if (isset($_SESSION['user_id'])): ?>
                            <?= htmlspecialchars($_SESSION['user_name'] ?? 'My Account') ?>
                        <?php else: ?>
                            Login / Register
                        <?php endif; ?>
                    </span>
                    <i class="bi bi-chevron-down nav-chevron"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-custom dropdown-menu-end" aria-labelledby="authDropdown">
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <li><a class="dropdown-item-custom" href="account.php">
                            <i class="bi bi-person-circle"></i> My Account
                        </a></li>
                        <li><a class="dropdown-item-custom" href="orders.php">
                            <i class="bi bi-bag-check"></i> My Orders
                        </a></li>
                        <li><a class="dropdown-item-custom" href="wishlist.php">
                            <i class="bi bi-heart"></i> Wishlist
                        </a></li>
                        <li><hr class="dropdown-divider-custom"></li>
                        <li><a class="dropdown-item-custom logout" href="logout.php">
                            <i class="bi bi-box-arrow-right"></i> Sign Out
                        </a></li>
                    <?php else: ?>
                        <li><a class="dropdown-item-custom" href="login.php">
                            <i class="bi bi-box-arrow-in-right"></i> Login
                        </a></li>
                        <li><a class="dropdown-item-custom" href="register.php">
                            <i class="bi bi-person-plus"></i> Create Account
                        </a></li>
                    <?php endif; ?>
                </ul>
            </div>

            <!-- Cart Icon -->
            <a href="cart.php" class="cart-btn <?= $current_page === 'cart' ? 'active' : '' ?>" aria-label="View cart">
                <div class="cart-icon-wrap">
                    <i class="bi bi-bag"></i>
                    <?php if ($cart_count > 0): ?>
                        <span class="cart-badge"><?= $cart_count > 99 ? '99+' : $cart_count ?></span>
                    <?php endif; ?>
                </div>
            </a>

        </nav>

        <!-- ── Mobile Toggle ── -->
        <button class="mobile-menu-toggle d-md-none" 
                type="button" 
                data-bs-toggle="offcanvas" 
                data-bs-target="#mobileNav"
                aria-controls="mobileNav"
                aria-label="Open menu">
            <i class="bi bi-list"></i>
        </button>

    </div><!-- /header-inner -->
</header>
<!-- ===== /SITE HEADER ===== -->

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>