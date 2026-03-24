<?= view('includes/admin_header_view') ?>
<link rel="stylesheet" href="<?= base_url('public/css/pages/admin_product_form.css') ?>">
    
    <main class="dashboard-container">
        <!-- Page Title -->
        <div class="page-title">
            <h2><?= $mode === 'add' ? 'Add Product' : 'Edit Product' ?></h2>
        </div>

        <!-- Form Panel -->
        <div class="form-panel">
            <form action="<?= $mode === 'add' ? base_url('/admin/products/store') : base_url('/admin/products/update/' . $product['id']) ?>" 
                  method="POST" 
                  enctype="multipart/form-data">

                <?= csrf_field() ?>

                <div class="form-group">
                    <label for="product_name">Product Name</label>
                    <input type="text" id="product_name" name="name" class="form-control-custom"
                           value="<?= esc($product['name'] ?? '') ?>">
                </div>

                <div class="form-group">
                    <label for="category">Category</label>
                    <div class="select-wrapper">
                        <select id="category" name="category" class="form-control-custom">
                            <option value="">Select category...</option>
                            <option value="dresses"    <?= ($product['category'] ?? '') === 'dresses'    ? 'selected' : '' ?>>Dresses</option>
                            <option value="tops"       <?= ($product['category'] ?? '') === 'tops'       ? 'selected' : '' ?>>Tops</option>
                            <option value="bottoms"    <?= ($product['category'] ?? '') === 'bottoms'    ? 'selected' : '' ?>>Bottoms</option>
                            <option value="outerwear"  <?= ($product['category'] ?? '') === 'outerwear'  ? 'selected' : '' ?>>Outerwear</option>
                            <option value="accessories"<?= ($product['category'] ?? '') === 'accessories'? 'selected' : '' ?>>Accessories</option>
                            <option value="bags"       <?= ($product['category'] ?? '') === 'bags'       ? 'selected' : '' ?>>Bags</option>
                            <option value="last"       <?= ($product['category'] ?? '') === 'last'       ? 'selected' : '' ?>>Last Chance</option>
                        </select>
                        <span class="custom-arrow">v</span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="price">Price (₱)</label>
                    <input type="number" id="price" name="price" class="form-control-custom"
                           value="<?= esc($product['price'] ?? '') ?>" step="0.01" min="0">
                </div>

                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="number" id="stock" name="stock" class="form-control-custom"
                           value="<?= esc($product['stock'] ?? '') ?>" min="0">
                </div>

                <div class="form-group">
                    <label for="condition">Condition</label>
                    <div class="select-wrapper">
                        <select id="condition" name="condition" class="form-control-custom">
                            <option value="">Select condition...</option>
                            <option value="excellent" <?= ($product['condition'] ?? '') === 'excellent' ? 'selected' : '' ?>>Excellent</option>
                            <option value="good"      <?= ($product['condition'] ?? '') === 'good'      ? 'selected' : '' ?>>Good</option>
                            <option value="fair"      <?= ($product['condition'] ?? '') === 'fair'      ? 'selected' : '' ?>>Fair</option>
                        </select>
                        <span class="custom-arrow">v</span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
               <div class="select-wrapper">
    <select id="status" name="status" class="form-control-custom">
        <option value="">Select status...</option>
        <option value="active"   <?= ($product['status'] ?? '') === 'active'   ? 'selected' : '' ?>>Active</option>
        <option value="inactive" <?= ($product['status'] ?? '') === 'inactive' ? 'selected' : '' ?>>Inactive</option>
        <option value="sold"     <?= ($product['status'] ?? '') === 'sold'     ? 'selected' : '' ?>>Sold</option>
    </select>
    <span class="custom-arrow">v</span>
</div>
                </div>
<div class="form-group">
    <label for="badge">Badge</label>
    <div class="select-wrapper">
        <select id="badge" name="badge" class="form-control-custom">
            <option value="">None</option>
            <option value="New"  <?= ($product['badge'] ?? '') === 'New'  ? 'selected' : '' ?>>New</option>
            <option value="Sale" <?= ($product['badge'] ?? '') === 'Sale' ? 'selected' : '' ?>>Sale</option>
        </select>
        <span class="custom-arrow">v</span>
    </div>
</div>
                <div class="form-group">
                    <label>Add Image</label>
                    <?php if (!empty($product['img'])): ?>
                        <div style="margin-bottom: 1rem;">
                            <img src="<?= base_url($product['img']) ?>" alt="Current image"
                                 style="width:100px; height:100px; object-fit:cover; border-radius:8px; border: 2px solid var(--text-dark);">
                            <p style="font-size:0.85rem; margin-top:0.4rem;">Upload a new image to replace it.</p>
                        </div>
                    <?php endif; ?>
                    <div class="image-upload-area">
                        <input type="file" id="image" name="img" class="file-input" accept="image/*">
                        <div class="upload-placeholder">
                            <span>Click to upload or drag image here</span>
                        </div>
                    </div>
                </div>

                <!-- Actions INSIDE the form -->
                <div class="form-actions">
                    <button type="submit" class="btn-primary-custom">
                        <?= $mode === 'add' ? 'Add Product' : 'Save Changes' ?>
                    </button>
                    <a href="<?= base_url('/admin/products') ?>" class="btn-secondary-custom">Cancel</a>
                </div>

            </form>
        </div>

    </main>
</body>
</html>