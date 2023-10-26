<?php
namespace App\Controllers;
class Home extends BaseController {

    public function index()
    {
        //$kelas = $this -> frameworkModel -> getAllKelas();
        //$data =[
           // "title" => "Home",
           // "nama" => "Sophia Maratu Solihat",
           // "biodata" ={
            //    "Nama" => "Sophia Maratu Solihat",
           //     "npm" => "2110631170037",
            //}
        //]
        $data = [
            'title' => 'Home Page',
            'nama' => 'Sophia Maratu Solihat',
        ];
       echo view ('templates/header', $data);
       echo view ('home', $data);
       echo view ('templates/footer', $data);
    }
}
