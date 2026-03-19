<?php namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function register()
    {
        helper(['form']);
        $data = [];

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'username' => 'required|min_length[3]|max_length[20]|is_unique[users.username]',
                'email' => 'required|valid_email|is_unique[users.email]',
                'password' => 'required|min_length[6]',
            ];

            if ($this->validate($rules)) {
                $model = new UserModel();
                $model->save([
                    'username' => $this->request->getPost('username'),
                    'email' => $this->request->getPost('email'),
                    'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                ]);
                return redirect()->to('/auth/login');
            } else {
                $data['validation'] = $this->validator;
            }
        }

        echo view('register', $data);
    }

    public function login()
    {
        helper(['form']);
        $data = [];

        if ($this->request->getMethod() == 'post') {
            $model = new UserModel();
            $user = $model->where('username', $this->request->getPost('username'))->first();

            if ($user && password_verify($this->request->getPost('password'), $user['password'])) {
                session()->set('username', $user['username']);
                return redirect()->to('/dashboard');
            } else {
                $data['error'] = "Invalid username or password";
            }
        }

        echo view('login', $data);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth/login');
    }
}
?>