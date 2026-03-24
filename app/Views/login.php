<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — Thriftster</title>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=Crimson+Pro:ital,wght@0,400;0,700;1,400&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('public/css/includes/auth.css') ?>">
</head>
<body>

<div class="left-panel">
    <div class="brand">
        <div class="brand-icon">🎀</div>
        <span class="brand-name">Thriftster</span>
    </div>

    <div class="left-content">
        <h1>Find your <em>next</em> favorite piece.</h1>
        <p>Because your wardrobe should feel like a love letter to yourself.</p>
    </div>

    <div class="tags">
        <span class="tag">Vintage</span>
        <span class="tag">Sustainable</span>
        <span class="tag">Affordable</span>
        <span class="tag">Unique</span>
    </div>
</div>

<div class="right-panel">
    <div class="form-card">
        <div class="form-header">
            <h2>Welcome back</h2>
            <p>Sign in to your Thriftster account</p>
        </div>

        <?php if (isset($error)): ?>
            <div class="error-box"><?= $error ?></div>
        <?php endif; ?>

        <form action="<?= base_url('auth/login') ?>" method="post">
            <?= csrf_field() ?>

            <div class="field">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required>
            </div>

            <div class="field">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>

            <button type="submit" class="submit-btn">Sign In</button>
        </form>

        <div class="divider">or</div>

        <p class="switch-link">
            Don't have an account? <a href="<?= base_url('/auth/register') ?>">Create one</a>
        </p>
    </div>
</div>

</body>
</html>