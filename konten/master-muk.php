 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1 class="m-0">Master MUK</h1>
         </div><!-- /.col -->
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="#">Perangkat Uji</a></li>
             <li class="breadcrumb-item active"> Master MUK</li>

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
           <h3>Data Master MUK (Materi Uji Kompetensi)</h3>
         </div>
         <div class="card-body">
           <button type="button" class="btn btn-info mb-2" data-toggle="modal" data-target="#exampleModal">
             <i class="fas fa-plus"></i> Tambah</button>
           <table id="example1" class="table table-sm table-bordered table-striped">
             <!-- Kepala Tabel -->
             <thead>
               <tr>
                 <td>ID</td>
                 <td>Kode Skema</td>
                 <td>Deskripsi</td>
                 <td>Jumlah MUK</td>
                 <td>Kontributor</td>
                 <td>Aksi</td>
               </tr>
             </thead>
             <!-- Isi Tabel -->
             <?php
              $sql = "SELECT muk_master.*,kode_skema FROM muk_master,skema WHERE muk_master.id_skema=skema.id_skema AND muk_master.dihapus_pada IS NULL";
              $query = mysqli_query($koneksi, $sql);
              while ($kolom = mysqli_fetch_array($query)) {
              ?>
               <tr>
                 <td><?= $kolom['id_muk_master']; ?></td>
                 <td><?= $kolom['kode_skema']; ?></td>
                 <td><?= $kolom['deskripsi']; ?></td>
                 <td><?= get_jumlah_data($koneksi,'muk','id_muk_master',$kolom['id_muk_master']) ?></td>
                 <td>Beni,Joni,Dio</td>
                 <td>
                   [ <a data-target='#tambahMUKModal' data-toggle='modal' class='text-dark tambahMUKModal' title='Tambah Materi Uji Kompetensi' data-id='<?= $kolom['id_muk_master']; ?>' href='#'><i class="fas fa-plus text-info"></i></a> ]
                   [ <a data-target='#editModal' data-toggle='modal' class='text-dark editModal' title='Ubah Master Materi Uji Kompetensi' data-id='<?= $kolom['id_muk_master']; ?>' href='#'><i class="fas fa-edit text-info"></i></a> ]
                   [ <a data-target='#hapusModal' data-toggle='modal' class='text-dark hapusModal' title='Hapus Master Materi Uji Kompetensi' data-id='<?= $kolom['id_muk_master']; ?>' href='#'><i class="fas fa-trash text-info"></i></a> ]
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
   <div class="modal-dialog modal-lg">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="editModalLabel">Tambah Master Materi Uji Kompetensi</h5>
         <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body">
         <form method="post" enctype="multipart/form-data" action="aksi/muk_master.php">
           <input type="hidden" name="aksi" value="tambah">
           <div>
             <label for="id_skema">Skema</label>
             <select name="id_skema" class="form-control" required>
               <option value="">-- Pilih Skema --</option>
               <?= call_option($koneksi, "skema", "id_skema", "id_skema", "nama_skema"); ?>
             </select>
           </div>
           <div>
             <label for="deskripsi">Deskripsi</label>
             <textarea name="deskripsi" class="form-control" rows="3" required></textarea>
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
         <h5 class="modal-title" id="editModalLabel">Konfirmasi Hapus Data Master MUK</h5>
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
         <h5 class="modal-title" id="editModalLabel">Ubah Master Materi Uji Kompetensi</h5>
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

 <!-- Modal Tambah Perangkat Uji Kompetensi -->
 <div class="modal fade" id="tambahMUKModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="editModalLabel">Tambah Materi Uji Kompetensi</h5>
         <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body">
         <div class="isi-tambah"></div>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
       </div>
     </div>
   </div>
 </div>