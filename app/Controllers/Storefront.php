<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Storefront extends BaseController
{
    public function index()
    {
        $model = new ProductModel();

        $promoBannerPath = 'assets/includes/promo_banner.png';

        $data = [
            'featured_new'        => $model->getNewArrivals(8),
            'promo_banner_path'   => $promoBannerPath,
            'promo_banner_exists' => file_exists(FCPATH . 'public/' . $promoBannerPath),
        ];

        return view('storefront_view', $data);
    }
}