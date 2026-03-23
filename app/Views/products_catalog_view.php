<?php
$active_cat       = $_GET['cat']  ?? 'all';
$active_sort      = $_GET['sort'] ?? 'newest';
$current_page_num = max(1, (int)($_GET['page'] ?? 1));
$items_per_page   = 12;

$categories = [
    'all'         => 'All Items',
    'new'         => 'New Arrivals',
    'tops'        => 'Tops/Dresses',
    'bottoms'     => 'Bottoms/Skirts',
    'accessories' => 'Accessories',
    'bags'        => 'Bags',
    'last'        => 'Last Chance',
];

$products = match ($active_cat) {
   'new' => array_slice(
    array_values(
        array_filter($all_products, fn($p) => !empty($p['created_at']))
    ), 0, 12
),
    'tops'        => array_values(array_filter($all_products, fn($p) => $p['category'] === 'tops')),
    'bottoms'     => array_values(array_filter($all_products, fn($p) => $p['category'] === 'bottoms')),
    'accessories' => array_values(array_filter($all_products, fn($p) => $p['category'] === 'accessories')),
    'bags'        => array_values(array_filter($all_products, fn($p) => $p['category'] === 'bags')),
    'last'        => array_values(array_filter($all_products, fn($p) => $p['category'] === 'last')),
    default       => $all_products,
};

// ── Size options change per category ─────────────────────────
$size_options = match ($active_cat) {
    'bottoms'             => ['XS','S','M','L','XL','XXL','24','26','28','30','32'],
    'bags'                => ['Mini','Small','Medium','Large'],
    'accessories', 'last' => ['XS','S','M','L','XL','One Size'],
    default               => ['XS','S','M','L','XL','XXL'],
};

// ── Apply filters ────────────────────────────────────────────
$price_min         = isset($_GET['price_min']) && $_GET['price_min'] !== '' ? (int)$_GET['price_min'] : null;
$price_max         = isset($_GET['price_max']) && $_GET['price_max'] !== '' ? (int)$_GET['price_max'] : null;
$filter_conditions = (array)($_GET['condition'] ?? []);
$filter_conditions = array_values(array_filter($filter_conditions, fn($v) => $v !== ''));

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

// ── Sort ─────────────────────────────────────────────────────
usort($products, function ($a, $b) use ($active_sort) {
    return match ($active_sort) {
        'price_asc'  => $a['price'] <=> $b['price'],
        'price_desc' => $b['price'] <=> $a['price'],
        'name'       => strcmp($a['name'], $b['name']),
default      => strcmp($b['created_at'], $a['created_at']),
    };
});

// ── Pagination ───────────────────────────────────────────────
$total_items      = count($products);
$total_pages      = max(1, (int)ceil($total_items / $items_per_page));
$current_page_num = min($current_page_num, $total_pages);
$offset           = ($current_page_num - 1) * $items_per_page;
$paged_products   = array_slice($products, $offset, $items_per_page);

// ── Sort labels ───────────────────────────────────────────────
$sort_labels = [
    'newest'     => 'Newest First',
    'price_asc'  => 'Price: Low to High',
    'price_desc' => 'Price: High to Low',
    'name'       => 'Name A–Z',
];
$active_sort_label = $sort_labels[$active_sort] ?? 'Newest First';

// ── URL builder helper ───────────────────────────────────────
function catalog_url(array $overrides = []): string {
    global $active_cat, $active_sort, $current_page_num;
    $params = array_merge([
        'cat'  => $active_cat,
        'sort' => $active_sort,
        'page' => $current_page_num,
    ], $overrides);
    $params = array_filter($params, fn($v) => $v !== '' && $v !== null);
    return '?' . http_build_query($params);
}

$page_title = $categories[$active_cat] ?? 'Product Catalog';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($page_title) ?> — Thrift Store</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@700;900&family=Crimson+Pro:wght@600;700&family=Poppins:wght@300;400;500&family=Roboto:wght@300;400&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="<?= base_url('public/css/includes/header_view.css') ?>">
<link rel="stylesheet" href="<?= base_url('public/css/pages/products_catalog_view.css') ?>">
</head>
<body>

<?= view('includes/header_view') ?>
    <main class="catalog-main">
        <div class="container-fluid catalog-container">

            <!-- ── Page Title ── -->
            <div class="catalog-title-row">
                <div>
                    <h1 class="catalog-title">Product Catalog</h1>
                    <p class="catalog-subtitle">Handpicked treasures, waiting for a new home.</p>
                </div>
                <span class="catalog-count">
                    Showing <strong><?= count($paged_products) ?></strong>
                    of <strong><?= $total_items ?></strong>
                    item<?= $total_items !== 1 ? 's' : '' ?>
                </span>
            </div>

            <!-- ── Filter Bar ── -->
            <div class="filter-bar">
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

                <div class="filter-actions">
                    <div class="dropdown">
                        <button class="sort-btn dropdown-toggle" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-arrow-down-up"></i>
                            <span class="sort-label-text d-none d-sm-inline">
                                <?= htmlspecialchars($active_sort_label) ?>
                            </span>
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

                    <button class="filter-toggle-btn" type="button"
                            data-bs-toggle="offcanvas" data-bs-target="#filterPanel">
                        <i class="bi bi-sliders2"></i>
                        <span class="d-none d-sm-inline">Filters</span>
                        <?php if ($price_min || $price_max || !empty($filter_conditions)): ?>
                            <span class="filter-active-dot"></span>
                        <?php endif; ?>
                    </button>
                </div>
            </div>

            <!-- ── Active Filter Chips ── -->
            <?php if ($price_min || $price_max || !empty($filter_conditions)): ?>
            <div class="active-filters mb-3">
                <?php if ($price_min || $price_max): ?>
                    <span class="active-chip">
                        ₱<?= number_format($price_min ?? 0) ?> – ₱<?= $price_max ? number_format($price_max) : '∞' ?>
                        <a href="<?= catalog_url(['price_min' => '', 'price_max' => '', 'page' => 1]) ?>"
                           class="chip-remove" aria-label="Remove price filter">
                            <i class="bi bi-x"></i>
                        </a>
                    </span>
                <?php endif; ?>
                <?php foreach ($filter_conditions as $cond): ?>
                    <span class="active-chip">
                        <?= ucfirst(htmlspecialchars($cond)) ?>
                        <a href="<?= catalog_url(['condition' => array_values(array_diff($filter_conditions, [$cond])), 'page' => 1]) ?>"
                           class="chip-remove" aria-label="Remove condition filter">
                            <i class="bi bi-x"></i>
                        </a>
                    </span>
                <?php endforeach; ?>
                <a href="<?= catalog_url(['price_min' => '', 'price_max' => '', 'condition' => '', 'page' => 1]) ?>"
                   class="clear-all-filters">Clear all</a>
            </div>
            <?php endif; ?>

            <!-- ── Product Grid ── -->
            <?php if (empty($paged_products)): ?>
                <div class="empty-state">
                    <i class="bi bi-search empty-icon"></i>
                    <p class="empty-title">No items found</p>
                    <p class="empty-sub">Try adjusting your filters or browse all items.</p>
                    <a href="<?= catalog_url(['price_min' => '', 'price_max' => '', 'condition' => '', 'page' => 1]) ?>"
                       class="empty-reset-btn">Clear Filters</a>
                </div>
            <?php else: ?>
            <div class="product-grid row g-4">
                <?php foreach ($paged_products as $i => $product):
                    $img_path   = $product['img'];
                    $img_exists = !empty($img_path) && file_exists(FCPATH . $img_path);
                ?>
                    <div class="col-6 col-md-4 col-lg-3 product-col"
                         style="--anim-delay: <?= ($i % 8) * 0.05 ?>s">

                        <article class="product-card">

                            <!-- Badge (New / Sale) -->
                    <?php if (!empty($product['badge']) && $active_cat === 'new'): ?>
    <span class="product-badge <?= strtolower($product['badge']) ?>">
        <?= htmlspecialchars($product['badge']) ?>
    </span>
<?php endif; ?>

                            <!-- Image -->
                            <a href="<?= base_url('/product/' . $product['id']) ?>" class="product-img-link">
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
                                    <a href="<?= base_url('/product/' . $product['id']) ?>" class="product-name">
                                        <?= htmlspecialchars($product['name']) ?>
                                    </a>
                                    <div class="product-bottom-row">
                                        <span class="product-price">₱<?= number_format($product['price']) ?></span>
                                        <span class="product-condition condition-<?= $product['condition'] ?>">
                                            <?= ucfirst($product['condition']) ?>
                                        </span>
                                    </div>
                                </div>
                            <form action="<?= base_url('/cart/add') ?>" method="POST" style="display:inline;">
    <?= csrf_field() ?>
    <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
    <input type="hidden" name="quantity" value="1">
    <button type="submit" class="add-to-cart-btn" aria-label="Add to cart"
            data-product-id="<?= $product['id'] ?>">
        <i class="bi bi-bag-plus"></i>
    </button>
</form>
                            </div>

                        </article>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>

            <!-- ── Pagination ── -->
            <?php if ($total_pages > 1): ?>
            <nav class="catalog-pagination" aria-label="Page navigation">

                <a href="<?= catalog_url(['page' => max(1, $current_page_num - 1)]) ?>"
                   class="page-btn nav-btn <?= $current_page_num <= 1 ? 'disabled' : '' ?>"
                   aria-label="Previous page"
                   <?= $current_page_num <= 1 ? 'aria-disabled="true" tabindex="-1"' : '' ?>>
                    <i class="bi bi-chevron-left"></i>
                </a>

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

                <a href="<?= catalog_url(['page' => min($total_pages, $current_page_num + 1)]) ?>"
                   class="page-btn nav-btn <?= $current_page_num >= $total_pages ? 'disabled' : '' ?>"
                   aria-label="Next page"
                   <?= $current_page_num >= $total_pages ? 'aria-disabled="true" tabindex="-1"' : '' ?>>
                    <i class="bi bi-chevron-right"></i>
                </a>

            </nav>
            <?php endif; ?>

        </div>
    </main>


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

                <!-- Size — options swap per active category -->
                <div class="filter-section">
                    <h6 class="filter-section-title">Size</h6>
                    <div class="size-chips">
                        <?php foreach ($size_options as $size): ?>
                            <label class="size-chip">
                                <input type="checkbox" name="size[]" value="<?= $size ?>"
                                       <?= in_array($size, (array)($_GET['size'] ?? [])) ? 'checked' : '' ?>>
                                <span><?= $size ?></span>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="filter-panel-footer">
                    <a href="?cat=<?= htmlspecialchars($active_cat) ?>&sort=<?= htmlspecialchars($active_sort) ?>"
                       class="filter-clear-btn">Clear All</a>
                    <button type="submit" class="filter-apply-btn">Apply Filters</button>
                </div>
            </form>
        </div>
    </div>


    <script>
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
<?= view('includes/footer_view') ?>

</body>
</html>