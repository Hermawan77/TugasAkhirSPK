<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Controller extends CI_Controller {

	public function index()
	{
        $this->model_keamanan->isLogin();
        $segment = $this->uri->segment(3);
        $data = [
			'title' => 'Home | Admin',
			'juhal' => 'Home Page',
            'segment' => $segment,
            'data_terhitung' => $this->model_hitung->hitung_history(),
            'jumlah_matkul_wajib' => $this->model_hitung->hitung_matkul_wajib(),
            'jumlah_matkul_pilihan' => $this->model_hitung->hitung_matkul_pilihan(),
            'kk' => $this->model_hitung->hitung_kk()
        ];
        
        $this->load->view('Layout/Header', $data);
        $this->load->view('Layout/Navigation_Admin', $data);
        $this->load->view('Admin/Home_Admin', $data);
        $this->load->view('Layout/Footer', $data);
    }

    public function ubah_kriteria()
	{
        $this->model_keamanan->isLogin();
        $segment = $this->uri->segment(2);
        $data = [
			'title' => 'Ubah Kriteria | Admin',
			'juhal' => 'Ubah Kriteria',
            'segment' => $segment
        ];
        
        $this->load->view('Layout/Header', $data);
        $this->load->view('Layout/Navigation_Admin', $data);
        $this->load->view('Admin/Ubah_Kriteria', $data);
        $this->load->view('Layout/Footer', $data);
    }

    public function ubah_alternatif()
	{
        $this->model_keamanan->isLogin();
        $segment = $this->uri->segment(2);
        $data = [
			'title' => 'Ubah Alternatif | Admin',
			'juhal' => 'Ubah Alternatif',
            'segment' => $segment
        ];
        
        $this->load->view('Layout/Header', $data);
        $this->load->view('Layout/Navigation_Admin', $data);
        $this->load->view('Admin/Ubah_Alternatif', $data);
        $this->load->view('Layout/Footer', $data);
    }

    public function data_hitung()
    {
        $this->model_keamanan->isLogin();
        $segment = $this->uri->segment(2);
        $data = [
			'title' => 'Data Terhitung | Admin',
			'juhal' => '',
            'segment' => $segment
        ];

        $this->load->view('Layout/Header', $data);
        $this->load->view('Layout/Navigation_Admin', $data);
        $this->load->view('Admin/data_terhitung', $data);
        $this->load->view('Layout/Footer', $data);
    }
}