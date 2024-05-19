<?php

namespace App\Controllers;

use App\Models\Configs;
use App\Models\Jadwal;
use App\Models\Member;
use App\Models\Membership;
use App\Models\Mitra;
use App\Models\User;

class Dashboard extends BaseController
{
    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }
        $data['title'] = 'Dashboard';
        $config = new Configs();
        $data['configs'] = $config->dataConfig();
        $data['userdata'] = session()->get();
        return view('pages/dashboard', $data);
    }


    public function logout()
    {
        // Hapus data session
        session()->destroy();

        // Redirect ke halaman login
        return redirect()->to('/login');
    }

    public function profile()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $data['title'] = 'Settings';
        $config = new Configs();
        $data['configs'] = $config->dataConfig();
        $data['userdata'] = session()->get();

        $role = $data['userdata']['role'];
        if ($role == 'mitra') {
            $id_user = $data['userdata']['id'];
            $mitra = new Mitra();
            $data['data_mitras'] = $mitra->dataMitra($id_user);
        }


        return view('pages/profile', $data);
    }


    public function mitra()
    {

        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $data['userdata'] = session()->get();
        $role = $data['userdata']['role'];
        if($role != 'superadmin'){
            return redirect()->to('/dashboard');
        }
        

        $mitraModel = new Mitra();
        $config = new Configs();
        $userModel = new User();
        $data['configs'] = $config->dataConfig();
        $data['data_mitras'] = $mitraModel->fetchAllMitra();
        $data['users'] = $userModel->user();
        $data['title'] = 'Data Mitra';

        return view('pages/mitra', $data);

    }

    public function member()
    {

        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $data['userdata'] = session()->get();
        $role = $data['userdata']['role'];
        $userId = $data['userdata']['id'];

        $mitraModel = new Mitra();
        $config = new Configs();
        $members = new Member();
        $paket = new Membership();
        $user = new User();
        
        $data['pakets'] = $paket->findAll();
        $data['users'] = $user->findAll();

        $data['configs'] = $config->dataConfig();
        $data['data_mitras'] = $mitraModel->fetchAllMitra();
        $data['title'] = 'Data Members';

        if ($role == 'superadmin') {
            $data['members'] = $members->getMembersWithDetails();
        } else {
            $data['members'] = $members->getMembersWithDetails($userId);
        }
        
        return view('pages/members', $data);

    }

    public function user()
    {

        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $data['userdata'] = session()->get();
        $role = $data['userdata']['role'];
        if($role != 'superadmin'){
            return redirect()->to('/dashboard');
        }
        
        $config = new Configs();
        $user = new User();
        
        $data['users'] = $user->findAll();

        $data['configs'] = $config->dataConfig();
        $data['title'] = 'Data Pengguna';

        
        return view('pages/users', $data);

    }

    public function paket()
    {

        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $data['userdata'] = session()->get();
        $role = $data['userdata']['role'];
        if($role != 'superadmin'){
            return redirect()->to('/dashboard');
        }
        
        $config = new Configs();
        $paket = new Membership();
        
        $data['memberships'] = $paket->findAll();

        $data['configs'] = $config->dataConfig();
        $data['title'] = 'Pricing';

        
        return view('pages/pricing', $data);

    }


    public function program()
    {

        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $data['userdata'] = session()->get();
        $user_id = $data['userdata']['id'];
        $role = $data['userdata']['role'];

        $jadwalModel = new Jadwal();
        $mitraModel = new Mitra();
        $config = new Configs();

        $data['data_mitra'] = $mitraModel->where('user_id', $user_id)->findAll();

        if ($role == 'superadmin') {
            $jadwalData = $jadwalModel->getJadwalWithMitra();
        } else {
            $jadwalData = $jadwalModel->getJadwalWithMitra($user_id);
        }

        $data['jadwals'] = $jadwalData; 
        $data['configs'] = $config->dataConfig();
        $data['title'] = 'Data Jadwal';

        return view('pages/program', $data);

    }

    public function setting()
    {

        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $data['userdata'] = session()->get();
        $role = $data['userdata']['role'];
        if($role != 'superadmin'){
            return redirect()->to('/dashboard');
        }
        
        $config = new Configs();
        

        $data['configs'] = $config->dataConfig();
        $data['title'] = 'Settings';

        
        return view('pages/settings', $data);

    }
}
