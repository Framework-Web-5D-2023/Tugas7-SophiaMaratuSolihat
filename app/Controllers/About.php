<?php
//defined('BASEPATH') OR exit('No direct script access allowed');
namespace App\Controllers;
class About extends BaseController {

    public function index()
    {
        $data = [
            'title' => 'About Us', 
            'nama'  => 'Sophia Maratu Solihat', 
            'npm'   => '2110631170037',
        ];

        echo view('templates/header', $data);
        echo view('about', $data);
        echo view('templates/footer');
        // echo view('form', $data);

    }
}
