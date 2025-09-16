<?php
/**
 * PayPal Trading Website - Admin Layout
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
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Admin Dashboard' ?></title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Admin CSS -->
    <style>
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .sidebar .nav-link {
            color: rgba(255,255,255,0.8);
            padding: 12px 20px;
            margin: 5px 10px;
            border-radius: 8px;
            transition: all 0.3s;
        }
        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            color: white;
            background: rgba(255,255,255,0.2);
        }
        .main-content {
            background: #f8f9fa;
            min-height: 100vh;
        }
        .stats-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }
        .stats-card:hover {
            transform: translateY(-2px);
        }
        .developer-watermark {
            position: fixed;
            bottom: 10px;
            right: 10px;
            background: rgba(0,0,0,0.8);
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 0.7rem;
            z-index: 1000;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 sidebar p-0">
                <div class="p-3">
                    <h4 class="text-white mb-4">
                        <i class="me-2">⚡</i>Admin Panel
                    </h4>
                    
                    <nav class="nav flex-column">
                        <a href="<?= base_url('admin') ?>" class="nav-link <?= (uri_string() == 'admin') ? 'active' : '' ?>">
                            <i class="me-2">📊</i>Dashboard
                        </a>
                        <a href="<?= base_url('admin/orders') ?>" class="nav-link <?= (uri_string() == 'admin/orders') ? 'active' : '' ?>">
                            <i class="me-2">📋</i>Kelola Orders
                        </a>
                        <a href="<?= base_url('admin/rates') ?>" class="nav-link <?= (uri_string() == 'admin/rates') ? 'active' : '' ?>">
                            <i class="me-2">💱</i>Kelola Rate
                        </a>
                        <a href="<?= base_url('admin/cms') ?>" class="nav-link <?= (uri_string() == 'admin/cms') ? 'active' : '' ?>">
                            <i class="me-2">📝</i>Kelola Konten
                        </a>
                        
                        <hr class="text-white-50 my-3">
                        
                        <a href="<?= base_url('/') ?>" class="nav-link" target="_blank">
                            <i class="me-2">🌐</i>Lihat Website
                        </a>
                        <a href="#" class="nav-link" onclick="logout()">
                            <i class="me-2">🚪</i>Logout
                        </a>
                    </nav>
                </div>
            </div>
            
            <!-- Main Content -->
            <div class="col-md-9 col-lg-10 main-content p-0">
                <!-- Top Bar -->
                <div class="bg-white shadow-sm p-3 mb-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><?= $title ?? 'Dashboard' ?></h5>
                        <div class="d-flex align-items-center">
                            <span class="text-muted me-3">
                                <i class="me-1">🕒</i><?= date('d M Y H:i') ?>
                            </span>
                            <span class="badge bg-success">
                                <i class="me-1">👤</i>Admin
                            </span>
                        </div>
                    </div>
                </div>
                
                <!-- Page Content -->
                <div class="p-3">
                    <?= $this->renderSection('content') ?>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Developer Watermark -->
    <div class="developer-watermark">
        💻 Admin by Dendi Ainul Alam
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
    function logout() {
        if(confirm('Yakin ingin logout?')) {
            alert('Logout berhasil!');
            window.location.href = '<?= base_url('/') ?>';
        }
    }
    </script>
    
    <?= $this->renderSection('scripts') ?>
</body>
</html>
