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

<main style="padding:2rem 0;background:#faf5f6;min-height:100vh;">
<div class="container">

  <h1 style="font-size:22px;font-weight:600;color:#3a2d30;margin-bottom:1.5rem;">Checkout</h1>

  <?= form_open('/checkout/place') ?>

  <div class="row g-4">

    <!-- Left: Shipping & Payment -->
    <div class="col-md-7">

      <!-- Shipping Info -->
      <div style="background:#fff;border:0.5px solid #e8d4d8;border-radius:12px;padding:1.25rem;margin-bottom:1rem;">
        <h2 style="font-size:15px;font-weight:600;color:#3a2d30;margin-bottom:1rem;">Shipping information</h2>

        <div class="row g-3">
          <div class="col-6">
            <label style="font-size:13px;color:#9e7880;display:block;margin-bottom:4px;">First name</label>
            <input type="text" name="first_name" required
                   value="<?= esc(session()->get('first_name') ?? '') ?>"
                   style="width:100%;padding:8px 12px;border:0.5px solid #e8d4d8;border-radius:8px;font-size:14px;">
          </div>
          <div class="col-6">
            <label style="font-size:13px;color:#9e7880;display:block;margin-bottom:4px;">Last name</label>
            <input type="text" name="last_name" required
                   value="<?= esc(session()->get('last_name') ?? '') ?>"
                   style="width:100%;padding:8px 12px;border:0.5px solid #e8d4d8;border-radius:8px;font-size:14px;">
          </div>
          <div class="col-12">
            <label style="font-size:13px;color:#9e7880;display:block;margin-bottom:4px;">Email</label>
            <input type="email" name="email" required
                   value="<?= esc(session()->get('email') ?? '') ?>"
                   style="width:100%;padding:8px 12px;border:0.5px solid #e8d4d8;border-radius:8px;font-size:14px;">
          </div>
          <div class="col-12">
            <label style="font-size:13px;color:#9e7880;display:block;margin-bottom:4px;">Phone</label>
            <input type="tel" name="phone" required
                   style="width:100%;padding:8px 12px;border:0.5px solid #e8d4d8;border-radius:8px;font-size:14px;"
                   placeholder="+63 9xx xxx xxxx">
          </div>
          <div class="col-12">
            <label style="font-size:13px;color:#9e7880;display:block;margin-bottom:4px;">Street address / Barangay</label>
            <input type="text" name="address" required
                   style="width:100%;padding:8px 12px;border:0.5px solid #e8d4d8;border-radius:8px;font-size:14px;"
                   placeholder="123 Rizal St., Brgy. San Jose">
          </div>
          <div class="col-5">
            <label style="font-size:13px;color:#9e7880;display:block;margin-bottom:4px;">City</label>
            <input type="text" name="city" required
                   style="width:100%;padding:8px 12px;border:0.5px solid #e8d4d8;border-radius:8px;font-size:14px;">
          </div>
          <div class="col-4">
            <label style="font-size:13px;color:#9e7880;display:block;margin-bottom:4px;">Province</label>
            <input type="text" name="province" required
                   style="width:100%;padding:8px 12px;border:0.5px solid #e8d4d8;border-radius:8px;font-size:14px;">
          </div>
          <div class="col-3">
            <label style="font-size:13px;color:#9e7880;display:block;margin-bottom:4px;">ZIP</label>
            <input type="text" name="zip"
                   style="width:100%;padding:8px 12px;border:0.5px solid #e8d4d8;border-radius:8px;font-size:14px;"
                   placeholder="1100">
          </div>
        </div>
      </div>

      <!-- Shipping Method -->
      <div style="background:#fff;border:0.5px solid #e8d4d8;border-radius:12px;padding:1.25rem;margin-bottom:1rem;">
        <h2 style="font-size:15px;font-weight:600;color:#3a2d30;margin-bottom:1rem;">Shipping method</h2>
        <?php foreach ([
            'jnt'      => 'J&T Express',
            'lbc'      => 'LBC',
            'ninja'    => 'Ninja Van',
            'lalamove' => 'Lalamove',
            'meetup'   => 'Meet-up / Pickup',
        ] as $val => $label): ?>
          <label style="display:flex;align-items:center;gap:10px;padding:10px 0;border-bottom:0.5px solid #f0e4e8;cursor:pointer;font-size:14px;color:#3a2d30;">
            <input type="radio" name="shipping" value="<?= $val ?>" <?= $val === 'jnt' ? 'checked' : '' ?>>
            <?= $label ?>
          </label>
        <?php endforeach; ?>
      </div>

      <!-- Payment Method -->
      <div style="background:#fff;border:0.5px solid #e8d4d8;border-radius:12px;padding:1.25rem;">
        <h2 style="font-size:15px;font-weight:600;color:#3a2d30;margin-bottom:1rem;">Payment method</h2>
        <?php foreach ([
            'cod'   => 'Cash on Delivery',
            'gcash' => 'GCash',
            'bank'  => 'Bank Transfer',
        ] as $val => $label): ?>
          <label style="display:flex;align-items:center;gap:10px;padding:10px 0;border-bottom:0.5px solid #f0e4e8;cursor:pointer;font-size:14px;color:#3a2d30;">
            <input type="radio" name="payment_method" value="<?= $val ?>" <?= $val === 'cod' ? 'checked' : '' ?>>
            <?= $label ?>
          </label>
        <?php endforeach; ?>
      </div>

    </div>

    <!-- Right: Order Summary -->
    <div class="col-md-5">
      <div style="background:#fff;border:0.5px solid #e8d4d8;border-radius:12px;padding:1.25rem;position:sticky;top:90px;">
        <h2 style="font-size:15px;font-weight:600;color:#3a2d30;margin-bottom:1rem;">Order summary</h2>

        <?php foreach ($cart_items as $item): ?>
          <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:10px;font-size:13px;">
            <div style="display:flex;align-items:center;gap:8px;">
              <div style="width:40px;height:40px;background:#f5ecee;border-radius:6px;overflow:hidden;flex-shrink:0;">
                <?php if (!empty($item['product']['img']) && file_exists(FCPATH . $item['product']['img'])): ?>
                  <img src="<?= base_url($item['product']['img']) ?>" style="width:100%;height:100%;object-fit:cover;">
                <?php endif; ?>
              </div>
              <div>
                <p style="margin:0;color:#3a2d30;font-weight:500;"><?= esc($item['product']['name']) ?></p>
                <p style="margin:0;color:#9e7880;">Qty: <?= $item['quantity'] ?></p>
              </div>
            </div>
            <span style="font-weight:500;color:#3a2d30;">₱<?= number_format($item['subtotal']) ?></span>
          </div>
        <?php endforeach; ?>

        <hr style="border-color:#e8d4d8;margin:1rem 0;">

        <div style="display:flex;justify-content:space-between;font-size:13px;margin-bottom:6px;">
          <span style="color:#9e7880;">Subtotal</span>
          <span>₱<?= number_format($grand_total) ?></span>
        </div>
        <div style="display:flex;justify-content:space-between;font-size:13px;margin-bottom:16px;">
          <span style="color:#9e7880;">Shipping</span>
          <span>To be determined</span>
        </div>

        <hr style="border-color:#e8d4d8;">

        <div style="display:flex;justify-content:space-between;font-size:16px;font-weight:600;color:#3a2d30;margin-bottom:1.25rem;">
          <span>Total</span>
          <span>₱<?= number_format($grand_total) ?></span>
        </div>

        <button type="submit"
                style="width:100%;padding:12px;background:#E6A7B2;color:#4B1528;border:none;border-radius:8px;font-size:14px;font-weight:500;cursor:pointer;">
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