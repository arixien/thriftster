<?= view('includes/admin_header_view') ?>
<body>
    <main class="dashboard-container">

        <!-- Statistics Cards -->
        <section class="stats-section">
            <div class="stat-card">
                <span class="stat-label">Total Products</span>
                <span class="stat-value"><?= esc($total_products) ?></span>
            </div>
            <div class="stat-card">
                <span class="stat-label">Total Orders</span>
                <span class="stat-value"><?= esc($total_orders) ?></span>
            </div>
            <div class="stat-card">
                <span class="stat-label">Total Users</span>
                <span class="stat-value"><?= esc($total_users) ?></span>
            </div>
        </section>

        <!-- Main Content Grid -->
        <section class="main-content-grid">

            <!-- Latest Products -->
            <div class="latest-products-panel">
                <div class="panel-header">
                    <h2>Latest Products</h2>
<a href="/admin/products/add" class="add-btn">Add Products</a>                </div>
                <div class="table-container">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                       <tbody>
    <?php if (!empty($latest_products)): ?>
        <?php foreach ($latest_products as $product): ?>
        <tr>
            <td>
                <?php if (!empty($product['img'])): ?>
                    <img src="<?= esc($product['img']) ?>" alt="<?= esc($product['name']) ?>" width="50">
                <?php else: ?>
                    <div class="img-placeholder"></div>
                <?php endif; ?>
            </td>
            <td><?= esc($product['name']) ?></td>
            <td><?= esc($product['category'] ?? 'N/A') ?></td>  <!-- changed from category_name -->
            <td>$<?= esc(number_format($product['price'], 2)) ?></td>
            <td><?= esc($product['stock']) ?></td>
            <td class="actions-cell">
                <a href="/admin/products/edit/<?= $product['id'] ?>" class="edit-btn">Edit</a>
                <a href="/admin/products/delete/<?= $product['id'] ?>" class="delete-btn"
                   onclick="return confirm('Delete this product?')">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr><td colspan="6">No products found.</td></tr>
    <?php endif; ?>
</tbody>
                    </table>
                </div>
            </div>

            <!-- Recent Orders -->
            <div class="recent-orders-panel">
                <div class="panel-header">
                    <h2>Recent Orders</h2>
                </div>
                <div class="table-container">
                    <table class="admin-table border-table">
                        <thead>
                            <tr>
                                <th>OrderID</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($recent_orders)): ?>
                                <?php foreach ($recent_orders as $order): ?>
                                <tr>
                                    <td>#ORD-<?= esc($order['id']) ?></td>
                                    <td>
                                        <span class="status <?= esc(strtolower($order['status'])) ?>">
                                            <?= esc(ucfirst($order['status'])) ?>
                                        </span>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr><td colspan="2">No orders found.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="panel-footer">
                    <a href="<?= base_url('/admin/orders') ?>" class="view-all-btn">View Orders</a>
                </div>
            </div>

        </section>
    </main>
</body>
</html>