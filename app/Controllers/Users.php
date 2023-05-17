<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\OfficeModel;
use App\Models\ProductModel;
use App\Models\TransaksiModel;

class Users extends BaseController
{
    protected $productModel;
    protected $transaksiModel;
    protected $officeModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->transaksiModel = new TransaksiModel();
        $this->officeModel = new OfficeModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'product' => $this->productModel->getProduct(),
        ];
        return view('user/index', $data);
    }

    public function create($id)
    {
        $data = [
            'title' => 'Pembelian',
            'product' => $this->productModel->getProduct($id),
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
        if (!$this->validate([
            'jumlah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'pembeli' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
        ])) {
            return redirect()->back()->withInput();
        }

        $id_product = $this->request->getVar('id');
        $jumlah_product = $this->request->getVar('jumlah');
        $pembeli = $this->request->getVar('pembeli');
        $quantity_product = $this->productModel->updateQuantity($id_product);
        $pengurangan_stok = $quantity_product['quantity'] - $jumlah_product;

        $this->transaksiModel->save([
            'id_product' => $id_product,
            'quantity' => $jumlah_product,
            'buyer' => $pembeli,
            'id_account' => session()->get('account')['id'],
            'id_office' => session()->get('account')['id_name_office'],
        ]);

        $this->productModel->save([
            'id' => $id_product,
            'quantity' => $pengurangan_stok
        ]);

        session()->setFlashdata('pesan', 'Produk berhasil dipesan');

        return redirect()->to('/user/dashboard');
    }

    public function keranjang($sessionName = '')
    {
        $data = [
            'title' => 'History',
            'item' => $this->transaksiModel->getProduct()
        ];

        return view('user/keranjang', $data);
    }
}
