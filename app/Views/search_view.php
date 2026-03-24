<?= view('includes/header_view') ?>
<link rel="stylesheet" href="<?= base_url('public/css/pages/search_view.css') ?>">

<main class="catalog-main">
    <div class="container-fluid catalog-container">

        <!-- SEARCH HERO -->
        <div class="catalog-title-row">
            <div>
                <?php if (!empty($q)): ?>
                    <h1 class="catalog-title">Results for <em class="catalog-title-em">"<?= htmlspecialchars($q) ?>"</em></h1>
                    <p class="catalog-subtitle">Handpicked treasures, waiting for a new home.</p>
                <?php else: ?>
                    <h1 class="catalog-title">What are you looking for?</h1>
                    <p class="catalog-subtitle">Search by name or description</p>
                <?php endif; ?>
            </div>
            <?php if (!empty($q)): ?>
                <span class="catalog-count">
                    Showing <strong><?= count($results) ?></strong>
                    item<?= count($results) !== 1 ? 's' : '' ?>
                </span>
            <?php endif; ?>
        </div>

        <!-- NO QUERY -->
        <?php if (empty($q)): ?>
            <div class="empty-state">
                <i class="bi bi-search empty-icon"></i>
                <p class="empty-title">Start searching</p>
                <p class="empty-sub">Type something in the search bar above to discover unique finds.</p>
            </div>

        <!-- NO RESULTS -->
        <?php elseif (!empty($q) && empty($results)): ?>
            <div class="empty-state">
                <i class="bi bi-archive empty-icon"></i>
                <p class="empty-title">Nothing found</p>
                <p class="empty-sub">We couldn't find anything matching <strong>"<?= htmlspecialchars($q) ?>"</strong>.<br>Try a different keyword — maybe a color, style, or item type.</p>
                <a href="<?= base_url('/') ?>" class="empty-reset-btn">Browse All Items</a>
            </div>

        <!-- RESULTS GRID -->
        <?php else: ?>
            <div class="product-grid row g-4">
                <?php foreach ($results as $i => $product):
                    $img_path   = $product['img'];
                    $img_exists = !empty($img_path) && file_exists(FCPATH . $img_path);
                ?>
                    <div class="col-6 col-md-4 col-lg-3 product-col"
                         style="--anim-delay: <?= ($i % 8) * 0.05 ?>s">

                        <article class="product-card">

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
                                        <?= preg_replace(
                                            '/(' . preg_quote(htmlspecialchars($q), '/') . ')/i',
                                            '<mark>$1</mark>',
                                            htmlspecialchars($product['name'])
                                        ) ?>
                                    </a>
                                    <div class="product-bottom-row">
                                        <span class="product-price">₱<?= number_format($product['price']) ?></span>
                                        <?php if (!empty($product['condition'])): ?>
                                            <span class="product-condition condition-<?= esc($product['condition']) ?>">
                                                <?= ucfirst($product['condition']) ?>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <form action="<?= base_url('/cart/add') ?>" method="POST" style="display:inline;">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="add-to-cart-btn" aria-label="Add to cart">
                                        <i class="bi bi-bag-plus"></i>
                                    </button>
                                </form>
                            </div>

                        </article>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

    </div>
</main>

<script>
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