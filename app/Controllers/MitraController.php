<?php

namespace App\Controllers;

use App\Models\Jadwal;
use App\Models\Member;
use App\Models\Mitra;
use App\Models\User;
use App\Models\UserModel;
use CodeIgniter\Controller;

class MitraController extends Controller
{

    public function create()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $data['userdata'] = session()->get();
        $role = $data['userdata']['role'];
        if ($role != 'superadmin') {
            return redirect()->to('/dashboard');
        }

        helper(['form', 'url']);

        $mitraModel = new Mitra();


        // Prepare data to store
        $validation = $this->validate([
            'user_id' => 'required',
            'nama_fithub' => 'required',
            'nama_pemilik' => 'required',
            'lokasi' => 'required',
            'telepon' => 'required',
            'alamat_fithub' => 'required',
            'email' => 'required|valid_email'
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Data yang akan disimpan
        $data = [
            'user_id' => $this->request->getPost('user_id'),
            'nama_fithub' => $this->request->getPost('nama_fithub'),
            'nama_pemilik' => $this->request->getPost('nama_pemilik'),
            'lokasi' => $this->request->getPost('lokasi'),
            'telepon' => $this->request->getPost('telepon'),
            'alamat_fithub' => $this->request->getPost('alamat_fithub'),
            'email' => $this->request->getPost('email'),
        ];

        // Update the record
        if ($mitraModel->insert($data)) {
            session()->setFlashdata('success', 'Mitra added successfully');
        } else {
            session()->setFlashdata('error', 'Failed to add Mitra');
        }

        return redirect()->to('/mitra');
    }

    public function updateMitra($id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $data['userdata'] = session()->get();
        $role = $data['userdata']['role'];
        if ($role != 'superadmin') {
            return redirect()->to('/dashboard');
        }

        helper(['form', 'url']);


        $mitraModel = new Mitra();


        // Prepare data to update
        $data = [
            'user_id' => $this->request->getPost('user_id'),
            'nama_fithub' => $this->request->getPost('nama_fithub'),
            'nama_pemilik' => $this->request->getPost('nama_pemilik'),
            'lokasi' => $this->request->getPost('lokasi'),
            'telepon' => $this->request->getPost('telepon'),
            'alamat_fithub' => $this->request->getPost('alamat_fithub'),
            'email' => $this->request->getPost('email'),
        ];

        // Update the record
        if ($mitraModel->update($id, $data)) {
            session()->setFlashdata('success', 'Mitra updated successfully');
        } else {
            session()->setFlashdata('error', 'Failed to update Mitra');
        }

        return redirect()->to('/mitra');
    }

    public function delete($id)
    {

        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $data['userdata'] = session()->get();
        $role = $data['userdata']['role'];
        if ($role != 'superadmin') {
            return redirect()->to('/dashboard');
        }

        $mitraModel = new Mitra();

        if ($mitraModel->find($id)) {

            // cari data jadwal yang id_mitranya = $id
            $jadwalModel = new Jadwal();
            $jadwal = $jadwalModel->where('mitra_id', $id)->findAll();

            if ($jadwal) {
                $jadwalModel->where('mitra_id', $id)->delete();
            }
            // cari data member yang id_mitranya = $id, kemudian kosongkan nilai id_mitranya set null

            $memberModel = new Member();
            $members = $memberModel->where('id_mitra', $id)->findAll();

            if ($members) {
                $memberModel->where('id_mitra', $id)->set(['id_mitra' => null])->update();
            }

            $mitraModel->delete($id);
            session()->setFlashdata('success', 'Mitra deleted successfully');
        } else {
            session()->setFlashdata('error', 'Failed to delete Mitra');
        }

        return redirect()->to('/mitra');
    }
}

