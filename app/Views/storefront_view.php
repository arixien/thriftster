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
            <a href="products_catalog_view" class="shop-now-btn">Shop Now</a>
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
            <a href="products_catalog_view?cat=new" class="category-card">
                <span class="cat-icon">✨</span>
                <span class="cat-label">New Arrivals</span>
            </a>
            <a href="products_catalog_view?cat=tops" class="category-card">
                <span class="cat-icon">👗</span>
                <span class="cat-label">Clothing</span>
            </a>
            <a href="products_catalog_view?cat=accessories" class="category-card">
                <span class="cat-icon">💍</span>
                <span class="cat-label">Accessories</span>
            </a>
            <a href="products_catalog_view?cat=bottoms" class="category-card">
               <span class="cat-icon">👖</span>
                <span class="cat-label">Bottoms/Skirts</span>
            </a>
            <a href="products_catalog_view?cat=bags" class="category-card">
                <span class="cat-icon">👜</span>
                <span class="cat-label">Bags</span>
            </a>
            <a href="products_catalog_view?cat=last" class="category-card">
                <span class="cat-icon">🏷️</span>
                <span class="cat-label">Last Chance</span>
            </a>
        </div>
    </section>

    <!-- New Releases Section -->
<!-- New Releases Section -->
<section class="releases-section">
    <div class="section-heading">
        <h2>New Releases</h2>
    </div>
  <div class="releases-grid" style="display:grid; grid-template-columns:repeat(4,1fr); gap:1.5rem; max-width:1400px; margin:0 auto; padding:0 1rem;">
    <?php foreach ($new_releases as $product): ?>
        <a href="<?= base_url('/product/' . $product['id']) ?>" class="release-card" style="border-radius:16px; overflow:hidden; border:2px solid #EDCED4; text-decoration:none; color:#4A3C41; background:#fff;">
            <?php if (!empty($product['img'])): ?>
               <img src="<?= base_url($product['img']) ?>" 
     alt="<?= esc($product['name']) ?>"
     style="width:100%; height:220px; object-fit:contain; display:block; padding:1rem; background:#fff;">
            <?php else: ?>
                <div style="width:100%; height:160px; background:#FFF5F7;"></div>
            <?php endif; ?>
            <p style="margin:0.8rem 1rem 0.3rem; font-weight:600; font-size:0.95rem;"><?= esc($product['name']) ?></p>
            <p style="margin:0 1rem 1rem; color:#E6A7B2; font-size:0.9rem; font-weight:600;">₱<?= number_format($product['price'], 2) ?></p>
        </a>
    <?php endforeach; ?>
</div>
    <div class="see-more-wrap">
        <a href="products_catalog_view?sort=newest" class="see-more-link">See More Here</a>
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