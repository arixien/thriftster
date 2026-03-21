<?php

namespace App\Controllers;

class Orders extends BaseController
{
    public function index()
    {
        return view('orders_view');
    }
}
