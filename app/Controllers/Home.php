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
        $nama = $this->request->getVar("nama");
        $npm = $this->request->getVar("npm");
        $prodi = $this->request->getVar("prodi");

        $data =[
            "nama" => $nama,
            "npm" => $npm,
            "prodi" => $prodi,
        ];

        $this->mahasiswaModel->createMahasiswa($data);
        $this->session->setFlashData("success", "Mahasiswa has been added");
        $this->session=\Config\Services::session();
        return redirect()->to(base_url("/"));

    }

    public function index()
    {
        $mahasiswa = $this->mahasiswaModel->getAllMahasiswa();
        $data = [
            'title' => 'Home Page', 
            'nama' => 'Sophia Maratu Solihat',
            "mahasiswa" => $mahasiswa,
        ];
        return view('templates/header', $data) . view('home', $data) . view('templates/footer', $data);
    }

    public function detailMahasiswa($id)
    {
        $mahasiswa = $this->mahasiswaModel->getDetailMahasiswa($id);
        $data = [
          "title" => "Detail Mahasiswa",
          "mahasiswa" => $mahasiswa
        ];
    
        return view('templates/header', $data) . view('home/detail', $data) . view('templates/footer', $data);
    }

    public function updateMahasiswa($id)
    {
        $mahasiswa = $this->mahasiswaModel->getDetailMahasiswa($id);

        $data = [
            "title" => "Update Mahasiswa",
            "mahasiswa" => $mahasiswa,
        ];

        return view("home/update", $data);
    }

    public function updateMahasiswaAction($id)
    {
        $nama = $this->request->getVar("nama");
        $npm = $this->request->getVar("npm");
        $prodi = $this->request->getVar("prodi");

        $data = [
            "nama" => $nama,
            "npm" => $npm,
            "prodi" => $prodi,
        ];

        $this->mahasiswaModel->updateMahasiswa($id, $data);
        $this->session->setFlashData("success", "Mahasiswa has been updated");
        return redirect()->to(base_url("/"));
    }

    public function deleteMahasiswa($id)
    {
        $this->mahasiswaModel->delete($id);
        $this->session->setFlashData("success", "Mahasiswa has been deleted");
        return redirect()->to(base_url("/"));
    }
}
