<?= view('includes/header_view') ?>
<link rel="stylesheet" href="<?= base_url('public/css/pages/profile_edit.css') ?>">

<div class="edit-wrapper">

    <?php if (session()->getFlashdata('success')): ?>
        <div class="flash-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="flash-error"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <div class="edit-card">

        <div class="edit-banner">
            <div class="edit-banner-text">EDIT · PROFILE · UPDATE ·</div>
        </div>

<div class="edit-head">
    <div class="edit-title-wrap">
        <h1 class="edit-title">Edit Profile</h1>
        <p class="edit-subtitle">@<?= esc($user['username'] ?? '') ?></p>
    </div>
</div>

<form action="<?= base_url('profile/edit') ?>" method="POST" class="edit-form" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <div class="avatar-upload">
        <div class="avatar">
            <?php if (!empty($user['profile_picture'])): ?>
                <img src="<?= base_url('public/uploads/profiles/' . $user['profile_picture']) ?>" alt="Profile Picture">
            <?php else: ?>
                <?= strtoupper(substr($user['first_name'] ?? $user['username'] ?? '?', 0, 1)) ?>
            <?php endif; ?>
        </div>
        <label for="profile_picture" class="avatar-edit-btn" title="Change photo">✎</label>
        <input type="file" id="profile_picture" name="profile_picture" accept="image/*" style="display:none;">
    </div>

    <div class="form-row">
        <div class="form-group">
            <label class="form-label" for="first_name">First Name</label>
            <input type="text" id="first_name" name="first_name" class="form-input" value="<?= esc($user['first_name'] ?? '') ?>" placeholder="Your first name">
        </div>
        <div class="form-group">
            <label class="form-label" for="last_name">Last Name</label>
            <input type="text" id="last_name" name="last_name" class="form-input" value="<?= esc($user['last_name'] ?? '') ?>" placeholder="Your last name">
        </div>
    </div>

    <div class="form-group">
        <label class="form-label" for="phone">Phone</label>
        <input type="text" id="phone" name="phone" class="form-input" value="<?= esc($user['phone'] ?? '') ?>" placeholder="+63 900 000 0000">
    </div>

    <div class="form-group">
        <label class="form-label" for="city">City</label>
        <input type="text" id="city" name="city" class="form-input" value="<?= esc($user['city'] ?? '') ?>" placeholder="Your city">
    </div>

    <div class="form-group">
        <label class="form-label" for="bio">Bio</label>
        <textarea id="bio" name="bio" class="form-input form-textarea" placeholder="Tell the world about your thrifting style..." rows="4"><?= esc($user['bio'] ?? '') ?></textarea>
        <span class="form-hint">Share your love for vintage and preloved finds.</span>
    </div>

    <div class="form-actions">
        <a href="<?= base_url('profile') ?>" class="btn-cancel">Cancel</a>
        <button type="submit" class="btn-save">Save Changes</button>
    </div>

</form>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>