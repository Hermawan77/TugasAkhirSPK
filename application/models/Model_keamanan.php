<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_keamanan extends CI_Model {
    public function isLogin()
    {
        $session_admin = $this->session->userdata('username_admin');
        if (empty($session_admin)) {
            $this->session->sess_destroy($session_admin);
            redirect('login_controller');
        }
    }    
}