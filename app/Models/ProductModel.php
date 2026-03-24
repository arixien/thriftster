<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table            = 'products';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $useAutoIncrement = true;
    protected $useTimestamps    = false;

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

    // ── Storefront methods ─────────────────────────────────────

    public function getByCategory(string $category): array
    {
        return $this->where('category', $category)->findAll();
    }

    public function getNewArrivals(int $limit = 8): array
    {
        return $this->where('badge', 'New')->limit($limit)->findAll();
    }
}