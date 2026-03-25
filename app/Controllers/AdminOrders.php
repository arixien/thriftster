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
        $orderModel = new OrderModel();

        $order = $orderModel->find($id);

        if (!$order) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }


        $data = [
            'order'       => $order,
            'order_items' => $orderModel->getOrderItems($id),
        ];

        return view('admin_order_view', $data);
    }
}