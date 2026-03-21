<?= view('includes/admin_header_view') ?>
    <link rel="stylesheet" href="/thriftster/public/css/pages/admin_product_form.css">
    
    <main class="dashboard-container">
        <!-- Page Title -->
        <div class="page-title">
            <h2><?= $mode === 'add' ? 'Add Product' : 'Edit Product' ?></h2>
        </div>

        <!-- Form Panel -->
        <div class="form-panel">
            <form action="<?= base_url('/admin/products') ?>" method="POST" enctype="multipart/form-data">
                
                <div class="form-group">
                    <label for="product_name">Product Name</label>
                    <input type="text" id="product_name" name="product_name" class="form-control-custom">
                </div>

                <div class="form-group">
                    <label for="category">Category</label>
                    <div class="select-wrapper">
                        <select id="category" name="category" class="form-control-custom">
                            <option value="">Select category...</option>
                            <option value="dresses">Dresses</option>
                            <option value="tops">Tops</option>
                            <option value="bottoms">Bottoms</option>
                            <option value="outerwear">Outerwear</option>
                        </select>
                        <span class="custom-arrow">v</span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" id="price" name="price" class="form-control-custom">
                </div>

                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="text" id="stock" name="stock" class="form-control-custom">
                </div>

                <div class="form-group">
                    <label>Add Image</label>
                    <div class="image-upload-area">
                        <input type="file" id="image" name="image" class="file-input" accept="image/*">
                        <div class="upload-placeholder">
                            <span>Click to upload or drag image here</span>
                        </div>
                    </div>
                </div>

            </form>
        </div>

        <!-- Actions -->
        <div class="form-actions">
            <button type="submit" class="btn-primary-custom">
                <?= $mode === 'add' ? 'Add Product' : 'Save' ?>
            </button>
            <a href="<?= base_url('/admin/products') ?>" class="btn-secondary-custom">Cancel</a>
        </div>
    </main>
</body>
</html>
