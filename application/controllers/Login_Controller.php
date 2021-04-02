<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Controller extends CI_Controller {

	public function index()
	{
        $session_admin = $this->session->userdata('username_admin');
        if (empty($session_admin)) {
            $segment = $this->uri->segment(1);
            $data = [
                'title' => 'LOGIN',
                'juhal' => '',
                'segment' => $segment
            ];
            $this->load->view('Layout/Header', $data);
            $this->load->view('Layout/Navigation', $data);
            $this->load->view('Mahasiswa/Login_Admin', $data);
            $this->load->view('Layout/Footer', $data);
        }
        else
        {
            redirect('admin_controller');
        }

        
        
	}

    public function getlogin()
    {
        $username = $this->input->post('username');
        $ps = $this->input->post('password');
        $password = md5($ps);

        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('admin');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $key) {
                $sess = [
                    'username_admin' => $key->username,
                    'password' => $key->password
                ];
                $this->session->set_userdata($sess);
                redirect('admin_controller');
            }
        }
        else 
        {
            $this->session->set_flashdata('info',
            '<div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-warning"></i> Alert!</h4>
            <p style="text-align:center">Password atau Username salah</p>
          </div>');
          redirect('login_controller');
        }
        
    }

    public function logout(){
        $this->session->sess_destroy($session_admin);
        redirect('login_controller');
    }
}