<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Hitung extends CI_Model {
    public function get_data_hitung($sess_nama, $sess_nim, $jumlah)
    {
        return $this->db->query("SELECT data_hitung.id, nama , nim, kk, ipk, penelitian, pilihan, nama_kk, history FROM 
                                data_hitung INNER JOIN bidang_kk WHERE bidang_kk.id = data_hitung.kk
                                AND nama = '$sess_nama'
                                AND nim = '$sess_nim'
                                AND history = '$jumlah'");
    }

    public function get_insert_kasper($nama, $nim, $ipkkasper, $jumlah, $pkasper, $pilihankasper){
        return $this->db->query("INSERT INTO data_hitung (id, nama, nim, kk, ipk, penelitian, pilihan, history) VALUES (NULL, '$nama', '$nim', '1', '$ipkkasper', '$pkasper', '$pilihankasper', '$jumlah')");
    }
    public function get_insert_aide($nama, $nim, $ipkaide, $jumlah, $paide, $pilihanaide){
        return $this->db->query("INSERT INTO data_hitung (id, nama, nim, kk, ipk, penelitian, pilihan, history) VALUES (NULL, '$nama', '$nim', '2', '$ipkaide', '$paide', '$pilihanaide', '$jumlah')");
    }
    public function get_insert_rpl($nama, $nim, $ipkrpl, $jumlah, $prpl, $pilihanrpl){
        return $this->db->query("INSERT INTO data_hitung (id, nama, nim, kk, ipk, penelitian, pilihan, history) VALUES (NULL, '$nama', '$nim', '3', '$ipkrpl', '$prpl', '$pilihanrpl', '$jumlah')");
    }
    public function get_history($sess_nama, $sess_nim){
        return $this->db->query("SELECT MAX(history) AS jumlah FROM data_hitung WHERE nama = '$sess_nama' AND nim = '$sess_nim'")->result();
    }

    public function hitung_history()
    {
        return $this->db->query("SELECT COUNT(DISTINCT(history)) AS jumlah FROM data_hitung");
    }

    public function hitung_matkul_wajib()
    {
        return $this->db->query("SELECT COUNT(id) AS jumlah FROM matakuliah_wajib");
    }

    public function hitung_matkul_pilihan()
    {
        return $this->db->query("SELECT COUNT(id) AS jumlah FROM matakuliah_pilihan");
    }

    public function hitung_kk()
    {
        return $this->db->query("SELECT COUNT(id) AS jumlah FROM bidang_kk");
    }
}