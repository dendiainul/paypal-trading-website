<?php
/**
 * PayPal Trading Website - Admin Controller
 * 
 * @author    Dendi Ainul Alam
 * @contact   082390840007
 * @website   Web & Android Developer
 * @github    https://github.com/dendiainul
 * @created   2024-09-16
 * 
 * All rights reserved.
 */

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Admin Dashboard - PayPal Trading',
            'stats' => $this->getDashboardStats()
        ];
        
        return view('admin/dashboard', $data);
    }
    
    public function orders()
    {
        $data = [
            'title' => 'Kelola Orders - Admin',
            'orders' => $this->getRecentOrders()
        ];
        
        return view('admin/orders', $data);
    }
    
    public function rates()
    {
        $data = [
            'title' => 'Kelola Rate - Admin',
            'current_rate' => $this->getCurrentRate()
        ];
        
        return view('admin/rates', $data);
    }
    
    public function cms()
    {
        $data = [
            'title' => 'Kelola Konten - Admin',
            'content' => $this->getCmsContent()
        ];
        
        return view('admin/cms', $data);
    }
    
    private function getDashboardStats()
    {
        // Simulasi data untuk demo
        return [
            'total_orders' => 156,
            'pending_orders' => 12,
            'completed_orders' => 144,
            'total_revenue' => 45250000,
            'monthly_revenue' => 8750000,
            'active_users' => 89
        ];
    }
    
    private function getRecentOrders()
    {
        // Simulasi data orders untuk demo
        return [
            [
                'id' => 1,
                'customer' => 'John Doe',
                'type' => 'buy_paypal',
                'amount_usd' => 100,
                'amount_idr' => 1585000,
                'status' => 'pending',
                'created_at' => '2024-09-16 10:30:00'
            ],
            [
                'id' => 2,
                'customer' => 'Jane Smith',
                'type' => 'sell_paypal',
                'amount_usd' => 50,
                'amount_idr' => 782500,
                'status' => 'completed',
                'created_at' => '2024-09-16 09:15:00'
            ],
            [
                'id' => 3,
                'customer' => 'Ahmad Rahman',
                'type' => 'payment_service',
                'amount_usd' => 25,
                'amount_idr' => 407625,
                'status' => 'processing',
                'created_at' => '2024-09-16 08:45:00'
            ]
        ];
    }
    
    private function getCurrentRate()
    {
        return [
            'buy_rate' => 15850,
            'sell_rate' => 15650,
            'last_update' => date('Y-m-d H:i:s')
        ];
    }
    
    private function getCmsContent()
    {
        return [
            [
                'id' => 1,
                'section' => 'faq',
                'title' => 'Bagaimana cara order?',
                'content' => 'Anda bisa menghubungi kami melalui WhatsApp atau mengisi form order di website.',
                'is_active' => true
            ],
            [
                'id' => 2,
                'section' => 'testimonial',
                'title' => 'John Doe',
                'content' => 'Pelayanan sangat memuaskan, rate terbaik!',
                'is_active' => true
            ]
        ];
    }
}
