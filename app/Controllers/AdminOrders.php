<?php namespace App\Controllers;

use App\Models\OrderModel;

class AdminOrders extends BaseController
{
    public function index()
    {
        $model = new OrderModel();

        $data = [
            'orders' => $model->orderBy('created_at', 'DESC')->findAll(),
        ];

        return view('admin_orders', $data);
    }

public function view($id = null)
{
    $model = new OrderModel();
    $data = [
        'order' => $model->find($id),
    ];
    return view('admin_order_view', $data);
}
}