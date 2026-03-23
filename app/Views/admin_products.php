<?= view('includes/admin_header_view') ?>
<link rel="stylesheet" href="<?= base_url('public/css/pages/admin_products.css') ?>">    
    <main class="dashboard-container">
        <!-- Page Title -->
        <div class="page-title">
            <h2>Product Management</h2>
        </div>

        <!-- Main Panel -->
        <div class="products-panel">
            <div class="panel-header">
                <h3>All Products</h3>
                <a href="<?= base_url('/admin/products/add') ?>" class="add-btn">Add Products</a>
            </div>

            <div class="table-container">
                <table class="admin-table border-table">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($all_products)): ?>
                            <?php foreach ($all_products as $product): ?>
                            <tr>
                                <td>
                                    <?php if (!empty($product['img']) && file_exists(FCPATH . $product['img'])): ?>
                                        <img src="<?= base_url($product['img']) ?>" 
                                             alt="<?= esc($product['name']) ?>"
                                             style="width:60px; height:60px; object-fit:cover; border-radius:6px;">
                                    <?php else: ?>
                                        <div class="img-placeholder-large"></div>
                                    <?php endif; ?>
                                </td>
                                <td><?= esc($product['name']) ?></td>
                                <td><?= esc($product['category']) ?></td>
                                <td>₱<?= number_format($product['price'], 2) ?></td>
                                <td><?= esc($product['stock']) ?></td>
                                <td><?= esc($product['status']) ?></td>
                                <td class="actions-cell">
                                    <a href="<?= base_url('/admin/products/edit/' . $product['id']) ?>" class="action-link">Edit</a> 
                                    <span class="action-divider">|</span> 
                                    <a href="<?= base_url('/admin/products/delete/' . $product['id']) ?>" 
                                       class="action-link"
                                       onclick="return confirm('Are you sure you want to delete this product?')">Delete</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" style="text-align:center; padding: 2rem;">
                                    No products found.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->

        </div>
    </main>
</body>
</html>