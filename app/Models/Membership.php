<?php 


namespace App\Models;

use CodeIgniter\Model;

class Membership extends Model
{
    protected $table = 'paket_membership'; 
    protected $primaryKey = 'id'; 
    protected $returnType = 'array';
    protected $allowedFields = ['jangka_waktu', 'biaya_bulanan', 'biaya_total', 'keunggulan'];
 
    public function memberships()
    {
        return $this->findAll();
    }

    
}


?>