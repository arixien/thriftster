<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table            = 'products';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $useAutoIncrement = true;
    protected $useTimestamps    = false; // ← set to false

    protected $allowedFields = [
        'seller_id',
        'category',
        'name',
        'description',
        'price',
        'img',
        'condition',
        'status',
        'stock',
        'badge'
    ];
}