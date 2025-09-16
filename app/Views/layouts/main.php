<?php
/**
 * PayPal Trading Website - Main Layout
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
    <title><?= $title ?? 'PayPal Trading' ?></title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <style>
        .rate-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        .hero-section {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            min-height: 80vh;
        }
        .footer {
            background: #2c3e50;
            color: white;
        }
        .developer-watermark {
            font-size: 0.8rem;
            opacity: 0.7;
            text-align: center;
            padding: 10px;
            background: #34495e;
            color: white;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">PayPal Trading</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#layanan">Layanan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#rate">Rate</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Kontak</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        <?= $this->renderSection('content') ?>
    </main>

    <!-- Footer -->
    <footer class="footer py-4">
        <div class="container text-center">
            <p>&copy; 2024 PayPal Trading. All rights reserved.</p>
        </div>
    </footer>
    
    <!-- Developer Watermark -->
    <div class="developer-watermark">
        💻 Developed by <strong>Dendi Ainul Alam</strong> | Web & Android Developer | 📱 082390840007
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <?= $this->renderSection('scripts') ?>
</body>
</html>

