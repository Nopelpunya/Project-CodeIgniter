<?php

namespace App\Controllers;

use App\Models\Configs;
use App\Models\Mitra;
use App\Models\User;
use App\Models\UserModel;
use CodeIgniter\Controller;

class SettingController extends Controller
{
    public function update($id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        helper(['form', 'url']);

        // Load UserModel
        $configModel = new Configs();

        // Validate input
        $rules = [
            'nama_aplikasi' => 'required',
            'nama_perusahaan' => 'required',
            'deskripsi_aplikasi' => 'required',
            'alamat' => 'required',
            'whatsapp' => 'required',
            'telepon' => 'required',
            'email' => 'required',
            'instagram' => 'permit_empty',
            'tiktok' => 'permit_empty',
            'facebook' => 'permit_empty',
        ];

        if ($this->validate($rules)) {
            $data = [
                'nama_aplikasi' => $this->request->getPost('nama_aplikasi'),
                'nama_perusahaan' => $this->request->getPost('nama_perusahaan'),
                'deskripsi_aplikasi' => $this->request->getPost('deskripsi_aplikasi'),
                'alamat' => $this->request->getPost('alamat'),
                'whatsapp' => $this->request->getPost('whatsapp'),
                'telepon' => $this->request->getPost('telepon'),
                'email' => $this->request->getPost('email'),
                'instagram' => $this->request->getPost('instagram'),
                'tiktok' => $this->request->getPost('tiktok'),
                'facebook' => $this->request->getPost('facebook'),
            ];

            

            // Update user data
            $configModel->update($id, $data);

            // Set success message and redirect
            session()->setFlashdata('success', 'Settings updated successfully');
            return redirect()->to('/settings');
        } else {
            // Set error message and redirect back to profile page
            session()->setFlashdata('errors', $this->validator->getErrors());
            return redirect()->back()->withInput();
        }
    }

    
}

