/**
 * PayPal Trading Website - Database Schema
 * 
 * @author    Dendi Ainul Alam
 * @contact   082390840007
 * @website   Web & Android Developer
 * @github    https://github.com/dendiainul
 * @created   2024-09-16
 * 
 * All rights reserved.
 */

-- Database: paypal_trading_db

-- Users table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    full_name VARCHAR(100) NOT NULL,
    phone VARCHAR(20),
    role ENUM('admin', 'user') DEFAULT 'user',
    status ENUM('active', 'inactive', 'banned') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Orders table
CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    order_type ENUM('buy_paypal', 'sell_paypal', 'payment_service') NOT NULL,
    amount_usd DECIMAL(10,2) NOT NULL,
    amount_idr DECIMAL(15,2) NOT NULL,
    rate_used DECIMAL(10,2) NOT NULL,
    status ENUM('pending', 'processing', 'completed', 'cancelled') DEFAULT 'pending',
    payment_proof VARCHAR(255),
    admin_notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Rates table
CREATE TABLE rates (
    id INT AUTO_INCREMENT PRIMARY KEY,
    buy_rate DECIMAL(10,2) NOT NULL,
    sell_rate DECIMAL(10,2) NOT NULL,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- CMS Content table
CREATE TABLE cms_content (
    id INT AUTO_INCREMENT PRIMARY KEY,
    section VARCHAR(50) NOT NULL,
    title VARCHAR(200),
    content TEXT,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert default data
INSERT INTO rates (buy_rate, sell_rate) VALUES (15850, 15650);

INSERT INTO cms_content (section, title, content) VALUES 
('faq', 'Bagaimana cara order?', 'Anda bisa menghubungi kami melalui WhatsApp atau mengisi form order di website.'),
('faq', 'Berapa lama proses transaksi?', 'Biasanya 5-15 menit setelah pembayaran dikonfirmasi.'),
('testimonial', 'John Doe', 'Pelayanan sangat memuaskan, rate terbaik!'),
('about', 'Mengapa Pilih Kami', 'Kami telah berpengalaman 5+ tahun dalam bisnis PayPal trading dengan ribuan transaksi sukses.');
