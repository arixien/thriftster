<?php

namespace App\Controllers;

use App\Models\CatalogModel;

class Catalog extends BaseController
{
    public function index()
    {
        $model = new CatalogModel();

        $category = $this->request->getGet('category');
        $sort     = $this->request->getGet('sort');

        $data['products']  = $model->getProducts($category, $sort);
        $data['category']  = $category;

        return view('catalog_view', $data);
    }
}