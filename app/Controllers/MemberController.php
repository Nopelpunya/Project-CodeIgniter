<?php

namespace App\Controllers;

use App\Models\Jadwal;
use App\Models\Member;
use App\Models\Mitra;
use App\Models\User;
use App\Models\UserModel;
use CodeIgniter\Controller;

class MemberController extends Controller
{

    public function create()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $data['userdata'] = session()->get();

        helper(['form', 'url']);

        $memberModels = new Member();


        // Prepare data to store
        $validation = $this->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'id_paket_membership' => 'required',
            'id_mitra' => 'required',
            'telepon' => 'required',
            'tanggal_daftar' => 'required',
            'paket_berakhir' => 'required',
            'email' => 'required|valid_email'
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Data yang akan disimpan
        $data = [
            'nama' => $this->request->getPost('nama'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'id_paket_membership' => $this->request->getPost('id_paket_membership'),
            'id_mitra' => $this->request->getPost('id_mitra'),
            'telepon' => $this->request->getPost('telepon'),
            'tanggal_daftar' => $this->request->getPost('tanggal_daftar'),
            'paket_berakhir' => $this->request->getPost('paket_berakhir'),
            'email' => $this->request->getPost('email'),
        ];

        // Update the record
        if ($memberModels->insert($data)) {
            session()->setFlashdata('success', 'Member added successfully');
        } else {
            session()->setFlashdata('error', 'Failed to add Member');
        }

        return redirect()->to('/members');
    }

    public function updateMember($id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $data['userdata'] = session()->get();
        

        helper(['form', 'url']);


        $memberModel = new Member();


        // Prepare data to update
        $data = [
            'nama' => $this->request->getPost('nama'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'id_paket_membership' => $this->request->getPost('id_paket_membership'),
            'id_mitra' => $this->request->getPost('id_mitra'),
            'telepon' => $this->request->getPost('telepon'),
            'tanggal_daftar' => $this->request->getPost('tanggal_daftar'),
            'paket_berakhir' => $this->request->getPost('paket_berakhir'),
            'email' => $this->request->getPost('email'),
        ];

        // Update the record
        if ($memberModel->update($id, $data)) {
            session()->setFlashdata('success', 'Member updated successfully');
        } else {
            session()->setFlashdata('error', 'Failed to update Member');
        }

        return redirect()->to('/members');
    }

    public function delete($id)
    {

        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $data['userdata'] = session()->get();

        $memberModel = new Member();

        if ($memberModel->find($id)) {

            

            $memberModel->delete($id);
            session()->setFlashdata('success', 'Member deleted successfully');
        } else {
            session()->setFlashdata('error', 'Failed to delete Member');
        }

        return redirect()->to('/members');
    }
}

