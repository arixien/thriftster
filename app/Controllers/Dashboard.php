<?php namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        // if (!session()->get('username')) {
        //     return redirect()->to('/auth/login');
        // }

        return view('admin_dashboard');
    }
}
?>