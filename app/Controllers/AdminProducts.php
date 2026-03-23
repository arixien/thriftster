<?php

namespace App\Controllers;

use App\Models\ProductModel;

class AdminProducts extends BaseController
{
    protected $model;

  public function __construct()
{
    $this->model = new ProductModel();
    $this->db    = \Config\Database::connect();
}   

    public function index()
    {
        $data['all_products'] = $this->model->findAll();
        return view('admin_products', $data);
    }

public function add()
{
    return view('admin_product_form', ['mode' => 'add', 'product' => []]); // ✅
}

    public function edit($id = null)
    {
        $product = $this->model->find($id);

        if (!$product) {
            return redirect()->to('admin/products')->with('error', 'Product not found.');
        }

        return view('admin_product_form', ['mode' => 'edit', 'product' => $product]);
    }

public function delete($id = null)
{
    $id = (int) $id;

    if ($id === 0) {
        return redirect()->to('/admin/products')->with('error', 'Invalid product ID.');
    }

    $this->db->table('products')->where('id', $id)->delete();
    return redirect()->to('/admin/products')->with('success', 'Product deleted.');
}
    public function store()
{
    $img_path = null;

    $img = $this->request->getFile('img');
    if ($img && $img->isValid() && !$img->hasMoved()) {
        $img_name = $img->getRandomName();
        $img->move(FCPATH . 'uploads/products', $img_name);
        $img_path = 'uploads/products/' . $img_name;
    }

    $this->model->insert([
        'name'      => $this->request->getPost('name'),
        'category'  => $this->request->getPost('category'),
        'price'     => $this->request->getPost('price'),
        'stock'     => $this->request->getPost('stock'),
        'condition' => $this->request->getPost('condition'),
        'status'    => $this->request->getPost('status'),
        'img'       => $img_path,
    ]);

    return redirect()->to('/admin/products')->with('success', 'Product added!');
}

public function update($id = null)
{
    $product  = $this->model->find($id);
    $img_path = $product['img'];

    $img = $this->request->getFile('img');
    if ($img && $img->isValid() && !$img->hasMoved()) {
        $img_name = $img->getRandomName();
        $img->move(FCPATH . 'uploads/products', $img_name);
        $img_path = 'uploads/products/' . $img_name;
    }

    $this->model->update($id, [
        'name'      => $this->request->getPost('name'),
        'category'  => $this->request->getPost('category'),
        'price'     => $this->request->getPost('price'),
        'stock'     => $this->request->getPost('stock'),
        'condition' => $this->request->getPost('condition'),
        'status'    => $this->request->getPost('status'),
        'img'       => $img_path,
    ]);

    return redirect()->to('/admin/products')->with('success', 'Product updated!');
}
}