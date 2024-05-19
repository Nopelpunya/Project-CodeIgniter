<?php

namespace App\Controllers;

use App\Models\Jadwal;
use App\Models\Member;
use App\Models\Mitra;
use App\Models\User;
use App\Models\UserModel;
use CodeIgniter\Controller;

class UserController extends Controller
{

    public function create()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $data['userdata'] = session()->get();
        $role = $data['userdata']['role'];
        if($role != 'superadmin'){
            return redirect()->to('/dashboard');
        }

        helper(['form', 'url']);

        $userModels = new User();


        // Prepare data to store
        $validation = $this->validate([
            'username' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Data yang akan disimpan
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'role' => $this->request->getPost('role'),
        ];

        // Update the record
        if ($userModels->insert($data)) {
            session()->setFlashdata('success', 'User added successfully');
        } else {
            session()->setFlashdata('error', 'Failed to add User');
        }

        return redirect()->to('/users');
    }

    public function update($id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $data['userdata'] = session()->get();
        $role = $data['userdata']['role'];
        if($role != 'superadmin'){
            return redirect()->to('/dashboard');
        }

        helper(['form', 'url']);

        // Load UserModel
        $userModel = new User();

        // Validate input
        $rules = [
            'username' => 'required|min_length[3]|max_length[20]',
            'password' => 'permit_empty|min_length[3]',
            'role' => 'required'
        ];

        if ($this->validate($rules)) {
            $data = [
                'username' => $this->request->getPost('username'),
                'role' => $this->request->getPost('role'),
            ];

            // Check if password is provided
            $password = $this->request->getPost('password');
            if (!empty($password)) {
                $data['password'] = $password;
            }

            // Update user data
            $userModel->update($id, $data);

            // Set success message and redirect
            session()->setFlashdata('success', 'Account updated successfully');
            return redirect()->to('/users');
        } else {
            // Set error message and redirect back to profile page
            session()->setFlashdata('errors', $this->validator->getErrors());
            return redirect()->back()->withInput();
        }
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

        $userModel = new User();
        $mitraModel = new Mitra();
        $jadwalModel = new Jadwal();
        $memberModel = new Member();

        if ($userModel->find($id)) {
            // Ambil semua data mitra yang user_id-nya sama dengan $id
            $mitras = $mitraModel->where('user_id', $id)->findAll();
            $members = $memberModel->where('id_mitra', $id)->findAll();
            if($members){
                $memberModel->where('id_mitra', $id)->delete();
            }

            if ($mitras) {
                foreach ($mitras as $mitra) {
                    // Hapus semua jadwal yang terhubung dengan data mitra
                    $jadwalModel->where('mitra_id', $mitra['id'])->delete();
                }
                // Hapus data mitra yang user_id-nya sama dengan $id
                $mitraModel->where('user_id', $id)->delete();
            }

            // Hapus user & members
            
            $userModel->delete($id);

            session()->setFlashdata('success', 'Account deleted successfully');
        } else {
            session()->setFlashdata('error', 'Failed to delete Account');
        }


        return redirect()->to('/users');
    }
}

