<?= view('includes/admin_header_view') ?>
<link rel="stylesheet" href="<?= base_url('public/css/pages/admin_orders.css') ?>">    
    <main class="dashboard-container">
        <!-- Page Title -->
        <div class="page-title">
            <h2>Order Management</h2>
        </div>

        <!-- Main Panel -->
        <div class="orders-panel">
            <div class="panel-header">
                <h3>All Orders</h3>
                <!-- Search Bar -->
                <div class="search-wrapper">
                    <span class="search-icon">🔍</span>
                    <input type="text" id="orderSearch" class="search-input" placeholder="Search by Order ID, Status, or MOP...">
                </div>
            </div>

            <div class="table-container">
                <table class="admin-table border-table" id="ordersTable">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer</th>
                            <th>Status</th>
                            <th>Price</th>
                            <th>MOP</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="ordersBody">
                        <?php if (!empty($orders)): ?>
                            <?php foreach ($orders as $order): ?>
                            <tr>
                                <td><?= esc($order['order_number']) ?></td>
                                <td><?= esc($order['shipping_first_name'] . ' ' . $order['shipping_last_name']) ?></td>
                                <td>
                                    <span class="status-badge <?= esc(strtolower($order['status'])) ?>">
                                        <?= esc(ucfirst($order['status'])) ?>
                                    </span>
                                </td>
                                <td>₱<?= esc(number_format($order['total_amount'], 2)) ?></td>
                                <td><?= esc(strtoupper($order['payment_method'])) ?></td>
                                <td><?= esc(date('M d, Y', strtotime($order['created_at']))) ?></td>
                                <td class="actions-cell">
                                    <a href="<?= base_url('/admin/orders/view/' . $order['id']) ?>" class="action-link">View</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr><td colspan="7">No orders found.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                <!-- No results message -->
                <div id="noResults" style="display:none; text-align:center; padding:2rem; font-family:'Poppins',sans-serif; color:#999;">
                    No orders found matching your search.
                </div>
            </div>
        </div>
    </main>

    <script>
        const searchInput = document.getElementById('orderSearch');
        const rows        = document.querySelectorAll('#ordersBody tr');
        const noResults   = document.getElementById('noResults');

        searchInput.addEventListener('input', function () {
            const query = this.value.toLowerCase().trim();
            let visibleCount = 0;

            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                const match = text.includes(query);
                row.style.display = match ? '' : 'none';
                if (match) visibleCount++;
            });

            noResults.style.display = visibleCount === 0 ? 'block' : 'none';
        });
    </script>

</body>
</html>