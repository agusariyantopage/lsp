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
                     <h1 class="m-0">Ubah Skema</h1>
                 </div><!-- /.col -->
                 <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                         <li class="breadcrumb-item"><a href="#">Data LSP</a></li>
                         <li class="breadcrumb-item"><a href="<?= $BASE_URL; ?>/skema">Skema</a></li>
                         <li class="breadcrumb-item active">Ubah ID [<?= $kolom['id_skema']; ?>]</li>

                     </ol>
                 </div><!-- /.col -->
             </div><!-- /.row -->
         </div><!-- /.container-fluid -->
     </div>
     <!-- /.content-header -->

     <!-- Main content -->
     <section class="content">
         <div class="container-fluid">
             <div class="card">
                 <div class="card-header">
                     <h5>Data Umum Skema</h5>
                 </div>
                 <div class="card-body">
                     <form method="post" enctype="multipart/form-data" action="aksi/skema.php">
                         <input type="hidden" name="aksi" value="ubah">
                         <input type="hidden" name="id_skema" value="<?= $kolom['id_skema']; ?>">

                         <div>
                             <label for="mode_skema">Mode Skema</label>
                             <input type="text" name="mode_skema" class="form-control" value="<?= $kolom['mode_skema']; ?>" required>
                         </div>
                         <div>
                             <label for="nama_skema">Nama Skema</label>
                             <textarea name="nama_skema" class="form-control" rows="3" required><?= $kolom['nama_skema']; ?></textarea>
                         </div>
                         <div>
                             <label for="kode_skema">Kode Skema</label>
                             <input type="text" name="kode_skema" class="form-control" value="<?= $kolom['kode_skema']; ?>" required>
                         </div>
                         <div>
                             <label for="jenis_skema">Jenis Skema</label>
                             <input type="text" name="jenis_skema" class="form-control" value="<?= $kolom['jenis_skema']; ?>" required>
                         </div>
                         <div>
                             <label for="tanggal_penetapan">Tanggal Penetapan</label>
                             <input type="date" name="tanggal_penetapan" class="form-control" value="<?= $kolom['tanggal_penetapan']; ?>" required>
                         </div>
                         <div>
                             <label for="status">Status</label>
                             <select name="status" class="form-control" required>
                                 <option value="">-- Pilih Status --</option>
                                 <?php echo ($kolom['status'] == 'Aktif') ? "<option value='$kolom[status]' selected>Aktif</option>" : "<option>Aktif</option>"; ?>
                                 <?php echo ($kolom['status'] == 'Non Aktif') ? "<option value='$kolom[status]' selected>Non Aktif</option>" : "<option>Non Aktif</option>"; ?>
                             </select>
                         </div>

                         <button type="submit" class="btn btn-info btn-block mt-2"><i class="fas fa-save"></i> Simpan Perubahan</button>
                     </form>
                 </div>
             </div>

             <div class="card">
                 <div class="card-header">
                     <h5>Data Skema Unit</h5>
                 </div>
                 <div class="card-body">

                     <button type="button" class="btn btn-info mb-2" data-toggle="modal" data-target="#tambahModal">
                         <i class="fas fa-plus"></i> Tambah</button>
                     <table id="finditem" class="table table-sm table-bordered table-striped">
                         <!-- Kepala Tabel -->
                         <thead>
                             <tr>
                                 <td>No</td>
                                 <td>Kode Unit</td>
                                 <td>Judul Unit</td>
                                 <td>Aksi</td>
                             </tr>
                         </thead>
                         <?php
                            $no_unit=0;
                            $sql = "SELECT * from skema_unit WHERE id_skema=$id AND dihapus_pada IS NULL";
                            $query = mysqli_query($koneksi, $sql);
                            while ($kolom = mysqli_fetch_array($query)) {
                                $no_unit++;
                            ?>
                             <tr>
                                 <td><?= $no_unit; ?></td>
                                 <td><?= $kolom['kode_unit']; ?></td>
                                 <td><?= $kolom['judul_unit']; ?></td>                                 
                                 <td>
                                     [ <a data-target='#editModal' data-toggle='modal' class='text-dark editModal' title='Ubah Unit' data-id='<?= $kolom['id_skema_unit']; ?>' href='#'><i class="fas fa-edit text-info"></i></a> ] 
                                     [ <a data-target='#hapusModal' data-toggle='modal' class='text-dark hapusModal' title='Hapus Unit' data-id='<?= $kolom['id_skema_unit']; ?>' href='#'><i class="fas fa-trash text-info"></i></a> ]
                                 </td>
                             </tr>

                         <?php
                            }
                            ?>
                     </table>
                     <a href="index.php?p=skema-rincian&id=<?= $id; ?>"><button type="button" class="btn btn-block btn-info mt-1"><i class="fas fa-file"></i> Kelola Elemen Kompetensi & Kriteria Unjuk Kerja</button></a>
                 </div>
             </div>

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