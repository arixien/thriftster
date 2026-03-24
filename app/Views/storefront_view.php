<?php
/**
 * storefront_view.php
 */

// ── Promo banner path ─────────────────────────────────────────

?>
 
<?= view('includes/header_view') ?>
 
<link rel="stylesheet" href="<?= base_url('public/css/pages/storefront_view.css') ?>">
<main class="storefront-main">
 
    <!-- Hero Section -->
       <!-- Hero Section -->
<!-- Hero Section -->
<!-- Hero Section -->
<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-banner">
        <?php if ($promo_banner_exists): ?>
            <img src="<?= base_url('public/' . $promo_banner_path) ?>" 
                 alt="Thriftster Promo Banner" 
                 class="promo-banner-img">
        <?php endif; ?>

        <!-- Text always appears on top of the image -->
        <div class="hero-text-overlay">
            <h1 class="hero-title">Discover Your Dream Wardrobe</h1>
            <p class="hero-subtitle">Soft girly finds • Cottagecore aesthetics • One-of-a-kind treasures ♡</p>
        </div>

        <a href="<?= base_url('/products_catalog_view') ?>" class="shop-now-btn">Shop Now</a>
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
           <a href="<?= base_url('/products_catalog_view?cat=new') ?>" class="category-card cat-new">
    <span class="cat-icon">✨</span>
    <span class="cat-label">New Arrivals</span>
</a>
<a href="<?= base_url('/products_catalog_view?cat=tops') ?>" class="category-card cat-tops">
    <span class="cat-icon">👗</span>
    <span class="cat-label">Tops/Dresses</span>
</a>
<a href="<?= base_url('/products_catalog_view?cat=bottoms') ?>" class="category-card cat-bottoms">
    <span class="cat-icon">👖</span>
    <span class="cat-label">Bottoms &amp; Skirts</span>
</a>
<a href="<?= base_url('/products_catalog_view?cat=accessories') ?>" class="category-card cat-accessories">
    <span class="cat-icon">💍</span>
    <span class="cat-label">Accessories</span>
</a>
<a href="<?= base_url('/products_catalog_view?cat=bags') ?>" class="category-card cat-bags">
    <span class="cat-icon">👜</span>
    <span class="cat-label">Bags</span>
</a>
<a href="<?= base_url('/products_catalog_view?cat=last') ?>" class="category-card cat-last">
    <span class="cat-icon">🏷️</span>
    <span class="cat-label">Last Chance</span>
</a>
            </a>
        </div>
    </section>

    <!-- New Releases Section -->
<section class="releases-section">
        <div class="section-heading">
            <h2>New Releases</h2>
        </div>
      <div class="releases-grid">

<?php foreach ($featured_new as $product): 
   $img_path   = $product['img'] ?? '';
$img_exists = !empty($img_path) && file_exists(FCPATH . $img_path);
?>
    <a href="<?= base_url('/product/' . $product['id']) ?>" class="product-card">
        <div class="product-img-wrap">
            <?php if ($img_exists): ?>
<img src="<?= base_url($img_path) ?>"
                     alt="<?= htmlspecialchars($product['name']) ?>" 
                     class="product-card-img">
            <?php else: ?>
                <div class="product-card-placeholder"></div>
            <?php endif; ?>
        </div>
        <div class="product-card-info">
            <span class="product-card-name"><?= htmlspecialchars($product['name']) ?></span>
            <span class="product-card-price">₱<?= number_format($product['price']) ?></span>
        </div>
    </a>
<?php endforeach; ?>
</div>

        <div class="see-more-wrap">
            <a href="<?= base_url('/products_catalog_view?cat=new') ?>" class="see-more-link">
                See More New Arrivals
            </a>
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