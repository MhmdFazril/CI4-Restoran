<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;

class Admin extends BaseController
{
    protected $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'product' => $this->productModel->getProduct()
        ];
        return view('admin/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Pembelian'
        ];
        return view('admin/create', $data);
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Pembelian',
            'product' => $this->productModel->getProduct($id)
        ];

        return view('admin/detail', $data);
    }
}
