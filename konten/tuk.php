 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <div class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1 class="m-0">Tempat Uji Kompetensi</h1>
                 </div><!-- /.col -->
                 <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                         <li class="breadcrumb-item"><a href="#">Data LSP</a></li>
                         <li class="breadcrumb-item active"> Tempat Uji Kompetensi</li>

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
                     <h3>Data Tempat Uji Kompetensi</h3>
                 </div>
                 <div class="card-body">
                     <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#exampleModal">
                         <i class="fas fa-plus"></i> Tambah</button>
                     <table id="example1" class="table table-sm table-bordered table-striped">
                         <!-- Kepala Tabel -->
                         <thead>
                             <tr>
                                 <td>ID</td>
                                 <td>Kode TUK</td>
                                 <td>Jenis TUK</td>
                                 <td>Nama TUK</td>
                                 <td>Aksi</td>
                             </tr>
                         </thead>
                         <!-- Isi Tabel -->
                         <?php
                            $sql = "SELECT * from tuk WHERE dihapus_pada IS NULL";
                            $query = mysqli_query($koneksi, $sql);
                            while ($kolom = mysqli_fetch_array($query)) {
                            ?>
                             <tr>
                                 <td><?= $kolom['id_tuk']; ?></td>
                                 <td><?= $kolom['kode_tuk']; ?></td>
                                 <td><?= $kolom['jenis_tuk']; ?></td>
                                 <td><?= $kolom['nama_tuk']; ?></td>
                                 <td>
                                     <button type="button" class="btn btn-link editModal" data-toggle="modal" title="Ubah TUK" data-target="#editModal" data-id="<?= $kolom['id_tuk']; ?>"><i class="fas fa-edit"></i></button>
                                     <button type="button" class="btn btn-link hapusModal" title="Hapus TUK" data-toggle="modal" data-target="#hapusModal" data-id="<?= $kolom['id_tuk']; ?>"><i class="fas fa-trash"></i></button>
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

 <!-- Modal Untuk Tambah tuk -->
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="editModalLabel">Tambah TUK</h5>
                 <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <form method="post" enctype="multipart/form-data" action="aksi/tuk.php">
                     <input type="hidden" name="aksi" value="tambah">

                     <div>
                         <label for="kode_tuk">Kode TUK</label>
                         <input type="text" name="kode_tuk" class="form-control" required>
                     </div>
                     <div>
                         <label for="nama_tuk">Nama TUK</label>
                         <input type="text" name="nama_tuk" class="form-control" required>
                     </div>
                     <div>
                         <label for="jenis_tuk">Jenis TUK</label>
                         <input type="text" name="jenis_tuk" class="form-control" required>
                     </div>
                     <div>
                         <label for="alamat">Alamat</label>
                         <textarea name="alamat" class="form-control" required></textarea>
                     </div>
                     <div>
                         <label for="no_telepon">Nomor Telepon</label>
                         <input type="text" pattern="[0-9]+" name="no_telepon" class="form-control" required>
                     </div>
                     <div>
                         <label for="no_hp">Nomor Handphone</label>
                         <input type="text" pattern="[0-9]+" name="no_hp" class="form-control" required>
                     </div>
                     <div>
                         <label for="no_fax">Nomor Fax</label>
                         <input type="text" pattern="[0-9]+" name="no_fax" class="form-control">
                     </div>
                     <div>
                         <label for="email">Email</label>
                         <input type="email" name="email" class="form-control" required>
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

 <!-- Modal Untuk Cek Data Terkait Sebelum Hapus  -->
 <div class="modal fade" id="hapusModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-md">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="editModalLabel">Konfirmasi Hapus Data TUK</h5>
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
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="editModalLabel">Ubah TUK</h5>
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