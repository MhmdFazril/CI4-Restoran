<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\TransaksiModel;

class Users extends BaseController
{
    protected $productModel;
    protected $transaksiModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->transaksiModel = new TransaksiModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'product' => $this->productModel->getProduct()
        ];
        return view('user/index', $data);
    }

    public function create($id)
    {
        $data = [
            'title' => 'Pembelian',
            'product' => $this->productModel->getProduct($id)
        ];
        return view('user/create', $data);
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Detail',
            'product' => $this->productModel->getProduct($id)
        ];

        return view('user/detail', $data);
    }

    public function save()
    {
        session()->setFlashdata('pesan', 'Produk berhasil dipesan');

        return redirect()->to('/user/dashboard');
    }

    public function keranjang($sessionName = '')
    {
        $data = [
            'title' => 'Keranjang',
            'item' => $this->transaksiModel->getProduct()
        ];

        return view('user/keranjang', $data);
    }
}
