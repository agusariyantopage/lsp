 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1 class="m-0">Skema</h1>
         </div><!-- /.col -->
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="#">Data LSP</a></li>
             <li class="breadcrumb-item active"> Skema</li>

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
           <h3>Data Skema</h3>
         </div>
         <div class="card-body">
           <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#exampleModal">
             <i class="fas fa-plus"></i> Tambah</button>
           <table id="example1" class="table table-sm table-bordered table-striped">
             <!-- Kepala Tabel -->
             <thead>
               <tr>
                 <td>ID</td>
                 <td>Kode Skema</td>
                 <td>Jenis Skema</td>
                 <td>Nama Skema</td>
                 <td>Aksi</td>
               </tr>
             </thead>
             <!-- Isi Tabel -->
             <?php
              $sql = "SELECT * from skema WHERE dihapus_pada IS NULL";
              $query = mysqli_query($koneksi, $sql);
              while ($kolom = mysqli_fetch_array($query)) {
              ?>
               <tr>
                 <td><?= $kolom['id_skema']; ?></td>
                 <td><?= $kolom['kode_skema']; ?></td>
                 <td><?= $kolom['jenis_skema']; ?></td>
                 <td><?= $kolom['nama_skema']; ?></td>
                 <td>
                   
                   <a href="index.php?p=skema-ubah&id=<?= $kolom['id_skema']; ?>"><button type="button" class="btn btn-link"><i class="fas fa-search"></i></button></a>
                   <button type="button" class="btn btn-link hapusModal" title="Hapus skema" data-toggle="modal" data-target="#hapusModal" data-id="<?= $kolom['id_skema']; ?>"><i class="fas fa-trash"></i></button>
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