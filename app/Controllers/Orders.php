<?php
namespace App\Controllers;

class Orders extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $user_id = session()->get('user_id');

        $orders = $db->table('orders')
                     ->where('buyer_id', $user_id)
                     ->orderBy('created_at', 'DESC')
                     ->get()
                     ->getResultArray();

        return view('orders_view', ['orders' => $orders]);
    }
}