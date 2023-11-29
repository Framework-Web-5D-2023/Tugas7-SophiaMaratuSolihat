<?php
namespace App\Controllers;
class Home extends BaseController {

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
    return view('home/detail', $data) . view('templates/footer', $data);
  }

  public function __construct()
  {
    $this->session = \Config\Services::session();
  }


  //untuk mengirimkan atau membuat data dari table
  public function createMahasiswa()
  {
    if (!$this->validate([
      'image' => [
        'rules' => [
          'is_image[image]',
          'mime_in[image,image/jpg,image/jpeg,image/png,image/webp]',
          'max_size[image,10024]',
        ],
        'errors' => [
          'max_size' => 'ukuran gambar terlalu besar',
          'is_image' => 'please input format gambar',
          'mime_in' => 'please input gambar'
        ],
      ],
    ])) {
      $this->session->setFlashData("error", "Failed for add data please check your image");
      return redirect()->to(base_url("/"));
      }
        // ambil gambar
    $fileImage = $this->request->getFile('image');
    if ($fileImage->getError() == 4) 
    {
      $namaImage = 'default.jpg';
    } else {
      // generate nama image biar random
      $namaImage = $fileImage->getRandomName();
      // pindahkan gambar Image ke file kita dan pada folder public/img 
      $fileImage->move('image', $namaImage);
      }
    $nama = $this->request->getVar("nama");
    $npm = $this->request->getVar("npm");
    $prodi = $this->request->getVar("prodi");

    $data =[
      "nama" => $nama,
      "npm" => $npm,
      "prodi" => $prodi,
      "image" => $namaImage,
    ];

    $this->mahasiswaModel->createMahasiswa($data);
    $this->session->setFlashData("success", "Berhasil ditambahkan!");
    // $this->session=\Config\Services::session();
    return redirect()->to(base_url("/"));
  }

  public function updateMahasiswa($id)
  {
  $mahasiswa = $this->mahasiswaModel->getDetailMahasiswa($id);
  $data = [
    "title" => "Update Mahasiswa",
    "mahasiswa" => $mahasiswa,
    'validation' => \Config\Services::validation(),
  ];
  return view("home/update", $data);
  }

  public function updateMahasiswaAction($id)
  {
    if (!$this->validate([
      'nama' => [
        'rules' => 'required|is_unique[mahasiswa.nama]',
        'errors' => [
          'required' => '{field} harus diisi',
          'is_unique' => '{field} sudah digunakan'
        ]
      ],
      'nama' => 'required',
      'npm' => 'required',
      'prodi' => 'required',
      'image' => [
        'rules' => 'uploaded[image]|max_size[image,1024]|is_image[image]',
        'errors' => [
            'uploaded' => 'Pilih file gambar untuk diunggah',
            'max_size' => 'Ukuran gambar terlalu besar. Maksimal 1 MB',
            'is_image' => 'File yang diunggah bukan gambar'
        ]
      ]
    ])) 
    {
      return redirect()->to(base_url("updateMahasiswa/" . $id))->withInput();
    }
      
    $nama = $this->request->getVar("nama");
    $npm = $this->request->getVar("npm");
    $prodi = $this->request->getVar("prodi");
    // Ambil file gambar yang diunggah
    $fileImage = $this->request->getFile('image');

    // Tentukan lokasi penyimpanan file gambar
    $uploadPath = 'image/';

    // Generate nama file gambar
    $namaImage = $fileImage->getRandomName();

    // Pindahkan file gambar ke lokasi penyimpanan
    $fileImage->move($uploadPath, $namaImage);

    $data = [
      "nama" => $nama,
      "npm" => $npm,
      "prodi" => $prodi,
      "image" => $namaImage,
    ];
    $this->mahasiswaModel->updateMahasiswa($id, $data);
    $this->session->setFlashData("success", "Berhasil Update!");
    return redirect()->to(base_url("/"));
  }

  public function deleteMahasiswa($id)
  {
    $this->mahasiswaModel->delete($id);
    $this->session->setFlashData("success", "Berhasil dihapus!");
    return redirect()->to(base_url("/"));
  }
}