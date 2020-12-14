<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Halaman Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/dist/css/adminlte.min.css">
  <!-- Icon -->
  <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url() ?>/img/logo.png">
  <link rel="icon" type="image/png" sizes="96x96" href="<?= base_url() ?>/img/logo.png">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
  <img src="<?= base_url() ?>/img/logo_white.jpg" alt="RSUD SKH Logo" class="brand-image img-circle elevation-3" style="opacity: .8;height: 40px;margin-bottom:5px">
  &nbsp;<a>Login</b></a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <?php echo form_open('auth/cek_login'); ?>
        <?php $errors = session()->getFlashdata('errors'); 
            if (!empty($errors)) { ?>
                <div class="alert alert-danger" role="alert">
                    <ul>
                        <?php foreach ($errors as $error) : ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach ?>
                    </ul>
                </div>
        <?php } ?>
        <?php if (session()->getFlashdata('pesan')) {
            echo '<div class="alert alert-success" role="alert">';
            echo session()->getFlashdata('pesan');
            echo '</div>';
        } ?>
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="E-Mail">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8"></div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </div>
          <!-- /.col -->
        </div>
      <?php echo form_close(); ?>
      Belum punya Akun?
      <a href="<?= base_url('auth/register') ?>" class="text-center"><br>Daftar sekarang</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="<?= base_url() ?>/template/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>/template/dist/js/adminlte.min.js"></script>
<script>
    window.setTimeout(function() {
       $(".alert").fadeTo(500,0).slideUp(500,function() {
           $(this).remove();
       }); 
    }, 3000);
</script>
</body>
</html>
