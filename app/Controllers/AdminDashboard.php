<?php namespace App\Controllers;

class AdminDashboard extends BaseController
{
    public function index()
    {
        // Protect this page — only admins can access
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/dashboard');
        }

        return view('admin_dashboard');
    }
}