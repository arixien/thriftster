<?php

namespace App\Controllers;

use App\Models\UserModel;

class Profile extends BaseController
{
    public function index()
    {
        if (! session()->get('username')) {
            return redirect()->to('/auth/login');
        }

        $userModel = new UserModel();
        $data['user'] = $userModel->where('username', session()->get('username'))->first();

        return view('profile', $data);  // ← changed from 'user/profile'
    }
}