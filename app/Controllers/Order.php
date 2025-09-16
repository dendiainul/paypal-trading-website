<?php
/**
 * PayPal Trading Website - Order Controller
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

class Order extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Order - PayPal Trading',
            'current_rate' => $this->getCurrentRate()
        ];
        
        return view('order/index', $data);
    }
    
    public function buyPaypal()
    {
        $data = [
            'title' => 'Top Up PayPal - PayPal Trading',
            'order_type' => 'buy',
            'current_rate' => $this->getCurrentRate()
        ];
        
        return view('order/form', $data);
    }
    
    public function sellPaypal()
    {
        $data = [
            'title' => 'Jual Saldo PayPal - PayPal Trading',
            'order_type' => 'sell',
            'current_rate' => $this->getCurrentRate()
        ];
        
        return view('order/form', $data);
    }
    
    public function paymentService()
    {
        $data = [
            'title' => 'Jasa Bayar PayPal - PayPal Trading',
            'order_type' => 'payment',
            'current_rate' => $this->getCurrentRate()
        ];
        
        return view('order/payment_form', $data);
    }
    
    private function getCurrentRate()
    {
        // Nanti akan ambil dari database
        return [
            'buy_rate' => 15850,
            'sell_rate' => 15650,
            'last_update' => date('Y-m-d H:i:s')
        ];
    }
}
