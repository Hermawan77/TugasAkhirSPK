<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Matkul extends CI_Model {
    public function getMatkulWajib(){
        $query = $this->db->get('matakuliah_wajib');
        return $query;
    }

    public function getNilai(){
        $query = $this->db->get('nilai');
        return $query;
    }

    public function getKK(){
        $query = $this->db->get('bidang_kk');
        return $query;
    }

    public function getMatkulPilihan(){
        $query = $this->db->get('matakuliah_pilihan');
        return $query;
    }

    public function getKriteria(){
        $query = $this->db->get('bobot_metode');
        return $query;
    }
    
}