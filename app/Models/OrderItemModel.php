<?php namespace App\Models;

use CodeIgniter\Model;

class OrderItemModel extends Model
{
    protected $table = 'order_items';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'order_id',
        'product_id',
        'variant_id',
        'quantity',
        'unit_price',
        'subtotal',
        'snapshot_name',
        'snapshot_color',
        'snapshot_size',
    ];

    protected $useTimestamps = false;
}
?>