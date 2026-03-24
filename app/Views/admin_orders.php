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
                            <th>Status</th>
                            <th>Price</th>
                            <th>MOP</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="ordersBody">
                        <tr>
                            <td>OR123-45_67</td>
                            <td><span class="status-badge pending">Pending</span></td>
                            <td>₱123.45</td>
                            <td>Cash</td>
                            <td class="actions-cell">
                                <a href="<?= base_url('/admin/orders/view') ?>" class="action-link">View</a>
                            </td>
                        </tr>
                        <tr>
                            <td>OR123-45_68</td>
                            <td><span class="status-badge complete">Complete</span></td>
                            <td>₱456.00</td>
                            <td>GCash</td>
                            <td class="actions-cell">
                                <a href="<?= base_url('/admin/orders/view') ?>" class="action-link">View</a>
                            </td>
                        </tr>
                        <tr>
                            <td>OR123-45_69</td>
                            <td><span class="status-badge pending">Pending</span></td>
                            <td>₱789.00</td>
                            <td>Cash</td>
                            <td class="actions-cell">
                                <a href="<?= base_url('/admin/orders/view') ?>" class="action-link">View</a>
                            </td>
                        </tr>
                        <tr>
                            <td>OR123-45_70</td>
                            <td><span class="status-badge pending">Pending</span></td>
                            <td>₱200.00</td>
                            <td>Card</td>
                            <td class="actions-cell">
                                <a href="<?= base_url('/admin/orders/view') ?>" class="action-link">View</a>
                            </td>
                        </tr>
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