<?= view('includes/header_view') ?>

<main style="padding:2rem 0;background:#faf5f6;min-height:100vh;">
<div class="container">

  <h1 style="font-size:22px;font-weight:600;color:#3a2d30;margin-bottom:1.5rem;">My Orders</h1>

  <?php if (empty($orders)): ?>
    <div style="background:#fff;border:0.5px solid #e8d4d8;border-radius:12px;padding:3rem;text-align:center;color:#9e7880;">
      <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#e8d4d8" stroke-width="1.5" style="margin-bottom:1rem;">
        <path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 01-8 0"/>
      </svg>
      <p style="font-size:16px;margin-bottom:6px;color:#6b4f55;">No orders yet</p>
      <p style="font-size:13px;margin-bottom:1.5rem;">Your order history will appear here once you make a purchase.</p>
      <a href="<?= base_url('/products_catalog_view') ?>"
         style="background:#E6A7B2;color:#4B1528;padding:10px 24px;border-radius:8px;text-decoration:none;font-weight:500;font-size:14px;">
        Start Shopping
      </a>
    </div>

  <?php else: ?>
    <?php foreach ($orders as $order): ?>
      <div style="background:#fff;border:0.5px solid #e8d4d8;border-radius:12px;padding:1.25rem;margin-bottom:1rem;">
        
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:10px;flex-wrap:wrap;gap:8px;">
          <div>
            <p style="font-weight:600;color:#3a2d30;margin:0;font-size:15px;"><?= esc($order['order_number']) ?></p>
            <p style="font-size:12px;color:#9e7880;margin:0;"><?= date('F j, Y', strtotime($order['created_at'])) ?></p>
          </div>
          <span style="font-size:12px;padding:4px 12px;border-radius:20px;font-weight:500;
            background:<?= $order['status'] === 'pending' ? '#FAEEDA' : ($order['status'] === 'delivered' ? '#EAF3DE' : '#E6F1FB') ?>;
            color:<?= $order['status'] === 'pending' ? '#633806' : ($order['status'] === 'delivered' ? '#27500A' : '#0C447C') ?>;">
            <?= esc(ucfirst($order['status'])) ?>
          </span>
        </div>

        <hr style="border-color:#e8d4d8;margin:10px 0;">

        <div style="display:flex;justify-content:space-between;font-size:13px;margin-bottom:4px;">
          <span style="color:#9e7880;">Payment</span>
          <span style="color:#3a2d30;"><?= esc(strtoupper($order['payment_method'])) ?></span>
        </div>
        <div style="display:flex;justify-content:space-between;font-size:13px;margin-bottom:4px;">
          <span style="color:#9e7880;">Delivery</span>
          <span style="color:#3a2d30;"><?= esc(strtoupper($order['delivery_method'])) ?></span>
        </div>
        <div style="display:flex;justify-content:space-between;font-size:13px;">
          <span style="color:#9e7880;">Total</span>
          <span style="font-weight:600;color:#3a2d30;">₱<?= number_format($order['total_amount']) ?></span>
        </div>

      </div>
    <?php endforeach; ?>
  <?php endif; ?>

</div>
</main>

<?= view('includes/footer_view') ?>

</body>
</html>