<?= view('includes/header_view') ?>

<?php
$cart = session()->get('cart') ?? [];
$cart_items = [];
$grand_total = 0;

if (!empty($cart)) {
    $model = new \App\Models\ProductModel();
    foreach ($cart as $product_id => $item) {
        $product = $model->find($product_id);
        if ($product) {
            $subtotal = $product['price'] * $item['quantity'];
            $grand_total += $subtotal;
            $cart_items[] = [
                'product'  => $product,
                'quantity' => $item['quantity'],
                'subtotal' => $subtotal,
            ];
        }
    }
}
?>

<link rel="stylesheet" href="<?= base_url('public/css/pages/cart.css') ?>">

<main class="cart-main">
    <div class="container">
        <h1 class="cart-title">My Cart</h1>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>

        <?php if (empty($cart_items)): ?>
            <div class="cart-empty">
                <p>Your cart is empty.</p>
                <a href="<?= base_url('/products_catalog_view') ?>" class="btn-primary-custom">
                    Browse Products
                </a>
            </div>

        <?php else: ?>
            <div class="row g-4">
                <div class="col-md-8">
                    <?php foreach ($cart_items as $item): ?>
                        <div class="cart-item-card">
                            <div class="cart-item-img-wrapper">
                                <?php if (!empty($item['product']['img']) && file_exists(FCPATH . $item['product']['img'])): ?>
                                    <img src="<?= base_url($item['product']['img']) ?>" class="cart-item-img">
                                <?php else: ?>
                                    <div class="cart-item-img-placeholder">No img</div>
                                <?php endif; ?>
                            </div>

                            <div class="cart-item-info">
                                <p class="item-name"><?= esc($item['product']['name']) ?></p>
                                <p class="item-meta">₱<?= number_format($item['product']['price']) ?> × <?= $item['quantity'] ?></p>
                            </div>

                            <div class="cart-item-price-block">
                                <p class="item-subtotal">₱<?= number_format($item['subtotal']) ?></p>
                                <a href="<?= base_url('/cart/remove/' . $item['product']['id']) ?>" class="btn-remove">Remove</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="col-md-4">
                    <div class="summary-card">
                        <h2 class="summary-title">Order Summary</h2>

                        <div class="summary-line">
                            <span class="label">Subtotal</span>
                            <span class="value">₱<?= number_format($grand_total) ?></span>
                        </div>
                        <div class="summary-line">
                            <span class="label">Shipping</span>
                            <span class="value">To be determined</span>
                        </div>

                        <hr class="summary-divider">

                        <div class="summary-line total">
                            <span>Total</span>
                            <span>₱<?= number_format($grand_total) ?></span>
                        </div>

                        <a href="<?= base_url('/checkout') ?>" class="btn-checkout">
                            Proceed to Checkout
                        </a>
                        <a href="<?= base_url('/products_catalog_view') ?>" class="btn-continue">
                            Continue Shopping
                        </a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>