<?php

namespace App\Controllers;

use App\Models\Mitra;
use App\Models\User;
use App\Models\UserModel;
use CodeIgniter\Controller;

class Profile extends Controller
{
    public function update($id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        helper(['form', 'url']);

        // Load UserModel
        $userModel = new User();

        // Validate input
        $rules = [
            'username' => 'required|min_length[3]|max_length[20]',
            'password' => 'permit_empty|min_length[3]'
        ];

        if ($this->validate($rules)) {
            $data = [
                'username' => $this->request->getPost('username'),
            ];

            // Check if password is provided
            $password = $this->request->getPost('password');
            if (!empty($password)) {
                $data['password'] = $password;
            }

            // Update user data
            $userModel->update($id, $data);

            $updatedUser = $userModel->find($id);

            // Update user session data
            $sessionData = [
                'id' => $updatedUser['id'],
                'username' => $updatedUser['username'],
                'role' => $updatedUser['role'],
                'logged_in' => true
            ];
            session()->set($sessionData);

            // Set success message and redirect
            session()->setFlashdata('success', 'Profile updated successfully');
            return redirect()->to('/profile');
        } else {
            // Set error message and redirect back to profile page
            session()->setFlashdata('errors', $this->validator->getErrors());
            return redirect()->back()->withInput();
        }
    }

    public function updateMitra($id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
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
            session()->setFlashdata('success', 'Profile Mitra updated successfully');
        } else {
            session()->setFlashdata('error', 'Failed to update Profile Mitra');
        }

        return redirect()->to('/profile');
    }
}
