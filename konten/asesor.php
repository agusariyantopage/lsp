 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <div class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1 class="m-0">Asesor</h1>
                 </div><!-- /.col -->
                 <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                         <li class="breadcrumb-item"><a href="#">Data LSP</a></li>
                         <li class="breadcrumb-item active"> Asesor</li>

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
                     <h3>Data Asesor</h3>
                 </div>
                 <div class="card-body">
                     <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#exampleModal">
                         <i class="fas fa-plus"></i> Tambah</button>
                     <table id="example1" class="table table-sm table-bordered table-striped">
                         <!-- Kepala Tabel -->
                         <thead>
                             <tr>
                                 <td>ID</td>
                                 <td>Nomor Registrasi</td>
                                 <td>Nama</td>
                                 <td>Nomor Handphone</td>
                                 <td>Aksi</td>
                             </tr>
                         </thead>
                         <!-- Isi Tabel -->
                         <?php
                            $sql = "SELECT * from asesor WHERE dihapus_pada IS NULL";
                            $query = mysqli_query($koneksi, $sql);
                            while ($kolom = mysqli_fetch_array($query)) {
                            ?>
                             <tr>
                                 <td><?= $kolom['id_asesor']; ?></td>
                                 <td><?= $kolom['nomor_registrasi']; ?></td>
                                 <td><?= $kolom['nama']; ?></td>
                                 <td><?= $kolom['no_hp']; ?></td>
                                 <td>
                                     <button type="button" class="btn btn-link editModal" data-toggle="modal" title="Ubah Asesor" data-target="#editModal" data-id="<?= $kolom['id_asesor']; ?>"><i class="fas fa-edit"></i></button>
                                     <button type="button" class="btn btn-link hapusModal" title="Hapus Asesor" data-toggle="modal" data-target="#hapusModal" data-id="<?= $kolom['id_asesor']; ?>"><i class="fas fa-trash"></i></button>
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

 <!-- Modal Unasesor Tambah asesor -->
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="editModalLabel">Tambah Asesor</h5>
                 <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <form method="post" enctype="multipart/form-data" action="aksi/asesor.php">
                     <input type="hidden" name="aksi" value="tambah">
                     <div>
                         <label for="nomor_registrasi">Nomor Registrasi Asesor</label>
                         <input type="text" name="nomor_registrasi" class="form-control" required>
                     </div>
                     <div>
                         <label for="nama">Nama Lengkap</label>
                         <input type="text" name="nama" class="form-control" required>
                     </div>
                     <div class="row">
                         <div class="col-md-6">
                             <label for="kewarganegaraan">kewarganegaraan</label>
                             <input type="text" name="kewarganegaraan" value="Indonesia" class="form-control" required>
                         </div>
                         <div class="col-md-6">
                             <label for="nik">Nomor Induk Kependudukan</label>
                             <input type="text" name="nik" class="form-control" required>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-md-4">
                             <label for="tempat_lahir">Tempat Lahir</label>
                             <input type="text" name="tempat_lahir" class="form-control" required>
                         </div>
                         <div class="col-md-4">
                             <label for="tanggal_lahir">Tanggal Lahir</label>
                             <input type="date" name="tanggal_lahir" class="form-control" required>
                         </div>
                         <div class="col-md-4">
                             <label for="jenis_kelamin">Jenis Kelamin</label>
                             <select name="jenis_kelamin" class="form-control" required>
                                 <option value="">-- Pilih Jenis Kelamin --</option>
                                 <option>Laki-Laki</option>
                                 <option>Perempuan</option>
                             </select>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-md-6">
                             <label for="pendidikan_terakhir">Pendidikan Terakhir</label>
                             <select name="pendidikan_terakhir" class="form-control" required>
                                 <option value="">-- Pilih Pendidikan Terakhir --</option>
                                 <option>SD</option>
                                 <option>SMP</option>
                                 <option>SMA</option>
                                 <option>D1</option>
                                 <option>D2</option>
                                 <option>D3</option>
                                 <option>D4</option>
                                 <option>S1</option>
                                 <option>S2</option>
                                 <option>S3</option>
                             </select>
                         </div>
                         <div class="col-md-6">
                             <label for="pekerjaan">Pekerjaan</label>
                             <input type="text" name="pekerjaan" class="form-control" required>
                         </div>
                     </div>
                     <div>
                         <label for="alamat">Alamat</label>
                         <textarea name="alamat" class="form-control" required></textarea>
                     </div>
                     <div class="row">
                         <div class="col-md-6">
                             <label for="no_hp">Nomor Handphone</label>
                             <input type="text" pattern="[0-9]+" name="no_hp" class="form-control" required>
                         </div>

                         <div class="col-md-6">
                             <label for="email">Email</label>
                             <input type="email" name="email" class="form-control" required>
                         </div>
                     </div>



             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                 <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                 </form>
             </div>
         </div>
     </div>
 </div>

 <!-- Modal Unasesor Cek Data Terkait Sebelum Hapus  -->
 <div class="modal fade" id="hapusModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-md">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="editModalLabel">Konfirmasi Hapus Data Asesor</h5>
                 <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <div class="isi-hapus"></div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>


             </div>
         </div>
     </div>
 </div>

 <!-- Modal Edit -->
 <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="editModalLabel">Ubah Data Asesor</h5>
                 <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <div class="isi-ubah"></div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
             </div>
         </div>
     </div>
 </div>