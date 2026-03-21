<?php namespace App\Controllers;

use CodeIgniter\Controller;

class AdminOrders extends BaseController
{
    public function index()
    {
        return view('admin_orders');
    }

    public function view()
    {
        return view('admin_order_view');
    }
}
