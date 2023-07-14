 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">User</a></li>
              <li class="breadcrumb-item active"> Data User</li>
              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <row>
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3>Data User</h3>
            </div> 
            <div class="card-body">
              <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#exampleModal">
              <i class="fas fa-plus"></i> Tambah</button>
              <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#exampleModal">
              <i class="fas fa-file-excel"></i> Impor</button>
              <a href="aksi/user.php?aksi=buang-spasi"><button type="button" class="btn btn-warning mb-2">
              <i class="fas fa-cut"></i> Buang Spasi</button></a>
              <a href="aksi/user.php?aksi=set-kapital"><button type="button" class="btn btn-info mb-2">
              <i class="fas fa-font"></i> Kapital</button></a>
              <a href="aksi/user.php?aksi=set-proper"><button type="button" class="btn btn-danger mb-2">
              <i class="fas fa-text-height"></i> Proper</button></a>
              <table id="example1" class="table table-bordered table-striped">
                <!-- Kepala Tabel -->
                <thead>
                  <tr>
                    <td>ID</td>
                    <td>Nama</td>
                    <td>Username</td>
                    <td>Password</td>
                    <td>Login Terakhir</td>
                    <td>Tipe Akses</td>                    
                    <td>Aksi</td>
                  </tr>
                </thead>
                <!-- Isi Tabel -->
<?php
  $sql="select * from user";
  $query=mysqli_query($koneksi,$sql);
  while($kolom=mysqli_fetch_array($query)){  
?>                
                <tr>
                  <td><?= $kolom['id_user']; ?></td>
                  <td><?= $kolom['nama']; ?></td>
                  <td><?= $kolom['username']; ?></td>
                  <td>************</td>
                  <td>
                    <?php 
                    if($kolom['status']=='ONLINE'){
                      echo "<div class='badge badge-success'>".$kolom['status']."</div>";
                    } else {
                      echo $kolom['terakhir_login'];
                    }
                    ?>
                  </td>
                  <td><?= $kolom['akses']; ?></td>                                 
                  <td>
                    <button type="button" class="btn btn-link" data-toggle="modal" data-target="#editModal<?= $kolom['id_user']; ?>"><i class="fas fa-edit"></i></button>
                    <button type="button" class="btn btn-link"><a onclick="return confirm('Data yang dapat dihapus adalah data yang tidak tercatat pada transaksi toko ataupun simpan pinjam,Apakah anda yakin data ini dihapus??')" href="aksi/user.php?aksi=hapus&token=<?= md5($kolom['id_user']); ?>"><i class="fas fa-trash"></i></a></button>
                  </td>
                </tr>
<!-- Modal Edit -->
<div class="modal fade" id="editModal<?= $kolom['id_user']; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Ubah User</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="post" enctype="multipart/form-data" action="aksi/user.php">
        <input type="hidden" name="aksi" value="ubah">
        <div>
          <label for="id_user">ID User</label>  
          <input type="text" class="form-control" readonly name="id_user" value="<?= $kolom['id_user']; ?>">
        </div>
        <div>
          <label for="nama">Nama</label>
          <input type="text" name="nama" class="form-control" value="<?= $kolom['nama']; ?>">
        </div>        
        <div>
          <label for="username">Username</label>
          <input type="text" name="username" class="form-control" value="<?= $kolom['username']; ?>">
        </div>  
        <div>
          <label for="password">Password</label>
          <input type="password" name="password" class="form-control" value="<?= $kolom['password']; ?>">
        </div>        
        <div>
          <label for="akses">Tipe Akses</label>
          <select class="form-control" name="akses">
            <option><?= $kolom['akses']; ?></option>
            <option>Administrator</option>
            <option>Toko</option>
            <option>Simpan Pinjam</option>
          </select>
        </div>       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Ubah</button>
        </form>
      </div>
    </div>
  </div>
</div>                
<?php
  }
?>                
              </table>
            </div> 
          </div>
        </div>
      </row>
             
        
      </div><!-- /.container-fluid -->
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- Modal Untuk Tambah User -->  
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Tambah User</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="post" enctype="multipart/form-data" action="aksi/user.php">
        <input type="hidden" name="aksi" value="tambah">        
        <div>
          <label for="nama">Nama</label>
          <input type="text" name="nama" class="form-control">
        </div>        
        <div>
          <label for="username">Username</label>
          <input type="text" name="username" class="form-control">
        </div>  
        <div>
          <label for="password">Password</label>
          <input type="password" name="password" class="form-control">
        </div>        
        <div>
          <label for="akses">Tipe Akses</label>
          <select class="form-control" name="akses">
            <option>Administrator</option>
            <option>Toko</option>
            <option>Simpan Pinjam</option>
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
