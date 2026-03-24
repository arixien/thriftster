<?= view('includes/header_view') ?>

<main style="padding:4rem 0;background:#faf5f6;min-height:100vh;">
<div class="container">
  <div style="max-width:500px;margin:0 auto;text-align:center;background:#fff;border:0.5px solid #e8d4d8;border-radius:12px;padding:3rem 2rem;">

    <div style="width:72px;height:72px;background:#EAF3DE;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 1.5rem;">
      <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#27500A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
        <polyline points="20 6 9 17 4 12"/>
      </svg>
    </div>

    <h1 style="font-size:22px;font-weight:600;color:#3a2d30;margin-bottom:8px;">Order placed!</h1>

    <?php if (session()->getFlashdata('order_number')): ?>
      <p style="font-size:13px;color:#9e7880;margin-bottom:6px;">Order number</p>
      <p style="font-size:15px;font-weight:600;color:#3a2d30;margin-bottom:1.5rem;">
        <?= session()->getFlashdata('order_number') ?>
      </p>
    <?php endif; ?>

    <p style="font-size:14px;color:#9e7880;margin-bottom:2rem;">Thank you for your purchase. We'll process your order shortly and notify you once it's on its way.</p>

    <div style="display:flex;flex-direction:column;gap:10px;">
      <a href="<?= base_url('/products_catalog_view') ?>"
         style="display:block;padding:12px;background:#E6A7B2;color:#4B1528;border-radius:8px;text-decoration:none;font-weight:500;font-size:14px;">
        Continue Shopping
      </a>
      <a href="<?= base_url('/orders') ?>"
         style="display:block;padding:12px;border:0.5px solid #e8d4d8;color:#6b4f55;border-radius:8px;text-decoration:none;font-size:14px;">
        View My Orders
      </a>
    </div>

  </div>
</div>
</main>

<?= view('includes/footer_view') ?>

</body>
</html>