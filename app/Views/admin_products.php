<?= view('includes/admin_header_view') ?>
    <!-- Reusing the dashboard CSS for the shared components like buttons and table structures -->
    <link rel="stylesheet" href="/thriftster/public/css/pages/admin_products.css">
    
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
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><div class="img-placeholder-large"></div></td>
                            <td>Lorem</td>
                            <td>Lorem</td>
                            <td>P123.45</td>
                            <td>123</td>
                            <td class="actions-cell">
                                <a href="<?= base_url('/admin/products/edit') ?>" class="action-link">Edit</a> 
                                <span class="action-divider">|</span> 
                                <a href="#" class="action-link">Delete</a>
                            </td>
                        </tr>
                        <tr>
                            <td><div class="img-placeholder-large"></div></td>
                            <td>Lorem</td>
                            <td>Lorem</td>
                            <td>P123.45</td>
                            <td>123</td>
                            <td class="actions-cell">
                                <a href="<?= base_url('/admin/products/edit') ?>" class="action-link">Edit</a> 
                                <span class="action-divider">|</span> 
                                <a href="#" class="action-link">Delete</a>
                            </td>
                        </tr>
                        <tr>
                            <td><div class="img-placeholder-large"></div></td>
                            <td>Lorem</td>
                            <td>Lorem</td>
                            <td>P123.45</td>
                            <td>123</td>
                            <td class="actions-cell">
                                <a href="<?= base_url('/admin/products/edit') ?>" class="action-link">Edit</a> 
                                <span class="action-divider">|</span> 
                                <a href="#" class="action-link">Delete</a>
                            </td>
                        </tr>
                        <tr>
                            <td><div class="img-placeholder-large"></div></td>
                            <td>Lorem</td>
                            <td>Lorem</td>
                            <td>P123.45</td>
                            <td>123</td>
                            <td class="actions-cell">
                                <a href="<?= base_url('/admin/products/edit') ?>" class="action-link">Edit</a> 
                                <span class="action-divider">|</span> 
                                <a href="#" class="action-link">Delete</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->
            <div class="pagination">
                <a href="#" class="page-arrow">&lt;</a>
                <a href="#" class="page-num active">1</a>
                <a href="#" class="page-num">2</a>
                <span class="page-dots">...</span>
                <a href="#" class="page-num">5</a>
                <a href="#" class="page-arrow">&gt;</a>
            </div>
        </div>
    </main>
</body>
</html>
