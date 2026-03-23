<?php
/**
 * products_catalog_view.php
 * Categories: New Arrivals, Tops/Dresses, Bottoms/Skirts, Accessories, Bags, Last Chance
 */

// ── Active filters ──────────────────────────────────────────
$active_cat       = $_GET['cat']  ?? 'all';
$active_sort      = $_GET['sort'] ?? 'newest';
$current_page_num = max(1, (int)($_GET['page'] ?? 1));
$items_per_page   = 12;

// ── Category tabs ───────────────────────────────────────────
$categories = [
    'all'         => 'All Items',
    'new'         => 'New Arrivals',
    'tops'        => 'Tops/Dresses',
    'bottoms'     => 'Bottoms/Skirts',
    'accessories' => 'Accessories',
    'bags'        => 'Bags',
    'last'        => 'Last Chance',
];

// ── Tops/Dresses ─────────────────────────────────────────────
$tops_products = [
    ['id'=>101,'name'=>'Primrose Ribbed Baby Tee',    'price'=>320, 'img'=>'public/assets/tops/top1_A.png',  'badge'=>'New',  'added_at'=>'2025-06-14','condition'=>'excellent','category'=>'tops'],
    ['id'=>102,'name'=>'Ivory Whisper Dress',         'price'=>240, 'img'=>'public/assets/tops/top2_A.png',  'badge'=>null,   'added_at'=>'2025-06-08','condition'=>'good',     'category'=>'tops'],
    ['id'=>103,'name'=>'Mauve Bow-Lace Bodice',       'price'=>380, 'img'=>'public/assets/tops/top3_A.png',  'badge'=>null,   'added_at'=>'2025-06-05','condition'=>'good',     'category'=>'tops'],
    ['id'=>104,'name'=>'Bluebell Reverie Dress',      'price'=>290, 'img'=>'public/assets/tops/top4_A.png',  'badge'=>'Sale', 'added_at'=>'2025-06-01','condition'=>'excellent','category'=>'tops'],
    ['id'=>105,'name'=>'Sage Tie-Front Cardigan',     'price'=>410, 'img'=>'public/assets/tops/top5_A.png',  'badge'=>'New',  'added_at'=>'2025-06-12','condition'=>'excellent','category'=>'tops'],
    ['id'=>106,'name'=>'Cornflower Blue Velour Crop', 'price'=>350, 'img'=>'public/assets/tops/top6_A.png',  'badge'=>null,   'added_at'=>'2025-05-28','condition'=>'good',     'category'=>'tops'],
    ['id'=>107,'name'=>'Rosé Petaline Dress',         'price'=>460, 'img'=>'public/assets/tops/top7_A.png',  'badge'=>null,   'added_at'=>'2025-05-25','condition'=>'excellent','category'=>'tops'],
    ['id'=>108,'name'=>'Cream Pointelle Knit Polo',   'price'=>270, 'img'=>'public/assets/tops/top8_A.png',  'badge'=>'Sale', 'added_at'=>'2025-05-20','condition'=>'fair',     'category'=>'tops'],
    ['id'=>109,'name'=>'Emerald Corset Dress',        'price'=>300, 'img'=>'public/assets/tops/top9_A.png',  'badge'=>null,   'added_at'=>'2025-05-18','condition'=>'good',     'category'=>'tops'],
    ['id'=>110,'name'=>'Rosé Satin Lace Dress',       'price'=>330, 'img'=>'public/assets/tops/top10_A.png', 'badge'=>'New',  'added_at'=>'2025-06-13','condition'=>'excellent','category'=>'tops'],
    ['id'=>111,'name'=>'Milkmaid Chiffon Bustier',    'price'=>390, 'img'=>'public/assets/tops/top11_A.png', 'badge'=>null,   'added_at'=>'2025-05-15','condition'=>'good',     'category'=>'tops'],
    ['id'=>112,'name'=>'Midnight Bloom Dress',        'price'=>250, 'img'=>'public/assets/tops/top12_A.png', 'badge'=>null,   'added_at'=>'2025-05-10','condition'=>'good',     'category'=>'tops'],
];

// ── Bottoms/Skirts ───────────────────────────────────────────
$bottoms_products = [
    ['id'=>201,'name'=>'Lorem Ipsum 1',  'price'=>450, 'img'=>'public/assets/bottoms/bottoms1_A.png',  'badge'=>'New',  'added_at'=>'2025-06-14','condition'=>'excellent','category'=>'bottoms'],
    ['id'=>202,'name'=>'Lorem Ipsum 2',  'price'=>380, 'img'=>'public/assets/bottoms/bottoms2_A.png',  'badge'=>null,   'added_at'=>'2025-06-10','condition'=>'good',     'category'=>'bottoms'],
    ['id'=>203,'name'=>'Lorem Ipsum 3',  'price'=>290, 'img'=>'public/assets/bottoms/bottoms3_A.png',  'badge'=>null,   'added_at'=>'2025-06-07','condition'=>'good',     'category'=>'bottoms'],
    ['id'=>204,'name'=>'Lorem Ipsum 4',  'price'=>520, 'img'=>'public/assets/bottoms/bottoms4_A.png',  'badge'=>'New',  'added_at'=>'2025-06-13','condition'=>'excellent','category'=>'bottoms'],
    ['id'=>205,'name'=>'Lorem Ipsum 5',  'price'=>340, 'img'=>'public/assets/bottoms/bottoms5_A.png',  'badge'=>'Sale', 'added_at'=>'2025-06-02','condition'=>'fair',     'category'=>'bottoms'],
    ['id'=>206,'name'=>'Lorem Ipsum 6',  'price'=>480, 'img'=>'public/assets/bottoms/bottoms6_A.png',  'badge'=>null,   'added_at'=>'2025-05-29','condition'=>'excellent','category'=>'bottoms'],
    ['id'=>207,'name'=>'Lorem Ipsum 7',  'price'=>360, 'img'=>'public/assets/bottoms/bottoms7_A.png',  'badge'=>null,   'added_at'=>'2025-05-24','condition'=>'good',     'category'=>'bottoms'],
    ['id'=>208,'name'=>'Lorem Ipsum 8',  'price'=>410, 'img'=>'public/assets/bottoms/bottoms8_A.png',  'badge'=>null,   'added_at'=>'2025-05-20','condition'=>'excellent','category'=>'bottoms'],
    ['id'=>209,'name'=>'Lorem Ipsum 9',  'price'=>550, 'img'=>'public/assets/bottoms/bottoms9_A.png',  'badge'=>'New',  'added_at'=>'2025-06-11','condition'=>'good',     'category'=>'bottoms'],
    ['id'=>210,'name'=>'Lorem Ipsum 10', 'price'=>320, 'img'=>'public/assets/bottoms/bottoms10_A.png', 'badge'=>null,   'added_at'=>'2025-05-16','condition'=>'good',     'category'=>'bottoms'],
    ['id'=>211,'name'=>'Lorem Ipsum 11', 'price'=>300, 'img'=>'public/assets/bottoms/bottoms11_A.png', 'badge'=>'Sale', 'added_at'=>'2025-05-12','condition'=>'fair',     'category'=>'bottoms'],
    ['id'=>212,'name'=>'Lorem Ipsum 12', 'price'=>490, 'img'=>'public/assets/bottoms/bottoms12_A.png', 'badge'=>null,   'added_at'=>'2025-05-08','condition'=>'excellent','category'=>'bottoms'],
];

// ── Accessories ──────────────────────────────────────────────
$accessories_products = [
    ['id'=>301,'name'=>'Accessories 1',  'price'=>180, 'img'=>'public/assets/accessories/accessories1_A.png',  'badge'=>'New',  'added_at'=>'2025-06-14','condition'=>'excellent','category'=>'accessories'],
    ['id'=>302,'name'=>'Accessories 2',  'price'=>120, 'img'=>'public/assets/accessories/accessories2_A.png',  'badge'=>null,   'added_at'=>'2025-06-10','condition'=>'good',     'category'=>'accessories'],
    ['id'=>303,'name'=>'Accessories 3',  'price'=>95,  'img'=>'public/assets/accessories/accessories3_A.png',  'badge'=>null,   'added_at'=>'2025-06-07','condition'=>'good',     'category'=>'accessories'],
    ['id'=>304,'name'=>'Accessories 4',  'price'=>220, 'img'=>'public/assets/accessories/accessories4_A.png',  'badge'=>'New',  'added_at'=>'2025-06-13','condition'=>'excellent','category'=>'accessories'],
    ['id'=>305,'name'=>'Accessories 5',  'price'=>150, 'img'=>'public/assets/accessories/accessories5_A.png',  'badge'=>'Sale', 'added_at'=>'2025-06-02','condition'=>'fair',     'category'=>'accessories'],
    ['id'=>306,'name'=>'Accessories 6',  'price'=>175, 'img'=>'public/assets/accessories/accessories6_A.png',  'badge'=>null,   'added_at'=>'2025-05-29','condition'=>'excellent','category'=>'accessories'],
    ['id'=>307,'name'=>'Accessories 7',  'price'=>130, 'img'=>'public/assets/accessories/accessories7_A.png',  'badge'=>null,   'added_at'=>'2025-05-24','condition'=>'good',     'category'=>'accessories'],
    ['id'=>308,'name'=>'Accessories 8',  'price'=>200, 'img'=>'public/assets/accessories/accessories8_A.png',  'badge'=>null,   'added_at'=>'2025-05-20','condition'=>'excellent','category'=>'accessories'],
    ['id'=>309,'name'=>'Accessories 9',  'price'=>90,  'img'=>'public/assets/accessories/accessories9_A.png',  'badge'=>'New',  'added_at'=>'2025-06-11','condition'=>'good',     'category'=>'accessories'],
    ['id'=>310,'name'=>'Accessories 10', 'price'=>160, 'img'=>'public/assets/accessories/accessories10_A.png', 'badge'=>null,   'added_at'=>'2025-05-16','condition'=>'good',     'category'=>'accessories'],
    ['id'=>311,'name'=>'Accessories 11', 'price'=>110, 'img'=>'public/assets/accessories/accessories11_A.png', 'badge'=>'Sale', 'added_at'=>'2025-05-12','condition'=>'fair',     'category'=>'accessories'],
    ['id'=>312,'name'=>'Accessories 12', 'price'=>195, 'img'=>'public/assets/accessories/accessories12_A.png', 'badge'=>null,   'added_at'=>'2025-05-08','condition'=>'excellent','category'=>'accessories'],
];

// ── Bags ─────────────────────────────────────────────────────
$bags_products = [
    ['id'=>401,'name'=>'Bags 1',  'price'=>580, 'img'=>'public/assets/bags/bags1_A.png',  'badge'=>'New',  'added_at'=>'2025-06-14','condition'=>'excellent','category'=>'bags'],
    ['id'=>402,'name'=>'Bags 2',  'price'=>420, 'img'=>'public/assets/bags/bags2_A.png',  'badge'=>null,   'added_at'=>'2025-06-10','condition'=>'good',     'category'=>'bags'],
    ['id'=>403,'name'=>'Bags 3',  'price'=>350, 'img'=>'public/assets/bags/bags3_A.png',  'badge'=>null,   'added_at'=>'2025-06-07','condition'=>'good',     'category'=>'bags'],
    ['id'=>404,'name'=>'Bags 4',  'price'=>720, 'img'=>'public/assets/bags/bags4_A.png',  'badge'=>'New',  'added_at'=>'2025-06-13','condition'=>'excellent','category'=>'bags'],
    ['id'=>405,'name'=>'Bags 5',  'price'=>490, 'img'=>'public/assets/bags/bags5_A.png',  'badge'=>'Sale', 'added_at'=>'2025-06-02','condition'=>'fair',     'category'=>'bags'],
    ['id'=>406,'name'=>'Bags 6',  'price'=>610, 'img'=>'public/assets/bags/bags6_A.png',  'badge'=>null,   'added_at'=>'2025-05-29','condition'=>'excellent','category'=>'bags'],
    ['id'=>407,'name'=>'Bags 7',  'price'=>380, 'img'=>'public/assets/bags/bags7_A.png',  'badge'=>null,   'added_at'=>'2025-05-24','condition'=>'good',     'category'=>'bags'],
    ['id'=>408,'name'=>'Bags 8',  'price'=>540, 'img'=>'public/assets/bags/bags8_A.png',  'badge'=>null,   'added_at'=>'2025-05-20','condition'=>'excellent','category'=>'bags'],
    ['id'=>409,'name'=>'Bags 9',  'price'=>660, 'img'=>'public/assets/bags/bags9_A.png',  'badge'=>'New',  'added_at'=>'2025-06-11','condition'=>'good',     'category'=>'bags'],
    ['id'=>410,'name'=>'Bags 10', 'price'=>310, 'img'=>'public/assets/bags/bags10_A.png', 'badge'=>null,   'added_at'=>'2025-05-16','condition'=>'good',     'category'=>'bags'],
    ['id'=>411,'name'=>'Bags 11', 'price'=>290, 'img'=>'public/assets/bags/bags11_A.png', 'badge'=>'Sale', 'added_at'=>'2025-05-12','condition'=>'fair',     'category'=>'bags'],
    ['id'=>412,'name'=>'Bags 12', 'price'=>750, 'img'=>'public/assets/bags/bags12_A.png', 'badge'=>null,   'added_at'=>'2025-05-08','condition'=>'excellent','category'=>'bags'],
];

// ── Last Chance ──────────────────────────────────────────────
$last_products = [
    ['id'=>501,'name'=>'Last Chance 1',  'price'=>150, 'img'=>'public/assets/last/last1_A.png',  'badge'=>'Sale', 'added_at'=>'2025-05-01','condition'=>'fair',     'category'=>'last'],
    ['id'=>502,'name'=>'Last Chance 2',  'price'=>120, 'img'=>'public/assets/last/last2_A.png',  'badge'=>'Sale', 'added_at'=>'2025-04-28','condition'=>'fair',     'category'=>'last'],
    ['id'=>503,'name'=>'Last Chance 3',  'price'=>90,  'img'=>'public/assets/last/last3_A.png',  'badge'=>'Sale', 'added_at'=>'2025-04-25','condition'=>'good',     'category'=>'last'],
    ['id'=>504,'name'=>'Last Chance 4',  'price'=>200, 'img'=>'public/assets/last/last4_A.png',  'badge'=>'Sale', 'added_at'=>'2025-04-22','condition'=>'fair',     'category'=>'last'],
    ['id'=>505,'name'=>'Last Chance 5',  'price'=>180, 'img'=>'public/assets/last/last5_A.png',  'badge'=>'Sale', 'added_at'=>'2025-04-19','condition'=>'good',     'category'=>'last'],
    ['id'=>506,'name'=>'Last Chance 6',  'price'=>75,  'img'=>'public/assets/last/last6_A.png',  'badge'=>'Sale', 'added_at'=>'2025-04-16','condition'=>'fair',     'category'=>'last'],
    ['id'=>507,'name'=>'Last Chance 7',  'price'=>230, 'img'=>'public/assets/last/last7_A.png',  'badge'=>'Sale', 'added_at'=>'2025-04-13','condition'=>'good',     'category'=>'last'],
    ['id'=>508,'name'=>'Last Chance 8',  'price'=>110, 'img'=>'public/assets/last/last8_A.png',  'badge'=>'Sale', 'added_at'=>'2025-04-10','condition'=>'fair',     'category'=>'last'],
    ['id'=>509,'name'=>'Last Chance 9',  'price'=>165, 'img'=>'public/assets/last/last9_A.png',  'badge'=>'Sale', 'added_at'=>'2025-04-07','condition'=>'good',     'category'=>'last'],
    ['id'=>510,'name'=>'Last Chance 10', 'price'=>95,  'img'=>'public/assets/last/last10_A.png', 'badge'=>'Sale', 'added_at'=>'2025-04-04','condition'=>'fair',     'category'=>'last'],
    ['id'=>511,'name'=>'Last Chance 11', 'price'=>140, 'img'=>'public/assets/last/last11_A.png', 'badge'=>'Sale', 'added_at'=>'2025-04-01','condition'=>'fair',     'category'=>'last'],
    ['id'=>512,'name'=>'Last Chance 12', 'price'=>85,  'img'=>'public/assets/last/last12_A.png', 'badge'=>'Sale', 'added_at'=>'2025-03-29','condition'=>'good',     'category'=>'last'],
];

// ── All products pool (reused for 'all' tab and 'new' filter) ─
$all_products = array_merge(
    $tops_products,
    $bottoms_products,
    $accessories_products,
    $bags_products,
    $last_products
);

// ── Select active dataset ─────────────────────────────────────
$products = match ($active_cat) {
    'new'         => array_values(array_filter($all_products, fn($p) => $p['badge'] === 'New')),
    'tops'        => $tops_products,
    'bottoms'     => $bottoms_products,
    'accessories' => $accessories_products,
    'bags'        => $bags_products,
    'last'        => $last_products,
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
        default      => strcmp($b['added_at'], $a['added_at']),
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
                            <?php if ($product['badge']): ?>
                                <span class="product-badge <?= strtolower($product['badge']) ?>">
                                    <?= htmlspecialchars($product['badge']) ?>
                                </span>
                            <?php endif; ?>

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


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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

</body>
</html>