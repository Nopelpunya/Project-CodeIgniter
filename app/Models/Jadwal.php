<?php

namespace App\Models;

use CodeIgniter\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['mitra_id', 'nama_latihan', 'trainer', 'jam_kegiatan', 'level_kesulitan', 'durasi_latihan', 'tanggal'];

    public function getJadwalHarian($lokasi = null, $tanggal = null)
    {
        $today = date('Y-m-d');
        $nextWeek = date('Y-m-d', strtotime('+6 days', strtotime($today)));

        $builder = $this->select('jadwal.*, mitra.*')
                        ->join('mitra', 'mitra.id = jadwal.mitra_id');

        if (!empty($lokasi)) {
            $builder->where('mitra.lokasi', $lokasi);
        }

        if (!empty($tanggal)) {
            $builder->where('jadwal.tanggal', $tanggal);
        }

        // Jika tidak ada filter, tampilkan semua data
        if (empty($lokasi) && empty($tanggal)) {
            return $builder
                    ->where('jadwal.tanggal >=', $today)
                    ->where('jadwal.tanggal <=', $nextWeek)
                    ->findAll();
        } else {
            return $builder
                    ->where('jadwal.tanggal >=', $today)
                    ->where('jadwal.tanggal <=', $nextWeek)
                    ->findAll();
        }

        
    }

    public function getLokasi()
    {
        
        return $this->select('jadwal.*, mitra.*')
                        ->join('mitra', 'mitra.id = jadwal.mitra_id')
                        ->findAll();
        
    }
    

    public function getJadwalWithMitra($user_id = null)
    {
        $builder = $this->db->table($this->table);
        $builder->select('jadwal.*, mitra.nama_fithub, mitra.lokasi, mitra.alamat_fithub');
        $builder->join('mitra', 'mitra.id = jadwal.mitra_id');

        if ($user_id) {
            $builder->where('mitra.user_id', $user_id);
        }

        return $builder->get()->getResultArray();
    }

    



}
?>
