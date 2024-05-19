<?php

namespace App\Controllers;

use App\Models\Jadwal;
use App\Models\Member;
use App\Models\Membership;
use App\Models\Mitra;
use App\Models\User;
use App\Models\UserModel;
use CodeIgniter\Controller;

class PaketController extends Controller
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

        $membershipModel = new Membership();


        // Prepare data to store
        $validation = $this->validate([
            'jangka_waktu' => 'required',
            'biaya_bulanan' => 'required',
            'biaya_total' => 'required',
            'keunggulan' => 'permit_empty'
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Data yang akan disimpan
        $data = [
            'jangka_waktu' => $this->request->getPost('jangka_waktu'),
            'biaya_bulanan' => $this->request->getPost('biaya_bulanan'),
            'biaya_total' => $this->request->getPost('biaya_total'),
            'keunggulan' => $this->request->getPost('keunggulan'),
        ];

        // Update the record
        if ($membershipModel->insert($data)) {
            session()->setFlashdata('success', 'Plan added successfully');
        } else {
            session()->setFlashdata('error', 'Failed to add Plan');
        }

        return redirect()->to('/pricing');
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
        $membershipModel = new Membership();

        // Validate input
        $rules = [
            'jangka_waktu' => 'required',
            'biaya_bulanan' => 'required',
            'biaya_total' => 'required',
            'keunggulan' => 'permit_empty'
        ];

        if ($this->validate($rules)) {
            $data = [
                'jangka_waktu' => $this->request->getPost('jangka_waktu'),
            'biaya_bulanan' => $this->request->getPost('biaya_bulanan'),
            'biaya_total' => $this->request->getPost('biaya_total'),
            'keunggulan' => $this->request->getPost('keunggulan'),
            ];

            $membershipModel->update($id, $data);

            
            session()->setFlashdata('success', 'Plan updated successfully');
            return redirect()->to('/pricing');
        } else {
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

        $pricingModel = new Membership();
        $memberModel = new Member();

        if ($pricingModel->find($id)) {
            $members = $memberModel->where('id_paket_membership', $id)->findAll();
            if($members){
                $memberModel->where('id_paket_membership', $id)->delete();
            }
            
            $pricingModel->delete($id);

            session()->setFlashdata('success', 'Plan deleted successfully');
        } else {
            session()->setFlashdata('error', 'Failed to delete Plan');
        }


        return redirect()->to('/pricing');
    }
}

