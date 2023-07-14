  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Restore</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Pemeliharaan</a></li>
              <li class="breadcrumb-item active">Restore</li>

            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <form enctype="multipart/form-data" method="post">

          <label for="datafile">Pilih File Restore (Extensi .sql)</label>
          <input type="file" accept=".sql" class="form-control" name="datafile" required>

          <label for="token">Masukkan Token Restore</label>
          <input name="token" type="password" class="form-control" required>

          <button class="btn btn-info mt-2" type="submit" onclick="return confirm('Apakah Anda yakin akan restore database?')" name="restore" value="Restore Database"> <i class="fas fa-restore"></i> Restore Database Sekarang
            <!DOCTYPE html>
            <html lang="en">

            <head>
              <meta charset="UTF-8">
              <meta name="viewport" content="width=device-width, initial-scale=1.0">
              <title>Document</title>
            </head>

            <body>

            </body>

            </html>
          </button>
        </form>
        <?php
        if (isset($_POST['restore'])) {

          $nama_file = $_FILES['datafile']['name'];
          $ukuran = $_FILES['datafile']['size'];
          $token = $_POST['token'];
          $valid_token="valid_token";
          if ($token == $valid_token) {
            // Token Valid
            if ($nama_file == "") {
              echo "Error";
            } else {
              $uploaddir = 'maintenance/restore/';
              $alamatfile = $uploaddir . $nama_file;

              if (move_uploaded_file($_FILES['datafile']['tmp_name'], $alamatfile)) {

                $filename = 'maintenance/restore/' . $nama_file . '';

                $templine = '';
                $lines = file($filename);
                foreach ($lines as $line) {
                  if (substr($line, 0, 2) == '--' || $line == '')
                    continue;

                  $templine .= $line;
                  if (substr(trim($line), -1, 1) == ';') {
                    mysqli_query($koneksi, $templine) or print('<span class="badge badge-danger">Error performing query :' . substr($templine,0,50).'...' . '\': ' . mysqli_error($koneksi) . '</span><br />');
                    $templine = '';
                  }
                }
                echo "<span class='badge badge-success'>Berhasil Restore Database.</badge>";
              } else {
                echo "<p>Proses upload gagal, kode error = " . $_FILES['location']['error'] . "</p>";
              }
            }
          } 
          else {
            // Invalid Token
            echo "<span class='badge badge-danger'>Terjadi Kesalahan : Token Tidak Valid</span>";
          }
        } else {
          unset($_POST['restore']);
        }
        ?>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->