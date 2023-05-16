<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'master_product';
    protected $useTimestamps = true;
    protected $allowedFields = ['photo', 'name', 'price', 'description', 'source', 'material', 'quantity'];


    public function getProduct($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    public function updateQuantity($id)
    {
        return $this->where(['id' => $id]);
    }
}
