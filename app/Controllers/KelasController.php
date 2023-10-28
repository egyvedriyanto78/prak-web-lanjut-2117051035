<?php

namespace App\Controllers;

use App\Models\KelasModel;
use App\Models\UserModel;
use App\Controllers\BaseController;

class KelasController extends BaseController
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
            'title' => 'Daftar Kelas',
            'kelas' => $this->kelasModel->getKelas()
        ];

        return view('list_kelas', $data);
    }

    public function create()
    {
        // $kelasModel = new KelasModel();
        $kelas = $this->kelasModel->getKelas();

        $data = [
            'title' => 'Create Kelas',
            'kelas' => $kelas,
        ];

        return view('create_kelas', $data);
    }

    public function store()
    {
        $this->kelasModel->saveKelas([
            'nama_kelas' => $this->request->getVar('kelas')
        ]);
        return redirect()->to('/kelas');
    }

    public function show($id)
    {
        $kelas = $this->kelasModel->find($id);

        if (!$kelas) {
            return redirect()->to('/kelas')->with('error', 'Kelas tidak ditemukan');
        }

        $user = $this->userModel->where('id_kelas', $id)->findAll();

        $data = [
            'title' => 'Detail Kelas',
            'kelas' => $kelas,
            'user' => $user
        ];

        return view('data_kelas', $data);
    }


    public function edit($id)
    {
        $kelas = $this->kelasModel->getKelas($id);

        $data = [
            'title' => 'Edit Kelas',
            'kelas' => $kelas
        ];
        return view('edit_kelas', $data);
    }

    public function update($id)
    {

        $data = [
            'nama_kelas' => $this->request->getVar('kelas'),
        ];

        $result = $this->kelasModel->updateKelas($data, $id);

        if (!$result) {
            return redirect()->back()->withInput()
                ->with('error', 'Gagal Menyimpan data');
        }

        return redirect()->to('/kelas');
    }

    public function destroy($id)
    {
        $result = $this->kelasModel->deleteKelas($id);
        if (!$result) {
            return redirect()->back()->with('error', 'Gagal menghapus data');
        }
        return redirect()->to(base_url('/kelas'))
            ->with('success', 'Berhasil menghapus data');
    }
}
