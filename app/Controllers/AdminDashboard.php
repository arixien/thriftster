<?php

namespace App\Controllers;

use App\Models\DashboardModel;

class AdminDashboard extends BaseController
{
    public function index()
    {
        // Protect this page — only admins can access
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/dashboard');
        }

        $dashboardModel = new DashboardModel();

        $data = [
            'total_products'  => $dashboardModel->getTotalProducts(),
            'total_orders'    => $dashboardModel->getTotalOrders(),
            'total_users'     => $dashboardModel->getTotalUsers(),
            'latest_products' => $dashboardModel->getLatestProducts(),
            'recent_orders'   => $dashboardModel->getRecentOrders(),
        ];

        return view('admin_dashboard', $data);
    }
}