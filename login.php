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
  <title><?= $APP_TITLE . " " . $APP_VERSION; ?> | LOGIN</title>
  <link rel="shortcut icon" type="image/png" href="<?= $APP_ICO; ?>" />

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
  <div class="">
    <div class="login-logo">
      <a href="#"><b>Halaman Login</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Silahkan login sesuai peran untuk masuk ke sistem</p>
        <ul class="nav nav-pills">
          <li class="nav-item md-4"><a class="nav-link active mb-2 md-4" href="#asesi" data-toggle="tab"><i class="fas fa-user"></i> Asesi</a></li>
          <li class="nav-item md-4"><a class="nav-link mb-2 md-4" href="#asesor" data-toggle="tab"><i class="fa fa-user-tie"></i> Asesor</a></li>
          <li class="nav-item md-4"><a class="nav-link mb-2 md-4" href="#administrator" data-toggle="tab"><i class="fa fa-user-shield"></i> Administrator</a></li>
        </ul>
        <div class="tab-content">
          <div class="active tab-pane" id="asesi">
          <form action="aksi/asesi.php" method="post">
              <input type="hidden" name="aksi" value="login">
              <input type="hidden" name="role" value="asesi">

              <label for="">Username (Nomor Induk Kependudukan(NIK)/Email)</label>
              <div class="input-group mb-3">
                <input type="text" name="username" class="form-control" placeholder="Username" required>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
              </div>
              <label for="">Password</label>
              <div class="input-group mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <button type="submit" class="btn btn-block btn-primary btn-block"> <i class="fas fa-key"></i> Sign In</button>
                </div>
                <!-- /.col -->

              </div>
            </form>
          </div>
          <div class="tab-pane" id="asesor">
            <form action="aksi/asesor.php" method="post">
              <input type="hidden" name="aksi" value="login">
              <input type="hidden" name="role" value="asesor">

              <label for="">Username (Nomor Registrasi Asesor/Email)</label>
              <div class="input-group mb-3">
                <input type="text" name="username" class="form-control" placeholder="Username" required>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
              </div>
              <label for="">Password</label>
              <div class="input-group mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <button type="submit" class="btn btn-block btn-primary btn-block"> <i class="fas fa-key"></i> Sign In</button>
                </div>
                <!-- /.col -->

              </div>
            </form>
          </div>
          <div class="tab-pane" id="administrator">
            <form action="aksi/user.php" method="post">
              <input type="hidden" name="aksi" value="login">
              <input type="hidden" name="role" value="Administrator">

              <label for="">Username</label>
              <div class="input-group mb-3">
                <input type="text" name="username" class="form-control" placeholder="Username" required>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
              </div>
              <label for="">Password</label>
              <div class="input-group mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <button type="submit" class="btn btn-block btn-primary btn-block"> <i class="fas fa-key"></i> Sign In</button>
                </div>
                <!-- /.col -->

              </div>
            </form>
          </div>
        </div>
        <p class="mb-1">
          <a href="#">Lupa Password</a>
        </p>
        <p class="mb-0">
          <a href="registrasi.php" class="text-center">Daftar Calon Asesi</a>
        </p>


      </div>
      <!-- /.login-card-body -->
    </div>

    <i>Username & Password Asesor Bisa Ditanyakan Pada Bagian Administrasi LSP</i>

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