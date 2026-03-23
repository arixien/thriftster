<?php
namespace App\Controllers;

class Cart extends BaseController
{
    public function index()
    {
        return view('cart');
    }

    public function add()
    {
        $product_id = $this->request->getPost('product_id');
        $quantity   = (int)$this->request->getPost('quantity') ?: 1;
        $action     = $this->request->getPost('action');

        $cart = session()->get('cart') ?? [];

        if (isset($cart[$product_id])) {
            $cart[$product_id]['quantity'] += $quantity;
        } else {
            $cart[$product_id] = [
                'product_id' => $product_id,
                'quantity'   => $quantity,
            ];
        }

        session()->set('cart', $cart);
        session()->set('cart_count', array_sum(array_column($cart, 'quantity')));

        if ($action === 'buy') {
            return redirect()->to('/checkout');
        }

        return redirect()->back()->with('success', 'Item added to cart!');
    }

    public function remove($product_id)
    {
        $cart = session()->get('cart') ?? [];
        unset($cart[$product_id]);
        session()->set('cart', $cart);
        session()->set('cart_count', array_sum(array_column($cart, 'quantity')));
        return redirect()->to('/cart');
    }
}