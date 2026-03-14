<?php

namespace App\Controllers;

class Storefront extends BaseController
{
    public function index()
    {
        return view('storefront_view');
    }
}