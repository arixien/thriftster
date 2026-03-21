<?php
/**
 * storefront_view.php
 */
?>

<?= view('includes/header_view') ?>

<link rel="stylesheet" href="public/css/pages/storefront_view.css">

<main class="storefront-main">
    
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-banner">
            <h1 class="hero-title">Promotional Banner</h1>
            <a href="catalog" class="shop-now-btn">Shop Now</a>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="categories-section">
        <div class="section-heading categories-heading">
            <span class="heading-bow">🎀</span>
            <h2>Shop by Category</h2>
            <p class="heading-subtitle">Find your next treasure ♡</p>
        </div>
        <div class="categories-grid">
            <a href="catalog?category=new_arrivals" class="category-card">
                <span class="cat-icon">✨</span>
                <span class="cat-label">New Arrivals</span>
            </a>
            <a href="catalog?category=clothing" class="category-card">
                <span class="cat-icon">👗</span>
                <span class="cat-label">Clothing</span>
            </a>
            <a href="catalog?category=accessories" class="category-card">
                <span class="cat-icon">💍</span>
                <span class="cat-label">Accessories</span>
            </a>
            <a href="catalog?category=shoes" class="category-card">
                <span class="cat-icon">🩰</span>
                <span class="cat-label">Shoes</span>
            </a>
            <a href="catalog?category=bags" class="category-card">
                <span class="cat-icon">👜</span>
                <span class="cat-label">Bags</span>
            </a>
            <a href="catalog?category=last_chance" class="category-card">
                <span class="cat-icon">🏷️</span>
                <span class="cat-label">Last Chance</span>
            </a>
        </div>
    </section>

    <!-- New Releases Section -->
    <section class="releases-section">
        <div class="section-heading">
            <h2>New Releases</h2>
        </div>
        <div class="releases-grid">
            <div class="product-card"></div>
            <div class="product-card"></div>
            <div class="product-card"></div>
            <div class="product-card"></div>
            
            <div class="product-card"></div>
            <div class="product-card"></div>
            <div class="product-card"></div>
            <div class="product-card"></div>
        </div>
        <div class="see-more-wrap">
            <a href="catalog?sort=newest" class="see-more-link">See More Here</a>
        </div>
    </section>

    <!-- Why Thriftster Section -->
    <section class="why-shop-section">
        <div class="why-shop-header">
            <span class="heading-bow">🎀</span>
            <h2 class="why-shop-title">Why Thriftster?</h2>
            <p class="why-shop-tagline">Because your wardrobe should feel like a love letter to yourself.</p>
        </div>
        <p class="why-shop-intro">
            At Thriftster, we believe fashion is more than just clothing&mdash;it's an aesthetic, a mood, and a curated expression of your softest, most authentic self.
            <br><br>
            <em>Here is why our community chooses us:</em>
        </p>
        <div class="why-shop-grid">
            <div class="why-card">
                <span class="why-card-icon">🌸</span>
                <h3 class="why-card-title">The Ultimate &ldquo;Girly-Pop&rdquo; Curator</h3>
                <p class="why-card-text">We do the digging so you don't have to. Every piece is hand-selected for its delicate details&mdash;think lace trims, dreamy pastels, and silhouettes that make every day feel like a cottagecore daydream.</p>
            </div>
            <div class="why-card">
                <span class="why-card-icon">✨</span>
                <h3 class="why-card-title">One-of-a-Kind Exclusivity</h3>
                <p class="why-card-text">In a world of fast-fashion clones, we offer individuality. Most of our treasures are one-of-one, ensuring your look is as unique as your personality.</p>
            </div>
            <div class="why-card">
                <span class="why-card-icon">🌿</span>
                <h3 class="why-card-title">Sustainable Charm</h3>
                <p class="why-card-text">We bridge the gap between high-end aesthetics and ethical shopping. You get to build a timeless, refined wardrobe that's as kind to the planet as it is to your closet.</p>
            </div>
            <div class="why-card">
                <span class="why-card-icon">💝</span>
                <h3 class="why-card-title">A Personalized Experience</h3>
                <p class="why-card-text">Shopping here isn't just a transaction; it's a discovery. We provide a boutique feel that celebrates the soft, the whimsical, and the wonderfully feminine.</p>
            </div>
        </div>
    </section>

</main>

<?= view('includes/footer_view') ?>
