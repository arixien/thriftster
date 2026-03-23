<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Storefront extends BaseController
{
    public function index()
    {
        $model = new ProductModel();
        $data['new_releases'] = $model->orderBy('created_at', 'DESC')->findAll(8);
        return view('storefront_view', $data);
    }
}