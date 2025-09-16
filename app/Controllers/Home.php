<?php
/**
 * PayPal Trading Website - Home Controller
 * 
 * @author    Dendi Ainul Alam
 * @contact   082390840007
 * @website   Web & Android Developer
 * @github    https://github.com/dendiainul
 * @created   <?= date('Y-m-d') ?>
 * 
 * All rights reserved.
 */

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'PayPal Trading - Jual Beli Saldo PayPal Terpercaya',
            'current_rate' => $this->getCurrentRate()
        ];
        
        return view('landing/index', $data);
    }
    
    private function getCurrentRate()
    {
        // Simulasi rate untuk demo
        // Nanti akan diganti dengan API real
        return [
            'buy_rate' => 15850,
            'sell_rate' => 15650,
            'last_update' => date('Y-m-d H:i:s')
        ];
    }
}
