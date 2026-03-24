<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Search extends BaseController
{
    public function index()
    {
        $q = trim($this->request->getGet('q') ?? '');
        $data['q'] = $q;
        $data['results'] = [];

        if (!empty($q)) {
            $model = new ProductModel();
            $data['results'] = $model
                ->groupStart()
                    ->like('name', $q)
                    ->orLike('description', $q)
                ->groupEnd()
                ->where('status', 'active')
                ->findAll();
        }

        return view('search_view', $data);
    }
}