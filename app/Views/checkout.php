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
            $shipping_options = [
                'jnt' => ['fee' => 100, 'eta' => '2–3 days'],
                'lbc' => ['fee' => 120, 'eta' => '3–5 days'],
                'ninja' => ['fee' => 100, 'eta' => '2–4 days'],
                'lalamove' => ['fee' => 150, 'eta' => 'Same day'],
                'meetup' => ['fee' => 0, 'eta' => 'Same day'],
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
            <label class="checkout-label">Street Address</label>
            <input type="text" name="address" required
                   placeholder="123 Rizal St."
                   class="checkout-input">
          </div>

          <div class="col-12">
            <label class="checkout-label">Barangay</label>
            <input type="text" name="barangay" required
                   placeholder="Brgy. San Jose"
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
      <div class="checkout-card shipping-method">
        <h2 class="checkout-section-title">Shipping method</h2>

        <?php foreach ($shipping_options as $val => $data): ?>
          <label class="checkout-option">

            <div class="shipping-left">
              <input 
                type="radio" 
                name="shipping" 
                value="<?= $val ?>" 
                data-fee="<?= $data['fee'] ?>"
                data-eta="<?= $data['eta'] ?>"
                <?= $val === 'jnt' ? 'checked' : '' ?>
              >

              <div>
                <div><?= [
                    'jnt'=>'J&T Express',
                    'lbc'=>'LBC',
                    'ninja'=>'Ninja Van',
                    'lalamove'=>'Lalamove',
                    'meetup'=>'Meet-up / Pickup'
                ][$val] ?></div>

                <small class="shipping-eta"><?= $data['eta'] ?></small>
              </div>
            </div>

            <span class="shipping-fee">
              ₱<?= number_format($data['fee']) ?>
            </span>

          </label>
        <?php endforeach; ?>
      </div>

      <input type="hidden" name="shipping_fee" id="shipping_fee" value="<?= $shipping_options['jnt']['fee'] ?>">

      <!-- Payment -->
      <div class="checkout-card">
        <h2 class="checkout-section-title">Payment method</h2>

        <?php foreach ([
            'cod' => 'Cash on Delivery',
            'ewallet' => 'E-Wallet',
            'card' => 'Card',
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

        <div class="summary-line shipping-line">
          <span class="label">Shipping</span>
          <span class="shipping-value">₱0</span>
        </div>

        <hr class="summary-divider">

        <div class="summary-line total">
          <span>Total</span>
          <span class="total-value">₱0</span>
        </div>

        <div class="summary-line">
          <span class="label">Estimated Delivery</span>
          <span class="eta-value">-</span>
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
<script>
document.querySelectorAll('input[name="shipping"]').forEach(radio => {
  radio.addEventListener('change', function () {
    const fee = this.getAttribute('data-fee');
    document.getElementById('shipping_fee').value = fee;
  });
});
</script>
<script>
const subtotal = <?= $grand_total ?>;

function updateSummary(fee, eta) {
    const shippingElement = document.querySelector('.shipping-value');
    const totalElement = document.querySelector('.total-value');
    const etaElement = document.querySelector('.eta-value');

    const shippingFee = parseFloat(fee) || 0;
    const total = subtotal + shippingFee;

    shippingElement.textContent = '₱' + shippingFee.toLocaleString();
    totalElement.textContent = '₱' + total.toLocaleString();
    etaElement.textContent = eta;
}

document.querySelectorAll('input[name="shipping"]').forEach(radio => {
    radio.addEventListener('change', function () {
        const fee = this.dataset.fee;
        const eta = this.dataset.eta;

        document.getElementById('shipping_fee').value = fee;

        updateSummary(fee, eta);
    });
});

// init
window.addEventListener('DOMContentLoaded', () => {
    const checked = document.querySelector('input[name="shipping"]:checked');
    if (checked) {
        updateSummary(checked.dataset.fee, checked.dataset.eta);
    }
});
</script>
</body>
</html>