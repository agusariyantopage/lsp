  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1 class="m-0">Backup</h1>
                  </div><!-- /.col -->
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="#">Pemeliharaan</a></li>
                          <li class="breadcrumb-item active">Backup</li>

                      </ol>
                  </div><!-- /.col -->
              </div><!-- /.row -->
          </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
          <div class="container-fluid">
              <table class="table table-sm">
                  <thead>

                      <tr>
                          <th>NO</th>
                          <th>DATA</th>
                          <th>JUMLAH DATA</th>
                      </tr>
                  </thead>

                  <?php
                    $queryTables    = $mysqli->query('SHOW TABLES');
                    while ($row = $queryTables->fetch_row()) {
                        $target_tables[] = $row[0];
                    }
                    //Menampilkan Tabel Tersedia
                    $no = 0;
                    foreach ($target_tables as $table) {
                        $result = $mysqli->query('SELECT * FROM ' . $table);
                        $fields_amount = $result->field_count;
                        $rows_num = $mysqli->affected_rows;
                        $no++;
                        echo "
                                <tr>
                                    <td>" . $no . "</td>
                                    <td>DATA " . strtoupper(str_replace("_", " ", $table)) . "</td>
                                    <td>" . $rows_num . "</td>
                                </tr>
                                ";
                    }
                    ?>
              </table>
              
                      <a href="aksi/backup.php"><button type="button" class="btn btn-block btn-info mb-3">
                              <i class="fas fa-cog"></i> Proses Backup Semua Data</button></a>
             
          </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->