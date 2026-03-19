<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thriftster</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom px-4">
    
    <!-- Logo -->
    <a class="navbar-brand d-flex align-items-center gap-2" href="/">
        <img src="<?= base_url('img/logo.png') ?>" alt="Logo" height="40">
        <span class="fw-bold">Thriftster</span>
    </a>

    <!-- Search -->
    <form class="d-flex mx-auto" action="/products_catalog_view" method="get">
        <input class="form-control me-2" type="search" name="q" placeholder="Search...">
        <button class="btn btn-outline-secondary" type="submit">🔍</button>
    </form>

    <!-- Nav Links -->
    <div class="d-flex align-items-center gap-3">
        <a href="/products_catalog_view" class="nav-link">Product Catalog</a>
        <a href="/auth/login" class="nav-link">Login</a>
        <a href="/auth/register" class="nav-link">Register</a>
        <a href="#" class="nav-link">🛒</a>
    </div>

</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>