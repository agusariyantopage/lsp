 <?php
    // Mengambil Data Asesi
    $id_asesi = 18;

    ?>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <div class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1 class="m-0">Registrasi Asesmen</h1>
                 </div><!-- /.col -->
                 <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                         <li class="breadcrumb-item"><a href="#">Sertifikasi</a></li>
                         <li class="breadcrumb-item active"> Registrasi Asesmen</li>

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
                     <h3>Data Registrasi Asesmen</h3>
                 </div>
                 <div class="card-body">
                     <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#exampleModal">
                         <i class="fas fa-plus"></i> Daftar Baru</button>
                     <table class="table table-sm table-bordered table-striped">
                         <!-- Kepala Tabel -->
                         <thead>
                             <tr>
                                 <td>ID</td>
                                 <td>Skema Sertifikasi</td>
                                 <td>Materi Uji / Klaster</td>
                                 <td>Status</td>
                                 
                                 <td>Aktif</td>
                             </tr>
                         </thead>
                         <!-- Isi Tabel -->
                         <?php
                            $sql = "SELECT t1.*,(SELECT nama_skema FROM skema WHERE skema.id_skema=t1.id_skema) as nama_skema,(SELECT nama_muk FROM muk WHERE muk.id_muk=t1.id_muk) as nama_muk from asesi_registrasi_asesmen AS t1 WHERE t1.dihapus_pada IS NULL AND t1.id_asesi=$id_asesi";
                            $query = mysqli_query($koneksi, $sql);
                            while ($kolom = mysqli_fetch_array($query)) {
                            ?>
                             <tr>
                                 <td><small><?= $kolom['id_asesi_registrasi_asesmen']; ?></small></td>
                                 <td><small><?= $kolom['nama_skema']; ?></small></td>
                                 <td>
                                     <small>
                                         <?= $kolom['nama_muk']; ?>
                                         <br>Tanggal Ujian : -- Belum Terjadwal --
                                         <br>Jam Ujian : -- Belum Terjadwal --
                                         <br>Tempat Ujian : -- Belum Terjadwal --
                                         <br>Asesor : -- Belum Terjadwal --
                                     </small>
                                 </td>
                                 <td><small><span class="badge badge-danger"><?= $kolom['status']; ?></span></small></td>
                               
                                 <td>
                                     <a title="Aktivasi Asesmen (<?= $kolom['nama_muk']; ?>) " onclick="return confirm('Aktifasi Asesmen Ini??')" class="text-dark" href="aksi/asesi_registrasi_asesmen.php?aksi=aktivasi&id=<?= $kolom['id_asesi_registrasi_asesmen']; ?>&id_asesi=<?= $kolom['id_asesi']; ?>">
                                         <?= ($kolom['is_aktif'] == '1') ? "<i class='fas fa-toggle-on'></i>" : "<i class='fas fa-toggle-off'></i>"; ?>
                                     </a>
                                 </td>


                             </tr>

                         <?php
                            }
                            ?>
                     </table>
                 </div>
             </div>



         </div><!-- /.container-fluid -->

     </section>
     <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->

 <!-- Modal Untuk Tambah skema -->
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="editModalLabel">Tambah Skema</h5>
                 <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <form method="post" enctype="multipart/form-data" action="aksi/skema.php">
                     <input type="hidden" name="aksi" value="tambah">
                     <div>
                         <label for="mode_skema">Mode Skema</label>
                         <input type="text" name="mode_skema" class="form-control" required>
                     </div>
                     <div>
                         <label for="nama_skema">Nama Skema</label>
                         <input type="text" name="nama_skema" class="form-control" required>
                     </div>
                     <div>
                         <label for="kode_skema">Kode Skema</label>
                         <input type="text" name="kode_skema" class="form-control" required>
                     </div>
                     <div>
                         <label for="jenis_skema">Jenis Skema</label>
                         <input type="text" name="jenis_skema" class="form-control" required>
                     </div>
                     <div>
                         <label for="tanggal_penetapan">Tanggal Penetapan</label>
                         <input type="date" name="tanggal_penetapan" class="form-control" required>
                     </div>
                     <div>
                         <label for="status">Status</label>
                         <select name="status" class="form-control" required>
                             <option value="">-- Pilih Status --</option>
                             <option>Aktif</option>
                             <option>Non Aktif</option>
                         </select>
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
                 <h5 class="modal-title" id="editModalLabel">Konfirmasi Hapus Data Skema</h5>
                 <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <div class="isi-skema-hapus"></div>
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
                 <h5 class="modal-title" id="editModalLabel">Ubah skema</h5>
                 <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <div class="isi-skema-ubah"></div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
             </div>
         </div>
     </div>
 </div>