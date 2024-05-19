<?php

namespace App\Models;

use CodeIgniter\Model;

class Mitra extends Model
{
    protected $table = 'mitra';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['user_id', 'nama_fithub', 'nama_pemilik', 'lokasi', 'telepon', 'alamat_fithub', 'email'];

    

    public function dataMitra($id_user)
    {
        
        return $this->select('mitra.*')
                        ->where('user_id', $id_user)
                        ->findAll();
        
    }


    public function fetchAllMitra(){
        return $this->select('mitra.*')
                        ->findAll();
    }



}
?>
