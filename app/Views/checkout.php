<?= view('includes/header_view') ?>

<?php
helper(['form']);
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

if (empty($cart_items)) {
    return redirect()->to('/cart');
}
?>

<link rel="stylesheet" href="<?= base_url('public/css/pages/checkout.css') ?>">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=edit" />

<main class="checkout-main">
<div class="container">

  <h1 class="checkout-title">Checkout</h1>

  <?= form_open('/checkout/place') ?>

  <div class="row g-4">

    <!-- LEFT -->
    <div class="col-md-7">

      <!-- Shipping Info -->
      <div class="checkout-card">
        <h2 class="checkout-section-title">Customer Details</h2>

        <div class="row g-3">
          <div class="col-6">
            <label class="checkout-label">First name</label>
            <input type="text" name="first_name" required
                   value="<?= esc(session()->get('first_name') ?? '') ?>"
                   class="checkout-input">
          </div>

          <div class="col-6">
            <label class="checkout-label">Last name</label>
            <input type="text" name="last_name" required
                   value="<?= esc(session()->get('last_name') ?? '') ?>"
                   class="checkout-input">
          </div>

          <div class="col-12">
            <label class="checkout-label">Email</label>
            <input type="email" name="email" required
                   value="<?= esc(session()->get('email') ?? '') ?>"
                   class="checkout-input">
          </div>

          <div class="col-12">
            <label class="checkout-label">Phone</label>
            <input type="tel" name="phone" required
                   placeholder="+63 9xx xxx xxxx"
                   class="checkout-input">
          </div>

          <h2 class="checkout-section-title-2">Shipping Details</h2>

          <div class="col-12">
            <label class="checkout-label">Street address / Barangay</label>
            <input type="text" name="address" required
                   placeholder="123 Rizal St., Brgy. San Jose"
                   class="checkout-input">
          </div>

          <div class="col-5">
            <label class="checkout-label">City</label>
            <input type="text" name="city" required class="checkout-input">
          </div>

          <div class="col-4">
            <label class="checkout-label">Province</label>
            <input type="text" name="province" required class="checkout-input">
          </div>

          <div class="col-3">
            <label class="checkout-label">ZIP</label>
            <input type="text" name="zip" placeholder="1100" class="checkout-input">
          </div>
        </div>
      </div>

      <!-- Shipping Method -->
      <div class="checkout-card">
        <h2 class="checkout-section-title">Shipping method</h2>

        <?php foreach ([
            'jnt' => 'J&T Express',
            'lbc' => 'LBC',
            'ninja' => 'Ninja Van',
            'lalamove' => 'Lalamove',
            'meetup' => 'Meet-up / Pickup',
        ] as $val => $label): ?>

          <label class="checkout-option">
            <input type="radio" name="shipping" value="<?= $val ?>" <?= $val === 'jnt' ? 'checked' : '' ?>>
            <?= $label ?>
          </label>

        <?php endforeach; ?>
      </div>

      <!-- Payment -->
      <div class="checkout-card">
        <h2 class="checkout-section-title">Payment method</h2>

        <?php foreach ([
            'cod' => 'Cash on Delivery',
            'gcash' => 'GCash',
            'bank' => 'Bank Transfer',
        ] as $val => $label): ?>

          <label class="checkout-option">
            <input type="radio" name="payment_method" value="<?= $val ?>" <?= $val === 'cod' ? 'checked' : '' ?>>
            <?= $label ?>
          </label>

        <?php endforeach; ?>
      </div>

    </div>

    <!-- RIGHT -->
    <div class="col-md-5">
      <div class="summary-card sticky-summary">
    <div class="summary-header">
      <h2 class="summary-title">Order summary</h2>

      <a href="<?= base_url('/cart') ?>" class="summary-edit">
        <span class="material-symbols-outlined">edit</span>
      </a>
    </div>

        <?php foreach ($cart_items as $item): ?>
          <div class="checkout-item-row">

            <div class="checkout-item-left">
              <div class="checkout-item-img">
                <?php if (!empty($item['product']['img']) && file_exists(FCPATH . $item['product']['img'])): ?>
                  <img src="<?= base_url($item['product']['img']) ?>">
                <?php endif; ?>
              </div>

              <div>
                <p class="checkout-item-name"><?= esc($item['product']['name']) ?></p>
                <p class="checkout-item-qty">Qty: <?= $item['quantity'] ?></p>
              </div>
            </div>

            <span class="checkout-item-price">
              ₱<?= number_format($item['subtotal']) ?>
            </span>

          </div>
        <?php endforeach; ?>

        <hr class="summary-divider">

        <div class="summary-line">
          <span class="label">Subtotal</span>
          <span>₱<?= number_format($grand_total) ?></span>
        </div>

        <div class="summary-line">
          <span class="label">Shipping</span>
          <span>To be determined</span>
        </div>

        <hr class="summary-divider">

        <div class="summary-line total">
          <span>Total</span>
          <span>₱<?= number_format($grand_total) ?></span>
        </div>

        <button type="submit" class="btn-checkout">
          Place Order
        </button>
      </div>
    </div>

  </div>

  <?= form_close() ?>

</div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>