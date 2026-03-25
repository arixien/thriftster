<?php

namespace App\Models;

use CodeIgniter\Model;

class DashboardModel extends Model
{
    // Total counts
    public function getTotalProducts()
    {
        return $this->db->table('products')->countAllResults();
    }

    public function getTotalOrders()
    {
        return $this->db->table('orders')->countAllResults();
    }

    public function getTotalUsers()
    {
        return $this->db->table('users')->countAllResults();
    }

    // Latest 4 products
 public function getLatestProducts()
{
    return $this->db->table('products')
        ->select('id, name, category, price, stock, img')
->orderBy('created_at', 'ASC')
        ->limit(4)
        ->get()
        ->getResultArray();
}
    // Recent 4 orders
    public function getRecentOrders()
    {
        return $this->db->table('orders')
            ->select('id, status')
->orderBy('created_at', 'ASC')
            ->limit(4)
            ->get()
            ->getResultArray();
    }
}