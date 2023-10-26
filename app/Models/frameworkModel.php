<?php

namespace App\Models;

use CodeIgniter\Model;

class frameworkModel extends Model{
    protected $table = 'kelas';
    protected $primaryKey ='id';

    protected $useTimestamps = true;

    public function getAllKelas(){
        return $this->findAll();
    }
}