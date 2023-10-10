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

        $path = 'assets/uploads/img/';

        $foto = $this->request->getFile('foto');

        $name = $foto->getRandomName();

        if ($foto->move($path, $name)) {
            $foto = base_url($path . $name);
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
            'npm' => $this->request->getVar('npm'),
            'foto' => $foto
        ]);
        return redirect()->to('/user');
    }

    public function show($id)
    {
        $user = $this->userModel->getUser($id);

        $data = [
            'title' => 'Profile',
            'user' => $user
        ];

        return view('profile', $data);
    }

    public function edit($id){
        $user = $this->userModel->getUser($id);
        $kelas = $this->kelasModel->getKelas();

        $data = [
            'title'  => 'Edit User',
            'user'   => $user,
            'kelas'  => $kelas
        ];

        return view('edit_user', $data);
    }

    public function update($id){
        $path = 'assets/uploads/img/';

        $foto = $this->request->getFile('foto');

        if ($foto->isValid()){
            $name = $foto->getRandomName();

            if ($foto->move($path, $name)) {
                $foto_path = base_url($path. $name);
            }
        }

        $data = [
            'nama'     => $this->request->getVar('nama'),
            'id_kelas' => $this->request->getVar('kelas'),
            'npm'      => $this->request->getVar('npm'),
            'foto'     => $foto_path
        ];

        $result = $this->userModel->updateUser($data, $id);

        if(!$result){
            return redirect()->back()->withInput()
                ->with('error', 'Gagal Menyimpan data');
        }

        return redirect()->to('/user');
    }

    public function destroy($id){
        $result = $this->userModel->deleteUser($id);
        if(!$result){
            return redirect()->back()->with('error', 'Gagal menghapus data');
        }
        return redirect()->to(base_url('/user'))
            ->with('success', 'Berhasil menghapus data');
    }

}