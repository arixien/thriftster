<?php
namespace App\Controllers;
use App\Models\ProductModel;

class ProductsCatalog extends BaseController
{
    public function index()
    {
        $model = new ProductModel();
        $all_products = $model->findAll();

        return view('products_catalog_view', ['all_products' => $all_products]);
    }
}