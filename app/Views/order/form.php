<?php
/**
 * PayPal Trading Website - Order Form
 * 
 * @author    Dendi Ainul Alam
 * @contact   082390840007
 * @website   Web & Android Developer
 * @github    https://github.com/dendiainul
 * @created   2024-09-16
 * 
 * All rights reserved.
 */

$is_buy = ($order_type == 'buy');
$service_name = $is_buy ? 'Top Up PayPal' : 'Jual Saldo PayPal';
$rate = $is_buy ? $current_rate['buy_rate'] : $current_rate['sell_rate'];
$min_amount = $is_buy ? 10 : 20;
?>

<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- Header -->
                <div class="text-center mb-4">
                    <h2 class="fw-bold"><?= $service_name ?></h2>
                    <p class="text-muted">Isi form di bawah untuk memulai transaksi</p>
                </div>
                
                <!-- Rate Info -->
                <div class="card mb-4 <?= $is_buy ? 'border-primary' : 'border-success' ?>">
                    <div class="card-body text-center">
                        <h5 class="<?= $is_buy ? 'text-primary' : 'text-success' ?>">
                            Rate Hari Ini: Rp <?= number_format($rate) ?>
                        </h5>
                        <small class="text-muted">Minimum transaksi: $<?= $min_amount ?></small>
                    </div>
                </div>
                
                <!-- Order Form -->
                <div class="card shadow">
                    <div class="card-header <?= $is_buy ? 'bg-primary' : 'bg-success' ?> text-white">
                        <h5 class="mb-0">📋 Form Order <?= $service_name ?></h5>
                    </div>
                    <div class="card-body">
                        <form id="orderForm">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Nama Lengkap *</label>
                                    <input type="text" class="form-control" name="full_name" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Nomor WhatsApp *</label>
                                    <input type="tel" class="form-control" name="phone" required placeholder="08xxxxxxxxx">
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="untuk konfirmasi">
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Jumlah USD *</label>
                                    <input type="number" class="form-control" id="usdAmount" name="usd_amount" 
                                           min="<?= $min_amount ?>" step="1" required>
                                    <small class="text-muted">Minimum: $<?= $min_amount ?></small>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Total IDR</label>
                                    <input type="text" class="form-control" id="totalIDR" readonly>
                                    <small class="text-muted">Otomatis terhitung</small>
                                </div>
                            </div>
                            
                            <?php if ($is_buy): ?>
                            <div class="mb-3">
                                <label class="form-label">Email PayPal Tujuan *</label>
                                <input type="email" class="form-control" name="paypal_email" required 
                                       placeholder="email@paypal.com">
                                <small class="text-muted">Email PayPal yang akan menerima saldo</small>
                            </div>
                            <?php else: ?>
                            <div class="mb-3">
                                <label class="form-label">Email PayPal Pengirim *</label>
                                <input type="email" class="form-control" name="paypal_email" required 
                                       placeholder="email@paypal.com">
                                <small class="text-muted">Email PayPal yang akan mengirim saldo</small>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Bank Tujuan *</label>
                                    <select class="form-control" name="bank" required>
                                        <option value="">Pilih Bank</option>
                                        <option value="BCA">BCA</option>
                                        <option value="BNI">BNI</option>
                                        <option value="BRI">BRI</option>
                                        <option value="Mandiri">Mandiri</option>
                                        <option value="CIMB">CIMB Niaga</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Nomor Rekening *</label>
                                    <input type="text" class="form-control" name="account_number" required>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Nama Pemilik Rekening *</label>
                                <input type="text" class="form-control" name="account_name" required>
                            </div>
                            <?php endif; ?>
                            
                            <div class="mb-3">
                                <label class="form-label">Catatan</label>
                                <textarea class="form-control" name="notes" rows="3" 
                                          placeholder="Catatan tambahan (opsional)"></textarea>
                            </div>
                            
                            <!-- Summary -->
                            <div class="card bg-light mb-3">
                                <div class="card-body">
                                    <h6>📋 Ringkasan Order:</h6>
                                    <div id="orderSummary">
                                        <small class="text-muted">Isi jumlah USD untuk melihat ringkasan</small>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn <?= $is_buy ? 'btn-primary' : 'btn-success' ?> btn-lg">
                                    🚀 Submit Order
                                </button>
                                <a href="<?= base_url('order') ?>" class="btn btn-outline-secondary">
                                    ← Kembali
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
                
                <!-- Contact Info -->
                <div class="card mt-4 border-warning">
                    <div class="card-body text-center">
                        <h6 class="text-warning">💬 Butuh Bantuan?</h6>
                        <p class="mb-2">Hubungi kami langsung:</p>
                        <a href="https://wa.me/6282390840007" class="btn btn-success btn-sm" target="_blank">
                            WhatsApp: 082390840007
                        </a>
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
 * Order Form Calculator
 * Developer: Dendi Ainul Alam - 082390840007
 */

const rate = <?= $rate ?>;
const orderType = '<?= $order_type ?>';
const minAmount = <?= $min_amount ?>;

document.getElementById('usdAmount').addEventListener('input', function() {
    calculateTotal();
});

function calculateTotal() {
    const usdAmount = parseFloat(document.getElementById('usdAmount').value) || 0;
    const totalIDR = usdAmount * rate;
    
    document.getElementById('totalIDR').value = 
        usdAmount > 0 ? 'Rp ' + new Intl.NumberFormat('id-ID').format(totalIDR) : '';
    
    updateSummary(usdAmount, totalIDR);
}

function updateSummary(usdAmount, totalIDR) {
    const summaryDiv = document.getElementById('orderSummary');
    
    if (usdAmount >= minAmount) {
        const action = orderType === 'buy' ? 'transfer' : 'terima';
        summaryDiv.innerHTML = `
            <div class="row">
                <div class="col-sm-6"><strong>Jumlah USD:</strong> $${usdAmount}</div>
                <div class="col-sm-6"><strong>Rate:</strong> Rp ${new Intl.NumberFormat('id-ID').format(rate)}</div>
                <div class="col-sm-6"><strong>Total IDR:</strong> Rp ${new Intl.NumberFormat('id-ID').format(totalIDR)}</div>
                <div class="col-sm-6"><strong>Anda ${action}:</strong> <span class="text-primary fw-bold">Rp ${new Intl.NumberFormat('id-ID').format(totalIDR)}</span></div>
            </div>
        `;
    } else if (usdAmount > 0) {
        summaryDiv.innerHTML = `<small class="text-danger">Minimum transaksi: $${minAmount}</small>`;
    } else {
        summaryDiv.innerHTML = `<small class="text-muted">Isi jumlah USD untuk melihat ringkasan</small>`;
    }
}

// Form submission
document.getElementById('orderForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const usdAmount = parseFloat(document.getElementById('usdAmount').value);
    if (usdAmount < minAmount) {
        alert(`Minimum transaksi adalah $${minAmount}`);
        return;
    }
    
    // Simulate form submission
    alert('Form berhasil dikirim! Kami akan segera menghubungi Anda.');
    
    // Redirect to WhatsApp
    const phone = '6282390840007';
    const message = `Halo, saya ingin ${orderType === 'buy' ? 'top up PayPal' : 'jual saldo PayPal'} sebesar $${usdAmount}`;
    window.open(`https://wa.me/${phone}?text=${encodeURIComponent(message)}`, '_blank');
});
</script>
<?= $this->endSection() ?>
