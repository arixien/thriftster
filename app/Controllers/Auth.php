<?php namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function register()
    {
        helper(['form']);
        $data = [];

        if ($this->request->is('post')) {
            $rules = [
                'username' => 'required|min_length[3]|max_length[20]|is_unique[users.username]',
                'email'    => 'required|valid_email|is_unique[users.email]',
                'password' => 'required|min_length[6]',
            ];

            if ($this->validate($rules)) {
                $model = new UserModel();
                $model->save([
                    'username' => $this->request->getPost('username'),
                    'email'    => $this->request->getPost('email'),
                    'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                    'role'     => 'user'
                ]);
                return redirect()->to('/auth/login');
            } else {
                $data['validation'] = $this->validator;
            }
        }

        return view('register', $data);
    }

   public function login()
{
    helper(['form']);
    $data = [];

    if ($this->request->is('post')) {
        $model = new UserModel();
        $user = $model->where('username', $this->request->getPost('username'))->first();
        session()->set('show_loader', true);
        if ($user && password_verify($this->request->getPost('password'), $user['password'])) {
          session()->set('user_id',   $user['id']);
        session()->set('user_name', $user['username']);
        session()->set('username',  $user['username']);
        session()->set('role',      $user['role']);

            // 👇 redirect based on role
            if ($user['role'] === 'admin') {
                return redirect()->to('/admin_dashboard');
            } else {
                 return redirect()->to('/profile');
            }

        } else {
            $data['error'] = 'Invalid username or password';
        }
    }

    return view('login', $data);
}

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth/login');
    }
}