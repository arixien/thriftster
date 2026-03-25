<?= view('includes/admin_header_view') ?>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=arrow_back_ios" />    
<link rel="stylesheet" href="<?= base_url('css/pages/admin_orders.css') ?>">
    
    <main class="dashboard-container">
        
        <!-- Top header with Title and Back Button -->
        <div class="order-view-header">
            <a href="<?= base_url('/admin/orders') ?>" class="btn-back">
                <span class="material-symbols-outlined">
                arrow_back_ios
                </span>
            </a>
            
            <h2 class="order-id-title">Order ID: <?= esc($order['order_number']) ?></h2>
        </div>

        <!-- Main Panel -->
        <div class="orders-panel">
            
            <!-- Details Section -->
            <div class="order-details-section">
                <h3 class="details-title">Details</h3>
                
                <div class="details-grid">
                    <div class="details-column">
                        <p><strong>Customer Name:</strong> <?= esc($order['shipping_first_name'] . ' ' . $order['shipping_last_name']) ?></p>
                        <p><strong>Email:</strong> <?= esc($order['shipping_email']) ?></p>
                        <p><strong>Address:</strong> <?= esc($order['shipping_address'] . ', ' . $order['shipping_barangay'] . ', ' . $order['shipping_city'] . ', ' . $order['shipping_region'] . ' ' . $order['shipping_postal_code']) ?></p>
                        <p><strong>Contact:</strong> <?= esc($order['shipping_phone']) ?></p>
                    </div>
                    <div class="details-column">
                        <p><strong>Shipping Method:</strong> <?= esc($order['delivery_method']) ?></p>
                        <p><strong>Date of Order:</strong> <?= esc(date('M. d, Y', strtotime($order['created_at']))) ?></p>
                        <p><strong>Total Cost:</strong> ₱<?= esc(number_format($order['total_amount'], 2)) ?></p>
                        <p><strong>Mode Of Payment:</strong> <?= esc($order['payment_method']) ?></p>
                    </div>
                </div>
            </div>

            <!-- Products Table Section -->
            <div class="table-container order-items-table">
                <table class="admin-table border-table">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                  <tbody>
    <?php foreach ($order_items as $item): ?>
    <tr>
        <td><?= esc($item['snapshot_name']) ?></td>
        <td>₱<?= esc(number_format($item['unit_price'], 2)) ?></td>
        <td><?= esc($item['quantity']) ?></td>
        <td>₱<?= esc(number_format($item['subtotal'], 2)) ?></td>
    </tr>
    <?php endforeach; ?>
</tbody>
                </table>
            </div>

        </div>
    </main>
</body>
</html>