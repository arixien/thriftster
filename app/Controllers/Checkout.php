<?php
namespace App\Controllers;

class Checkout extends BaseController
{
    public function index()
    {
        $cart = session()->get('cart') ?? [];
        if (empty($cart)) {
            return redirect()->to('/cart');
        }
        return view('checkout');
    }

    public function place()
    {
        helper(['form']);
        $db = \Config\Database::connect();

        $cart = session()->get('cart') ?? [];
        if (empty($cart)) {
            return redirect()->to('/cart');
        }

        // Calculate totals
        $model    = new \App\Models\ProductModel();
        $subtotal = 0;
        $items    = [];

        foreach ($cart as $product_id => $item) {
            $product = $model->find($product_id);
            if ($product) {
                $line_total = $product['price'] * $item['quantity'];
                $subtotal  += $line_total;
                $items[]    = [
                    'product'  => $product,
                    'quantity' => $item['quantity'],
                    'price'    => $product['price'],
                    'subtotal' => $line_total,
                ];
            }
        }

        $delivery_fee = 0;
        $total_amount = $subtotal + $delivery_fee;

        // Generate order number
        $order_number = 'ORD-' . strtoupper(uniqid());

        // Insert order
        $db->table('orders')->insert([
            'order_number'       => $order_number,
            'buyer_id'           => session()->get('user_id'),
            'status'             => 'pending',
            'subtotal'           => $subtotal,
            'delivery_fee'       => $delivery_fee,
            'total_amount'       => $total_amount,
            'delivery_method'    => $this->request->getPost('shipping'),
            'payment_method'     => $this->request->getPost('payment_method'),
            'shipping_first_name'=> $this->request->getPost('first_name'),
            'shipping_last_name' => $this->request->getPost('last_name'),
            'shipping_email'     => $this->request->getPost('email'),
            'shipping_phone'     => $this->request->getPost('phone'),
            'shipping_address'   => $this->request->getPost('address'),
            'shipping_barangay'  => '',
            'shipping_city'      => $this->request->getPost('city'),
            'shipping_region'    => $this->request->getPost('province'),
            'shipping_postal_code'=> $this->request->getPost('zip'),
            'created_at'         => date('Y-m-d H:i:s'),
            'updated_at'         => date('Y-m-d H:i:s'),
        ]);

        $order_id = $db->insertID();

        // Insert order items
        foreach ($items as $item) {
            $db->table('order_items')->insert([
                'order_id'      => $order_id,
                'product_id'    => $item['product']['id'],
                'variant_id'    => null,
                'quantity'      => $item['quantity'],
                'unit_price'    => $item['price'],
                'subtotal'      => $item['subtotal'],
                'snapshot_name' => $item['product']['name'],
                'snapshot_color'=> null,
                'snapshot_size' => null,
            ]);
        }

        // Clear cart
        session()->remove('cart');
        session()->remove('cart_count');

        return redirect()->to('/order/success')->with('order_number', $order_number);
    }

    public function success()
    {
        return view('order_success');
    }
}