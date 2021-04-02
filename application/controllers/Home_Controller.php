<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_Controller extends CI_Controller {

	public function index()
	{
        $segment = $this->uri->segment(1);
        $data = [
			'title' => 'Home | SPK KK TOPSIS DAN VIKOR',
			'juhal' => 'Landing Page',
            'sess_nama' => $this->session->userdata('nama'),
            'sess_nim' => $this->session->userdata('nim'),
			'matkul' => $this->model_matkul->getMatkulWajib(),
            'nilai' => $this->model_matkul->getNilai(),
            'keahlian' => $this->model_matkul->getKK(),
            'matkulpilihan' => $this->model_matkul->getMatkulPilihan(),
            'segment' => $segment
        ];
        
        $this->load->view('Layout/Header', $data);
        $this->load->view('Layout/Navigation', $data);
        $this->load->view('Mahasiswa/Home_Mahasiswa', $data);
        $this->load->view('Layout/Footer', $data);
    }

    public function sesi()
    {
        echo "<pre>";
        print_r($this->session->all_userdata());
        echo "</pre>";
    }
}