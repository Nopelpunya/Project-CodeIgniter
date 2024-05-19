<?php 


namespace App\Models;

use CodeIgniter\Model;

class Configs extends Model
{
    protected $table = 'configs'; 
    protected $primaryKey = 'id'; 
    protected $returnType = 'array';
    protected $allowedFields = ['nama_aplikasi', 'deskripsi_aplikasi', 'nama_perusahaan', 'alamat', 'whatsapp','telepon', 'email','instagram', 'tiktok','facebook', 'created_at'];

    public function dataConfig()
    {
        return $this->orderBy('created_at', 'DESC')->first();
    }
}


?>