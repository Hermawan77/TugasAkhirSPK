<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perhitungan_Controller extends CI_Controller {

    public function konversiipk($a){
        if($a>3.25){
            return 5;
        }
        else if(($a<=3.25)&&($a>3)){
            return 4;
        }
        else if(($a<=3)&&($a>2.75)){
            return 3;
        }
        else if(($a<=2.75)&&($a>2.25)){
            return 2;
        }
        else{
            return 1;
        }
    }

    public function konversipenelitian($b){
        if($b<=4){
            return ++$b;
        }
        else if($b>=5) {
            return 5;
        }
    }

	public function index()
	{
        $segment = $this->uri->segment(1);
        $sess_nama = $this->session->userdata('nama');
        $sess_nim = $this->session->userdata('nim');
        if ($sess_nama && $sess_nim != null) {
            $sess_history = $this->model_hitung->get_history($sess_nama, $sess_nim);
            foreach ($sess_history as $key) {
                $jumlah = $key->jumlah;
            }

                // Pembagi untuk TOPSIS
                $pembagiipk = 0;
                $data_hitung = $this->model_hitung->get_data_hitung($sess_nama, $sess_nim, $jumlah);
                foreach ($data_hitung->result() as $dth) {
                    $pembagiipk = $pembagiipk + pow($dth->ipk, 2);
                    }
                
                $pembagipenelitian = 0;
                foreach ($data_hitung->result() as $dth) {
                    $pembagipenelitian = $pembagipenelitian + pow($dth->penelitian, 2);
                }

                $pembagipilihan = 0;
                foreach ($data_hitung->result() as $dth) {
                $pembagipilihan = $pembagipilihan + pow($dth->pilihan, 2);
                }

                // Matriks Keputusan Ternormalisasi TOPSIS
                $mkt = array();
                $no = 0;
                foreach($data_hitung->result() as $b){ 
                $mkt[] = array(
                    $no++,
                        'no' => $no,
                        'nama_kk' => $b->nama_kk,
                        'mktipk' => $b->ipk/sqrt($pembagiipk),
                        'mktpenelitian' => $b->penelitian/sqrt($pembagipenelitian),
                        'mktpilihan' => $b->pilihan/sqrt($pembagipilihan)
                    );
                }

                // Bobot Kriteria 3 Metode
                $kriteria = $this->model_matkul->getKriteria();
                foreach($kriteria->result() as $a) : 
                    $bobottopsis[] = $a->bobot_topsis;  
                    $bobotvikor[] = $a->bobot_vikor;
                    $bobotahp[] = $a->bobot_ahp;
                endforeach;

                // Matriks Keputusan Ternormalisasi Terbobot
                $mktt = array();
                $no = 0;
                foreach($data_hitung->result()as $c){
                    $mktt[] = array(
                        $no++,
                        'no' => $no,
                        'nama_kk' => $c->nama_kk,
                        'mktipk' => ($c->ipk/sqrt($pembagiipk))*$bobottopsis[0],
                        'mktpenelitian' => ($c->penelitian/sqrt($pembagipenelitian))*$bobottopsis[1],
                        'mktpilihan' => ($c->pilihan/sqrt($pembagipilihan))*$bobottopsis[2],
                        'mktatipk' => ($c->ipk/sqrt($pembagiipk))*$bobotahp[0],
                        'mktatpenelitian' => ($c->penelitian/sqrt($pembagipenelitian))*$bobotahp[1],
                        'mktatpilihan' => ($c->pilihan/sqrt($pembagipilihan))*$bobotahp[2],
                    );
                }

                $maks = array();
                foreach ($mktt as $g => $f){
                    $mipk[$g] = $f['mktipk'];
                    $mpenelitian[$g] = $f['mktpenelitian'];
                    $mpilihan[$g] = $f['mktpilihan'];
                    $matipk[$g] = $f['mktatipk'];
                    $matpenelitian[$g] = $f['mktatpenelitian'];
                    $matpilihan[$g] = $f['mktatpilihan'];
                }

                // Mencari Nilai Max & Min TOPSIS
                $maxipk = max($mipk);
                $minipk = min($mipk);
                $maxpenelitian = max($mpenelitian);
                $minpenelitian = min($mpenelitian);
                $maxpilihan = max($mpilihan);
                $minpilihan = min($mpilihan);

                $maxatipk = max($matipk);
                $minatipk = min($matipk);
                $maxatpenelitian = max($matpenelitian);
                $minatpenelitian = min($matpenelitian);
                $maxatpilihan = max($matpilihan);
                $minatpilihan = min($matpilihan);

                // Matriks Solusi Ideal Positif dan Negatif TOPSIS
                $solusi = array();
                $no = 0;
                foreach($data_hitung->result()as $c){
                    $solusi[] = array(
                        $no++,
                        'no' => $no,
                        'nama_kk' => $c->nama_kk,
                        'solusipositif' => $solusipositif = sqrt((pow(($maxipk - ($c->ipk/sqrt($pembagiipk))*$bobottopsis[0]),2))+
                                        (pow(($maxpenelitian - ($c->penelitian/sqrt($pembagipenelitian))*$bobottopsis[1]),2))+
                                        (pow(($maxpilihan - ($c->pilihan/sqrt($pembagipilihan))*$bobottopsis[2]),2))),
                        'solusinegatif' => $solusinegatif = sqrt((pow(($minipk - ($c->ipk/sqrt($pembagiipk))*$bobottopsis[0]),2))+
                                        (pow(($minpenelitian - ($c->penelitian/sqrt($pembagipenelitian))*$bobottopsis[1]),2))+
                                        (pow(($minpilihan - ($c->pilihan/sqrt($pembagipilihan))*$bobottopsis[2]),2))),
                        'nilaipreferensi' => $preferensi = $solusinegatif/($solusinegatif+$solusipositif),

                        'solusipositifat' => $solusipositifat = sqrt((pow(($maxatipk - ($c->ipk/sqrt($pembagiipk))*$bobotahp[0]),2))+
                                        (pow(($maxatpenelitian - ($c->penelitian/sqrt($pembagipenelitian))*$bobotahp[1]),2))+
                                        (pow(($maxatpilihan - ($c->pilihan/sqrt($pembagipilihan))*$bobotahp[2]),2))),
                        'solusinegatifat' => $solusinegatifat = sqrt((pow(($minatipk - ($c->ipk/sqrt($pembagiipk))*$bobotahp[0]),2))+
                                        (pow(($minatpenelitian - ($c->penelitian/sqrt($pembagipenelitian))*$bobotahp[1]),2))+
                                        (pow(($minatpilihan - ($c->pilihan/sqrt($pembagipilihan))*$bobotahp[2]),2))),
                        'nilaipreferensiat' => $preferensiat = $solusinegatifat/($solusinegatifat+$solusipositifat),
                    );
                }

                // Sorting Solusi TOPSIS
                usort($solusi, function($a, $b) {
                    return $b['nilaipreferensi'] <=> $a['nilaipreferensi'];
                    return $b['nilaipreferensiat'] <=> $a['nilaipreferensiat'];
                });

                // Metode VIKOR
                $no = 0;
                $dthvikor = array();
                foreach($data_hitung->result()as $d){
                    $dthvikor[] = array(
                        'dthvikoripk' => $d->ipk,
                        'dthvikorpenelitian' => $d->penelitian,
                        'dthvikorpilihan' => $d->pilihan,
                    );
                }

                foreach ($dthvikor as $g => $f){
                    $mvipk[$g] = $f['dthvikoripk'];
                    $mvpenelitian[$g] = $f['dthvikorpenelitian'];
                    $mvpilihan[$g] = $f['dthvikorpilihan'];
                }

                // Mencari Nilai Max dan Min VIKOR
                $maxvipk = max($mvipk);
                $minvipk = min($mvipk);
                $maxvpenelitian = max($mvpenelitian);
                $minvpenelitian = min($mvpenelitian);
                $maxvpilihan = max($mvpilihan);
                $minvpilihan = min($mvpilihan);

                // Matriks Keputusan Ternormalisasi VIKOR
                $mktv = array();
                $no = 0;
                foreach($data_hitung->result() as $e){ 
                $mktv[] = array(
                    $no++,
                        'no' => $no,
                        'nama_kk' => $e->nama_kk,
                        'mktvipk' => ($maxvipk - $e->ipk)/($maxvipk - $minvipk),
                        'mktvpenelitian' => ($maxvpenelitian - $e->penelitian)/($maxvpenelitian - $minvpenelitian),
                        'mktvpilihan' => ($maxvpilihan - $e->pilihan)/($maxvpilihan - $minvpilihan),
                    );
                }

                $tesnomor = 0;
                foreach ($mktv as $key) {
                    $mktvipk[$tesnomor] = $key['mktvipk'];
                    $tesnomor++;
                }

                $tesnomor2 = 0;
                foreach ($mktv as $key) {
                    $mktvpenelitian[$tesnomor2] = $key['mktvpenelitian'];
                    $tesnomor2++;
                }

                $tesnomor3 = 0;
                foreach ($mktv as $key) {
                    $mktvpilihan[$tesnomor3] = $key['mktvpilihan'];
                    $tesnomor3++;
                }

                for ($o=0; $o < 3; $o++) { 
                    $regret[$o] =  max([$mktvipk[$o] * $bobotvikor[0],$mktvpenelitian[$o] * $bobotvikor[1], $mktvpilihan[$o] * $bobotvikor[2]]);
                    $regretav[$o] = max([$mktvipk[$o] * $bobotahp[0],$mktvpenelitian[$o] * $bobotahp[1], $mktvpilihan[$o] * $bobotahp[2]]);
                }

                // Matriks Nilai Utility Measure VIKOR
                $mvur = array();
                $no = 0;
                $noregret = 0;
                foreach($data_hitung->result() as $e){ 
                $mvur[] = array(
                    $no++,
                        'no' => $no,
                        'nama_kk' => $e->nama_kk,
                        'utility' => $utility[$noregret] = ($bobotvikor[0]*($maxvipk - $e->ipk)/($maxvipk - $minvipk))+
                                    ($bobotvikor[1]*($maxvpenelitian - $e->penelitian)/($maxvpenelitian - $minvpenelitian))+
                                    ($bobotvikor[2]*($maxvpilihan - $e->pilihan)/($maxvpilihan - $minvpilihan)),
                        'utilityav' => $utilityav[$noregret] = ($bobotahp[0]*($maxvipk - $e->ipk)/($maxvipk - $minvipk))+
                                    ($bobotahp[1]*($maxvpenelitian - $e->penelitian)/($maxvpenelitian - $minvpenelitian))+
                                    ($bobotahp[2]*($maxvpilihan - $e->pilihan)/($maxvpilihan - $minvpilihan)),
                        'regret' => $regret[$noregret],
                        'regretav' => $regretav[$noregret],
                        );
                    $noregret++;
                }

                $no = 0;
                $maxregret = array();
                foreach($data_hitung->result()as $d){
                    $maxregret[] = array(
                        'dthutility' => $utility[$no],
                        'dthregret' => $regret[$no],
                        'dthutilityav' => $utilityav[$no],
                        'dthregretav' => $regretav[$no],
                    );
                    $no++;
                }

                foreach ($maxregret as $g => $f){
                    $mvutility[$g] = $f['dthutility'];
                    $mvregret[$g] = $f['dthregret'];
                    $mvutilityav[$g] = $f['dthutilityav'];
                    $mvregretav[$g] = $f['dthregretav'];
                }

                $maxutilityvs = max($mvutility);
                $minrutilityvs = min($mvutility);
                $maxregretvr = max($mvregret);
                $minregretvr = min($mvregret);

                $maxutilityvsav = max($mvutilityav);
                $minrutilityvsav = min($mvutilityav);
                $maxregretvrav = max($mvregretav);
                $minregretvrav = min($mvregretav);

                $solusiv = array();
                $no = 0;
                $noregret = 0;
                foreach($data_hitung->result() as $e){ 
                $solusiv[] = array(
                    $no++,
                        'no' => $no,
                        'nama_kk' => $e->nama_kk,
                        'nilaiqi' => ((($utility[$noregret]-$minrutilityvs)/($maxutilityvs-$minrutilityvs))*0.5)+
                                    ((($regret[$noregret]-$minregretvr )/($maxregretvr-$minregretvr))*0.5),
                        'nilaiqiav' => ((($utilityav[$noregret]-$minrutilityvsav)/($maxutilityvsav-$minrutilityvsav))*0.5)+
                                    ((($regretav[$noregret]-$minregretvrav )/($maxregretvrav-$minregretvrav))*0.5),
                        );
                    $noregret++;
                }

                usort($solusiv, function($a, $b) {
                    return $a['nilaiqi'] <=> $b['nilaiqi'];
                    return $a['nilaiqiav'] <=> $b['nilaiqiav'] ;
                });

                $data = [
                    'pembagiipk' => sqrt($pembagiipk),
                    'pembagipenelitian' => sqrt($pembagipenelitian),
                    'pembagipilihan' => sqrt($pembagipilihan),
                    'mkt' => $mkt,
                    'mktt' => $mktt,
                    'maxipk' => $maxipk,
                    'minipk' => $minipk,
                    'maxpenelitian' => $maxpenelitian,
                    'minpenelitian' => $minpenelitian,
                    'maxpilihan' => $maxpilihan,
                    'minpilihan' => $minpilihan,
                    'solusi' => $solusi,
                    'maxatipk' => $maxatipk,
                    'minatipk' => $minatipk,
                    'maxatpenelitian' => $maxatpenelitian,
                    'minatpenelitian' => $minatpenelitian,
                    'maxatpilihan' => $maxatpilihan,
                    'minatpilihan' => $minatpilihan,
                    'maxvipk' => $maxvipk,
                    'minvipk' => $minvipk,
                    'maxvpenelitian' => $maxvpenelitian,
                    'minvpenelitian' => $minvpenelitian,
                    'maxvpilihan' => $maxvpilihan,
                    'minvpilihan' => $minvpilihan,
                    'mktv' => $mktv,
                    'mvur' => $mvur,
                    'maxregretvr' => $maxregretvr,
                    'minregretvr' => $minregretvr,
                    'maxutilityvs' => $maxutilityvs,
                    'minutilityvs' => $minrutilityvs,
                    'solusiv' => $solusiv,
                    'maxregretvrav' => $maxregretvrav,
                    'minregretvrav' => $minregretvrav,
                    'maxutilityvsav' => $maxutilityvsav,
                    'minutilityvsav' => $minrutilityvsav,
                    'title' => 'PERHITUNGAN SPK',
                    'juhal' => 'Landing Page',
                    'data_hitung' => $this->model_hitung->get_data_hitung($sess_nama, $sess_nim, $jumlah),
                    'sess_nama' => $this->session->userdata('nama'),
                    'sess_nim' => $this->session->userdata('nim'),
                    'keahlian' => $this->model_matkul->getKK(),
                    'kriteria' => $this->model_matkul->getKriteria(),
                    'segment' => $segment
                ];
                

                $this->load->view('Layout/Header', $data);
                $this->load->view('Layout/Navigation', $data);
                $this->load->view('Mahasiswa/Perhitungan_Mahasiswa', $data);
                $this->load->view('Layout/Footer', $data);
                }
                else {
                    echo "isi data terlebih dahulu";
                }

        
	}
    
    public function hasil_ipk()
    {
        $matkul = $this->model_matkul->getMatkulWajib();
        $keahlian = $this->model_matkul->getKK();
        $kasper = 0;
        $aide = 0;
        $rpl = 0;
        $skskasper = 0;
        $sksaide = 0;
        $sksrpl = 0;
        $pkasper = '';
        $paide = '';
        $prpl = '';
        foreach($matkul->result() as $m) {
            $m->slug = $this->input->post($m->slug);
            $hasil_kali = $m->slug * $m->sks;
            if($m->kk == '1'){
                $kasper = $kasper + $hasil_kali;
                $skskasper = $skskasper + $m->sks;
            }
            elseif($m->kk == '2'){
                $aide = $aide + $hasil_kali;
                $sksaide = $sksaide + $m->sks;
            }
            else{
                $rpl = $rpl + $hasil_kali;
                $sksrpl = $sksrpl + $m->sks;
            }
        }

        foreach($keahlian->result() as $j){
            $nilai = $this->input->post($j->slug);
            if($j->slug=='KASPER'){
                $pkasper = $nilai;
            }
            else if($j->slug=='AIDE'){
                $paide = $nilai;
            }
            else{
                $prpl = $nilai;
            }
            
        }

        $pkasper = $this->konversipenelitian($pkasper);
        $paide = $this->konversipenelitian($paide);        
        $prpl = $this->konversipenelitian($prpl);

        $pilihan = $this->input->post('pilihan');
        $besar_pilih = sizeof($pilihan);
        $pilihankasper = 0;
        $pilihanaide = 0;
        $pilihanrpl = 0;
        
        for ($i=0; $i < $besar_pilih; $i++) { 
            if ($pilihan[$i] == '1') {
                $pilihankasper = $pilihankasper + 1;
            }
            else if($pilihan[$i] == '2'){
                $pilihanaide = $pilihanaide + 1;
            }
            else{
                $pilihanrpl = $pilihanrpl + 1;
            }
        }

        $pilihankasper = $this->konversipenelitian($pilihankasper);
        $pilihanaide = $this->konversipenelitian($pilihanaide);        
        $pilihanrpl = $this->konversipenelitian($pilihanrpl);

        echo $pilihankasper;
        echo "<br>";
        echo $pilihanaide;
        echo "<br>";
        echo $pilihanrpl;
        echo "<br>";
        

        $nama = $this->input->post('nama');
        $nim = $this->input->post('nim');
        $ipkkasper =  $kasper/$skskasper;
        $ipkaide =  $aide/$sksaide;
        $ipkrpl =  $rpl/$sksrpl;

        $ipkkasper = $this->konversiipk($ipkkasper);
        $ipkaide = $this->konversiipk($ipkaide);
        $ipkrpl = $this->konversiipk($ipkrpl);

        $newdata = array(
            'nama'  => $nama,
            'nim'     => $nim,
            'logged_in' => TRUE
        );
        $this->session->set_userdata($newdata);
        
        $sess_nama = $this->session->userdata('nama');
        $sess_nim = $this->session->userdata('nim');

        $this->model_hitung->get_history($sess_nama, $sess_nim);
        $sess_history = $this->model_hitung->get_history($sess_nama, $sess_nim);
        foreach ($sess_history as $key) {
            $jumlah = (int)$key->jumlah+1;
        }
        

        $this->model_hitung->get_insert_kasper($nama, $nim, $ipkkasper, $jumlah, $pkasper, $pilihankasper);
        $this->model_hitung->get_insert_aide($nama, $nim, $ipkaide, $jumlah, $paide, $pilihanaide);
        $this->model_hitung->get_insert_rpl($nama, $nim, $ipkrpl, $jumlah, $prpl, $pilihanrpl);
        redirect('perhitungan_controller');
    }

    public function unset()
    {
        unset(
                $_SESSION['nim'],
                $_SESSION['nama'],
                $_SESSION['logged_in']
        );
        redirect('home_controller');
    }

    public function tes(){
        $sess_nama = $this->session->userdata('nama');
        $sess_nim = $this->session->userdata('nim');
        $test = $this->model_hitung->get_history($sess_nama, $sess_nim);
        foreach ($test as $key) {
            $tes=  (int)$key->jumlah;
        }

        if($tes == 0){
            $tes = $tes + 1;
        }
        else {
            $tes = $tes + 1;
        }

        var_dump($tes);
    }

}