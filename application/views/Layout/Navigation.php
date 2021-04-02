<header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li <?= $segment == '' ? 'class="active"' : 'class=""'?>><a href="<?= base_url() ?>">Home </a></li>
            <?php
            $sess_nim = $this->session->userdata('nim');
             if ($sess_nim != null) { ?>
               <li <?= $segment == 'perhitungan_controller' ? 'class="active"' : 'class=""'?>><a href="<?= base_url() ?>perhitungan_controller">Perhitungan SPK</a></li>
             <?php } 
             else { ?>
             <li <?= $segment == 'perhitungan_controller' ? 'class="active"' : 'class=""'?>><a href="" data-toggle="modal" data-target="#modal-default">Perhitungan SPK</a></li>
             <?php }?>
            <li <?= $segment == 'tentang_controller' ? 'class="active"' : 'class=""'?>><a href="<?= base_url() ?>tentang_controller">Tentang</a></li>
            <li <?= $segment == 'login_controller' ? 'class="active"' : 'class=""'?> ><a href="<?= base_url() ?>login_controller">Login Admin</a></li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <?php if ($segment == "login"): ?>
        
        <?php else: ?>
          <section class="content-header">
        <h1>
          <?= $juhal; ?>
        </h1>
      </section>
      <?php endif ?>


      <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Maaf..</h4>
              </div>
              <div class="modal-body">
                <h3>Data Perhitungan belum diisi</h3>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Tutup</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>