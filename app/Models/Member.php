<?php

namespace App\Models;

use CodeIgniter\Model;

class Member extends Model
{
    protected $table = 'members';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['nama', 'email', 'telepon', 'jenis_kelamin', 'id_paket_membership'];

    public function getMembersWithDetails($mitraId = null)
    {
        $builder = $this->db->table($this->table);
        $builder->select('members.*, paket_membership.jangka_waktu, users.username');
        $builder->join('paket_membership', 'paket_membership.id = members.id_paket_membership', 'left');
        $builder->join('users', 'users.id = members.id_mitra', 'left');

        if ($mitraId !== null) {
            $builder->where('members.id_mitra', $mitraId);
        }

        return $builder->get()->getResultArray();
    }
}
?>
