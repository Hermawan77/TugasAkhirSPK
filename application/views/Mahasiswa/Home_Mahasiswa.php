<!-- Main content -->
<section class="content">
        <div class="box box-primary">
          <div col-md-4>
          <form action="<?= base_url() ?>perhitungan_controller/hasil_ipk" method="post" class="form-horizontal">
            <div class="box-body">
              <p style="padding-bottom: 2px; font-weight: bold; font-size: 18px;">Input Data Kriteria </p>
              <?php if($sess_nama == NULL): ?>
              <div class="form-group">
                <label class="col-sm-1 control-label" style="text-align: left">Nama</label>
                <div class="col-sm-6">
                  <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-1 control-label" style="text-align: left">NIM</label>
                <div class="col-sm-6">
                  <input type="text" name="nim" class="form-control" style="" placeholder="NIM" required>
                </div>
              </div>
              <?php else: ?>
                <div class="row">
								<div class="col-md-4">
									<table class="table table-striped">
									<tr>
										<td style="width:2px"><b>Nama</b></td>
										<td><b>:</b></td>
										<td><b><?= $sess_nama ?></b></td>
                    <input type="hidden" name="nama" class="form-control" value="<?= $sess_nama ?>">
									</tr>
									<tr>
										<td><b>NIM</b></td>
										<td><b>:</b></td>
										<td><b><?= $sess_nim ?></b></td>
                    <input type="hidden" name="nim" class="form-control" style="" value="<?= $sess_nim ?>">
									</tr>
									</table>
								</div>

								<div class="col-md-8">
									<div style="float: right">
									<a class="btn btn-app" href="<?= base_url() ?>perhitungan_controller/unset">
               						 <i class="fa fa-file-o"></i> Hitung baru
             						 </a>

                          </div>
								</div>
							</div>
              <?php endif; ?>

              <p style="padding-bottom: 2px; font-weight: bold; font-size: 18px;">Nilai Matakuliah </p>
              <div class="row">
              <?php foreach($matkul->result() as $m): ?>    
                <div class="col-md-3">
                  <div class="form-group">
                        <label class="col-sm-8 control-label" style="text-align: left"><?= $m->matkul_wajib ?></label>
                        <div class="col-sm-4">
                        <select name="<?= $m->slug; ?>" class="form-control" style="margin-bottom: 4px;" required>
                        <option value="">-</option>
                        <?php foreach($nilai->result() as $i) : ?>
                          <option value="<?= $i->angka?>"><?= $i->huruf ?></option>
                          <?php endforeach; ?>
                        </select>
                        </div>
                      </div>
                  </div>
              <?php endforeach; ?>
              </div>
              <p style="padding-bottom: 2px; font-weight: bold; font-size: 18px;">Riwayat Penelitian/Proyek/Pelatihan </p>
              <div class="row">
              <?php foreach($keahlian->result() as $j): ?>     
                <div class="col-md-3">
                  <div class="form-group">
                        <label class="col-sm-8 control-label" style="text-align: left"><?= $j->nama_kk ?></label>
                        <div class="col-sm-4">
                        <input type="number" name="<?=$j->slug?>" class="form-control" min="0">
                        </div>
                      </div>
                  </div>
              <?php endforeach; ?>
              </div>

              <p style="padding-bottom: 2px; font-weight: bold; font-size: 18px;">Matakuliah Pilihan yang sedang/telah diambil </p>
              <div class="form-group">
                <label class="col-sm-2 control-label" style="text-align: left">Nama Matakuliah</label>
                <div class="col-sm-5">
                  <select class="form-control select2" multiple="multiple" name="pilihan[]" data-placeholder="Pilih MATKUL pilihan"
                          style="width: 100%;" required>
                    <?php foreach($matkulpilihan->result() as $k) : ?>
                    <option value="<?= $k->nama_kk?>"><?= $k->matkul_pilihan?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Submit</button>
              </div>
          </form>
        </div>
        </div>
      </section>