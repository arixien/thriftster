<?php

namespace App\Controllers;

class Wishlist extends BaseController
{
    public function index()
    {
        return view('wishlist_view');
    }
}
