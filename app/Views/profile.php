<?= view('includes/header_view') ?>
<link rel="stylesheet" href="<?= base_url('public/css/pages/profile.css') ?>">
<!-- Profile -->
<div class="profile-wrapper">

    <?php if (session()->getFlashdata('success')): ?>
        <div class="flash-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <div class="profile-card">

        <div class="profile-banner"></div>
<div class="profile-head">
<div class="avatar">
    <?php if (!empty($user['profile_picture'])): ?>
        <img src="<?= base_url('public/uploads/profiles/' . $user['profile_picture']) ?>" alt="Profile Picture">
    <?php else: ?>
        <?= strtoupper(substr($user['first_name'] ?? $user['username'] ?? '?', 0, 1)) ?>
    <?php endif; ?>
</div>
    <div class="profile-head-actions">
        <a href="<?= base_url('account') ?>" class="edit-btn">My Account</a>
        <a href="/profile/edit" class="edit-btn">Edit Profile</a>
    </div>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>