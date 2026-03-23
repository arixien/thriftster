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
public function edit()
{
    $userModel = new \App\Models\UserModel();
    $userId = session()->get('user_id');
    $data['user'] = $userModel->find($userId);
    return view('profile_edit', $data);
}
public function update()
{
    $db = \Config\Database::connect();
    $userId = session()->get('user_id');

    $data = [
        'first_name' => $this->request->getPost('first_name'),
        'last_name'  => $this->request->getPost('last_name'),
        'phone'      => $this->request->getPost('phone'),
        'city'       => $this->request->getPost('city'),
        'bio'        => $this->request->getPost('bio'),
    ];

    $file = $this->request->getFile('profile_picture');
    if ($file && $file->isValid() && !$file->hasMoved()) {
        $newName = $file->getRandomName();
        $file->move(FCPATH . 'public/uploads/profiles/', $newName);
        $data['profile_picture'] = $newName;
    }

    $db->table('users')->where('id', $userId)->update($data);
    return redirect()->to('profile')->with('success', 'Profile updated!');
}

}