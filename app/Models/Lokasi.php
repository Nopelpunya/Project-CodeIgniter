<?php

namespace App\Models;

use CodeIgniter\Model;

class Lokasi extends Model
{
    protected $table = 'mitra';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

    

    public function getLokasiOnly()
    {   
        return $this->findAll();
    }



}
?>
