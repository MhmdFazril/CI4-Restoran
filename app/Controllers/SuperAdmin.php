<?php

namespace App\Controllers;

use App\Models\AccountModel;
use App\Models\OfficeModel;

class SuperAdmin extends BaseController
{
    protected $accountModel;
    protected $officeModel;
    public function __construct()
    {
        $this->accountModel = new AccountModel();
        $this->officeModel = new OfficeModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard SuperAdmin'
        ];
        return view('/superadmin/index', $data);
    }

    public function manage()
    {
        $data = [
            'title' => 'Data Admin',
            'list' => $this->accountModel->getAccount()
        ];
        return view('/superadmin/data', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Admin'
        ];
        return view('/superadmin/add', $data);
    }

    public function editAdmin($id)
    {
        $data = [
            'title' => 'Edit Admin',
            'admin' => $this->accountModel->getAccount($id)
        ];

        return view('/superadmin/edit', $data);
    }

    public function edit()
    {
        if (!$this->validate([
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'nama tidak boleh kosong',
                ]
            ],
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'nama tidak boleh kosong',
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'nama tidak boleh kosong',
                    'valid_email' => 'bukan email'
                ]
            ],
        ])) {
            return redirect()->back()->withInput();
        }

        if ($this->request->getVar('office') == 'Triwijaya') {
            $getIdOffice = 1;
        } elseif ($this->request->getVar('office') == 'Agen Makanan') {
            $getIdOffice = 2;
        } elseif ($this->request->getVar('office') == 'Supply Product') {
            $getIdOffice = 3;
        } elseif ($this->request->getVar('office') == 'Sambako') {
            $getIdOffice = 4;
        } elseif ($this->request->getVar('office') == 'Posing') {
            $getIdOffice = 5;
        }

        $id = $this->request->getVar('id');
        $name = $this->request->getVar('name');
        $username = $this->request->getVar('username');
        $email = $this->request->getVar('email');
        $role = $this->request->getVar('role');

        // $getIdOffice = $this->officeModel->getIdOffice($office);

        $this->accountModel->save([
            'id' => $id,
            'name' => $name,
            'username' => $username,
            'email' => $email,
            'role' => $role,
            'id_name_office' => $getIdOffice
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diupdate');

        return redirect()->to('/superadmin/manage-admin');
    }

    public function add()
    {
        if (!$this->validate([
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'nama tidak boleh kosong',
                ]
            ],
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'nama tidak boleh kosong',
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'nama tidak boleh kosong',
                    'valid_email' => 'bukan email'
                ]
            ],

            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password tidak boleh kosong',
                ]
            ],

            'confirm_password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ],

        ])) {
            return redirect()->back()->withInput();
        }

        if ($this->request->getVar('office') == 'Triwijaya') {
            $getIdOffice = 1;
        } elseif ($this->request->getVar('office') == 'Agen Makanan') {
            $getIdOffice = 2;
        } elseif ($this->request->getVar('office') == 'Supply Product') {
            $getIdOffice = 3;
        } elseif ($this->request->getVar('office') == 'Sambako') {
            $getIdOffice = 4;
        } elseif ($this->request->getVar('office') == 'Posing') {
            $getIdOffice = 5;
        }


        $name = $this->request->getVar('name');
        $username = $this->request->getVar('username');
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $confirmPassword = $this->request->getVar('confirm_password');
        $role = $this->request->getVar('role');

        if ($password == $confirmPassword) {

            $passwordHash = password_hash($password, PASSWORD_BCRYPT);
            $this->accountModel->save([
                'name' => $name,
                'username' => $username,
                'email' => $email,
                'password' => $passwordHash,
                'role' => $role,
                'id_name_office' => $getIdOffice
            ]);
            session()->setFlashdata('pesan', 'Akun berhasil dibuat, silahkan login');

            return redirect()->to('/superadmin/manage-admin');
        } else {
            session()->setFlashdata('alert-regist', 'password dan confirm password tidak sama');
            return redirect()->to(base_url('/superadmin/add-admin'))->withInput();
        }

        // $this->accountModel->save([
        //     'name' => $name,
        //     'username' => $username,
        //     'email' => $email,
        //     'password' => $password,
        //     'name' => $name,
        //     'name' => $name,
        //     'name' => $name,
        // ])
    }

    public function deleteAdmin($id)
    {
        $this->accountModel->delete($id);

        session()->setFlashdata('pesan', 'Product berhasil dihapus');

        return redirect()->to('/superadmin/manage-admin');
    }
}
