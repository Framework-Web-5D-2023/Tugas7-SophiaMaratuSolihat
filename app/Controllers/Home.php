<?php
namespace App\Controllers;
class Home extends BaseController {
    public function __construct()
    {
        $this->session = \Config\Services::session();
    }


    //untuk mengirimkan atau membuat data dari table
    public function createMahasiswa()
    {
        $nama = $this-> request -> getVar("nama");
        $npm = $this-> request -> getVar("npm");
        $prodi = $this-> request -> getVar("prodi");

        $data =[
            "nama" => $nama,
            "npm" => $npm,
            "prodi" => $prodi,
        ];

        $this -> mahasiswaModel -> create($data);
        $this->session->setFlashData("success", "Mahasiswa has been added");
        return redirect ()-> to (base_url("/"));

    }

    public function index(): string
    {
        $mahasiswa = $this->mahasiswaModel->getAllMahasiswa();
        $data = [
            'title' => 'Home Page', 
            'nama' => 'Sophia Maratu Solihat',
            "mahasiswa" => $mahasiswa,
        ];
        return view('templates/header', $data) . view('home', $data) . view('templates/footer', $data). view('form', $data);
    }
}
