<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile — Thriftster</title>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=Crimson+Pro:ital,wght@0,400;0,700;1,400&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="<?= base_url('public/css/pages/profile.css') ?>">
</head>
<body>

<!-- Navbar -->
<nav class="navbar">
    <div class="brand">
        <div class="brand-icon">🎀</div>
        <span class="brand-name">Thriftster</span>
    </div>
    <div class="nav-links">
        <a href="/shop">Shop</a>
        <a href="/sell">Sell</a>
        <a href="/profile" class="active">Profile</a>
        <a href="/auth/logout" class="logout-btn">Log out</a>
    </div>
</nav>

<!-- Profile -->
<div class="profile-wrapper">

    <?php if (session()->getFlashdata('success')): ?>
        <div class="flash-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <div class="profile-card">

        <div class="profile-banner"></div>

        <div class="profile-head">
            <div class="avatar">
                <?= strtoupper(substr($user['first_name'] ?? $user['username'] ?? '?', 0, 1)) ?>
            </div>
            <a href="/profile/edit" class="edit-btn">Edit Profile</a>
        </div>

        <div class="profile-body">
            <h1 class="profile-name">
                <?= esc(trim(($user['first_name'] ?? '') . ' ' . ($user['last_name'] ?? ''))) ?: esc($user['username']) ?>
            </h1>
            <p class="profile-handle">@<?= esc($user['username'] ?? '') ?></p>
            <p class="profile-email">📧 <?= esc($user['email'] ?? '') ?></p>

            <?php if (!empty($user['phone'])): ?>
                <p class="profile-meta">📞 <?= esc($user['phone']) ?></p>
            <?php endif; ?>

            <?php if (!empty($user['city'])): ?>
                <p class="profile-meta">📍 <?= esc($user['city']) ?></p>
            <?php endif; ?>

            <?php if (!empty($user['bio'])): ?>
                <p class="profile-bio">"<?= esc($user['bio']) ?>"</p>
            <?php endif; ?>
        </div>

        <div class="profile-footer">
            <span class="tag">Vintage</span>
            <span class="tag">Sustainable</span>
            <span class="tag">Preloved</span>
        </div>

    </div>

</div>

</body>
</html>