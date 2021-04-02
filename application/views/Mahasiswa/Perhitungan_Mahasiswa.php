<section class="content">
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#topsis" data-toggle="tab" aria-expanded="true">TOPSIS</a></li>
            <li class=""><a href="#vikor" data-toggle="tab" aria-expanded="false">VIKOR</a></li>
            <li class=""><a href="#ahptopsis" data-toggle="tab" aria-expanded="false">AHP-TOPSIS</a></li>
            <li class=""><a href="#ahpvikor" data-toggle="tab" aria-expanded="false">AHP-VIKOR</a></li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane active" id="topsis">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4">
                            <table class="table table-striped">
                                <tr>
                                    <td style="width:2px"><b>Nama</b></td>
                                    <td><b>:</b></td>
                                    <td><b><?= $sess_nama ?></b></td>
                                </tr>
                                <tr>
                                    <td><b>NIM</b></td>
                                    <td><b>:</b></td>
                                    <td><b><?= $sess_nim ?></b></td>
                                </tr>
                            </table>
                        </div>

                        <div class="col-md-8">
                            <div style="float: right">
                                <a class="btn btn-app" href="<?= base_url() ?>perhitungan_controller/unset">
                                    <i class="fa fa-file-o"></i> Hitung baru
                                </a>
                                <a class="btn btn-app" href="<?= base_url() ?>">
                                    <i class="fa fa-repeat"></i> Hitung lagi
                                </a>
                                <a class="btn btn-app">
                                    <i class="fa fa-file-pdf-o"></i>Cetak
                                </a>
                            </div>
                        </div>
                    </div>

                    <br>
                    <br>
                    <b>Bobot TOPSIS</b>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th style="width: 10px"></th>
                            <th>Alternatif</th>
                            <?php foreach($kriteria->result() as $a) : ?>
                            <th><?= $a->nama_kriteria?></th>
                            <?php endforeach; ?>
                        </tr>

                        <tr>
                            <td>1.</td>
                            <td>Kelompok Keilmuan</td>
                            <?php foreach($kriteria->result() as $a) : ?>
                            <td><?= $a->bobot_topsis?></td>
                            <?php endforeach; ?>
                        </tr>
                    </table>

                    <br></br>
                    <b>Data</b>

                    <table class="table table-bordered table-striped">
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Alternatif</th>
                            <?php foreach($kriteria->result() as $a) : ?>
                            <th><?= $a->nama_kriteria?></th>
                            <?php endforeach; ?>
                        </tr>

                        <?php 
							$no = 0;
							foreach($data_hitung->result() as $b) : 
							$no++
							?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $b->nama_kk?></td>
                            <td><?= $b->ipk ?></td>
                            <td><?= $b->penelitian ?></td>
                            <td><?= $b->pilihan ?></td>
                        </tr>
                        <?php endforeach; ?>

                        <tr>
                            <td colspan="2" style="text-align: center"><b> Pembagi </b></td>
                            <td>
                                <?php
							echo $pembagiipk;
							?>
                            </td>
                            <td><?php
							echo $pembagipenelitian;
							?></td>
                            <td><?php
							echo $pembagipilihan;
							?></td>
                    </table>

                    <br><b>Matriks Keputusan Ternormalisasi</b></br>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Alternatif</th>
                            <?php foreach($kriteria->result() as $a) : ?>
                            <th><?= $a->nama_kriteria?></th>
                            <?php endforeach; ?>
                        </tr>

                        <?php foreach($mkt as $b): ?>
                        <tr>
                            <td><?= $b['no']; ?></td>
                            <td><?= $b['nama_kk']; ?></td>
                            <td><?= $b['mktipk']; ?></td>
                            <td><?= $b['mktpenelitian']; ?></td>
                            <td><?= $b['mktpilihan']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>

                    <br><b>Matriks Keputusan Ternormalisasi Terbobot</b></br>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Alternatif</th>
                            <?php foreach($kriteria->result() as $a) : ?>
                            <th><?= $a->nama_kriteria?></th>
                            <?php endforeach; ?>
                        </tr>

                        <?php 
							$no = 0;
							foreach($data_hitung->result() as $b) : 
							$no++;
							?>
                        <?php endforeach; ?>
                        <tr>
                            <?php foreach($mktt as $b): ?>
                        <tr>
                            <td><?= $b['no']; ?></td>
                            <td><?= $b['nama_kk']; ?></td>
                            <td><?= $b['mktipk']; ?></td>
                            <td><?= $b['mktpenelitian']; ?></td>
                            <td><?= $b['mktpilihan']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                        </tr>
                    </table>

                    <br><b>Matriks Solusi Ideal Positif dan Solusi Ideal Negatif</b></br>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <td style="width:360px">MAX</td>
                            <td><?php echo $maxipk;?></td>
                            <td><?php echo $maxpenelitian;?></td>
                            <td><?php echo $maxpilihan;?></td>
                        </tr>
                        <tr>
                            <td>MIN</td>
                            <td><?php echo $minipk;?></td>
                            <td><?php echo $minpenelitian;?></td>
                            <td><?php echo $minpilihan;?></td>
                        </tr>
                    </table>
                    <br></br>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Alternatif</th>
                            <th>S+</th>
                            <th>S-</th>
                        </tr>

                        <?php 
							$no = 0;
							foreach($solusi as $b) : 
							$no++
							?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td style="width: 360px"><?= $b['nama_kk']; ?></td>
                            <td><?= $b['solusipositif']; ?></td>
                            <td><?= $b['solusinegatif']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>

                    <br><b>Matriks Nilai Preferensi</b></br>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th style="width: 80px">Solusi Ke-</th>
                            <th>Alternatif</th>
                            <th style="width:340px">Nilai Preferensi</th>
                        </tr>

                        <?php 
							$no = 0;
							foreach($solusi as $b):
							$no++;
							?>
                        <tr>
                            <td><?= $no ?></td>
                            <td style="width: 360px"><?= $b['nama_kk']?></td>
                            <td><?= $b['nilaipreferensi']?></td>
                        </tr>
						<?php endforeach; ?>
                    </table>
                </div>
            </div>

            <div class="tab-pane" id="vikor">
			    <div class="box-body">
                    <div class="row">
                        <div class="col-md-4">
                            <table class="table table-striped">
                                <tr>
                                    <td style="width:2px"><b>Nama</b></td>
                                    <td><b>:</b></td>
                                    <td><b><?= $sess_nama ?></b></td>
                                </tr>
                                <tr>
                                    <td><b>NIM</b></td>
                                    <td><b>:</b></td>
                                    <td><b><?= $sess_nim ?></b></td>
                                </tr>
                            </table>
                        </div>

                        <div class="col-md-8">
                            <div style="float: right">
                                <a class="btn btn-app" href="<?= base_url() ?>perhitungan_controller/unset">
                                    <i class="fa fa-file-o"></i> Hitung baru
                                </a>
                                <a class="btn btn-app" href="<?= base_url() ?>">
                                    <i class="fa fa-repeat"></i> Hitung lagi
                                </a>
                                <a class="btn btn-app">
                                    <i class="fa fa-file-pdf-o"></i>Cetak
                                </a>
                            </div>
                        </div>
					</div>
					<br>
                    <br>
                    <b>Bobot VIKOR</b>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th style="width: 10px"></th>
                            <th>Alternatif</th>
                            <?php foreach($kriteria->result() as $a) : ?>
                            <th><?= $a->nama_kriteria?></th>
                            <?php endforeach; ?>
                        </tr>

                        <tr>
                            <td>1.</td>
                            <td>Kelompok Keilmuan</td>
                            <?php foreach($kriteria->result() as $a) : ?>
                            <td><?= $a->bobot_vikor?></td>
                            <?php endforeach; ?>
                        </tr>
                    </table>

					<br></br>
                    <b>Data</b>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Alternatif</th>
                            <?php foreach($kriteria->result() as $a) : ?>
                            <th><?= $a->nama_kriteria?></th>
                            <?php endforeach; ?>
                        </tr>

                        <?php 
							$no = 0;
							foreach($data_hitung->result() as $b) : 
							$no++
							?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $b->nama_kk?></td>
                            <td><?= $b->ipk ?></td>
                            <td><?= $b->penelitian ?></td>
                            <td><?= $b->pilihan ?></td>
                        </tr>
                        <?php endforeach; ?>
						
                        <tr>
                            <td colspan="2" style="text-align: center"><b> MAX </b></td>
                            <td><?php echo $maxvipk?></td>
                            <td><?php echo $maxvpenelitian ?></td>
                            <td><?php echo $maxvpilihan ?></td>
						</tr>
						<tr>
							<td colspan="2" style="text-align: center"><b> MIN </b></td>
                            <td><?php echo $minvipk ?></td>
                            <td><?php echo $minvpenelitian ?></td>
                            <td><?php echo $minvpilihan ?></td>
						</tr>
                    </table>

					<br><b>Matriks Keputusan Ternormalisasi</b></br>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Alternatif</th>
                            <?php foreach($kriteria->result() as $a) : ?>
                            <th><?= $a->nama_kriteria?></th>
                            <?php endforeach; ?>
                        </tr>

                        <?php foreach($mktv as $b): ?>
                        <tr>
                            <td><?= $b['no']; ?></td>
                            <td><?= $b['nama_kk']; ?></td>
                            <td><?= $b['mktvipk']; ?></td>
                            <td><?= $b['mktvpenelitian']; ?></td>
                            <td><?= $b['mktvpilihan']; ?></td>
                        </tr>
                        <?php endforeach; ?>
						<tr>
							<td colspan="2" style="text-align: center"><b> Bobot </b></td>
                            <?php foreach($kriteria->result() as $a) : ?>
                            <td><?= $a->bobot_ahp?></td>
                            <?php endforeach; ?>
                        </tr>
                    </table>

                    <br><b>Matriks Nilai Utility Measure</b></br>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Alternatif</th>
                            <th>Si</th>
                            <th>Ri</th>
                        </tr>

                        <?php 
							$no = 0;
							foreach($mvur as $b) : 
							$no++
							?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td style="width: 360px"><?= $b['nama_kk']; ?></td>
                            <td><?= $b['utility']; ?></td>
                            <td><?= $b['regret']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="2" style="text-align: center"><b> MAX </b></td>
                            <td><?php echo $maxutilityvs; ?></td>
                            <td><?php echo $maxregretvr; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center"><b> MIN </b></td>
                            <td><?php echo $minutilityvs; ?></td>
                            <td><?php echo $minregretvr; ?></td>
                        </tr>
                    </table>

					<br><b>Matriks Nilai Qi</b></br>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th style="width: 10px">Solusi Ke-</th>
                            <th>Alternatif</th>
                            <th style="width:340px">Nilai Qi</th>
                        </tr>

                        <?php 
							$no = 0;
							foreach($solusiv as $b):
							$no++;
							?>
                        <tr>
                            <td><?= $no ?></td>
                            <td style="width: 360px"><?= $b['nama_kk']?></td>
                            <td><?= $b['nilaiqi']; ?></td>
                        </tr>
						<?php endforeach; ?>
                    </table>

                </div>
            </div>


            <div class="tab-pane" id="ahptopsis">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4">
                            <table class="table table-striped">
                                <tr>
                                    <td style="width:2px"><b>Nama</b></td>
                                    <td><b>:</b></td>
                                    <td><b><?= $sess_nama ?></b></td>
                                </tr>
                                <tr>
                                    <td><b>NIM</b></td>
                                    <td><b>:</b></td>
                                    <td><b><?= $sess_nim ?></b></td>
                                </tr>
                            </table>
                        </div>

                        <div class="col-md-8">
                            <div style="float: right">
                                <a class="btn btn-app" href="<?= base_url() ?>perhitungan_controller/unset">
                                    <i class="fa fa-file-o"></i> Hitung baru
                                </a>
                                <a class="btn btn-app" href="<?= base_url() ?>">
                                    <i class="fa fa-repeat"></i> Hitung lagi
                                </a>
                                <a class="btn btn-app">
                                    <i class="fa fa-file-pdf-o"></i>Cetak
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <br>
                    <br>
                    <b>Bobot AHP-TOPSIS</b>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th style="width: 10px"></th>
                            <th>Alternatif</th>
                            <?php foreach($kriteria->result() as $a) : ?>
                            <th><?= $a->nama_kriteria?></th>
                            <?php endforeach; ?>
                        </tr>

                        <tr>
                            <td>1.</td>
                            <td>Kelompok Keilmuan</td>
                            <?php foreach($kriteria->result() as $a) : ?>
                            <td><?= $a->bobot_ahp?></td>
                            <?php endforeach; ?>
                        </tr>
                    </table>

                    <br></br>
                    <b>Data</b>

                    <table class="table table-bordered table-striped">
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Alternatif</th>
                            <?php foreach($kriteria->result() as $a) : ?>
                            <th><?= $a->nama_kriteria?></th>
                            <?php endforeach; ?>
                        </tr>

                        <?php 
							$no = 0;
							foreach($data_hitung->result() as $b) : 
							$no++
							?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $b->nama_kk?></td>
                            <td><?= $b->ipk ?></td>
                            <td><?= $b->penelitian ?></td>
                            <td><?= $b->pilihan ?></td>
                        </tr>
                        <?php endforeach; ?>

                        <tr>
                            <td colspan="2" style="text-align: center"><b> Pembagi </b></td>
                            <td>
                                <?php
							echo $pembagiipk;
							?>
                            </td>
                            <td><?php
							echo $pembagipenelitian;
							?></td>
                            <td><?php
							echo $pembagipilihan;
							?></td>
                    </table>

                    <br><b>Matriks Keputusan Ternormalisasi</b></br>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Alternatif</th>
                            <?php foreach($kriteria->result() as $a) : ?>
                            <th><?= $a->nama_kriteria?></th>
                            <?php endforeach; ?>
                        </tr>

                        <?php foreach($mkt as $b): ?>
                        <tr>
                            <td><?= $b['no']; ?></td>
                            <td><?= $b['nama_kk']; ?></td>
                            <td><?= $b['mktipk']; ?></td>
                            <td><?= $b['mktpenelitian']; ?></td>
                            <td><?= $b['mktpilihan']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>

                    <br><b>Matriks Keputusan Ternormalisasi Terbobot</b></br>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Alternatif</th>
                            <?php foreach($kriteria->result() as $a) : ?>
                            <th><?= $a->nama_kriteria?></th>
                            <?php endforeach; ?>
                        </tr>

                        <?php 
							$no = 0;
							foreach($data_hitung->result() as $b) : 
							$no++;
							?>
                        <?php endforeach; ?>
                        <tr>
                            <?php foreach($mktt as $b): ?>
                        <tr>
                            <td><?= $b['no']; ?></td>
                            <td><?= $b['nama_kk']; ?></td>
                            <td><?= $b['mktatipk']; ?></td>
                            <td><?= $b['mktatpenelitian']; ?></td>
                            <td><?= $b['mktatpilihan']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                        </tr>
                    </table>

                    <br><b>Matriks Solusi Ideal Positif dan Solusi Ideal Negatif</b></br>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <td style="width:360px">MAX</td>
                            <td><?php echo $maxatipk;?></td>
                            <td><?php echo $maxatpenelitian;?></td>
                            <td><?php echo $maxatpilihan;?></td>
                        </tr>
                        <tr>
                            <td>MIN</td>
                            <td><?php echo $minatipk;?></td>
                            <td><?php echo $minatpenelitian;?></td>
                            <td><?php echo $minatpilihan;?></td>
                        </tr>
                    </table>

                    <br></br>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Alternatif</th>
                            <th>S+</th>
                            <th>S-</th>
                        </tr>

                        <?php 
							$no = 0;
							foreach($solusi as $b) : 
							$no++
							?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td style="width: 360px"><?= $b['nama_kk']; ?></td>
                            <td><?= $b['solusipositifat']; ?></td>
                            <td><?= $b['solusinegatifat']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>

                    <br><b>Matriks Nilai Preferensi</b></br>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th style="width: 80px">Solusi Ke-</th>
                            <th>Alternatif</th>
                            <th style="width:340px">Nilai Preferensi</th>
                        </tr>

                        <?php 
							$no = 0;
							foreach($solusi as $b):
							$no++;
							?>
                        <tr>
                            <td><?= $no ?></td>
                            <td style="width: 360px"><?= $b['nama_kk']?></td>
                            <td><?= $b['nilaipreferensiat']?></td>
                        </tr>
						<?php endforeach; ?>
                    </table>
            </div>
            </div>

            <div class="tab-pane" id="ahpvikor">
			    <div class="box-body">
                    <div class="row">
                        <div class="col-md-4">
                            <table class="table table-striped">
                                <tr>
                                    <td style="width:2px"><b>Nama</b></td>
                                    <td><b>:</b></td>
                                    <td><b><?= $sess_nama ?></b></td>
                                </tr>
                                <tr>
                                    <td><b>NIM</b></td>
                                    <td><b>:</b></td>
                                    <td><b><?= $sess_nim ?></b></td>
                                </tr>
                            </table>
                        </div>

                        <div class="col-md-8">
                            <div style="float: right">
                                <a class="btn btn-app" href="<?= base_url() ?>perhitungan_controller/unset">
                                    <i class="fa fa-file-o"></i> Hitung baru
                                </a>
                                <a class="btn btn-app" href="<?= base_url() ?>">
                                    <i class="fa fa-repeat"></i> Hitung lagi
                                </a>
                                <a class="btn btn-app">
                                    <i class="fa fa-file-pdf-o"></i>Cetak
                                </a>
                            </div>
                        </div>
					</div>
					<br>
                    <br>
                    <b>Bobot AHP-VIKOR</b>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th style="width: 10px"></th>
                            <th>Alternatif</th>
                            <?php foreach($kriteria->result() as $a) : ?>
                            <th><?= $a->nama_kriteria?></th>
                            <?php endforeach; ?>
                        </tr>

                        <tr>
                            <td>1.</td>
                            <td>Kelompok Keilmuan</td>
                            <?php foreach($kriteria->result() as $a) : ?>
                            <td><?= $a->bobot_ahp?></td>
                            <?php endforeach; ?>
                        </tr>
                    </table>

					<br></br>
                    <b>Data</b>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Alternatif</th>
                            <?php foreach($kriteria->result() as $a) : ?>
                            <th><?= $a->nama_kriteria?></th>
                            <?php endforeach; ?>
                        </tr>

                        <?php 
							$no = 0;
							foreach($data_hitung->result() as $b) : 
							$no++
							?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $b->nama_kk?></td>
                            <td><?= $b->ipk ?></td>
                            <td><?= $b->penelitian ?></td>
                            <td><?= $b->pilihan ?></td>
                        </tr>
                        <?php endforeach; ?>
						
                        <tr>
                            <td colspan="2" style="text-align: center"><b> MAX </b></td>
                            <td><?php echo $maxvipk?></td>
                            <td><?php echo $maxvpenelitian ?></td>
                            <td><?php echo $maxvpilihan ?></td>
						</tr>
						<tr>
							<td colspan="2" style="text-align: center"><b> MIN </b></td>
                            <td><?php echo $minvipk ?></td>
                            <td><?php echo $minvpenelitian ?></td>
                            <td><?php echo $minvpilihan ?></td>
						</tr>
                    </table>

					<br><b>Matriks Keputusan Ternormalisasi</b></br>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Alternatif</th>
                            <?php foreach($kriteria->result() as $a) : ?>
                            <th><?= $a->nama_kriteria?></th>
                            <?php endforeach; ?>
                        </tr>

                        <?php foreach($mktv as $b): ?>
                        <tr>
                            <td><?= $b['no']; ?></td>
                            <td><?= $b['nama_kk']; ?></td>
                            <td><?= $b['mktvipk']; ?></td>
                            <td><?= $b['mktvpenelitian']; ?></td>
                            <td><?= $b['mktvpilihan']; ?></td>
                        </tr>
                        <?php endforeach; ?>
						<tr>
							<td colspan="2" style="text-align: center"><b> Bobot </b></td>
                            <?php foreach($kriteria->result() as $a) : ?>
                            <td><?= $a->bobot_ahp?></td>
                            <?php endforeach; ?>
                        </tr>
                    </table>

                    <br><b>Matriks Nilai Utility Measure</b></br>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Alternatif</th>
                            <th>Si</th>
                            <th>Ri</th>
                        </tr>

                        <?php 
							$no = 0;
							foreach($mvur as $b) : 
							$no++
							?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td style="width: 360px"><?= $b['nama_kk']; ?></td>
                            <td><?= $b['utilityav']; ?></td>
                            <td><?= $b['regretav']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="2" style="text-align: center"><b> MAX </b></td>
                            <td><?php echo $maxutilityvsav; ?></td>
                            <td><?php echo $maxregretvrav; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center"><b> MIN </b></td>
                            <td><?php echo $minutilityvsav; ?></td>
                            <td><?php echo $minregretvrav; ?></td>
                        </tr>
                    </table>

					<br><b>Matriks Nilai Qi</b></br>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th style="width: 10px">Solusi Ke-</th>
                            <th>Alternatif</th>
                            <th style="width:340px">Nilai Qi</th>
                        </tr>

                        <?php 
							$no = 0;
							foreach($solusiv as $b):
							$no++;
							?>
                        <tr>
                            <td><?= $no ?></td>
                            <td style="width: 360px"><?= $b['nama_kk']?></td>
                            <td><?= $b['nilaiqiav']; ?></td>
                        </tr>
						<?php endforeach; ?>
                    </table>
                </div>
            </div>


        </div>
    </div>
</section>