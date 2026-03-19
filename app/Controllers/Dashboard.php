<?php namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        if (!session()->get('username')) {
            return redirect()->to('/auth/login');
        }

        echo "Welcome " . session()->get('username') . "! <a href='/auth/logout'>Logout</a>";
    }
}
?>