<?php
/**
 * storefront_view.php
 */

// ── Pull New Arrivals (badge = 'New') from the catalog product data ──
$tops_products = [
    ['id'=>101,'name'=>'Primrose Ribbed Baby Tee',    'price'=>320, 'img'=>'public/assets/tops/top1_A.png',  'badge'=>'New',  'category'=>'tops'],
    ['id'=>102,'name'=>'Ivory Whisper Dress',         'price'=>240, 'img'=>'public/assets/tops/top2_A.png',  'badge'=>null,   'category'=>'tops'],
    ['id'=>103,'name'=>'Mauve Bow-Lace Bodice',       'price'=>380, 'img'=>'public/assets/tops/top3_A.png',  'badge'=>null,   'category'=>'tops'],
    ['id'=>104,'name'=>'Bluebell Reverie Dress',      'price'=>290, 'img'=>'public/assets/tops/top4_A.png',  'badge'=>'Sale', 'category'=>'tops'],
    ['id'=>105,'name'=>'Sage Tie-Front Cardigan',     'price'=>410, 'img'=>'public/assets/tops/top5_A.png',  'badge'=>'New',  'category'=>'tops'],
    ['id'=>106,'name'=>'Cornflower Blue Velour Crop', 'price'=>350, 'img'=>'public/assets/tops/top6_A.png',  'badge'=>null,   'category'=>'tops'],
    ['id'=>107,'name'=>'Rosé Petaline Dress',         'price'=>460, 'img'=>'public/assets/tops/top7_A.png',  'badge'=>null,   'category'=>'tops'],
    ['id'=>108,'name'=>'Cream Pointelle Knit Polo',   'price'=>270, 'img'=>'public/assets/tops/top8_A.png',  'badge'=>'Sale', 'category'=>'tops'],
    ['id'=>109,'name'=>'Emerald Corset Dress',        'price'=>300, 'img'=>'public/assets/tops/top9_A.png',  'badge'=>null,   'category'=>'tops'],
    ['id'=>110,'name'=>'Rosé Satin Lace Dress',       'price'=>330, 'img'=>'public/assets/tops/top10_A.png', 'badge'=>'New',  'category'=>'tops'],
    ['id'=>111,'name'=>'Milkmaid Chiffon Bustier',    'price'=>390, 'img'=>'public/assets/tops/top11_A.png', 'badge'=>null,   'category'=>'tops'],
    ['id'=>112,'name'=>'Midnight Bloom Dress',        'price'=>250, 'img'=>'public/assets/tops/top12_A.png', 'badge'=>null,   'category'=>'tops'],
];

$bottoms_products = [
    ['id'=>201,'name'=>'Lorem Ipsum 1',  'price'=>450, 'img'=>'public/assets/bottoms/bottoms1_A.png',  'badge'=>'New',  'category'=>'bottoms'],
    ['id'=>202,'name'=>'Lorem Ipsum 2',  'price'=>380, 'img'=>'public/assets/bottoms/bottoms2_A.png',  'badge'=>null,   'category'=>'bottoms'],
    ['id'=>203,'name'=>'Lorem Ipsum 3',  'price'=>290, 'img'=>'public/assets/bottoms/bottoms3_A.png',  'badge'=>null,   'category'=>'bottoms'],
    ['id'=>204,'name'=>'Lorem Ipsum 4',  'price'=>520, 'img'=>'public/assets/bottoms/bottoms4_A.png',  'badge'=>'New',  'category'=>'bottoms'],
    ['id'=>205,'name'=>'Lorem Ipsum 5',  'price'=>340, 'img'=>'public/assets/bottoms/bottoms5_A.png',  'badge'=>'Sale', 'category'=>'bottoms'],
    ['id'=>206,'name'=>'Lorem Ipsum 6',  'price'=>480, 'img'=>'public/assets/bottoms/bottoms6_A.png',  'badge'=>null,   'category'=>'bottoms'],
    ['id'=>207,'name'=>'Lorem Ipsum 7',  'price'=>360, 'img'=>'public/assets/bottoms/bottoms7_A.png',  'badge'=>null,   'category'=>'bottoms'],
    ['id'=>208,'name'=>'Lorem Ipsum 8',  'price'=>410, 'img'=>'public/assets/bottoms/bottoms8_A.png',  'badge'=>null,   'category'=>'bottoms'],
    ['id'=>209,'name'=>'Lorem Ipsum 9',  'price'=>550, 'img'=>'public/assets/bottoms/bottoms9_A.png',  'badge'=>'New',  'category'=>'bottoms'],
    ['id'=>210,'name'=>'Lorem Ipsum 10', 'price'=>320, 'img'=>'public/assets/bottoms/bottoms10_A.png', 'badge'=>null,   'category'=>'bottoms'],
    ['id'=>211,'name'=>'Lorem Ipsum 11', 'price'=>300, 'img'=>'public/assets/bottoms/bottoms11_A.png', 'badge'=>'Sale', 'category'=>'bottoms'],
    ['id'=>212,'name'=>'Lorem Ipsum 12', 'price'=>490, 'img'=>'public/assets/bottoms/bottoms12_A.png', 'badge'=>null,   'category'=>'bottoms'],
];

$accessories_products = [
    ['id'=>301,'name'=>'Accessories 1',  'price'=>180, 'img'=>'public/assets/accessories/accessories1_A.png',  'badge'=>'New',  'category'=>'accessories'],
    ['id'=>302,'name'=>'Accessories 2',  'price'=>120, 'img'=>'public/assets/accessories/accessories2_A.png',  'badge'=>null,   'category'=>'accessories'],
    ['id'=>303,'name'=>'Accessories 3',  'price'=>95,  'img'=>'public/assets/accessories/accessories3_A.png',  'badge'=>null,   'category'=>'accessories'],
    ['id'=>304,'name'=>'Accessories 4',  'price'=>220, 'img'=>'public/assets/accessories/accessories4_A.png',  'badge'=>'New',  'category'=>'accessories'],
    ['id'=>305,'name'=>'Accessories 5',  'price'=>150, 'img'=>'public/assets/accessories/accessories5_A.png',  'badge'=>'Sale', 'category'=>'accessories'],
    ['id'=>306,'name'=>'Accessories 6',  'price'=>175, 'img'=>'public/assets/accessories/accessories6_A.png',  'badge'=>null,   'category'=>'accessories'],
    ['id'=>307,'name'=>'Accessories 7',  'price'=>130, 'img'=>'public/assets/accessories/accessories7_A.png',  'badge'=>null,   'category'=>'accessories'],
    ['id'=>308,'name'=>'Accessories 8',  'price'=>200, 'img'=>'public/assets/accessories/accessories8_A.png',  'badge'=>null,   'category'=>'accessories'],
    ['id'=>309,'name'=>'Accessories 9',  'price'=>90,  'img'=>'public/assets/accessories/accessories9_A.png',  'badge'=>'New',  'category'=>'accessories'],
    ['id'=>310,'name'=>'Accessories 10', 'price'=>160, 'img'=>'public/assets/accessories/accessories10_A.png', 'badge'=>null,   'category'=>'accessories'],
    ['id'=>311,'name'=>'Accessories 11', 'price'=>110, 'img'=>'public/assets/accessories/accessories11_A.png', 'badge'=>'Sale', 'category'=>'accessories'],
    ['id'=>312,'name'=>'Accessories 12', 'price'=>195, 'img'=>'public/assets/accessories/accessories12_A.png', 'badge'=>null,   'category'=>'accessories'],
];

$bags_products = [
    ['id'=>401,'name'=>'Bags 1',  'price'=>580, 'img'=>'public/assets/bags/bags1_A.png',  'badge'=>'New',  'category'=>'bags'],
    ['id'=>402,'name'=>'Bags 2',  'price'=>420, 'img'=>'public/assets/bags/bags2_A.png',  'badge'=>null,   'category'=>'bags'],
    ['id'=>403,'name'=>'Bags 3',  'price'=>350, 'img'=>'public/assets/bags/bags3_A.png',  'badge'=>null,   'category'=>'bags'],
    ['id'=>404,'name'=>'Bags 4',  'price'=>720, 'img'=>'public/assets/bags/bags4_A.png',  'badge'=>'New',  'category'=>'bags'],
    ['id'=>405,'name'=>'Bags 5',  'price'=>490, 'img'=>'public/assets/bags/bags5_A.png',  'badge'=>'Sale', 'category'=>'bags'],
    ['id'=>406,'name'=>'Bags 6',  'price'=>610, 'img'=>'public/assets/bags/bags6_A.png',  'badge'=>null,   'category'=>'bags'],
    ['id'=>407,'name'=>'Bags 7',  'price'=>380, 'img'=>'public/assets/bags/bags7_A.png',  'badge'=>null,   'category'=>'bags'],
    ['id'=>408,'name'=>'Bags 8',  'price'=>540, 'img'=>'public/assets/bags/bags8_A.png',  'badge'=>null,   'category'=>'bags'],
    ['id'=>409,'name'=>'Bags 9',  'price'=>660, 'img'=>'public/assets/bags/bags9_A.png',  'badge'=>'New',  'category'=>'bags'],
    ['id'=>410,'name'=>'Bags 10', 'price'=>310, 'img'=>'public/assets/bags/bags10_A.png', 'badge'=>null,   'category'=>'bags'],
    ['id'=>411,'name'=>'Bags 11', 'price'=>290, 'img'=>'public/assets/bags/bags11_A.png', 'badge'=>'Sale', 'category'=>'bags'],
    ['id'=>412,'name'=>'Bags 12', 'price'=>750, 'img'=>'public/assets/bags/bags12_A.png', 'badge'=>null,   'category'=>'bags'],
];

$last_products = [
    ['id'=>501,'name'=>'Last Chance 1',  'price'=>150, 'img'=>'public/assets/last/last1_A.png',  'badge'=>'Sale', 'category'=>'last'],
    ['id'=>502,'name'=>'Last Chance 2',  'price'=>120, 'img'=>'public/assets/last/last2_A.png',  'badge'=>'Sale', 'category'=>'last'],
    ['id'=>503,'name'=>'Last Chance 3',  'price'=>90,  'img'=>'public/assets/last/last3_A.png',  'badge'=>'Sale', 'category'=>'last'],
    ['id'=>504,'name'=>'Last Chance 4',  'price'=>200, 'img'=>'public/assets/last/last4_A.png',  'badge'=>'Sale', 'category'=>'last'],
    ['id'=>505,'name'=>'Last Chance 5',  'price'=>180, 'img'=>'public/assets/last/last5_A.png',  'badge'=>'Sale', 'category'=>'last'],
    ['id'=>506,'name'=>'Last Chance 6',  'price'=>75,  'img'=>'public/assets/last/last6_A.png',  'badge'=>'Sale', 'category'=>'last'],
    ['id'=>507,'name'=>'Last Chance 7',  'price'=>230, 'img'=>'public/assets/last/last7_A.png',  'badge'=>'Sale', 'category'=>'last'],
    ['id'=>508,'name'=>'Last Chance 8',  'price'=>110, 'img'=>'public/assets/last/last8_A.png',  'badge'=>'Sale', 'category'=>'last'],
    ['id'=>509,'name'=>'Last Chance 9',  'price'=>165, 'img'=>'public/assets/last/last9_A.png',  'badge'=>'Sale', 'category'=>'last'],
    ['id'=>510,'name'=>'Last Chance 10', 'price'=>95,  'img'=>'public/assets/last/last10_A.png', 'badge'=>'Sale', 'category'=>'last'],
    ['id'=>511,'name'=>'Last Chance 11', 'price'=>140, 'img'=>'public/assets/last/last11_A.png', 'badge'=>'Sale', 'category'=>'last'],
    ['id'=>512,'name'=>'Last Chance 12', 'price'=>85,  'img'=>'public/assets/last/last12_A.png', 'badge'=>'Sale', 'category'=>'last'],
];

// ── Filter all products for badge = 'New', take first 8 for the grid ──
$all_products = array_merge($tops_products, $bottoms_products, $accessories_products, $bags_products, $last_products);
$new_arrivals = array_values(array_filter($all_products, fn($p) => $p['badge'] === 'New'));
$featured_new = array_slice($new_arrivals, 0, 8);

// ── Promo banner path ─────────────────────────────────────────
$promo_banner_path   = 'public/assets/includes/promo_banner.png';
$promo_banner_exists = file_exists(FCPATH . $promo_banner_path);
?>

<?= view('includes/header_view') ?>

<link rel="stylesheet" href="public/css/pages/storefront_view.css">

<main class="storefront-main">

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-banner">
            <?php if ($promo_banner_exists): ?>
                <img
                    src="<?= base_url($promo_banner_path) ?>"
                    alt="Promotional Banner"
                    class="promo-banner-img"
                >
            <?php else: ?>
                <h1 class="hero-title">Promotional Banner</h1>
            <?php endif; ?>
            <a href="products_catalog_view?cat=all&page=1" class="shop-now-btn">Shop Now</a>
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
            <a href="products_catalog_view?cat=new&page=1" class="category-card cat-new">
                <span class="cat-icon">✨</span>
                <span class="cat-label">New Arrivals</span>
            </a>
            <a href="products_catalog_view?cat=tops&page=1" class="category-card cat-tops">
                <span class="cat-icon">👚</span>
                <span class="cat-label">Tops &amp; Dresses</span>
            </a>
            <a href="products_catalog_view?cat=bottoms&page=1" class="category-card cat-bottoms">
                <span class="cat-icon">👗</span>
                <span class="cat-label">Bottoms &amp; Skirts</span>
            </a>
            <a href="products_catalog_view?cat=accessories&page=1" class="category-card cat-accessories">
                <span class="cat-icon">💍</span>
                <span class="cat-label">Accessories</span>
            </a>
            <a href="products_catalog_view?cat=bags&page=1" class="category-card cat-bags">
                <span class="cat-icon">👜</span>
                <span class="cat-label">Bags</span>
            </a>
            <a href="products_catalog_view?cat=last&page=1" class="category-card cat-last">
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
            <?php foreach ($featured_new as $product):
                $img_exists = !empty($product['img']) && file_exists(FCPATH . $product['img']);
            ?>
                <a href="products_catalog_view/product_detail/<?= $product['id'] ?>" class="product-card">
                    <?php if ($img_exists): ?>
                        <img
                            src="<?= base_url(htmlspecialchars($product['img'])) ?>"
                            alt="<?= htmlspecialchars($product['name']) ?>"
                            class="product-card-img"
                            loading="lazy"
                            width="400" height="400"
                        >
                    <?php else: ?>
                        <div class="product-card-placeholder" aria-hidden="true">
                            <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                                <rect width="200" height="200" fill="#f5ecee"/>
                                <line x1="0" y1="0" x2="200" y2="200" stroke="#d4b0b8" stroke-width="1.2"/>
                                <line x1="200" y1="0" x2="0" y2="200" stroke="#d4b0b8" stroke-width="1.2"/>
                                <rect x="1" y="1" width="198" height="198" fill="none"
                                      stroke="#d4b0b8" stroke-width="1.2" rx="4"/>
                            </svg>
                        </div>
                    <?php endif; ?>
                    <div class="product-card-info">
                        <span class="product-card-name"><?= htmlspecialchars($product['name']) ?></span>
                        <span class="product-card-price">₱<?= number_format($product['price']) ?></span>
                    </div>
                </a>
            <?php endforeach; ?>

            <?php
            // Fill remaining slots with empty placeholders if fewer than 8 new items
            $remaining = 8 - count($featured_new);
            for ($i = 0; $i < $remaining; $i++): ?>
                <div class="product-card product-card-empty">
                    <div class="product-card-placeholder" aria-hidden="true">
                        <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                            <rect width="200" height="200" fill="#f5ecee"/>
                            <line x1="0" y1="0" x2="200" y2="200" stroke="#d4b0b8" stroke-width="1.2"/>
                            <line x1="200" y1="0" x2="0" y2="200" stroke="#d4b0b8" stroke-width="1.2"/>
                            <rect x="1" y="1" width="198" height="198" fill="none"
                                  stroke="#d4b0b8" stroke-width="1.2" rx="4"/>
                        </svg>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
        <div class="see-more-wrap">
            <a href="products_catalog_view?cat=new&page=1" class="see-more-link">See More Here</a>
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