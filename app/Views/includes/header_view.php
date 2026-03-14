
<!-- header draft palang :) -->

<!-- includes/header.php -->

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

<link rel="stylesheet" href="<?= base_url('public/css/includes/header_view.css') ?>">

<nav class="navbar custom-header px-3">
    <div class="container-fluid d-flex align-items-center">

        <!-- Logo -->
        <div class="logo-section">
            <div class="logo-circle">Logo</div>
            <span class="logo-text">Logo Name</span>
        </div>

        <!-- Search -->
        <div class="search-container">
            <input type="text" placeholder="Search for unique finds...">
            <span class="search-icon">🔍</span>
        </div>

        <!-- Menu -->
        <div class="menu-section">
            <a href="<?= base_url('products_catalog_view') ?>">Product Catalog</a>
            <a href="#">Login/Register</a>
            <span class="cart">🛒</span>
        </div>

    </div>
</nav>