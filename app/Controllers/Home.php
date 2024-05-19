<?php

namespace App\Controllers;

use App\Models\Configs;
use App\Models\Jadwal;
use App\Models\Lokasi;
use App\Models\Member;
use App\Models\Membership;

class Home extends BaseController
{
    public function index()
    {
        $config = new Configs();
        $data['configs'] = $config->dataConfig();
		return view('pages/landing', $data);
    }

    public function membership()
    {
        $config = new Configs();
        $membership = new Membership();
        $data['configs'] = $config->dataConfig();
        $data['memberships'] = $membership->memberships();
		return view('pages/membership', $data);
    }

    public function registration($id)
    {
        $config = new Configs();
        $paketById = new Membership();
        $data['configs'] = $config->dataConfig();
        $data['paket'] = $paketById->find($id);
		return view('pages/registration', $data);
    }

    public function registerMember()
    {
        $memberModel = new Member();

        $data = [
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'telepon' => $this->request->getPost('telepon'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'id_paket_membership' => $this->request->getPost('id_paket_membership'),
        ];

        $memberModel->save($data);

        session()->setFlashdata('message', 'Pendaftaran berhasil! admin akan mengirimkan anda pesan untuk mengkonfirmasi pembayaran.');

        return redirect()->to('/membership');
    }

    public function jadwal()
    {
        $lokasi = $this->request->getGet('lokasi');
        $tanggal = $this->request->getGet('tanggal');
        $config = new Configs();
        $jadwalModel = new Jadwal();
        $data['jadwals'] = $jadwalModel->getJadwalHarian($lokasi, $tanggal);
        $data['configs'] = $config->dataConfig();
        $data['tempat_latihan'] = $jadwalModel->getLokasi();
        $data['lokasi_terpilih'] = $this->request->getGet('lokasi');
        $data['tanggal_terpilih'] = $this->request->getGet('tanggal');
		return view('pages/jadwal', $data);
    }

    public function lokasi()
    {
        $config = new Configs();
        $lokasiModel = new Lokasi();
        $data['tempat_latihan'] = $lokasiModel->getLokasiOnly();
        $data['configs'] = $config->dataConfig();
		return view('pages/lokasi', $data);
    }
}
