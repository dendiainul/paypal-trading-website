<?php
/**
 * PayPal Trading Website - Admin Rate Management
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

<!-- Current Rate Display -->
<div class="row mb-4">
    <div class="col-md-6">
        <div class="card border-primary">
            <div class="card-header bg-primary text-white">
                <h6 class="mb-0">💳 Current Buy Rate</h6>
            </div>
            <div class="card-body text-center">
                <h2 class="text-primary">Rp <?= number_format($current_rate['buy_rate']) ?></h2>
                <small class="text-muted">Per 1 USD</small>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card border-success">
            <div class="card-header bg-success text-white">
                <h6 class="mb-0">💰 Current Sell Rate</h6>
            </div>
            <div class="card-body text-center">
                <h2 class="text-success">Rp <?= number_format($current_rate['sell_rate']) ?></h2>
                <small class="text-muted">Per 1 USD</small>
            </div>
        </div>
    </div>
</div>

<!-- Update Rate Form -->
<div class="card mb-4">
    <div class="card-header bg-warning text-dark">
        <h6 class="mb-0">⚡ Update Rates</h6>
    </div>
    <div class="card-body">
        <form id="updateRateForm">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Buy Rate (IDR per USD) *</label>
                    <input type="number" class="form-control" id="buyRate" name="buy_rate" 
                           value="<?= $current_rate['buy_rate'] ?>" step="1" required>
                    <small class="text-muted">Rate untuk top up PayPal</small>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Sell Rate (IDR per USD) *</label>
                    <input type="number" class="form-control" id="sellRate" name="sell_rate" 
                           value="<?= $current_rate['sell_rate'] ?>" step="1" required>
                    <small class="text-muted">Rate untuk jual saldo PayPal</small>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Quick Adjust</label>
                    <div class="btn-group w-100">
                        <button type="button" class="btn btn-outline-success btn-sm" onclick="adjustRate(50)">+50</button>
                        <button type="button" class="btn btn-outline-success btn-sm" onclick="adjustRate(100)">+100</button>
                        <button type="button" class="btn btn-outline-danger btn-sm" onclick="adjustRate(-50)">-50</button>
                        <button type="button" class="btn btn-outline-danger btn-sm" onclick="adjustRate(-100)">-100</button>
                    </div>
                </div>
            </div>
            
            <!-- Rate Preview -->
            <div class="card bg-light mb-3">
                <div class="card-body">
                    <h6>📊 Preview Rate Changes:</h6>
                    <div class="row" id="ratePreview">
                        <div class="col-md-6">
                            <small>Buy Rate: <span class="fw-bold" id="previewBuyRate">Rp <?= number_format($current_rate['buy_rate']) ?></span></small>
                        </div>
                        <div class="col-md-6">
                            <small>Sell Rate: <span class="fw-bold" id="previewSellRate">Rp <?= number_format($current_rate['sell_rate']) ?></span></small>
                        </div>
                        <div class="col-12 mt-2">
                            <small class="text-info">Spread: <span id="spreadAmount">Rp <?= number_format($current_rate['buy_rate'] - $current_rate['sell_rate']) ?></span></small>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-8 mb-3">
                    <label class="form-label">Update Note</label>
                    <input type="text" class="form-control" name="update_note" 
                           placeholder="Alasan update rate (opsional)">
                </div>
                <div class="col-md-4 mb-3 d-flex align-items-end">
                    <button type="submit" class="btn btn-warning w-100">
                        <i class="me-2">💾</i>Update Rates
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Rate History -->
<div class="card mb-4">
    <div class="card-header bg-info text-white">
        <h6 class="mb-0">📈 Rate History</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>Date/Time</th>
                        <th>Buy Rate</th>
                        <th>Sell Rate</th>
                        <th>Spread</th>
                        <th>Note</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><small>16 Sep 2024 10:30</small></td>
                        <td>Rp 15,850</td>
                        <td>Rp 15,650</td>
                        <td>Rp 200</td>
                        <td><small>Daily rate update</small></td>
                        <td>
                            <button class="btn btn-outline-primary btn-sm" onclick="restoreRate(15850, 15650)">
                                <i>🔄</i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td><small>15 Sep 2024 15:20</small></td>
                        <td>Rp 15,800</td>
                        <td>Rp 15,600</td>
                        <td>Rp 200</td>
                        <td><small>USD strengthening</small></td>
                        <td>
                            <button class="btn btn-outline-primary btn-sm" onclick="restoreRate(15800, 15600)">
                                <i>🔄</i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td><small>15 Sep 2024 09:00</small></td>
                        <td>Rp 15,750</td>
                        <td>Rp 15,550</td>
                        <td>Rp 200</td>
                        <td><small>Market adjustment</small></td>
                        <td>
                            <button class="btn btn-outline-primary btn-sm" onclick="restoreRate(15750, 15550)">
                                <i>🔄</i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Rate API Integration -->
<div class="card">
    <div class="card-header bg-secondary text-white">
        <h6 class="mb-0">🔗 External Rate Sources</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="card bg-light">
                    <div class="card-body">
                        <h6>Bank Indonesia Rate</h6>
                        <p class="mb-2">USD/IDR: <strong>Rp 15,782</strong></p>
                        <button class="btn btn-outline-primary btn-sm" onclick="fetchBIRate()">
                            <i class="me-1">🔄</i>Refresh
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="card bg-light">
                    <div class="card-body">
                        <h6>Market Rate (xe.com)</h6>
                        <p class="mb-2">USD/IDR: <strong>Rp 15,798</strong></p>
                        <button class="btn btn-outline-primary btn-sm" onclick="fetchMarketRate()">
                            <i class="me-1">🔄</i>Refresh
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="alert alert-info">
            <small>
                <i class="me-1">💡</i>
                <strong>Tip:</strong> Gunakan rate external sebagai referensi. 
                Selalu tambahkan margin untuk profit dan cover fluktuasi.
            </small>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
/**
 * Admin Rate Management JavaScript
 * Developer: Dendi Ainul Alam - 082390840007
 */

// Current rates for calculation
let currentBuyRate = <?= $current_rate['buy_rate'] ?>;
let currentSellRate = <?= $current_rate['sell_rate'] ?>;

// Update preview when rates change
document.getElementById('buyRate').addEventListener('input', updatePreview);
document.getElementById('sellRate').addEventListener('input', updatePreview);

function updatePreview() {
    const buyRate = parseInt(document.getElementById('buyRate').value) || 0;
    const sellRate = parseInt(document.getElementById('sellRate').value) || 0;
    const spread = buyRate - sellRate;
    
    document.getElementById('previewBuyRate').textContent = 'Rp ' + buyRate.toLocaleString('id-ID');
    document.getElementById('previewSellRate').textContent = 'Rp ' + sellRate.toLocaleString('id-ID');
    document.getElementById('spreadAmount').textContent = 'Rp ' + spread.toLocaleString('id-ID');
    
    // Warning if spread too low
    if (spread < 100) {
        document.getElementById('spreadAmount').className = 'text-danger fw-bold';
    } else if (spread < 200) {
        document.getElementById('spreadAmount').className = 'text-warning fw-bold';
    } else {
        document.getElementById('spreadAmount').className = 'text-success fw-bold';
    }
}

function adjustRate(amount) {
    const buyInput = document.getElementById('buyRate');
    const sellInput = document.getElementById('sellRate');
    
    buyInput.value = parseInt(buyInput.value) + amount;
    sellInput.value = parseInt(sellInput.value) + amount;
    
    updatePreview();
}

function restoreRate(buyRate, sellRate) {
    if (confirm(`Restore rate to Buy: Rp ${buyRate.toLocaleString('id-ID')}, Sell: Rp ${sellRate.toLocaleString('id-ID')}?`)) {
        document.getElementById('buyRate').value = buyRate;
        document.getElementById('sellRate').value = sellRate;
        updatePreview();
    }
}

function fetchBIRate() {
    console.log('Fetching Bank Indonesia rate...');
    alert('Fetching BI rate... (Demo mode)');
}

function fetchMarketRate() {
    console.log('Fetching market rate...');
    alert('Fetching market rate... (Demo mode)');
}

// Form submission
document.getElementById('updateRateForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const buyRate = document.getElementById('buyRate').value;
    const sellRate = document.getElementById('sellRate').value;
    const note = document.querySelector('[name="update_note"]').value;
    
    if (confirm(`Update rates to:\nBuy: Rp ${parseInt(buyRate).toLocaleString('id-ID')}\nSell: Rp ${parseInt(sellRate).toLocaleString('id-ID')}\n\nConfirm?`)) {
        console.log('Updating rates:', { buyRate, sellRate, note });
        alert('Rates updated successfully! (Demo mode)');
        
        // Update current rates
        currentBuyRate = parseInt(buyRate);
        currentSellRate = parseInt(sellRate);
    }
});

// Real-time rate monitor (demo)
setInterval(() => {
    const variation = Math.floor(Math.random() * 20) - 10;
    console.log('Rate variation:', variation);
}, 60000);
</script>
<?= $this->endSection() ?>
