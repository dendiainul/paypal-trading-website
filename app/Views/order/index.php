<?php
/**
 * PayPal Trading Website - Order Index
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

<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Pilih Layanan</h2>
            <p class="text-muted">Silakan pilih jenis transaksi yang Anda inginkan</p>
        </div>
        
        <div class="row justify-content-center">
            <!-- Top Up PayPal -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-0 service-card">
                    <div class="card-body text-center p-4">
                        <div class="mb-3">
                            <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                                <i class="text-white" style="font-size: 2rem;">💳</i>
                            </div>
                        </div>
                        <h4 class="card-title">Top Up PayPal</h4>
                        <p class="text-muted mb-3">Isi saldo PayPal Anda dengan rate terbaik</p>
                        <div class="bg-light p-3 rounded mb-3">
                            <small class="text-muted">Rate Hari Ini:</small>
                            <h5 class="text-primary mb-0">Rp <?= number_format($current_rate['buy_rate']) ?></h5>
                        </div>
                        <ul class="list-unstyled text-start">
                            <li class="mb-2">✅ Proses 5-15 menit</li>
                            <li class="mb-2">✅ Minimum $10</li>
                            <li class="mb-2">✅ Rate update real-time</li>
                            <li class="mb-2">✅ Screenshot bukti transfer</li>
                        </ul>
                        <a href="<?= base_url('order/buy-paypal') ?>" class="btn btn-primary btn-lg w-100 mt-3">
                            Order Sekarang
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Jual PayPal -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-0 service-card">
                    <div class="card-body text-center p-4">
                        <div class="mb-3">
                            <div class="bg-success rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                                <i class="text-white" style="font-size: 2rem;">💰</i>
                            </div>
                        </div>
                        <h4 class="card-title">Jual Saldo PayPal</h4>
                        <p class="text-muted mb-3">Tukar saldo PayPal jadi Rupiah</p>
                        <div class="bg-light p-3 rounded mb-3">
                            <small class="text-muted">Rate Hari Ini:</small>
                            <h5 class="text-success mb-0">Rp <?= number_format($current_rate['sell_rate']) ?></h5>
                        </div>
                        <ul class="list-unstyled text-start">
                            <li class="mb-2">✅ Pembayaran instan</li>
                            <li class="mb-2">✅ Minimum $20</li>
                            <li class="mb-2">✅ Rate kompetitif</li>
                            <li class="mb-2">✅ Transfer ke rekening</li>
                        </ul>
                        <a href="<?= base_url('order/sell-paypal') ?>" class="btn btn-success btn-lg w-100 mt-3">
                            Jual Sekarang
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Jasa Bayar -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-0 service-card">
                    <div class="card-body text-center p-4">
                        <div class="mb-3">
                            <div class="bg-warning rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                                <i class="text-white" style="font-size: 2rem;">🛒</i>
                            </div>
                        </div>
                        <h4 class="card-title">Jasa Bayar PayPal</h4>
                        <p class="text-muted mb-3">Bantuan pembayaran online</p>
                        <div class="bg-light p-3 rounded mb-3">
                            <small class="text-muted">Biaya Admin:</small>
                            <h5 class="text-warning mb-0">Rate + 3%</h5>
                        </div>
                        <ul class="list-unstyled text-start">
                            <li class="mb-2">✅ Minimum $5</li>
                            <li class="mb-2">✅ Semua merchant</li>
                            <li class="mb-2">✅ Proses cepat</li>
                            <li class="mb-2">✅ Bukti pembayaran</li>
                        </ul>
                        <a href="<?= base_url('order/payment-service') ?>" class="btn btn-warning btn-lg w-100 mt-3">
                            Gunakan Jasa
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<style>
.service-card {
    transition: transform 0.3s ease;
}
.service-card:hover {
    transform: translateY(-5px);
}
</style>
<?= $this->endSection() ?>
