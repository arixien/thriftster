<?php namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'order_number',
        'buyer_id',
        'status',
        'subtotal',
        'delivery_fee',
        'total_amount',
        'delivery_method',
        'payment_method',
        'estimated_delivery_at',
        'paid_at',
        'shipping_first_name',
        'shipping_last_name',
        'shipping_email',
        'shipping_phone',
        'shipping_address',
        'shipping_barangay',
        'shipping_city',
        'shipping_region',
        'shipping_postal_code',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getOrderItems($orderId)
    {
        return $this->db->table('order_items')
                        ->where('order_id', $orderId)
                        ->get()
                        ->getResultArray();
    }
}