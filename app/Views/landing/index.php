<?php
/**
 * PayPal Trading Website - Landing Page
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

<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- Hero Section -->
<section id="home" class="hero-section d-flex align-items-center">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold text-white mb-4">
                    Jual Beli Saldo PayPal <span class="text-warning">Terpercaya</span>
                </h1>
                <p class="lead text-white mb-4">
                    Platform terdepan untuk transaksi PayPal di Indonesia. 
                    Rate terbaik, proses cepat, dan 100% aman.
                </p>
                <div class="d-flex gap-3">
                    <a href="#rate" class="btn btn-warning btn-lg px-4">Cek Rate</a>
                    <a href="#layanan" class="btn btn-outline-light btn-lg px-4">Layanan Kami</a>
                </div>
            </div>
            <div class="col-lg-6">
                <!-- Rate Calculator Card -->
                <div class="card rate-card shadow-lg">
                    <div class="card-header">
                        <h5 class="mb-0">💰 Kalkulator Rate Real-Time</h5>
                    </div>
                    <div class="card-body">
                        <div class="row text-center">
                            <div class="col-6">
                                <h6>Rate Beli</h6>
                                <h4 class="text-warning" id="buyRate">Rp <?= number_format($current_rate['buy_rate']) ?></h4>
                            </div>
                            <div class="col-6">
                                <h6>Rate Jual</h6>
                                <h4 class="text-warning" id="sellRate">Rp <?= number_format($current_rate['sell_rate']) ?></h4>
                            </div>
                        </div>
                        <hr class="text-white">
                        <div class="mb-3">
                            <label class="form-label">Jumlah USD:</label>
                            <input type="number" class="form-control" id="usdAmount" placeholder="100" min="1">
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <button class="btn btn-warning w-100" onclick="calculateBuy()">Hitung Beli</button>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-light w-100" onclick="calculateSell()">Hitung Jual</button>
                            </div>
                        </div>
                        <div id="calculationResult" class="mt-3 text-center"></div>
                        <small class="text-white-50 d-block mt-2 text-center">
                            Update: <?= $current_rate['last_update'] ?>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Layanan Section -->
<section id="layanan" class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Layanan Kami</h2>
            <p class="text-muted">Solusi lengkap untuk kebutuhan PayPal Anda</p>
        </div>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <span class="badge bg-primary rounded-pill p-3">
                                <i class="fs-2">💳</i>
                            </span>
                        </div>
                        <h5>Top Up PayPal</h5>
                        <p class="text-muted">Isi saldo PayPal Anda dengan mudah dan cepat. Rate terbaik dijamin!</p>
                        <a href="#" class="btn btn-outline-primary">Order Sekarang</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <span class="badge bg-success rounded-pill p-3">
                                <i class="fs-2">💰</i>
                            </span>
                        </div>
                        <h5>Jual Saldo PayPal</h5>
                        <p class="text-muted">Tukar saldo PayPal Anda menjadi Rupiah dengan rate yang menguntungkan.</p>
                        <a href="#" class="btn btn-outline-success">Jual Sekarang</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <span class="badge bg-warning rounded-pill p-3">
                                <i class="fs-2">🛒</i>
                            </span>
                        </div>
                        <h5>Jasa Bayar PayPal</h5>
                        <p class="text-muted">Kami bantu bayar pembelian online Anda yang memerlukan PayPal.</p>
                        <a href="#" class="btn btn-outline-warning">Gunakan Jasa</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Rate Section -->
<section id="rate" class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Rate Hari Ini</h2>
            <p class="text-muted">Rate update otomatis setiap jam</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Layanan</th>
                                        <th>Rate (IDR)</th>
                                        <th>Min Transaksi</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>Top Up PayPal</strong></td>
                                        <td class="text-primary fw-bold">Rp <?= number_format($current_rate['buy_rate']) ?></td>
                                        <td>$10</td>
                                        <td><span class="badge bg-success">Tersedia</span></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Jual Saldo PayPal</strong></td>
                                        <td class="text-success fw-bold">Rp <?= number_format($current_rate['sell_rate']) ?></td>
                                        <td>$20</td>
                                        <td><span class="badge bg-success">Tersedia</span></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Jasa Bayar PayPal</strong></td>
                                        <td class="text-warning fw-bold">Rate + 3%</td>
                                        <td>$5</td>
                                        <td><span class="badge bg-success">Tersedia</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
/**
 * Rate Calculator JavaScript
 * Developer: Dendi Ainul Alam - 082390840007
 */

const buyRate = <?= $current_rate['buy_rate'] ?>;
const sellRate = <?= $current_rate['sell_rate'] ?>;

function calculateBuy() {
    const usdAmount = document.getElementById('usdAmount').value;
    if (!usdAmount || usdAmount <= 0) {
        alert('Masukkan jumlah USD yang valid!');
        return;
    }
    
    const totalIDR = usdAmount * buyRate;
    document.getElementById('calculationResult').innerHTML = 
        `<div class="alert alert-warning mb-0">
            <strong>Top Up $${usdAmount}</strong><br>
            Anda perlu transfer: <strong>Rp ${new Intl.NumberFormat('id-ID').format(totalIDR)}</strong>
        </div>`;
}

function calculateSell() {
    const usdAmount = document.getElementById('usdAmount').value;
    if (!usdAmount || usdAmount <= 0) {
        alert('Masukkan jumlah USD yang valid!');
        return;
    }
    
    const totalIDR = usdAmount * sellRate;
    document.getElementById('calculationResult').innerHTML = 
        `<div class="alert alert-light mb-0">
            <strong>Jual $${usdAmount}</strong><br>
            Anda akan terima: <strong>Rp ${new Intl.NumberFormat('id-ID').format(totalIDR)}</strong>
        </div>`;
}

// Auto-update rate simulation (demo)
setInterval(() => {
    const variation = Math.floor(Math.random() * 20) - 10;
    document.getElementById('buyRate').textContent = 
        'Rp ' + new Intl.NumberFormat('id-ID').format(buyRate + variation);
}, 30000); // Update setiap 30 detik untuk demo
</script>
<?= $this->endSection() ?>
