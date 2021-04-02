<header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li <?= $segment == '' ? 'class="active"' : 'class=""'?>><a href="<?= base_url() ?>admin_controller">Home </a></li>
            <li <?= $segment == 'ubah_kriteria' ? 'class="active"' : 'class=""'?>><a href="<?= base_url() ?>admin_controller/ubah_kriteria">Ubah Kriteria</a></li>
            <li <?= $segment == 'ubah_alternatif' ? 'class="active"' : 'class=""'?>><a href="<?= base_url() ?>admin_controller/ubah_alternatif">Ubah Alternatif</a></li>
            <li <?= $segment == 'login_controller' ? 'class="active"' : 'class=""'?> >
            <a href="" data-toggle="modal" data-target="#modal-default">
                Logout</a>
              </li>
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
                <h4 class="modal-title">Default Modal</h4>
              </div>
              <div class="modal-body">
                <p>Apakah anda ingin logout dari admin ?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
                <a class="btn btn-primary" href="<?= base_url() ?>login_controller/logout">Logout</a>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>