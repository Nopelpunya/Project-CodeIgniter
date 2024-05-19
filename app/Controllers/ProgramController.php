<?php

namespace App\Controllers;

use App\Models\Jadwal;
use App\Models\Member;
use App\Models\Mitra;
use App\Models\User;
use App\Models\UserModel;
use CodeIgniter\Controller;

class ProgramController extends Controller
{

    public function create()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $data['userdata'] = session()->get();

        helper(['form', 'url']);

        $jadwalModel = new Jadwal();


        // Prepare data to store
        $validation = $this->validate([
            'mitra_id' => 'required',
            'nama_latihan' => 'required',
            'trainer' => 'required',
            'jam_kegiatan' => 'required',
            'level_kesulitan' => 'required',
            'durasi_latihan' => 'required',
            'tanggal' => 'required',
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Data yang akan disimpan
        $data = [
            'mitra_id' => $this->request->getPost('mitra_id'),
            'nama_latihan' => $this->request->getPost('nama_latihan'),
            'trainer' => $this->request->getPost('trainer'),
            'jam_kegiatan' => $this->request->getPost('jam_kegiatan'),
            'level_kesulitan' => $this->request->getPost('level_kesulitan'),
            'durasi_latihan' => $this->request->getPost('durasi_latihan'),
            'tanggal' => $this->request->getPost('tanggal'),
        ];

        // Update the record
        if ($jadwalModel->insert($data)) {
            session()->setFlashdata('success', 'Program added successfully');
        } else {
            session()->setFlashdata('error', 'Failed to add Program');
        }

        return redirect()->to('/program');
    }

    public function update($id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $data['userdata'] = session()->get();
        $role = $data['userdata']['role'];
        

        helper(['form', 'url']);


        $jadwalModel = new Jadwal();


        // Prepare data to update
        $data = [
            'mitra_id' => $this->request->getPost('mitra_id'),
            'nama_latihan' => $this->request->getPost('nama_latihan'),
            'trainer' => $this->request->getPost('trainer'),
            'jam_kegiatan' => $this->request->getPost('jam_kegiatan'),
            'level_kesulitan' => $this->request->getPost('level_kesulitan'),
            'durasi_latihan' => $this->request->getPost('durasi_latihan'),
            'tanggal' => $this->request->getPost('tanggal'),
        ];

        // Update the record
        if ($jadwalModel->update($id, $data)) {
            session()->setFlashdata('success', 'Program updated successfully');
        } else {
            session()->setFlashdata('error', 'Failed to update Program');
        }

        return redirect()->to('/program');
    }

    public function delete($id)
    {

        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $data['userdata'] = session()->get();
        

        $jadwalModel = new Jadwal();

        if ($jadwalModel->delete($id)) { 
            
            session()->setFlashdata('success', 'Program deleted successfully');
        } else {
            session()->setFlashdata('error', 'Failed to delete Program');
        }

        return redirect()->to('/program');
    }
}
