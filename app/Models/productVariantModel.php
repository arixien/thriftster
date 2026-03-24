<?php namespace App\Models;

use CodeIgniter\Model;

class productVariantModel extends Model
{
    protected $table = 'product_variants';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'product_id',
        'color',
        'size',
        'stock',
    ];

    protected $useTimestamps = false;
}
?>
