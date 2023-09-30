<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Controllers\BaseController;

class UserController extends BaseController
{
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
        $kelas = [
            [
                'id' => 1,
                'nama_kelas' => 'A'
            ],
            [
                'id' => 2,
                'nama_kelas' => 'B'
            ],
            [
                'id' => 3,
                'nama_kelas' => 'C'
            ],
            [
                'id' => 4,
                'nama_kelas' => 'D'
            ],
        ];

        $data = [
            'kelas' => $kelas,
        ];

        return view('create_user', $data);
    }

    public function store()
    {
        $userModel = new UserModel();

        $rules = [
            'nama' => 'required|min_length[3]|max_length[50]',
            'kelas' => 'required|numeric',
            'npm' => 'required|numeric|exact_length[10]'
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('npm_error', 'NPM field must contain only numbers.');
            return redirect()->to('/user/create')->withInput()->with('validation', $this->validator);
        }

        $userModel->saveUser([
            'nama' => $this->request->getVar('nama'),
            'id_kelas' => $this->request->getVar('kelas'),
            'npm' => $this->request->getVar('npm')
        ]);

        $data = [
            'nama' => $this->request->getVar('nama'),
            'kelas' => $this->request->getVar('kelas'),
            'npm' => $this->request->getVar('npm')
        ];
        return view('profile', $data);
    }

}