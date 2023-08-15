<?php
session_start();
include "koneksi.php";
include "function.php";
if (empty($_SESSION['status_proses'])) {
    $status_proses = '';
} else {
    $status_proses = $_SESSION['status_proses'];
}

// Simpan Data
if (!empty($_POST['nama_lengkap'])) {
    $nama_lengkap = $_POST['nama_lengkap'];
    $nomor_identitas = $_POST['nomor_identitas'];
    $email_pribadi = $_POST['email_pribadi'];
    $password_asesi = $_POST['password_asesi'];
    $repassword_asesi = $_POST['repassword_asesi'];
    $id_skema = $_POST['id_skema'];

    $cek_data = "SELECT * FROM asesi WHERE nomor_identitas='$nomor_identitas' OR email_pribadi='$email_pribadi'";
    $query_cek_data = mysqli_query($koneksi, $cek_data);
    if (mysqli_num_rows($query_cek_data) >= 1) {
        $pesan = '<span class="badge badge-small text-danger"> Pendaftaran Gagal Karena Nomor Identitas (NIK/Nomor Paspor) atau Email Sudah Terdaftar!!!<br>Silahkan hubungi LSP untuk informasi lebih lanjut</span>';
    } else {
        if ($password_asesi != $repassword_asesi) {
            $pesan = '<span class="badge badge-small text-danger"> Password dan Ketik Ulang Password Tidak Cocok!!!</span>';
            $password_asesi = '';
            $repassword_asesi = '';
        } else {
            $sql = "INSERT INTO asesi (id_asesi,nama_lengkap,nomor_identitas,email_pribadi,password_asesi) values(DEFAULT,'$nama_lengkap','$nomor_identitas','$email_pribadi','$password_asesi')";
            mysqli_query($koneksi, $sql);
            // Menambahkan Skema dan MUK
            $kolom_asesi = get_last_data($koneksi, "asesi","id_asesi");
            $id_asesi= $kolom_asesi['id_asesi'];
            $kolom_master = get_single_data($koneksi, "muk_master", "id_skema", $id_skema);
            $id_muk_master= $kolom_master['id_muk_master'];
            // $kolom_muk = get_single_data($koneksi, "muk", "id_muk_master", $id);
            $sql_get_muk="SELECT * FROM muk WHERE id_muk_master=$id_muk_master";
            $query_muk=mysqli_query($koneksi,$sql_get_muk);
            while($kolom_muk=mysqli_fetch_array($query_muk)){
                $id_muk= $kolom_muk['id_muk'];
                $sql_registrasi_asesmen="INSERT INTO asesi_registrasi_asesmen(id_skema,id_muk,id_asesi) VALUES($id_skema,$id_muk,$id_asesi)";
                mysqli_query($koneksi, $sql_registrasi_asesmen);
                // echo $sql_registrasi_asesmen;
            }
            // pesan_transaksi($koneksi);
            $pesan = '<span class="badge badge-small text-success"> Pendaftaran Akun Berhasil !!!</span>';
            $nama_lengkap = '';
            $nomor_identitas = '';
            $email_pribadi = '';
            $password_asesi = '';
            $repassword_asesi = '';
            $id_skema = '';
        }
    }
} else {
    $nama_lengkap = '';
    $nomor_identitas = '';
    $email_pribadi = '';
    $password_asesi = '';
    $repassword_asesi = '';
    $id_skema = '';
    $pesan = '';
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
            <h5><b>Halaman Registrasi Akun Calon Asesi</b></h5>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Silahkan lengkapi formulir ini!</p>

                <form name="quickForm" id="quickForm" action="" method="post">
                    <input type="hidden" name="aksi" value="daftar-akun">
                    <label for="">Nama Lengkap</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="nama_lengkap" value="<?= $nama_lengkap; ?>" placeholder="Nama Lengkap" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <label for="">Nomor Identitas</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="nomor_identitas" value="<?= $nomor_identitas; ?>" title="Nomor KTP/NIK/Nomor Paspor" placeholder="NIK/Paspor" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-sort-numeric-up-alt"></span>
                            </div>
                        </div>
                    </div>
                    <label for="">Email Pribadi</label>
                    <div class="input-group mb-3">
                        <input id="email_pribadi" name="email_pribadi" value="<?= $email_pribadi; ?>" type="email" class="form-control" placeholder="Email Pribadi" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <label for="">Skema Sertifikasi</label>
                    <div class="input-group mb-3">
                        <select name="id_skema" value="<?= $id_skema; ?>" class="form-control" required>
                            <option value="">-- Pilih Skema Sertifikasi --</option>
                            <?= call_option($koneksi, 'skema', 'nama_skema', 'id_skema', 'nama_skema'); ?>
                        </select>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-clipboard"></span>
                            </div>
                        </div>
                    </div>
                    <label for="">Password</label>
                    <div class="input-group mb-3">
                        <input name="password_asesi" type="password" value="<?= $password_asesi; ?>" class="form-control" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <label for="">Ketik Ulang Password</label>
                    <div class="input-group mb-3">
                        <input name="repassword_asesi" value="<?= $repassword_asesi; ?>" type="password" class="form-control" placeholder="Ketik ulang password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">

                            <button id="submit-btn" type="submit" class="btn btn-primary btn-block"> <i class="fas fa-save"></i> Daftar Calon Asesi</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <p class="mb-0">
                    <a href="login.php" class="text-center">Ke Halaman Login</a>
                </p>


            </div>
            <!-- /.login-card-body -->

        </div>



    </div>
    <div>
        <?= $pesan; ?>
    </div>

    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <script src="dist/js/sweetalert2.all.min.js"></script>
    <!-- jquery-validation -->
    <script src="../../plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="../../plugins/jquery-validation/additional-methods.min.js"></script>
    <script>
        var statusProses = '<?= $status_proses; ?>';
        if (statusProses === 'SUKSES') {
            Swal.fire({
                //position: 'top-end',
                icon: 'success',
                title: 'Berhasil Membuat Akun',
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