<?php
/**
 * header_view.php
 * Colors: #E6A7B2, #E2B4B8, #D2C4BC, #E0CCD8, #EDCED4
 * Fonts: Cinzel Bold, Crimson Pro Bold, Poppins Regular
 */

// Cart item count (to be replaced with session/DB logic)
$cart_count = isset($_SESSION['cart_count']) ? (int)$_SESSION['cart_count'] : 0;

// Active nav detection
$current_uri = uri_string();
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
    <link rel="stylesheet" href="/thriftster/public/css/includes/admin_header_view.css">
    <link rel="stylesheet" href="/thriftster/public/css/pages/admin_dashboard.css">
</head>
<body>

<!-- ===== SITE HEADER ===== -->
<header class="site-header">
    <div class="header-inner container-fluid px-3 px-md-4">

        <!-- ── LEFT: Logo ── -->
        <a href="<?= base_url('/') ?>" class="logo-link" aria-label="Go to homepage">
            <div class="logo-badge">
                <img src="assets/header/logo.png"
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

        <!-- ── MIDDLE: Admin Dashboard ── -->
        <div class="header-middle">
            <h1 class="admin-title">Admin Dashboard</h1>
        </div>

        <!-- ── RIGHT: Nav + Logout ── -->
        <nav class="header-nav" aria-label="Main navigation">

            <!-- Products -->
            <div class="nav-item-wrap">
                <a href="<?= base_url('/products_catalog_view') ?>"
                   class="nav-link-custom <?= $current_uri === 'products_catalog_view' ? 'active' : '' ?>">
                    <span>Products</span>
                </a>
            </div>

            <!-- Orders -->
            <div class="nav-item-wrap">
                <a href="<?= base_url('/orders') ?>"
                   class="nav-link-custom <?= $current_uri === 'orders' ? 'active' : '' ?>">
                    <span>Orders</span>
                </a>
            </div>

            <!-- Logout -->
            <div class="nav-item-wrap">
                <a href="<?= base_url('/logout') ?>"
                   class="nav-link-custom logout-nav-btn <?= $current_uri === 'logout' ? 'active' : '' ?>">
                    <span>Logout</span>
                </a>
            </div>

        </nav>

    </div>
</header>

