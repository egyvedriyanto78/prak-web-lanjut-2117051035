<?php

namespace App\Controllers;

use App\Models\KelasModel;
use App\Models\UserModel;
use App\Controllers\BaseController;

class UserController extends BaseController
{
    public $userModel;
    public $kelasModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->kelasModel = new KelasModel();
    }

    public function index()
    {
        $data = [
            'title' => 'List User',
            'users' => $this->userModel->getUser()
        ];

        return view('list_user', $data);
    }

    public function profile($nama = "", $kelas = "", $npm = "")
    {
        $data = [
            'nama' => $nama,
            'kelas' => $kelas,
            'npm' => $npm
        ];
        return view('profile', $data);
    }

    public function create()
    {
        // $kelasModel = new KelasModel();
        $kelas = $this->kelasModel->getKelas();

        $data = [
            'title' => 'Create User',
            'kelas' => $kelas,
        ];

        return view('create_user', $data);
    }

    public function store()
    {
        // $userModel = new UserModel();

        $rules = [
            'nama' => 'required|min_length[3]|max_length[50]',
            'kelas' => 'required|numeric',
            'npm' => 'required|numeric|exact_length[10]'
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('npm_error', 'NPM field must contain only numbers.');
            return redirect()->to('/user/create')->withInput()->with('validation', $this->validator);
        }

        // Dibawah ini untuk route ke profile
        // $data = [
        //     'nama' => $this->request->getVar('nama'),
        //     'kelas' => $this->request->getVar('kelas'),
        //     'npm' => $this->request->getVar('npm'),
        //     'title' => 'User Profile'
        // ];
        // return view('profile', $data);

        $this->userModel->saveUser([
            'nama' => $this->request->getVar('nama'),
            'id_kelas' => $this->request->getVar('kelas'),
            'npm' => $this->request->getVar('npm')
        ]);
        return redirect()->to('/user');
    }

}