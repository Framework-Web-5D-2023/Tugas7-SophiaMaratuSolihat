<?php
namespace App\Controllers;
class Home extends BaseController {

    public function index(): string
    {
        $mahasiswa = $this->mahasiswaModel->getAllMahasiswa();
        $data = [
            'title' => 'Home Page', 
            'nama' => 'Sophia Maratu Solihat',
            "mahasiswa" => $mahasiswa,
        ];
        return view('templates/header', $data) . view('home', $data) . view('templates/footer', $data);
    }
}
