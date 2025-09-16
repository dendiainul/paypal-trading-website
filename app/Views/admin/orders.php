<?php
/**
 * PayPal Trading Website - Admin Orders Management
 * 
 * @author    Dendi Ainul Alam
 * @contact   082390840007
 * @website   Web & Android Developer
 * @github    https://github.com/dendiainul
 * @created   2024-09-16
 * 
 * All rights reserved.
 */
?>

<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<!-- Filter & Search -->
<div class="card mb-4">
    <div class="card-body">
        <div class="row align-items-end">
            <div class="col-md-3 mb-2">
                <label class="form-label">Filter Status:</label>
                <select class="form-select" id="statusFilter">
                    <option value="">Semua Status</option>
                    <option value="pending">Pending</option>
                    <option value="processing">Processing</option>
                    <option value="completed">Completed</option>
                    <option value="cancelled">Cancelled</option>
                </select>
            </div>
            <div class="col-md-3 mb-2">
                <label class="form-label">Filter Type:</label>
                <select class="form-select" id="typeFilter">
                    <option value="">Semua Type</option>
                    <option value="buy_paypal">Top Up PayPal</option>
                    <option value="sell_paypal">Jual PayPal</option>
                    <option value="payment_service">Payment Service</option>
                </select>
            </div>
            <div class="col-md-4 mb-2">
                <label class="form-label">Search Customer:</label>
                <input type="text" class="form-control" id="customerSearch" placeholder="Nama atau email...">
            </div>
            <div class="col-md-2 mb-2">
                <button class="btn btn-primary w-100" onclick="filterOrders()">
                    <i class="me-1">🔍</i>Filter
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Orders Table -->
<div class="card">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h6 class="mb-0">📋 Manage Orders</h6>
        <div>
            <button class="btn btn-light btn-sm me-2" onclick="exportOrders()">
                <i class="me-1">📊</i>Export
            </button>
            <button class="btn btn-success btn-sm" onclick="refreshOrders()">
                <i class="me-1">🔄</i>Refresh
            </button>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Customer</th>
                        <th>Contact</th>
                        <th>Type</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="ordersTableBody">
                    <?php foreach ($orders as $order): ?>
                    <tr>
                        <td><strong>#<?= str_pad($order['id'], 3, '0', STR_PAD_LEFT) ?></strong></td>
                        <td>
                            <div>
                                <strong><?= $order['customer'] ?></strong><br>
                                <small class="text-muted">customer@email.com</small>
                            </div>
                        </td>
                        <td>
                            <a href="https://wa.me/6282390840007" class="btn btn-success btn-sm" target="_blank">
                                <i class="me-1">💬</i>WA
                            </a>
                        </td>
                        <td>
                            <?php
                            $typeLabels = [
                                'buy_paypal' => ['Top Up', 'primary'],
                                'sell_paypal' => ['Sell', 'success'],
                                'payment_service' => ['Payment', 'warning']
                            ];
                            $label = $typeLabels[$order['type']] ?? ['Unknown', 'secondary'];
                            ?>
                            <span class="badge bg-<?= $label[1] ?>"><?= $label[0] ?></span>
                        </td>
                        <td>
                            <div>
                                <strong>$<?= number_format($order['amount_usd'], 2) ?></strong><br>
                                <small class="text-muted">Rp <?= number_format($order['amount_idr']) ?></small>
                            </div>
                        </td>
                        <td>
                            <?php
                            $statusLabels = [
                                'pending' => ['warning', 'Pending'],
                                'processing' => ['info', 'Processing'],
                                'completed' => ['success', 'Completed'],
                                'cancelled' => ['danger', 'Cancelled']
                            ];
                            $status = $statusLabels[$order['status']] ?? ['secondary', 'Unknown'];
                            ?>
                            <span class="badge bg-<?= $status[0] ?>"><?= $status[1] ?></span>
                        </td>
                        <td>
                            <small>
                                <?= date('d/m/Y', strtotime($order['created_at'])) ?><br>
                                <?= date('H:i', strtotime($order['created_at'])) ?>
                            </small>
                        </td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <button class="btn btn-outline-primary" onclick="viewOrder(<?= $order['id'] ?>)" title="View Details">
                                    <i>👁️</i>
                                </button>
                                <button class="btn btn-outline-success" onclick="updateStatus(<?= $order['id'] ?>, 'processing')" title="Process">
                                    <i>⏳</i>
                                </button>
                                <button class="btn btn-outline-warning" onclick="updateStatus(<?= $order['id'] ?>, 'completed')" title="Complete">
                                    <i>✅</i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">
        <div class="d-flex justify-content-between align-items-center">
            <small class="text-muted">Showing 3 of 156 orders</small>
            <nav>
                <ul class="pagination pagination-sm mb-0">
                    <li class="page-item disabled">
                        <span class="page-link">Previous</span>
                    </li>
                    <li class="page-item active"><span class="page-link">1</span></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>

<!-- Order Detail Modal -->
<div class="modal fade" id="orderDetailModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">📋 Order Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="orderDetailContent">
                <!-- Content will be loaded here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Update Status</button>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
/**
 * Admin Orders Management JavaScript
 * Developer: Dendi Ainul Alam - 082390840007
 */

function filterOrders() {
    const status = document.getElementById('statusFilter').value;
    const type = document.getElementById('typeFilter').value;
    const search = document.getElementById('customerSearch').value;
    
    console.log('Filtering orders:', { status, type, search });
    alert('Filter applied! (Demo mode)');
}

function viewOrder(orderId) {
    // Simulasi load order detail
    const orderDetail = `
        <div class="row">
            <div class="col-md-6">
                <h6>Customer Information:</h6>
                <p><strong>Name:</strong> John Doe<br>
                <strong>Email:</strong> john@email.com<br>
                <strong>Phone:</strong> 08123456789<br>
                <strong>PayPal:</strong> john@paypal.com</p>
            </div>
            <div class="col-md-6">
                <h6>Order Information:</h6>
                <p><strong>Order ID:</strong> #${String(orderId).padStart(3, '0')}<br>
                <strong>Type:</strong> Top Up PayPal<br>
                <strong>Amount:</strong> $100.00<br>
                <strong>Total IDR:</strong> Rp 1,585,000</p>
            </div>
        </div>
        <hr>
        <h6>Status History:</h6>
        <div class="timeline">
            <small class="text-muted">16 Sep 2024 10:30 - Order created</small><br>
            <small class="text-muted">16 Sep 2024 10:35 - Payment pending</small>
        </div>
    `;
    
    document.getElementById('orderDetailContent').innerHTML = orderDetail;
    new bootstrap.Modal(document.getElementById('orderDetailModal')).show();
}

function updateStatus(orderId, newStatus) {
    if (confirm(`Update order #${orderId} to ${newStatus}?`)) {
        console.log(`Updating order ${orderId} to ${newStatus}`);
        alert(`Order #${orderId} updated to ${newStatus}! (Demo mode)`);
        
        // Refresh table would go here
        refreshOrders();
    }
}

function refreshOrders() {
    console.log('Refreshing orders...');
    
    // Simulasi loading
    document.getElementById('ordersTableBody').innerHTML = 
        '<tr><td colspan="8" class="text-center py-4"><i>🔄</i> Loading...</td></tr>';
    
    setTimeout(() => {
        location.reload(); // In real app, would use AJAX
    }, 1000);
}

function exportOrders() {
    alert('Exporting orders to Excel... (Demo mode)');
    console.log('Export function called');
}

// Auto refresh every 2 minutes
setInterval(refreshOrders, 120000);
</script>
<?= $this->endSection() ?>
