<?= view('includes/admin_header_view') ?>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=arrow_back_ios" />    
<link rel="stylesheet" href="/thriftster/public/css/pages/admin_orders.css">
    
    <main class="dashboard-container">
        
        <!-- Top header with Title and Back Button -->
        <div class="order-view-header">
            <a href="<?= base_url('/admin/orders') ?>" class="btn-back">
                <span class="material-symbols-outlined">
                arrow_back_ios
                </span>
            </a>
            
            <h2 class="order-id-title">Order ID: OR123-45_67</h2>
            
        </div>

        <!-- Main Panel -->
        <div class="orders-panel">
            
            <!-- Details Section -->
            <div class="order-details-section">
                <h3 class="details-title">Details</h3>
                
                <div class="details-grid">
                    <div class="details-column">
                        <p><strong>Customer Name:</strong> Lorem Ipsum</p>
                        <p><strong>Email:</strong> lorem@ipsum.com</p>
                        <p><strong>Address:</strong> Lorem Ipsum St. 123</p>
                        <p><strong>Contact:</strong> 0923456789</p>
                    </div>
                    <div class="details-column">
                        <p><strong>Shipping Method:</strong> Lorem</p>
                        <p><strong>Date of Order:</strong> Feb. 30, 2023</p>
                        <p><strong>Total Cost:</strong> P1234.56</p>
                        <p><strong>Mode Of Payment:</strong> Cash On Delivery</p>
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
                        <tr>
                            <td>Lorem Ipsum Dress</td>
                            <td>P123.45</td>
                            <td>1</td>
                            <td>P123.45</td>
                        </tr>
                        <tr>
                            <td>Lorem Ipsum Pants</td>
                            <td>P123.45</td>
                            <td>2</td>
                            <td>P456.78</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </main>
</body>
</html>
