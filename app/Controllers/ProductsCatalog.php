<?php

namespace App\Controllers;

class ProductsCatalog extends BaseController
{
    public function index()
    {
        return view('products_catalog_view');
    }
}   