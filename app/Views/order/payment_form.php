<?php
/**
 * PayPal Trading Website - Payment Service Form
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

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- Header -->
                <div class="text-center mb-4">
                    <h2 class="fw-bold">🛒 Jasa Bayar PayPal</h2>
                    <p class="text-muted">Kami bantu Anda melakukan pembayaran online dengan PayPal</p>
                </div>
                
                <!-- Rate Info -->
                <div class="card mb-4 border-warning">
                    <div class="card-body text-center">
                        <h5 class="text-warning">Biaya Admin: Rate + 3%</h5>
                        <small class="text-muted">Minimum transaksi: $5 | Rate update real-time</small>
                    </div>
                </div>
                
                <!-- Payment Service Form -->
                <div class="card shadow">
                    <div class="card-header bg-warning text-dark">
                        <h5 class="mb-0">📋 Form Jasa Bayar PayPal</h5>
                    </div>
                    <div class="card-body">
                        <form id="paymentServiceForm">
                            <!-- Personal Info -->
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
                            
                            <!-- Payment Details -->
                            <hr>
                            <h6 class="text-warning mb-3">💳 Detail Pembayaran</h6>
                            
                            <div class="mb-3">
                                <label class="form-label">Link/URL yang akan dibayar *</label>
                                <input type="url" class="form-control" name="payment_url" required 
                                       placeholder="https://example.com/checkout">
                                <small class="text-muted">Masukkan link halaman pembayaran</small>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Jumlah USD *</label>
                                    <input type="number" class="form-control" id="usdAmount" name="usd_amount" 
                                           min="5" step="0.01" required>
                                    <small class="text-muted">Minimum: $5</small>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Total yang harus dibayar (IDR)</label>
                                    <input type="text" class="form-control" id="totalIDR" readonly>
                                    <small class="text-muted">Sudah termasuk biaya admin 3%</small>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Deskripsi Pembelian *</label>
                                <textarea class="form-control" name="purchase_description" rows="3" required
                                          placeholder="Jelaskan apa yang akan dibeli (misal: domain hosting, software, dll)"></textarea>
                            </div>
                            
                            <!-- Shipping Info (if needed) -->
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="needShipping" name="need_shipping">
                                    <label class="form-check-label" for="needShipping">
                                        Memerlukan alamat pengiriman
                                    </label>
                                </div>
                            </div>
                            
                            <div id="shippingInfo" style="display: none;">
                                <div class="card bg-light mb-3">
                                    <div class="card-body">
                                        <h6 class="card-title">📍 Alamat Pengiriman</h6>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Nama Penerima</label>
                                                <input type="text" class="form-control" name="shipping_name">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Nomor HP</label>
                                                <input type="tel" class="form-control" name="shipping_phone">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Alamat Lengkap</label>
                                            <textarea class="form-control" name="shipping_address" rows="2"></textarea>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Kota</label>
                                                <input type="text" class="form-control" name="shipping_city">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Provinsi</label>
                                                <input type="text" class="form-control" name="shipping_province">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Kode Pos</label>
                                                <input type="text" class="form-control" name="shipping_zipcode">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Account Info -->
                            <div class="mb-3">
                                <label class="form-label">Login/Account Info (jika diperlukan)</label>
                                <textarea class="form-control" name="account_info" rows="2" 
                                          placeholder="Username, email, atau info login lainnya (akan dijaga kerahasiaan)"></textarea>
                                <small class="text-muted">⚠️ Info sensitif akan dijaga kerahasiaan</small>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Catatan Tambahan</label>
                                <textarea class="form-control" name="notes" rows="2" 
                                          placeholder="Instruksi khusus atau catatan lainnya"></textarea>
                            </div>
                            
                            <!-- Summary -->
                            <div class="card bg-light mb-3">
                                <div class="card-body">
                                    <h6>📋 Ringkasan Pembayaran:</h6>
                                    <div id="paymentSummary">
                                        <small class="text-muted">Isi jumlah USD untuk melihat ringkasan</small>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Process Steps -->
                            <div class="card border-info mb-3">
                                <div class="card-body">
                                    <h6 class="text-info">📝 Proses Pembayaran:</h6>
                                    <ol class="small mb-0">
                                        <li>Submit form ini</li>
                                        <li>Kami konfirmasi total dan info rekening</li>
                                        <li>Transfer sesuai nominal yang diminta</li>
                                        <li>Kami proses pembayaran PayPal</li>
                                        <li>Bukti pembayaran dikirim ke Anda</li>
                                    </ol>
                                </div>
                            </div>
                            
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-warning btn-lg">
                                    🚀 Submit Request Pembayaran
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
                        <h6 class="text-warning">💬 Butuh Konsultasi?</h6>
                        <p class="mb-2">Tidak yakin dengan proses? Hubungi kami dulu:</p>
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
 * Payment Service Form Calculator
 * Developer: Dendi Ainul Alam - 082390840007
 */

const baseRate = <?= $current_rate['buy_rate'] ?>;
const adminFee = 0.03; // 3%

document.getElementById('usdAmount').addEventListener('input', function() {
    calculatePaymentTotal();
});

document.getElementById('needShipping').addEventListener('change', function() {
    document.getElementById('shippingInfo').style.display = 
        this.checked ? 'block' : 'none';
});

function calculatePaymentTotal() {
    const usdAmount = parseFloat(document.getElementById('usdAmount').value) || 0;
    const baseTotal = usdAmount * baseRate;
    const adminCost = baseTotal * adminFee;
    const totalIDR = baseTotal + adminCost;
    
    document.getElementById('totalIDR').value = 
        usdAmount > 0 ? 'Rp ' + new Intl.NumberFormat('id-ID').format(totalIDR) : '';
    
    updatePaymentSummary(usdAmount, baseTotal, adminCost, totalIDR);
}

function updatePaymentSummary(usdAmount, baseTotal, adminCost, totalIDR) {
    const summaryDiv = document.getElementById('paymentSummary');
    
    if (usdAmount >= 5) {
        summaryDiv.innerHTML = `
            <div class="row small">
                <div class="col-sm-6"><strong>Jumlah USD:</strong> $${usdAmount}</div>
                <div class="col-sm-6"><strong>Rate:</strong> Rp ${new Intl.NumberFormat('id-ID').format(baseRate)}</div>
                <div class="col-sm-6"><strong>Subtotal:</strong> Rp ${new Intl.NumberFormat('id-ID').format(baseTotal)}</div>
                <div class="col-sm-6"><strong>Biaya Admin (3%):</strong> Rp ${new Intl.NumberFormat('id-ID').format(adminCost)}</div>
                <div class="col-12 mt-2 pt-2 border-top">
                    <strong>Total Transfer:</strong> <span class="text-warning fw-bold fs-6">Rp ${new Intl.NumberFormat('id-ID').format(totalIDR)}</span>
                </div>
            </div>
        `;
    } else if (usdAmount > 0) {
        summaryDiv.innerHTML = `<small class="text-danger">Minimum transaksi: $5</small>`;
    } else {
        summaryDiv.innerHTML = `<small class="text-muted">Isi jumlah USD untuk melihat ringkasan</small>`;
    }
}

// Form submission
document.getElementById('paymentServiceForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const usdAmount = parseFloat(document.getElementById('usdAmount').value);
    if (usdAmount < 5) {
        alert('Minimum transaksi adalah $5');
        return;
    }
    
    const paymentUrl = document.querySelector('[name="payment_url"]').value;
    const description = document.querySelector('[name="purchase_description"]').value;
    
    if (!paymentUrl || !description) {
        alert('Mohon isi semua field yang wajib');
        return;
    }
    
    // Simulate form submission
    alert('Request pembayaran berhasil dikirim! Kami akan segera menghubungi Anda.');
    
    // Redirect to WhatsApp
    const phone = '6282390840007';
    const message = `Halo, saya butuh jasa bayar PayPal:
- Jumlah: $${usdAmount}
- URL: ${paymentUrl}
- Deskripsi: ${description}`;
    
    window.open(`https://wa.me/${phone}?text=${encodeURIComponent(message)}`, '_blank');
});
</script>
<?= $this->endSection() ?>
