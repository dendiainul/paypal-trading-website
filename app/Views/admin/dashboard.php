<?php
/**
 * PayPal Trading Website - Admin Dashboard
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

<!-- Stats Cards -->
<div class="row mb-4">
    <div class="col-md-6 col-xl-3 mb-3">
        <div class="stats-card p-3">
            <div class="d-flex align-items-center">
                <div class="me-3">
                    <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center" 
                         style="width: 50px; height: 50px;">
                        <i class="text-white">📋</i>
                    </div>
                </div>
                <div>
                    <h6 class="text-muted mb-1">Total Orders</h6>
                    <h4 class="mb-0"><?= number_format($stats['total_orders']) ?></h4>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-6 col-xl-3 mb-3">
        <div class="stats-card p-3">
            <div class="d-flex align-items-center">
                <div class="me-3">
                    <div class="bg-warning rounded-circle d-flex align-items-center justify-content-center" 
                         style="width: 50px; height: 50px;">
                        <i class="text-white">⏳</i>
                    </div>
                </div>
                <div>
                    <h6 class="text-muted mb-1">Pending Orders</h6>
                    <h4 class="mb-0 text-warning"><?= number_format($stats['pending_orders']) ?></h4>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-6 col-xl-3 mb-3">
        <div class="stats-card p-3">
            <div class="d-flex align-items-center">
                <div class="me-3">
                    <div class="bg-success rounded-circle d-flex align-items-center justify-content-center" 
                         style="width: 50px; height: 50px;">
                        <i class="text-white">✅</i>
                    </div>
                </div>
                <div>
                    <h6 class="text-muted mb-1">Completed</h6>
                    <h4 class="mb-0 text-success"><?= number_format($stats['completed_orders']) ?></h4>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-6 col-xl-3 mb-3">
        <div class="stats-card p-3">
            <div class="d-flex align-items-center">
                <div class="me-3">
                    <div class="bg-info rounded-circle d-flex align-items-center justify-content-center" 
                         style="width: 50px; height: 50px;">
                        <i class="text-white">👥</i>
                    </div>
                </div>
                <div>
                    <h6 class="text-muted mb-1">Active Users</h6>
                    <h4 class="mb-0 text-info"><?= number_format($stats['active_users']) ?></h4>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Revenue Cards -->
<div class="row mb-4">
    <div class="col-md-6 mb-3">
        <div class="stats-card p-4">
            <h6 class="text-muted mb-2">💰 Total Revenue</h6>
            <h3 class="text-primary mb-0">Rp <?= number_format($stats['total_revenue']) ?></h3>
            <small class="text-success">↗️ +15% dari bulan lalu</small>
        </div>
    </div>
    
    <div class="col-md-6 mb-3">
        <div class="stats-card p-4">
            <h6 class="text-muted mb-2">📅 Revenue Bulan Ini</h6>
            <h3 class="text-success mb-0">Rp <?= number_format($stats['monthly_revenue']) ?></h3>
            <small class="text-info">🎯 Target: Rp 10.000.000</small>
        </div>
    </div>
</div>

<!-- Quick Actions & Recent Activity -->
<div class="row">
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h6 class="mb-0">🚀 Quick Actions</h6>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="<?= base_url('admin/orders') ?>" class="btn btn-outline-primary">
                        <i class="me-2">📋</i>Lihat Orders Pending
                    </a>
                    <a href="<?= base_url('admin/rates') ?>" class="btn btn-outline-success">
                        <i class="me-2">💱</i>Update Rate
                    </a>
                    <a href="<?= base_url('admin/cms') ?>" class="btn btn-outline-info">
                        <i class="me-2">📝</i>Edit Konten Website
                    </a>
                    <a href="https://wa.me/6282390840007" class="btn btn-outline-warning" target="_blank">
                        <i class="me-2">💬</i>Buka WhatsApp Business
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-header bg-info text-white">
                <h6 class="mb-0">📊 System Status</h6>
            </div>
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-4">
                        <div class="text-success mb-2">
                            <i style="font-size: 1.5rem;">🟢</i>
                        </div>
                        <small class="text-muted">Website</small>
                    </div>
                    <div class="col-4">
                        <div class="text-success mb-2">
                            <i style="font-size: 1.5rem;">🟢</i>
                        </div>
                        <small class="text-muted">Database</small>
                    </div>
                    <div class="col-4">
                        <div class="text-warning mb-2">
                            <i style="font-size: 1.5rem;">🟡</i>
                        </div>
                        <small class="text-muted">Rate API</small>
                    </div>
                </div>
                
                <hr>
                
                <div class="small">
                    <div class="d-flex justify-content-between mb-2">
                        <span>Server Load:</span>
                        <span class="text-success">45%</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Memory Usage:</span>
                        <span class="text-info">67%</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span>Disk Space:</span>
                        <span class="text-warning">82%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Orders Preview -->
<div class="card">
    <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
        <h6 class="mb-0">📋 Recent Orders</h6>
        <a href="<?= base_url('admin/orders') ?>" class="btn btn-light btn-sm">Lihat Semua</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Customer</th>
                        <th>Type</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>#001</strong></td>
                        <td>John Doe</td>
                        <td><span class="badge bg-primary">Top Up</span></td>
                        <td>$100</td>
                        <td><span class="badge bg-warning">Pending</span></td>
                        <td>16 Sep 10:30</td>
                    </tr>
                    <tr>
                        <td><strong>#002</strong></td>
                        <td>Jane Smith</td>
                        <td><span class="badge bg-success">Sell</span></td>
                        <td>$50</td>
                        <td><span class="badge bg-success">Completed</span></td>
                        <td>16 Sep 09:15</td>
                    </tr>
                    <tr>
                        <td><strong>#003</strong></td>
                        <td>Ahmad Rahman</td>
                        <td><span class="badge bg-warning">Payment</span></td>
                        <td>$25</td>
                        <td><span class="badge bg-info">Processing</span></td>
                        <td>16 Sep 08:45</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
/**
 * Admin Dashboard JavaScript
 * Developer: Dendi Ainul Alam - 082390840007
 */

// Auto refresh stats setiap 30 detik
setInterval(() => {
    // Simulasi update data real-time
    console.log('Refreshing dashboard stats...');
}, 30000);

// Welcome message
window.addEventListener('load', () => {
    console.log('Admin Dashboard loaded successfully!');
    console.log('Developer: Dendi Ainul Alam - 082390840007');
});
</script>
<?= $this->endSection() ?>
