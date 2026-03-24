<?php
namespace App\Controllers;
use App\Models\ProductModel;

class ProductDetail extends BaseController
{
    public function index($id)
    {
        helper(['form']);  // add this
        
        $model = new ProductModel();
        $data['product'] = $model->find($id);

        if (!$data['product']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Product not found");
        }

        return view('product_detail', $data);
    }
}