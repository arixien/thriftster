<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register — Thriftster</title>
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
        <h1>Join the <em>thrift</em> community.</h1>
        <p>Thousands of unique pieces waiting for a new home. Start your sustainable style journey today.</p>
    </div>

    <div class="perks">
        <div class="perk">
            <div class="perk-icon">🌸</div>
            <span>Buy & sell pre-loved fashion</span>
        </div>
        <div class="perk">
            <div class="perk-icon">🌿</div>
            <span>Shop sustainably & save money</span>
        </div>
        <div class="perk">
            <div class="perk-icon">✨</div>
            <span>Discover one-of-a-kind pieces</span>
        </div>
    </div>
</div>

<div class="right-panel">
    <div class="form-card">
        <div class="form-header">
            <h2>Create account</h2>
            <p>Start thrifting in seconds</p>
        </div>

        <?php if (isset($validation)): ?>
            <div class="validation-errors">
                <?= $validation->listErrors() ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('auth/register') ?>" method="post">
            <?= csrf_field() ?>

            <div class="field">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Choose a username" required>
            </div>

            <div class="field">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="your@email.com" required>
            </div>

            <div class="field">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Min. 6 characters" required>
            </div>

            <button type="submit" class="submit-btn">Create Account</button>
        </form>

        <div class="divider">or</div>

        <p class="switch-link">
            Already have an account? <a href="<?= base_url('/auth/login') ?>">Sign in</a>
        </p>
    </div>
</div>

</body>
</html>