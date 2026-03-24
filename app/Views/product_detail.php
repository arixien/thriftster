<?= view('includes/header_view') ?>

<main style="padding: 2rem 0; background: #faf5f6; min-height: 100vh;">
<div class="container">

  <nav aria-label="breadcrumb" style="margin-bottom:1.25rem;font-size:13px;color:#9e7880;">
    <a href="<?= base_url('/') ?>" style="color:#9e7880;text-decoration:none;">Home</a> ›
    <a href="<?= base_url('/products_catalog_view?cat=' . esc($product['category'])) ?>" style="color:#9e7880;text-decoration:none;"><?= esc(ucfirst($product['category'])) ?></a> ›
    <?= esc($product['name']) ?>
  </nav>

  <div class="row g-4">

    <!-- Image -->
    <div class="col-md-6">
      <div style="aspect-ratio:1;background:#f5ecee;border-radius:12px;overflow:hidden;border:0.5px solid #e8d4d8;">
        <?php if (!empty($product['img']) && file_exists(FCPATH . $product['img'])): ?>
          <img src="<?= base_url(esc($product['img'])) ?>" alt="<?= esc($product['name']) ?>" style="width:100%;height:100%;object-fit:cover;">
        <?php else: ?>
          <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;color:#c0a0a8;font-size:13px;">No image available</div>
        <?php endif; ?>
      </div>
    </div>

    <!-- Info -->
    <div class="col-md-6">

      <?php if (!empty($product['badge'])): ?>
        <span style="font-size:11px;padding:3px 10px;border-radius:20px;background:#EAF3DE;color:#27500A;font-weight:500;display:inline-block;margin-bottom:10px;">
          <?= esc($product['badge']) ?>
        </span>
      <?php endif; ?>

      <h1 style="font-size:22px;font-weight:600;margin-bottom:6px;color:#3a2d30;"><?= esc($product['name']) ?></h1>
      <p style="font-size:26px;font-weight:700;color:#3a2d30;margin-bottom:4px;">₱<?= number_format($product['price']) ?></p>

      <?php if (!empty($product['description'])): ?>
        <p style="font-size:14px;color:#6b4f55;margin-bottom:16px;"><?= esc($product['description']) ?></p>
      <?php endif; ?>

      <hr style="border-color:#e8d4d8;">

      <table style="width:100%;font-size:14px;margin-bottom:16px;">
        <tr>
          <td style="color:#9e7880;padding:6px 0;width:120px;">Condition</td>
          <td style="font-weight:500;"><?= esc(ucfirst($product['condition'])) ?></td>
        </tr>
        <tr>
          <td style="color:#9e7880;padding:6px 0;">Category</td>
          <td style="font-weight:500;"><?= esc(ucfirst($product['category'])) ?></td>
        </tr>
        <tr>
          <td style="color:#9e7880;padding:6px 0;">Stock</td>
          <td style="font-weight:500;"><?= esc($product['stock']) ?> left</td>
        </tr>
        <tr>
          <td style="color:#9e7880;padding:6px 0;">Status</td>
          <td style="font-weight:500;"><?= esc(ucfirst($product['status'])) ?></td>
        </tr>
      </table>

      <hr style="border-color:#e8d4d8;">

      <!-- Add to Cart / Buy Now -->
      <?= form_open('/cart/add') ?>
        <?= form_hidden('product_id', $product['id']) ?>

        <div style="margin-bottom:14px;">
          <label style="font-size:13px;color:#6b4f55;display:block;margin-bottom:6px;">Quantity</label>
          <input type="number" name="quantity" value="1" min="1" max="<?= esc($product['stock']) ?>" style="width:80px;">
        </div>

        <div style="display:flex;gap:10px;">
          <button type="submit" name="action" value="cart"
            style="flex:1;padding:11px;border:1px solid #c97d8e;border-radius:8px;background:#fff;color:#3a2d30;font-size:14px;font-weight:500;cursor:pointer;">
            Add to cart
          </button>
          <button type="submit" name="action" value="buy"
            style="flex:1;padding:11px;border:none;border-radius:8px;background:#E6A7B2;color:#4B1528;font-size:14px;font-weight:500;cursor:pointer;">
            Buy now
          </button>
        </div>
      <?= form_close() ?>

    </div>
  </div>
</div>
</main>

<?= view('includes/footer_view') ?>

</body>
</html>