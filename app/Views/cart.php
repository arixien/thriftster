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

<main style="padding:2rem 0;background:#faf5f6;min-height:100vh;">
<div class="container">

  <h1 style="font-size:22px;font-weight:600;color:#3a2d30;margin-bottom:1.5rem;">My Cart</h1>

  <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
  <?php endif; ?>

  <?php if (empty($cart_items)): ?>
    <div style="text-align:center;padding:4rem 0;color:#9e7880;">
      <p style="font-size:18px;margin-bottom:1rem;">Your cart is empty.</p>
      <a href="<?= base_url('/products_catalog_view') ?>"
         style="background:#E6A7B2;color:#4B1528;padding:10px 24px;border-radius:8px;text-decoration:none;font-weight:500;">
        Browse Products
      </a>
    </div>

  <?php else: ?>
    <div class="row g-4">

      <!-- Cart Items -->
      <div class="col-md-8">
        <?php foreach ($cart_items as $item): ?>
          <div style="background:#fff;border:0.5px solid #e8d4d8;border-radius:12px;padding:1rem;margin-bottom:1rem;display:flex;gap:1rem;align-items:center;">

            <!-- Image -->
            <div style="width:80px;height:80px;flex-shrink:0;background:#f5ecee;border-radius:8px;overflow:hidden;">
              <?php if (!empty($item['product']['img']) && file_exists(FCPATH . $item['product']['img'])): ?>
                <img src="<?= base_url($item['product']['img']) ?>" style="width:100%;height:100%;object-fit:cover;">
              <?php else: ?>
                <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;color:#c0a0a8;font-size:11px;">No img</div>
              <?php endif; ?>
            </div>

            <!-- Info -->
            <div style="flex:1;">
              <p style="font-weight:500;color:#3a2d30;margin:0 0 4px;"><?= esc($item['product']['name']) ?></p>
              <p style="font-size:13px;color:#9e7880;margin:0;">₱<?= number_format($item['product']['price']) ?> × <?= $item['quantity'] ?></p>
            </div>

            <!-- Subtotal -->
            <div style="text-align:right;">
              <p style="font-weight:600;color:#3a2d30;margin:0;">₱<?= number_format($item['subtotal']) ?></p>
              <a href="<?= base_url('/cart/remove/' . $item['product']['id']) ?>"
                 style="font-size:12px;color:#c97d8e;text-decoration:none;">Remove</a>
            </div>

          </div>
        <?php endforeach; ?>
      </div>

      <!-- Order Summary -->
      <div class="col-md-4">
        <div style="background:#fff;border:0.5px solid #e8d4d8;border-radius:12px;padding:1.25rem;">
          <h2 style="font-size:16px;font-weight:600;color:#3a2d30;margin-bottom:1rem;">Order Summary</h2>

          <div style="display:flex;justify-content:space-between;font-size:14px;margin-bottom:8px;">
            <span style="color:#9e7880;">Subtotal</span>
            <span>₱<?= number_format($grand_total) ?></span>
          </div>
          <div style="display:flex;justify-content:space-between;font-size:14px;margin-bottom:16px;">
            <span style="color:#9e7880;">Shipping</span>
            <span>To be determined</span>
          </div>

          <hr style="border-color:#e8d4d8;">

          <div style="display:flex;justify-content:space-between;font-size:16px;font-weight:600;color:#3a2d30;margin-bottom:1rem;">
            <span>Total</span>
            <span>₱<?= number_format($grand_total) ?></span>
          </div>

          <a href="<?= base_url('/checkout') ?>"
             style="display:block;text-align:center;background:#E6A7B2;color:#4B1528;padding:12px;border-radius:8px;text-decoration:none;font-weight:500;font-size:14px;">
            Proceed to Checkout
          </a>
          <a href="<?= base_url('/products_catalog_view') ?>"
             style="display:block;text-align:center;margin-top:10px;font-size:13px;color:#9e7880;text-decoration:none;">
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