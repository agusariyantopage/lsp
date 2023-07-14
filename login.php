<?php
session_start();
include "koneksi.php";
if (empty($_SESSION['status_proses'])) {
  $status_proses = '';
} else {
  $status_proses = $_SESSION['status_proses'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $APP_TITLE." ".$APP_VERSION; ?> | LOGIN</title>
  <link rel="shortcut icon" type="image/png" href="<?= $APP_ICO; ?>"/>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="#"><b>Halaman Login</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Silahkan login untuk masuk ke sistem</p>

        <form action="aksi/user.php" method="post">
          <input type="hidden" name="aksi" value="login">
          <div class="input-group mb-3">
            <select name="role" class="form-control" placeholder="role" required>
              <option value="">-- Pilih Peran --</option>
              <option>Administrator</option>
              <option>Asesor</option>
              <option>Asesi</option>
            </select>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-users"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" name="username" class="form-control" placeholder="Username" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>


      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <script src="dist/js/sweetalert2.all.min.js"></script>
  <script>
    var statusProses = '<?= $status_proses; ?>';
    if (statusProses === 'LOGIN-GAGAL') {
      Swal.fire({
        //position: 'top-end',
        icon: 'error',
        title: 'Login Gagal, Username / Password Salah',
        showConfirmButton: false,
        timer: 2000

      })
    }
  </script>
  <?php
  $_SESSION['status_proses'] = '';
  ?>
</body>

</html>