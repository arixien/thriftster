<?php namespace App\Controllers;

use CodeIgniter\Controller;

class AdminProducts extends BaseController
{
    public function index()
    {
        return view('admin_products');
    }

    public function add()
    {
        return view('admin_product_form', ['mode' => 'add']);
    }

    public function edit()
    {
        return view('admin_product_form', ['mode' => 'edit']);
    }
}
