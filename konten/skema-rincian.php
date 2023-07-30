 <?php
    $id = $_GET['id'];
    $kolom = get_single_data($koneksi, "skema", "id_skema", $id);

    ?>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <div class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1 class="m-0">Rincian Elemen & KUK Skema</h1>                     
                 </div><!-- /.col -->
                 <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                         <li class="breadcrumb-item"><a href="#">Data LSP</a></li>
                         <li class="breadcrumb-item"><a href="<?= $BASE_URL; ?>/skema">Skema</a></li>
                         <li class="breadcrumb-item"><a href="index.php?p=skema-ubah&id=<?= $id; ?>"> ID [<?= $id; ?>]</a></li>
                         <li class="breadcrumb-item active">Rincian Elemen & KUK</li>

                     </ol>
                 </div><!-- /.col -->
             </div><!-- /.row -->
         </div><!-- /.container-fluid -->
     </div>
     <!-- /.content-header -->

     <!-- Main content -->
     <section class="content">
         <div class="container-fluid">
         <h5><?= $kolom['nama_skema']; ?></h5>
             <?php
                $no_unit = 0;
                $sql_skema = "SELECT * from skema_unit WHERE id_skema=$id AND dihapus_pada IS NULL";
                $query_unit = mysqli_query($koneksi, $sql_skema);
                while ($kolom_unit = mysqli_fetch_array($query_unit)) {

                ?>

                 <div class="card">
                     <div class="card-header">
                         <h5><?= $kolom_unit['judul_unit']; ?> (<?= $kolom_unit['kode_unit']; ?>)</h5>
                     </div>
                     <div class="card-body">
                         <button type="button" class="btn btn-info mb-2 tambahElemenModal" data-toggle="modal" data-id="<?= $kolom_unit['id_skema_unit']; ?>" data-target="#tambahElemenModal">
                             <i class="fas fa-plus"></i> Tambah Elemen Kompetensi</button>

                         <table class="table table-sm table-bordered table-striped">
                             <!-- Kepala Tabel -->
                             <thead>
                                 <tr>

                                     <th>Elemen Kompetensi</th>
                                     <th>Kriteria Unjuk Kerja</th>

                                 </tr>
                             </thead>
                             <?php
                                $no_unit = 0;
                                $id_skema_unit=$kolom_unit['id_skema_unit'];
                                $sql = "SELECT * from skema_elemen WHERE id_skema_unit=$id_skema_unit AND dihapus_pada IS NULL";
                                $query = mysqli_query($koneksi, $sql);
                                while ($kolom = mysqli_fetch_array($query)) {
                                    $no_unit++;
                                    $id_skema_elemen=$kolom['id_skema_elemen'];
                                ?>
                                 <tr>

                                     <td width="50%">(<?= $kolom['kode_elemen']; ?>) <?= $kolom['judul_elemen']; ?> <a data-target="#tambahKUKModal" data-toggle="modal" class="text-dark tambahKUKModal" title="Tambah Kriteria Unjuk Kerja" data-id="<?= $kolom['id_skema_elemen']; ?>" href="#"><i class="fas fa-plus text-info"></i></a> 
                                     | <a data-target='#ubahElemenModal' data-toggle='modal' class='text-dark ubahElemenModal' title='Ubah Elemen Kompetensi' data-id='<?= $kolom['id_skema_elemen']; ?>' href='#'><i class="fas fa-edit text-info"></i></a> 
                                     | <a data-target='#hapusElemenModal' data-toggle='modal' class='text-dark hapusElemenModal' title='Hapus Elemen Kompetensi' data-id='<?= $kolom['id_skema_elemen']; ?>' href='#'><i class="fas fa-trash text-info"></i></a>
                                    </td>
                                     <td width="50%">
                                     <?php 
                                        $sql_kuk="SELECT * from skema_kuk WHERE id_skema_elemen=$id_skema_elemen AND dihapus_pada IS NULL";
                                        $query_kuk = mysqli_query($koneksi, $sql_kuk);
                                        while ($kolom_kuk = mysqli_fetch_array($query_kuk)) {
                                            echo "($kolom_kuk[kode_kuk]) $kolom_kuk[judul_kuk]";
                                            echo " <a data-target='#ubahKUKModal' data-toggle='modal' class='text-dark ubahKUKModal' title='Ubah Kriteria Unjuk Kerja' data-id='$kolom_kuk[id_skema_kuk]' href='#'><i class='fas fa-edit text-info'></i></a> | <a data-target='#hapusKUKModal' data-toggle='modal' class='text-dark hapusKUKModal' title='Hapus Kriteria Unjuk Kerja' data-id='$kolom_kuk[id_skema_kuk]' href='#'><i class='fas fa-trash text-info'></i></a><br>";
                                        }
                                     ?>
                                     
                                    </td>

                                 </tr>

                             <?php
                                }
                                ?>
                         </table>
                     </div>
                 </div>

             <?php
                }
                ?>

         </div><!-- /.container-fluid -->
     </section>
     <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->

 <!-- Modal Untuk Tambah skema -->
 <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="editModalLabel">Tambah Unit Skema</h5>
                 <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <form method="post" enctype="multipart/form-data" action="aksi/skema.php">
                     <input type="hidden" name="aksi" value="tambah-unit">
                     <input type="hidden" name="id_skema" value="<?= $id; ?>">
                     <div>
                         <label for="kode_unit">Kode Unit</label>
                         <input type="text" name="kode_unit" class="form-control" required>
                     </div>
                     <div>
                         <label for="judul_unit">Judul Unit</label>
                         <textarea name="judul_unit" class="form-control" rows="3" required></textarea>
                     </div>



             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                 <button type="submit" class="btn btn-primary">Tambah</button>
                 </form>
             </div>
         </div>
     </div>
 </div>

 <!-- Modal Untuk Cek Data Terkait Sebelum Hapus  -->
 <div class="modal fade" id="hapusModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-md">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="editModalLabel">Konfirmasi Hapus Data Unit Skema</h5>
                 <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <div class="isi-skema-unit-hapus"></div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>


             </div>
         </div>
     </div>
 </div>

 <!-- Modal Edit -->
 <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="editModalLabel">Ubah Unit Skema</h5>
                 <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <div class="isi-skema-unit-ubah"></div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
             </div>
         </div>
     </div>
 </div>

 <!-- Modal Tambah Elemen -->
 <div class="modal fade" id="tambahElemenModal" tabindex="-1" aria-labelledby="tambahElemenModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="tambahElemenModalLabel">Tambah Elemen</h5>
                 <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <div class="isi-elemen-tambah"></div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
             </div>
         </div>
     </div>
 </div>

 <!-- Modal Ubah Elemen -->
 <div class="modal fade" id="ubahElemenModal" tabindex="-1" aria-labelledby="ubahElemenModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="ubahElemenModalLabel">Ubah Elemen Kompetensi</h5>
                 <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <div class="isi-elemen-ubah"></div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
             </div>
         </div>
     </div>
 </div>

 <!-- Modal Hapus Elemen  -->
 <div class="modal fade" id="hapusElemenModal" tabindex="-1" aria-labelledby="hapusElemenModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-md">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="hapusElemenModalLabel">Konfirmasi Hapus Data Elemen Kompetensi</h5>
                 <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <div class="isi-elemen-hapus"></div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>


             </div>
         </div>
     </div>
 </div>

 <!-- Modal Tambah KUK -->
 <div class="modal fade" id="tambahKUKModal" tabindex="-1" aria-labelledby="tambahKUKModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="tambahKUKModalLabel">Tambah Kriteria Unjuk Kerja</h5>
                 <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <div class="isi-kuk-tambah"></div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
             </div>
         </div>
     </div>
 </div>

 <!-- Modal Ubah KUK -->
 <div class="modal fade" id="ubahKUKModal" tabindex="-1" aria-labelledby="ubahKUKModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="ubahKUKModalLabel">Ubah Kriteria Unjuk Kerja</h5>
                 <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <div class="isi-kuk-ubah"></div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
             </div>
         </div>
     </div>
 </div>

 <!-- Modal Hapus KUK  -->
 <div class="modal fade" id="hapusKUKModal" tabindex="-1" aria-labelledby="hapusKUKModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-md">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="hapusKUKModalLabel">Konfirmasi Hapus Data Kriteria Unjuk Kerja</h5>
                 <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <div class="isi-kuk-hapus"></div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>


             </div>
         </div>
     </div>
 </div>