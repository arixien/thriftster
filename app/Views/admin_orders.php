<?= view('includes/admin_header_view') ?>
    <link rel="stylesheet" href="/thriftster/public/css/pages/admin_orders.css">
    
    <main class="dashboard-container">
        <!-- Page Title -->
        <div class="page-title">
            <h2>Order Management</h2>
        </div>

        <!-- Main Panel -->
        <div class="orders-panel">
            <div class="panel-header">
                <h3>All Orders</h3>
            </div>

            <div class="table-container">
                <table class="admin-table border-table">
                    <thead>
                        <tr>
                            <th>OrderID</th>
                            <th>Status</th>
                            <th>Price</th>
                            <th>MOP</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Repeated rows -->
                        <tr>
                            <td>OR123-45_67</td>
                            <td>Pending</td>
                            <td>P123.45</td>
                            <td>Cash</td>
                            <td class="actions-cell">
                                <a href="<?= base_url('/admin/orders/view') ?>" class="action-link">View</a>
                            </td>
                        </tr>
                        <tr>
                            <td>OR123-45_67</td>
                            <td>Complete</td>
                            <td>P123.45</td>
                            <td>Cash</td>
                            <td class="actions-cell">
                                <a href="<?= base_url('/admin/orders/view') ?>" class="action-link">View</a>
                            </td>
                        </tr>
                        <tr>
                            <td>OR123-45_67</td>
                            <td>Pending</td>
                            <td>P123.45</td>
                            <td>Cash</td>
                            <td class="actions-cell">
                                <a href="<?= base_url('/admin/orders/view') ?>" class="action-link">View</a>
                            </td>
                        </tr>
                        <tr>
                            <td>OR123-45_67</td>
                            <td>Pending</td>
                            <td>P123.45</td>
                            <td>Cash</td>
                            <td class="actions-cell">
                                <a href="<?= base_url('/admin/orders/view') ?>" class="action-link">View</a>
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
