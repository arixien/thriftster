<?php
/**
 * products_catalog_view.php
 */

// --- Active category filter ---
$active_cat = $_GET['cat'] ?? 'all';
$current_page_num = max(1, (int)($_GET['page'] ?? 1));
$total_pages = 5; // placeholder

// --- Category tabs ---
$categories = [
    'all'     => 'All Items',
    'tops'    => 'Tops & Blouses',
    'bottoms' => 'Bottoms & Skirts',
    'dresses' => 'Dresses',
    'vintage' => 'Vintage Picks',
];

// --- Placeholder products (12 per page) ---
$products = [];
$product_names = [
    'Floral Midi Dress', 'Pearl Stud Earrings', 'Wicker Basket Bag',
    'Vintage Blouse', 'Linen Blouse', 'Enamel Brooch Pin',
    'Crochet Cardigan', 'Ceramic Bud Vase', 'Silk Scarf',
    'Beaded Necklace', 'Embroidered Tote', 'Rattan Side Table',
];
for ($i = 0; $i < 12; $i++) {
    $products[] = [
        'id'    => $i + 1,
        'name'  => $product_names[$i],
        'price' => rand(8, 95) * 10, // in pesos
        'img'   => null, // placeholder
        'badge' => $i % 5 === 0 ? 'New' : ($i % 7 === 0 ? 'Sale' : null),
    ];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Catalog — Thrift Store</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@700;900&family=Crimson+Pro:wght@600;700&family=Poppins:wght@300;400;500&family=Roboto:wght@300;400&display=swap" rel="stylesheet">

    <!-- Header CSS -->
    <link rel="stylesheet" href="includes/header_view.css">
    <!-- Catalog CSS -->
    <link rel="stylesheet" href="css/pages/products_catalog_view.css">
</head>
<body>

    <?php include 'includes/header_view.php'; ?>

    <!-- ===== CATALOG MAIN ===== -->
    <main class="catalog-main">
        <div class="container-fluid catalog-container">

            <!-- ── Page Title ── -->
            <div class="catalog-title-row">
                <div>
                    <h1 class="catalog-title">Product Catalog</h1>
                    <p class="catalog-subtitle">Handpicked treasures, waiting for a new home.</p>
                </div>
                <span class="catalog-count">Showing <strong>12</strong> of <strong>58</strong> items</span>
            </div>

            <!-- ── Filter Bar ── -->
            <div class="filter-bar">
                <!-- Category Tabs -->
                <div class="filter-tabs" role="tablist">
                    <?php foreach ($categories as $key => $label): ?>
                        <a href="?cat=<?= $key ?>"
                           class="filter-tab <?= $active_cat === $key ? 'active' : '' ?>"
                           role="tab"
                           aria-selected="<?= $active_cat === $key ? 'true' : 'false' ?>">
                            <?= $label ?>
                        </a>
                    <?php endforeach; ?>
                </div>

                <!-- Sort / Filter Toggle -->
                <div class="filter-actions">
                    <div class="dropdown">
                        <button class="sort-btn dropdown-toggle" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-arrow-down-up"></i>
                            <span class="d-none d-sm-inline">Sort</span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end sort-dropdown">
                            <li><a class="sort-option active" href="?cat=<?= $active_cat ?>&sort=newest">Newest First</a></li>
                            <li><a class="sort-option" href="?cat=<?= $active_cat ?>&sort=price_asc">Price: Low to High</a></li>
                            <li><a class="sort-option" href="?cat=<?= $active_cat ?>&sort=price_desc">Price: High to Low</a></li>
                            <li><a class="sort-option" href="?cat=<?= $active_cat ?>&sort=name">Name A–Z</a></li>
                        </ul>
                    </div>

                    <button class="filter-toggle-btn" type="button"
                            data-bs-toggle="offcanvas" data-bs-target="#filterPanel">
                        <i class="bi bi-sliders2"></i>
                        <span class="d-none d-sm-inline">Filters</span>
                    </button>
                </div>
            </div>

            <!-- ── Product Grid ── -->
            <div class="product-grid row g-4">
                <?php foreach ($products as $i => $product): ?>
                    <div class="col-6 col-md-4 col-lg-3 product-col"
                         style="animation-delay: <?= $i * 0.05 ?>s">
                        <article class="product-card">

                            <!-- Badge -->
                            <?php if ($product['badge']): ?>
                                <span class="product-badge <?= strtolower($product['badge']) ?>">
                                    <?= $product['badge'] ?>
                                </span>
                            <?php endif; ?>

                            <!-- Wishlist Button -->
                            <button class="wishlist-btn" aria-label="Add to wishlist">
                                <i class="bi bi-heart"></i>
                            </button>

                            <!-- Image -->
                            <a href="product_detail.php?id=<?= $product['id'] ?>" class="product-img-link">
                                <div class="product-img-wrap">
                                    <?php if ($product['img']): ?>
                                        <img src="<?= htmlspecialchars($product['img']) ?>"
                                             alt="<?= htmlspecialchars($product['name']) ?>"
                                             class="product-img"
                                             loading="lazy">
                                    <?php else: ?>
                                        <!-- Placeholder SVG -->
                                        <div class="product-img-placeholder">
                                            <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <rect width="200" height="200" fill="#f5ecee" rx="4"/>
                                                <line x1="0" y1="0" x2="200" y2="200" stroke="#d4b0b8" stroke-width="1.2"/>
                                                <line x1="200" y1="0" x2="0" y2="200" stroke="#d4b0b8" stroke-width="1.2"/>
                                                <rect x="1" y="1" width="198" height="198" fill="none" stroke="#d4b0b8" stroke-width="1.2" rx="4"/>
                                            </svg>
                                            <span class="placeholder-label">Image Coming Soon</span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </a>

                            <!-- Info -->
                            <div class="product-info">
                                <div class="product-meta">
                                    <a href="product_detail.php?id=<?= $product['id'] ?>" class="product-name">
                                        <?= htmlspecialchars($product['name']) ?>
                                    </a>
                                    <span class="product-price">₱<?= number_format($product['price']) ?></span>
                                </div>
                                <button class="add-to-cart-btn" aria-label="Add to cart">
                                    <i class="bi bi-bag-plus"></i>
                                </button>
                            </div>

                        </article>
                    </div>
                <?php endforeach; ?>
            </div>
            <!-- ── /Product Grid ── -->

            <!-- ── Pagination ── -->
            <nav class="catalog-pagination" aria-label="Page navigation">
                <!-- Prev -->
                <a href="?cat=<?= $active_cat ?>&page=<?= max(1, $current_page_num - 1) ?>"
                   class="page-btn nav-btn <?= $current_page_num <= 1 ? 'disabled' : '' ?>"
                   aria-label="Previous page">
                    <i class="bi bi-chevron-left"></i>
                </a>

                <!-- Pages -->
                <?php
                $pages_to_show = [];
                if ($total_pages <= 5) {
                    $pages_to_show = range(1, $total_pages);
                } else {
                    $pages_to_show[] = 1;
                    if ($current_page_num > 3) $pages_to_show[] = '…';
                    for ($p = max(2, $current_page_num - 1); $p <= min($total_pages - 1, $current_page_num + 1); $p++) {
                        $pages_to_show[] = $p;
                    }
                    if ($current_page_num < $total_pages - 2) $pages_to_show[] = '…';
                    $pages_to_show[] = $total_pages;
                }
                foreach ($pages_to_show as $p):
                    if ($p === '…'): ?>
                        <span class="page-ellipsis">…</span>
                    <?php else: ?>
                        <a href="?cat=<?= $active_cat ?>&page=<?= $p ?>"
                           class="page-btn <?= $p === $current_page_num ? 'active' : '' ?>">
                            <?= $p ?>
                        </a>
                    <?php endif;
                endforeach; ?>

                <!-- Next -->
                <a href="?cat=<?= $active_cat ?>&page=<?= min($total_pages, $current_page_num + 1) ?>"
                   class="page-btn nav-btn <?= $current_page_num >= $total_pages ? 'disabled' : '' ?>"
                   aria-label="Next page">
                    <i class="bi bi-chevron-right"></i>
                </a>
            </nav>
            <!-- ── /Pagination ── -->

        </div>
    </main>
    <!-- ===== /CATALOG MAIN ===== -->


    <!-- ===== FILTER SIDE PANEL ===== -->
    <div class="offcanvas offcanvas-end filter-panel" tabindex="-1" id="filterPanel">
        <div class="offcanvas-header filter-panel-header">
            <h5 class="offcanvas-title">Filter Items</h5>
            <button type="button" class="btn-close-custom" data-bs-dismiss="offcanvas" aria-label="Close">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>
        <div class="offcanvas-body filter-panel-body">
            <form action="" method="GET">
                <input type="hidden" name="cat" value="<?= htmlspecialchars($active_cat) ?>">

                <!-- Price Range -->
                <div class="filter-section">
                    <h6 class="filter-section-title">Price Range</h6>
                    <div class="price-inputs">
                        <div class="price-field">
                            <label>Min (₱)</label>
                            <input type="number" name="price_min" class="filter-input"
                                   placeholder="0" value="<?= htmlspecialchars($_GET['price_min'] ?? '') ?>">
                        </div>
                        <span class="price-sep">—</span>
                        <div class="price-field">
                            <label>Max (₱)</label>
                            <input type="number" name="price_max" class="filter-input"
                                   placeholder="5000" value="<?= htmlspecialchars($_GET['price_max'] ?? '') ?>">
                        </div>
                    </div>
                </div>

                <hr class="filter-divider">

                <!-- Condition -->
                <div class="filter-section">
                    <h6 class="filter-section-title">Condition</h6>
                    <?php foreach (['Excellent', 'Good', 'Fair'] as $cond): ?>
                        <label class="filter-checkbox">
                            <input type="checkbox" name="condition[]" value="<?= strtolower($cond) ?>"
                                <?= in_array(strtolower($cond), (array)($_GET['condition'] ?? [])) ? 'checked' : '' ?>>
                            <span class="checkbox-mark"></span>
                            <?= $cond ?>
                        </label>
                    <?php endforeach; ?>
                </div>

                <hr class="filter-divider">

                <!-- Size (Clothing) -->
                <div class="filter-section">
                    <h6 class="filter-section-title">Size</h6>
                    <div class="size-chips">
                        <?php foreach (['XS','S','M','L','XL','XXL','Free Size'] as $sz): ?>
                            <label class="size-chip">
                                <input type="checkbox" name="size[]" value="<?= $sz ?>">
                                <span><?= $sz ?></span>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="filter-panel-footer">
                    <a href="?cat=<?= $active_cat ?>" class="filter-clear-btn">Clear All</a>
                    <button type="submit" class="filter-apply-btn">Apply Filters</button>
                </div>
            </form>
        </div>
    </div>
    <!-- ===== /FILTER SIDE PANEL ===== -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Scroll shadow on header
        document.addEventListener('scroll', () => {
            document.querySelector('.site-header')
                ?.classList.toggle('scrolled', window.scrollY > 12);
        });

        // Wishlist heart toggle
        document.querySelectorAll('.wishlist-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const icon = this.querySelector('i');
                icon.classList.toggle('bi-heart');
                icon.classList.toggle('bi-heart-fill');
                this.classList.toggle('wishlisted');
            });
        });
    </script>
</body>
</html>