<?= view('includes/admin_header_view') ?>
<body>
    <main class="dashboard-container">
        <!-- Statistics Cards -->
        <section class="stats-section">
            <div class="stat-card">
                <span class="stat-label">Total Products</span>
                <span class="stat-value">124</span>
            </div>
            <div class="stat-card">
                <span class="stat-label">Total Orders</span>
                <span class="stat-value">18</span>
            </div>
            <div class="stat-card">
                <span class="stat-label">Total Users</span>
                <span class="stat-value">50</span>
            </div>
        </section>

        <!-- Main Content Grid -->
        <section class="main-content-grid">
            
            <!-- Latest Products -->
            <div class="latest-products-panel">
                <div class="panel-header">
                    <h2>Latest Products</h2>
                    <a href="#" class="add-btn">Add Products</a>
                </div>
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
                            <tr>
                                <td><div class="img-placeholder"></div></td>
                                <td>Vintage Floral Dress</td>
                                <td>Dresses</td>
                                <td>$45.00</td>
                                <td>12</td>
                                <td class="actions-cell"><a href="#" class="edit-btn">Edit</a> <a href="#" class="delete-btn">Delete</a></td>
                            </tr>
                            <tr>
                                <td><div class="img-placeholder"></div></td>
                                <td>Lace Trim Blouse</td>
                                <td>Tops</td>
                                <td>$28.00</td>
                                <td>8</td>
                                <td class="actions-cell"><a href="#" class="edit-btn">Edit</a> <a href="#" class="delete-btn">Delete</a></td>
                            </tr>
                            <tr>
                                <td><div class="img-placeholder"></div></td>
                                <td>Pleated Mini Skirt</td>
                                <td>Bottoms</td>
                                <td>$32.00</td>
                                <td>15</td>
                                <td class="actions-cell"><a href="#" class="edit-btn">Edit</a> <a href="#" class="delete-btn">Delete</a></td>
                            </tr>
                            <tr>
                                <td><div class="img-placeholder"></div></td>
                                <td>Pearl Cardigan</td>
                                <td>Outerwear</td>
                                <td>$55.00</td>
                                <td>5</td>
                                <td class="actions-cell"><a href="#" class="edit-btn">Edit</a> <a href="#" class="delete-btn">Delete</a></td>
                            </tr>
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
                            <tr>
                                <td>#ORD-1029</td>
                                <td><span class="status pending">Pending</span></td>
                            </tr>
                            <tr>
                                <td>#ORD-1028</td>
                                <td><span class="status shipped">Shipped</span></td>
                            </tr>
                            <tr>
                                <td>#ORD-1027</td>
                                <td><span class="status delivered">Delivered</span></td>
                            </tr>
                            <tr>
                                <td>#ORD-1026</td>
                                <td><span class="status delivered">Delivered</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="panel-footer">
                    <a href="/thriftster/orders" class="view-all-btn">View Orders</a>
                </div>
            </div>
            
        </section>
    </main>
</body>
</html>
