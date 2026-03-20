<?php
/**
 * products_catalog_view.php
 * Tops & Blouses category — real image paths, working sort filter
 */

// ── Active filters ──────────────────────────────────────────
$active_cat       = $_GET['cat']  ?? 'tops';
$active_sort      = $_GET['sort'] ?? 'newest';
$current_page_num = max(1, (int)($_GET['page'] ?? 1));
$items_per_page   = 12;

// ── Category tabs ───────────────────────────────────────────
$categories = [
    'all'     => 'All Items',
    'tops'    => 'Tops & Blouses',
    'bottoms' => 'Bottoms & Skirts',
    'dresses' => 'Dresses',
    'vintage' => 'Vintage Picks',
];

// ── Tops & Blouses product data ─────────────────────────────
// 'img' values match the actual filenames: top1_A.png … top12_A.png
// inside public/assets/tops/
$tops_products = [
    [
        'id'        => 1,
        'name'      => 'Floral Ruffle Blouse',
        'price'     => 320,
        'img'       => 'assets/tops/top1_A.png',
        'badge'     => 'New',
        'added_at'  => '2025-06-10',
        'condition' => 'excellent',
    ],
    [
        'id'        => 2,
        'name'      => 'Puff Sleeve Cotton Top',
        'price'     => 240,
        'img'       => 'assets/tops/top2_A.png',
        'badge'     => null,
        'added_at'  => '2025-06-08',
        'condition' => 'good',
    ],
    [
        'id'        => 3,
        'name'      => 'Vintage Striped Button-Up',
        'price'     => 380,
        'img'       => 'assets/tops/top3_A.png',
        'badge'     => null,
        'added_at'  => '2025-06-05',
        'condition' => 'good',
    ],
    [
        'id'        => 4,
        'name'      => 'Linen Tie-Front Blouse',
        'price'     => 290,
        'img'       => 'assets/tops/top4_A.png',
        'badge'     => 'Sale',
        'added_at'  => '2025-06-01',
        'condition' => 'excellent',
    ],
    [
        'id'        => 5,
        'name'      => 'Crochet Knit Crop Top',
        'price'     => 410,
        'img'       => 'assets/tops/top5_A.png',
        'badge'     => 'New',
        'added_at'  => '2025-06-12',
        'condition' => 'excellent',
    ],
    [
        'id'        => 6,
        'name'      => 'Embroidered Peasant Blouse',
        'price'     => 350,
        'img'       => 'assets/tops/top6_A.png',
        'badge'     => null,
        'added_at'  => '2025-05-28',
        'condition' => 'good',
    ],
    [
        'id'        => 7,
        'name'      => 'Satin Wrap Top',
        'price'     => 460,
        'img'       => 'assets/tops/top7_A.png',
        'badge'     => null,
        'added_at'  => '2025-05-25',
        'condition' => 'excellent',
    ],
    [
        'id'        => 8,
        'name'      => 'Ditsy Print Smock Top',
        'price'     => 270,
        'img'       => 'assets/tops/top8_A.png',
        'badge'     => 'Sale',
        'added_at'  => '2025-05-20',
        'condition' => 'fair',
    ],
    [
        'id'        => 9,
        'name'      => 'Boho Bell-Sleeve Top',
        'price'     => 300,
        'img'       => 'assets/tops/top9_A.png',
        'badge'     => null,
        'added_at'  => '2025-05-18',
        'condition' => 'good',
    ],
    [
        'id'        => 10,
        'name'      => 'Off-Shoulder Floral Top',
        'price'     => 330,
        'img'       => 'assets/tops/top10_A.png',
        'badge'     => 'New',
        'added_at'  => '2025-06-14',
        'condition' => 'excellent',
    ],
    [
        'id'        => 11,
        'name'      => 'Classic White Eyelet Blouse',
        'price'     => 390,
        'img'       => 'assets/tops/top11_A.png',
        'badge'     => null,
        'added_at'  => '2025-05-15',
        'condition' => 'good',
    ],
    [
        'id'        => 12,
        'name'      => 'Sheer Polka Dot Blouse',
        'price'     => 250,
        'img'       => 'assets/tops/top12_A.png',
        'badge'     => null,
        'added_at'  => '2025-05-10',
        'condition' => 'good',
    ],
];

// ── Apply price filter (from sidebar panel) ─────────────────
$price_min = isset($_GET['price_min']) && $_GET['price_min'] !== '' ? (int)$_GET['price_min'] : null;
$price_max = isset($_GET['price_max']) && $_GET['price_max'] !== '' ? (int)$_GET['price_max'] : null;
$filter_conditions = (array)($_GET['condition'] ?? []);

$products = $tops_products;

if ($price_min !== null) {
    $products = array_filter($products, fn($p) => $p['price'] >= $price_min);
}
if ($price_max !== null) {
    $products = array_filter($products, fn($p) => $p['price'] <= $price_max);
}
if (!empty($filter_conditions)) {
    $products = array_filter($products, fn($p) => in_array($p['condition'], $filter_conditions));
}
$products = array_values($products);

// ── Sort ────────────────────────────────────────────────────
usort($products, function ($a, $b) use ($active_sort) {
    return match ($active_sort) {
        'price_asc'  => $a['price'] <=> $b['price'],
        'price_desc' => $b['price'] <=> $a['price'],
        'name'       => strcmp($a['name'], $b['name']),
        default      => strcmp($b['added_at'], $a['added_at']), // newest first
    };
});

// ── Pagination ──────────────────────────────────────────────
$total_items = count($products);
$total_pages = max(1, (int)ceil($total_items / $items_per_page));
$current_page_num = min($current_page_num, $total_pages);
$offset  = ($current_page_num - 1) * $items_per_page;
$paged_products = array_slice($products, $offset, $items_per_page);

// Sort label for display
$sort_labels = [
    'newest'     => 'Newest First',
    'price_asc'  => 'Price: Low to High',
    'price_desc' => 'Price: High to Low',
    'name'       => 'Name A–Z',
];
$active_sort_label = $sort_labels[$active_sort] ?? 'Newest First';

// Build query string helper
function catalog_url(array $overrides = []): string {
    global $active_cat, $active_sort, $current_page_num;
    $params = array_merge([
        'cat'  => $active_cat,
        'sort' => $active_sort,
        'page' => $current_page_num,
    ], $overrides);
    return '?' . http_build_query($params);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tops &amp; Blouses — Product Catalog</title>

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
                <span class="catalog-count">
                    Showing
                    <strong><?= min($offset + $items_per_page, $total_items) - $offset ?></strong>
                    of
                    <strong><?= $total_items ?></strong>
                    item<?= $total_items !== 1 ? 's' : '' ?>
                </span>
            </div>

            <!-- ── Filter Bar ── -->
            <div class="filter-bar">

                <!-- Category Tabs -->
                <div class="filter-tabs" role="tablist">
                    <?php foreach ($categories as $key => $label): ?>
                        <a href="<?= catalog_url(['cat' => $key, 'page' => 1]) ?>"
                           class="filter-tab <?= $active_cat === $key ? 'active' : '' ?>"
                           role="tab"
                           aria-selected="<?= $active_cat === $key ? 'true' : 'false' ?>">
                            <?= $label ?>
                        </a>
                    <?php endforeach; ?>
                </div>

                <!-- Sort / Filter Toggle -->
                <div class="filter-actions">

                    <!-- Sort Dropdown -->
                    <div class="dropdown">
                        <button class="sort-btn dropdown-toggle" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-arrow-down-up"></i>
                            <span class="sort-label-text d-none d-sm-inline"><?= htmlspecialchars($active_sort_label) ?></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end sort-dropdown">
                            <?php foreach ($sort_labels as $sort_key => $sort_label): ?>
                                <li>
                                    <a class="sort-option <?= $active_sort === $sort_key ? 'active' : '' ?>"
                                       href="<?= catalog_url(['sort' => $sort_key, 'page' => 1]) ?>">
                                        <?php if ($active_sort === $sort_key): ?>
                                            <i class="bi bi-check2 sort-check"></i>
                                        <?php endif; ?>
                                        <?= $sort_label ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <!-- Filter Panel Toggle -->
                    <button class="filter-toggle-btn" type="button"
                            data-bs-toggle="offcanvas" data-bs-target="#filterPanel">
                        <i class="bi bi-sliders2"></i>
                        <span class="d-none d-sm-inline">Filters</span>
                        <?php if ($price_min || $price_max || !empty($filter_conditions)): ?>
                            <span class="filter-active-dot"></span>
                        <?php endif; ?>
                    </button>

                </div>
            </div><!-- /.filter-bar -->

            <!-- ── Active Filter Chips ── -->
            <?php if ($price_min || $price_max || !empty($filter_conditions)): ?>
            <div class="active-filters mb-3">
                <?php if ($price_min || $price_max): ?>
                    <span class="active-chip">
                        ₱<?= $price_min ?? '0' ?> – ₱<?= $price_max ?? '∞' ?>
                        <a href="<?= catalog_url(['price_min' => '', 'price_max' => '', 'page' => 1]) ?>"
                           class="chip-remove" aria-label="Remove price filter">
                            <i class="bi bi-x"></i>
                        </a>
                    </span>
                <?php endif; ?>
                <?php foreach ($filter_conditions as $cond): ?>
                    <span class="active-chip">
                        <?= ucfirst($cond) ?>
                        <a href="<?= catalog_url(['condition' => array_diff($filter_conditions, [$cond]), 'page' => 1]) ?>"
                           class="chip-remove" aria-label="Remove condition filter">
                            <i class="bi bi-x"></i>
                        </a>
                    </span>
                <?php endforeach; ?>
                <a href="<?= catalog_url(['price_min' => '', 'price_max' => '', 'condition' => [], 'page' => 1]) ?>"
                   class="clear-all-filters">Clear all</a>
            </div>
            <?php endif; ?>

            <!-- ── Product Grid ── -->
            <?php if (empty($paged_products)): ?>
                <div class="empty-state">
                    <i class="bi bi-search empty-icon"></i>
                    <p class="empty-title">No items found</p>
                    <p class="empty-sub">Try adjusting your filters or browse all items.</p>
                    <a href="?cat=tops" class="empty-reset-btn">Clear Filters</a>
                </div>
            <?php else: ?>
            <div class="product-grid row g-4">
                <?php foreach ($paged_products as $i => $product):
                    // Resolve image path relative to public/
                    $img_path   = $product['img'];
                    // FCPATH = CodeIgniter constant → absolute path to public/
                    // e.g. /var/www/html/thriftster/public/assets/tops/top1_A.png
                    $img_exists = !empty($img_path) && file_exists(FCPATH . $img_path);
                ?>
                    <div class="col-6 col-md-4 col-lg-3 product-col"
                         style="--anim-delay: <?= ($i % 8) * 0.05 ?>s">

                        <article class="product-card">

                            <!-- Badge -->
                            <?php if ($product['badge']): ?>
                                <span class="product-badge <?= strtolower($product['badge']) ?>">
                                    <?= $product['badge'] ?>
                                </span>
                            <?php endif; ?>

                            <!-- Wishlist -->
                            <button class="wishlist-btn" aria-label="Add to wishlist"
                                    data-product-id="<?= $product['id'] ?>">
                                <i class="bi bi-heart"></i>
                            </button>

                            <!-- Image -->
                            <a href="product_detail.php?id=<?= $product['id'] ?>" class="product-img-link">
                                <div class="product-img-wrap">
                                    <?php if ($img_exists): ?>
                                        <img
                                            src="<?= base_url(htmlspecialchars($img_path)) ?>"
                                            alt="<?= htmlspecialchars($product['name']) ?>"
                                            class="product-img"
                                            loading="<?= $i < 4 ? 'eager' : 'lazy' ?>"
                                            width="400" height="400"
                                        >
                                    <?php else: ?>
                                        <!-- Graceful placeholder when image file not yet uploaded -->
                                        <div class="product-img-placeholder" aria-hidden="true">
                                            <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                                                <rect width="200" height="200" fill="#f5ecee"/>
                                                <line x1="0" y1="0" x2="200" y2="200" stroke="#d4b0b8" stroke-width="1.2"/>
                                                <line x1="200" y1="0" x2="0" y2="200" stroke="#d4b0b8" stroke-width="1.2"/>
                                                <rect x="1" y="1" width="198" height="198" fill="none"
                                                      stroke="#d4b0b8" stroke-width="1.2" rx="4"/>
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
                                    <div class="product-bottom-row">
                                        <span class="product-price">₱<?= number_format($product['price']) ?></span>
                                        <span class="product-condition condition-<?= $product['condition'] ?>">
                                            <?= ucfirst($product['condition']) ?>
                                        </span>
                                    </div>
                                </div>
                                <button class="add-to-cart-btn" aria-label="Add to cart"
                                        data-product-id="<?= $product['id'] ?>">
                                    <i class="bi bi-bag-plus"></i>
                                </button>
                            </div>

                        </article>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
            <!-- ── /Product Grid ── -->


            <!-- ── Pagination ── -->
            <?php if ($total_pages > 1): ?>
            <nav class="catalog-pagination" aria-label="Page navigation">

                <!-- Prev -->
                <a href="<?= catalog_url(['page' => max(1, $current_page_num - 1)]) ?>"
                   class="page-btn nav-btn <?= $current_page_num <= 1 ? 'disabled' : '' ?>"
                   aria-label="Previous page"
                   <?= $current_page_num <= 1 ? 'aria-disabled="true" tabindex="-1"' : '' ?>>
                    <i class="bi bi-chevron-left"></i>
                </a>

                <!-- Page numbers -->
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
                        <a href="<?= catalog_url(['page' => $p]) ?>"
                           class="page-btn <?= $p === $current_page_num ? 'active' : '' ?>"
                           aria-label="Page <?= $p ?>"
                           <?= $p === $current_page_num ? 'aria-current="page"' : '' ?>>
                            <?= $p ?>
                        </a>
                    <?php endif;
                endforeach; ?>

                <!-- Next -->
                <a href="<?= catalog_url(['page' => min($total_pages, $current_page_num + 1)]) ?>"
                   class="page-btn nav-btn <?= $current_page_num >= $total_pages ? 'disabled' : '' ?>"
                   aria-label="Next page"
                   <?= $current_page_num >= $total_pages ? 'aria-disabled="true" tabindex="-1"' : '' ?>>
                    <i class="bi bi-chevron-right"></i>
                </a>

            </nav>
            <?php endif; ?>
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
                <input type="hidden" name="cat"  value="<?= htmlspecialchars($active_cat) ?>">
                <input type="hidden" name="sort" value="<?= htmlspecialchars($active_sort) ?>">
                <input type="hidden" name="page" value="1">

                <!-- Price Range -->
                <div class="filter-section">
                    <h6 class="filter-section-title">Price Range</h6>
                    <div class="price-inputs">
                        <div class="price-field">
                            <label>Min (₱)</label>
                            <input type="number" name="price_min" class="filter-input"
                                   placeholder="0"
                                   value="<?= htmlspecialchars($_GET['price_min'] ?? '') ?>">
                        </div>
                        <span class="price-sep">—</span>
                        <div class="price-field">
                            <label>Max (₱)</label>
                            <input type="number" name="price_max" class="filter-input"
                                   placeholder="5000"
                                   value="<?= htmlspecialchars($_GET['price_max'] ?? '') ?>">
                        </div>
                    </div>
                </div>

                <hr class="filter-divider">

                <!-- Condition -->
                <div class="filter-section">
                    <h6 class="filter-section-title">Condition</h6>
                    <?php foreach (['Excellent', 'Good', 'Fair'] as $cond): ?>
                        <label class="filter-checkbox">
                            <input type="checkbox" name="condition[]"
                                   value="<?= strtolower($cond) ?>"
                                   <?= in_array(strtolower($cond), $filter_conditions) ? 'checked' : '' ?>>
                            <span class="checkbox-custom"></span>
                            <span class="checkbox-label"><?= $cond ?></span>
                        </label>
                    <?php endforeach; ?>
                </div>

                <hr class="filter-divider">

                <!-- Size (tops-specific) -->
                <div class="filter-section">
                    <h6 class="filter-section-title">Size</h6>
                    <div class="size-chips">
                        <?php foreach (['XS','S','M','L','XL','XXL'] as $size): ?>
                            <label class="size-chip">
                                <input type="checkbox" name="size[]" value="<?= $size ?>"
                                       <?= in_array($size, (array)($_GET['size'] ?? [])) ? 'checked' : '' ?>>
                                <span><?= $size ?></span>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Panel Footer -->
                <div class="filter-panel-footer">
                    <a href="?cat=<?= $active_cat ?>&sort=<?= $active_sort ?>"
                       class="filter-clear-btn">Clear All</a>
                    <button type="submit" class="filter-apply-btn">Apply Filters</button>
                </div>

            </form>
        </div>
    </div>
    <!-- ===== /FILTER SIDE PANEL ===== -->


    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    /* ── Wishlist toggle (localStorage) ── */
    (function () {
        const stored = JSON.parse(localStorage.getItem('wishlist') || '[]');
        const wishlistSet = new Set(stored.map(String));

        document.querySelectorAll('.wishlist-btn').forEach(btn => {
            const id = btn.dataset.productId;
            if (wishlistSet.has(id)) {
                btn.classList.add('wishlisted');
                btn.querySelector('i').className = 'bi bi-heart-fill';
            }

            btn.addEventListener('click', () => {
                if (wishlistSet.has(id)) {
                    wishlistSet.delete(id);
                    btn.classList.remove('wishlisted');
                    btn.querySelector('i').className = 'bi bi-heart';
                } else {
                    wishlistSet.add(id);
                    btn.classList.add('wishlisted');
                    btn.querySelector('i').className = 'bi bi-heart-fill';
                }
                localStorage.setItem('wishlist', JSON.stringify([...wishlistSet]));
            });
        });
    })();

    /* ── Add to Cart feedback ── */
    document.querySelectorAll('.add-to-cart-btn').forEach(btn => {
        btn.addEventListener('click', function () {
            const icon = this.querySelector('i');
            icon.className = 'bi bi-check2';
            this.classList.add('added');
            setTimeout(() => {
                icon.className = 'bi bi-bag-plus';
                this.classList.remove('added');
            }, 1400);
        });
    });
    </script>

</body>
</html>