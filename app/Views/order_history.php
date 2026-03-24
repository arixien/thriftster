<?php
/**
 * order_history_view.php
 */
?>

<?= view('includes/header_view') ?>

<link rel="stylesheet" href="public/css/pages/order_history.css">

<main class="order-history-main">

    <div class="order-history-container">

        <!-- Page Title -->
        <div class="page-title-wrap">
            <span class="heading-clipboard">📋</span>
            <h1 class="page-title">Order History</h1>
            <p class="page-subtitle">A little trail of your most treasured finds ♡</p>
        </div>

        <!-- Filters + Date Row -->
        <div class="filters-row">
            <nav class="status-tabs">
                <a href="order_history_view" class="tab-link <?= (!isset($status) || $status === 'all') ? 'active' : '' ?>">All Orders</a>
                <a href="order_history_view?status=pending" class="tab-link <?= (isset($status) && $status === 'pending') ? 'active' : '' ?>">Pending</a>
                <a href="order_history_view?status=completed" class="tab-link <?= (isset($status) && $status === 'completed') ? 'active' : '' ?>">Completed</a>
                <a href="order_history_view?status=cancelled" class="tab-link <?= (isset($status) && $status === 'cancelled') ? 'active' : '' ?>">Cancelled</a>
            </nav>
            <div class="date-filter-wrap">
                <span class="date-icon">📅</span>
                <input type="date" class="date-input" name="filter_date" value="<?= esc($filter_date ?? '') ?>">
            </div>
        </div>

        <!-- Orders Table -->
        <div class="orders-table-wrap">
            <table class="orders-table">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Order Date</th>
                        <th>Order Status</th>
                        <th>Consignee</th>
                        <th>Total</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($orders)): ?>
                        <?php foreach ($orders as $order): ?>
                        <tr class="order-row">
                            <td class="order-id">#<?= esc($order['id']) ?></td>
                            <td><?= esc(date('M d, Y', strtotime($order['created_at']))) ?></td>
                            <td>
                                <span class="status-badge status-<?= esc(strtolower($order['status'])) ?>">
                                    <?php
                                        $icons = [
                                            'pending'   => '🕐',
                                            'completed' => '✅',
                                            'cancelled' => '✕',
                                        ];
                                        $icon = $icons[strtolower($order['status'])] ?? '•';
                                    ?>
                                    <?= $icon ?> <?= esc(ucfirst($order['status'])) ?>
                                </span>
                            </td>
                            <td><?= esc($order['consignee']) ?></td>
                            <td class="order-total">₱<?= number_format($order['total'], 2) ?></td>
                            <td>
                                <a href="<?= base_url('/order/' . $order['id']) ?>" class="view-btn">View</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="empty-state">
                                <div class="empty-inner">
                                    <span class="empty-icon">🛍️</span>
                                    <p class="empty-text">No orders yet — your wishlist is waiting~</p>
                                    <a href="products_catalog_view" class="empty-cta">Start Shopping</a>
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <?php if (!empty($pager)): ?>
        <div class="pagination-wrap">
            <?php if ($pager['current_page'] > 1): ?>
                <a href="?page=<?= $pager['current_page'] - 1 ?>&status=<?= esc($status ?? '') ?>" class="page-btn page-arrow">&lt;</a>
            <?php else: ?>
                <span class="page-btn page-arrow disabled">&lt;</span>
            <?php endif; ?>

            <?php foreach ($pager['pages'] as $p): ?>
                <?php if ($p === '...'): ?>
                    <span class="page-btn page-ellipsis">…</span>
                <?php else: ?>
                    <a href="?page=<?= $p ?>&status=<?= esc($status ?? '') ?>"
                       class="page-btn <?= $p == $pager['current_page'] ? 'page-active' : '' ?>">
                        <?= $p ?>
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>

            <?php if ($pager['current_page'] < $pager['total_pages']): ?>
                <a href="?page=<?= $pager['current_page'] + 1 ?>&status=<?= esc($status ?? '') ?>" class="page-btn page-arrow">&gt;</a>
            <?php else: ?>
                <span class="page-btn page-arrow disabled">&gt;</span>
            <?php endif; ?>
        </div>
        <?php endif; ?>

    </div>
</main>

<?= view('includes/footer_view') ?>