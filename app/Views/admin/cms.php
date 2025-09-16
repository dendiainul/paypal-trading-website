<?php
/**
 * PayPal Trading Website - Admin CMS Management
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

<!-- Content Sections Tabs -->
<div class="card mb-4">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs" role="tablist">
            <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#faq-tab">
                    <i class="me-1">❓</i>FAQ
                </button>
            </li>
            <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#testimonial-tab">
                    <i class="me-1">⭐</i>Testimonials
                </button>
            </li>
            <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#about-tab">
                    <i class="me-1">ℹ️</i>About Us
                </button>
            </li>
            <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#contact-tab">
                    <i class="me-1">📞</i>Contact Info
                </button>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <div class="tab-content">
            <!-- FAQ Tab -->
            <div class="tab-pane fade show active" id="faq-tab">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6>Manage FAQ</h6>
                    <button class="btn btn-primary btn-sm" onclick="addNewFAQ()">
                        <i class="me-1">➕</i>Add FAQ
                    </button>
                </div>
                
                <div id="faqList">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="flex-grow-1">
                                    <h6 class="card-title">Bagaimana cara order?</h6>
                                    <p class="card-text">Anda bisa menghubungi kami melalui WhatsApp atau mengisi form order di website.</p>
                                    <span class="badge bg-success">Active</span>
                                </div>
                                <div class="btn-group btn-group-sm">
                                    <button class="btn btn-outline-primary" onclick="editContent(1, 'faq')">
                                        <i>✏️</i>
                                    </button>
                                    <button class="btn btn-outline-danger" onclick="deleteContent(1)">
                                        <i>🗑️</i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="flex-grow-1">
                                    <h6 class="card-title">Berapa lama proses transaksi?</h6>
                                    <p class="card-text">Biasanya 5-15 menit setelah pembayaran dikonfirmasi.</p>
                                    <span class="badge bg-success">Active</span>
                                </div>
                                <div class="btn-group btn-group-sm">
                                    <button class="btn btn-outline-primary" onclick="editContent(2, 'faq')">
                                        <i>✏️</i>
                                    </button>
                                    <button class="btn btn-outline-danger" onclick="deleteContent(2)">
                                        <i>🗑️</i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Testimonials Tab -->
            <div class="tab-pane fade" id="testimonial-tab">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6>Manage Testimonials</h6>
                    <button class="btn btn-primary btn-sm" onclick="addNewTestimonial()">
                        <i class="me-1">➕</i>Add Testimonial
                    </button>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-2">
                                    <img src="https://via.placeholder.com/40" class="rounded-circle me-2" alt="Avatar">
                                    <div>
                                        <h6 class="mb-0">John Doe</h6>
                                        <small class="text-muted">Customer</small>
                                    </div>
                                </div>
                                <p class="card-text">"Pelayanan sangat memuaskan, rate terbaik!"</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <span class="text-warning">⭐⭐⭐⭐⭐</span>
                                        <span class="badge bg-success ms-2">Active</span>
                                    </div>
                                    <div class="btn-group btn-group-sm">
                                        <button class="btn btn-outline-primary" onclick="editContent(3, 'testimonial')">
                                            <i>✏️</i>
                                        </button>
                                        <button class="btn btn-outline-danger" onclick="deleteContent(3)">
                                            <i>🗑️</i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-2">
                                    <img src="https://via.placeholder.com/40" class="rounded-circle me-2" alt="Avatar">
                                    <div>
                                        <h6 class="mb-0">Jane Smith</h6>
                                        <small class="text-muted">Customer</small>
                                    </div>
                                </div>
                                <p class="card-text">"Proses cepat dan aman, highly recommended!"</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <span class="text-warning">⭐⭐⭐⭐⭐</span>
                                        <span class="badge bg-success ms-2">Active</span>
                                    </div>
                                    <div class="btn-group btn-group-sm">
                                        <button class="btn btn-outline-primary" onclick="editContent(4, 'testimonial')">
                                            <i>✏️</i>
                                        </button>
                                        <button class="btn btn-outline-danger" onclick="deleteContent(4)">
                                            <i>🗑️</i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- About Us Tab -->
            <div class="tab-pane fade" id="about-tab">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6>About Us Content</h6>
                    <button class="btn btn-success btn-sm" onclick="saveAboutContent()">
                        <i class="me-1">💾</i>Save Changes
                    </button>
                </div>
                
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Company Description</label>
                        <textarea class="form-control" rows="5" id="companyDescription">
PayPal Trading adalah platform terpercaya untuk jual beli saldo PayPal di Indonesia. Kami telah melayani ribuan customer dengan kepuasan 99.8%. 

Dengan pengalaman 5+ tahun di bidang money changer digital, kami memahami kebutuhan Anda akan transaksi PayPal yang cepat, aman, dan dengan rate terbaik.
                        </textarea>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Why Choose Us</label>
                        <textarea class="form-control" rows="4" id="whyChooseUs">
- Rate terbaik di Indonesia
- Proses 5-15 menit
- Customer service 24/7
- Transaksi aman & terpercaya
- Berpengalaman 5+ tahun
                        </textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Our Services</label>
                        <textarea class="form-control" rows="4" id="ourServices">
- Top Up Saldo PayPal
- Jual Saldo PayPal ke Rupiah
- Jasa Bayar PayPal
- Konsultasi PayPal
- Support 24/7
                        </textarea>
                    </div>
                </div>
            </div>
            
            <!-- Contact Info Tab -->
            <div class="tab-pane fade" id="contact-tab">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6>Contact Information</h6>
                    <button class="btn btn-success btn-sm" onclick="saveContactInfo()">
                        <i class="me-1">💾</i>Save Changes
                    </button>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">WhatsApp Number</label>
                        <input type="text" class="form-control" value="082390840007" id="whatsappNumber">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Business Email</label>
                        <input type="email" class="form-control" value="info@paypaltrading.com" id="businessEmail">
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Business Hours</label>
                        <input type="text" class="form-control" value="24/7 Online" id="businessHours">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Response Time</label>
                        <input type="text" class="form-control" value="< 5 menit" id="responseTime">
                    </div>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <textarea class="form-control" rows="2" id="businessAddress">
Jakarta, Indonesia (Online Service)
                    </textarea>
                </div>
                
                <div class="card bg-light">
                    <div class="card-body">
                        <h6>Social Media Links</h6>
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label class="form-label small">Instagram</label>
                                <input type="url" class="form-control form-control-sm" placeholder="https://instagram.com/...">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label class="form-label small">Telegram</label>
                                <input type="url" class="form-control form-control-sm" placeholder="https://t.me/...">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content Editor Modal -->
<div class="modal fade" id="contentEditorModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">✏️ Edit Content</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="contentEditorForm">
                    <input type="hidden" id="contentId">
                    <input type="hidden" id="contentType">
                    
                    <div class="mb-3">
                        <label class="form-label">Title/Question</label>
                        <input type="text" class="form-control" id="contentTitle" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Content/Answer</label>
                        <textarea class="form-control" rows="4" id="contentBody" required></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="contentActive" checked>
                            <label class="form-check-label" for="contentActive">
                                Active (visible on website)
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="saveContent()">
                    <i class="me-1">💾</i>Save Changes
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Live Preview -->
<div class="card">
    <div class="card-header bg-success text-white">
        <h6 class="mb-0">👁️ Live Preview</h6>
    </div>
    <div class="card-body">
        <div class="text-center mb-3">
            <a href="<?= base_url('/') ?>" target="_blank" class="btn btn-outline-success">
                <i class="me-1">🌐</i>View Live Website
            </a>
            <button class="btn btn-outline-primary ms-2" onclick="refreshPreview()">
                <i class="me-1">🔄</i>Refresh Preview
            </button>
        </div>
        
        <div class="alert alert-info">
            <small>
                <i class="me-1">💡</i>
                <strong>Tip:</strong> Perubahan akan langsung terlihat di website setelah disave.
                Gunakan preview untuk memastikan content terlihat baik.
            </small>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
/**
 * Admin CMS Management JavaScript
 * Developer: Dendi Ainul Alam - 082390840007
 */

function addNewFAQ() {
    document.getElementById('contentId').value = '';
    document.getElementById('contentType').value = 'faq';
    document.getElementById('contentTitle').value = '';
    document.getElementById('contentBody').value = '';
    document.getElementById('contentActive').checked = true;
    
    new bootstrap.Modal(document.getElementById('contentEditorModal')).show();
}

function addNewTestimonial() {
    document.getElementById('contentId').value = '';
    document.getElementById('contentType').value = 'testimonial';
    document.getElementById('contentTitle').value = '';
    document.getElementById('contentBody').value = '';
    document.getElementById('contentActive').checked = true;
    
    new bootstrap.Modal(document.getElementById('contentEditorModal')).show();
}

function editContent(id, type) {
    // Simulasi load content
    const sampleContent = {
        1: { title: 'Bagaimana cara order?', content: 'Anda bisa menghubungi kami melalui WhatsApp atau mengisi form order di website.' },
        2: { title: 'Berapa lama proses transaksi?', content: 'Biasanya 5-15 menit setelah pembayaran dikonfirmasi.' },
        3: { title: 'John Doe', content: 'Pelayanan sangat memuaskan, rate terbaik!' },
        4: { title: 'Jane Smith', content: 'Proses cepat dan aman, highly recommended!' }
    };
    
    const content = sampleContent[id];
    if (content) {
        document.getElementById('contentId').value = id;
        document.getElementById('contentType').value = type;
        document.getElementById('contentTitle').value = content.title;
        document.getElementById('contentBody').value = content.content;
        document.getElementById('contentActive').checked = true;
        
        new bootstrap.Modal(document.getElementById('contentEditorModal')).show();
    }
}

function saveContent() {
    const id = document.getElementById('contentId').value;
    const type = document.getElementById('contentType').value;
    const title = document.getElementById('contentTitle').value;
    const content = document.getElementById('contentBody').value;
    const active = document.getElementById('contentActive').checked;
    
    if (!title || !content) {
        alert('Please fill all required fields!');
        return;
    }
    
    console.log('Saving content:', { id, type, title, content, active });
    alert(`Content saved successfully! (Demo mode)`);
    
    // Close modal
    bootstrap.Modal.getInstance(document.getElementById('contentEditorModal')).hide();
    
    // Refresh content list
    setTimeout(() => {
        location.reload();
    }, 1000);
}

function deleteContent(id) {
    if (confirm('Are you sure you want to delete this content?')) {
        console.log('Deleting content ID:', id);
        alert('Content deleted! (Demo mode)');
        
        // Refresh page
        setTimeout(() => {
            location.reload();
        }, 1000);
    }
}

function saveAboutContent() {
    const description = document.getElementById('companyDescription').value;
    const whyChoose = document.getElementById('whyChooseUs').value;
    const services = document.getElementById('ourServices').value;
    
    console.log('Saving about content:', { description, whyChoose, services });
    alert('About Us content saved! (Demo mode)');
}

function saveContactInfo() {
    const whatsapp = document.getElementById('whatsappNumber').value;
    const email = document.getElementById('businessEmail').value;
    const hours = document.getElementById('businessHours').value;
    const response = document.getElementById('responseTime').value;
    const address = document.getElementById('businessAddress').value;
    
    console.log('Saving contact info:', { whatsapp, email, hours, response, address });
    alert('Contact information saved! (Demo mode)');
}

function refreshPreview() {
    console.log('Refreshing preview...');
    alert('Preview refreshed! (Demo mode)');
}

// Auto-save draft every 30 seconds
setInterval(() => {
    const title = document.getElementById('contentTitle')?.value;
    const content = document.getElementById('contentBody')?.value;
    
    if (title || content) {
        console.log('Auto-saving draft...');
    }
}, 30000);
</script>
<?= $this->endSection() ?>
