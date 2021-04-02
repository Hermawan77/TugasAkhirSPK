<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tentang_Controller extends CI_Controller {

	public function index()
	{
        $segment = $this->uri->segment(1);
        $data = [
			'title' => 'TENTANG SPK',
			'juhal' => 'Landing Page',
            'segment' => $segment
        ];
        $this->load->view('Layout/Header', $data);
        $this->load->view('Layout/Navigation', $data);
        $this->load->view('Mahasiswa/Tentang_Mahasiswa', $data);
        $this->load->view('Layout/Footer', $data);
	}
}