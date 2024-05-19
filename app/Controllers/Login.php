<?php

namespace App\Controllers;

use App\Models\Configs;
use App\Models\User;

class Login extends BaseController
{
    public function index()
    {
        $config = new Configs();
        $data['configs'] = $config->dataConfig();
		return view('pages/login', $data);
    }

    public function login()
    {
        // Validasi form
        $rules = [
            'username' => 'required',
            'password' => 'required'
        ];

        if ($this->validate($rules)) {
            // Ambil data dari form
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            // Cek apakah user ada dalam database
            $userModel = new User();
            $user = $userModel->where('username', $username)
                              ->first();

            if ($user) {
                // User ditemukan, cek password
                if ($password == $user['password']) {
                    // Password cocok, login berhasil
                    // Simpan data user ke dalam session
                    $sessionData = [
                        'id' => $user['id'],
                        'username' => $user['username'],
                        'role' => $user['role'],
                        'logged_in' => true
                    ];

                    session()->set($sessionData);

                    // Redirect ke halaman dashboard
                    return redirect()->to('/dashboard');
                }
            }

            // Login gagal, tampilkan pesan error
            $message = 'Username atau password salah';
            return redirect()->to('/login')->with('message', $message);
        }

        // Validasi form gagal, tampilkan pesan error
        $message = 'Silakan lengkapi semua kolom';
        return redirect()->to('/login')->with('message', $message);
    }

    

    
}
