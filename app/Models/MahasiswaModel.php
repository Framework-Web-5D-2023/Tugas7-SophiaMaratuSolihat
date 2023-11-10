<?php
namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table = 'mahasiswa';
    protected $primaryKey ='id';
    protected $protectFields = false;

    //Dates
    protected $useTimestamps = false;

    //mengirimkan data kedalam tabel
    public function create ($data){
        return $this -> insert($data);
    }

    public function getAllMahasiswa()
    {
        return $this->findAll();
    }
}