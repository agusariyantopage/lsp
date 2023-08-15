 <?php
    $id_muk = 6;
    ?>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <div class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1 class="m-0">Pra-Asesmen</h1>
                 </div><!-- /.col -->
                 <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                         <li class="breadcrumb-item"><a href="#">Sertifikasi</a></li>
                         <li class="breadcrumb-item active"> Pra-Asesmen</li>

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
                     <h3>Pra-Asesmen</h3>
                 </div>
                 <div class="card-body">
                     <ul class="nav nav-pills">
                         <li class="nav-item md-6"><a class="nav-link active mb-2 md-6" href="#APL01" data-toggle="tab"><i class="fas fa-clipboard"></i> Permohonan Sertifikasi</a></li>
                         <li class="nav-item md-6"><a class="nav-link mb-2 md-6" href="#APL02" data-toggle="tab"><i class="fa fa-check"></i> Asesmen Mandiri</a></li>
                         <li class="nav-item md-6"><a class="nav-link mb-2 md-6" href="#AK01" data-toggle="tab"><i class="fa fa-handshake"></i> Persetujuan Asesmen</a></li>
                     </ul>

                     <div class="tab-content">
                         <div class="active tab-pane" id="APL01">
                             <h5>FR.APL.01 Formulir Permohonan Sertifikasi Kompetensi</h5>
                             <hr>
                             <h6>Bagian 1 : Rincian Data Pemohon Sertifikasi</h6>
                             a. Data Pribadi
                             <form action="#">
                                 <label for="nama_lengkap">Nama Lengkap</label>
                                 <input type="text" name="nama_lengkap" class="form-control" required>
                                 <label for="nomor_identitas">Nomor Identitas (NO KTP/NIK/No Paspor)</label>
                                 <input type="text" name="nomor_identitas" class="form-control" required>
                                 <div class="row">
                                     <div class="col-md-6">
                                         <label for="tempat_lahir">Tempat Lahir</label>
                                         <input type="text" name="tempat_lahir" class="form-control" required>
                                     </div>
                                     <div class="col-md-6">
                                         <label for="tanggal_lahir">Tanggal Lahir</label>
                                         <input type="date" name="tanggal_lahir" class="form-control" required>
                                     </div>
                                 </div>
                                 <label for="kebangsaan">Kebangsaan</label>
                                 <input type="text" name="kebangsaan" class="form-control" required>
                                 <label for="alamat_pribadi">Alamat</label>
                                 <textarea name="alamat_pribadi" class="form-control" rows="3" required></textarea>
                                 <label for="kode_pos">Kode Pos</label>
                                 <input type="text" name="kode_pos" class="form-control" required>
                                 <div class="row">
                                     <div class="col-md-6">
                                         <label for="telepon_rumah">Nomor Telpon Rumah</label>
                                         <input type="text" name="telepon_rumah" class="form-control">
                                     </div>
                                     <div class="col-md-6">
                                         <label for="telepon_kantor">Nomor Telepon Kantor</label>
                                         <input type="text" name="telepon_kantor" class="form-control">
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-md-6">
                                         <label for="hp_pribadi">Nomor Handphone Pribadi</label>
                                         <input type="text" name="hp_pribadi" class="form-control" required>
                                     </div>
                                     <div class="col-md-6">
                                         <label for="email_pribadi">Email Pribadi</label>
                                         <input type="email" name="email_pribadi" class="form-control" required>
                                     </div>
                                 </div>
                                 <label for="kualifikasi_pendidikan">Kualifikasi Pendidikan</label>
                                 <select name="kualifikasi_pendidikan" class="form-control" required>
                                     <option value="">-- Pilih Kualifikasi Pendidikan --</option>
                                     <?php echo ($alumni['kualifikasi_pendidikan'] == 'SD/MI') ? "<option value='$alumni[kualifikasi_pendidikan]' selected>SD/MI</option>" : "<option>SD/MI</option>"; ?>
                                     <?php echo ($alumni['kualifikasi_pendidikan'] == 'SMP/MTS') ? "<option value='$alumni[kualifikasi_pendidikan]' selected>SMP/MTS</option>" : "<option>SMP/MTS</option>"; ?>
                                     <?php echo ($alumni['kualifikasi_pendidikan'] == 'SMA/SMK/MA') ? "<option value='$alumni[kualifikasi_pendidikan]' selected>SMA/SMK/MA</option>" : "<option>SMA/SMK/MA</option>"; ?>
                                     <?php echo ($alumni['kualifikasi_pendidikan'] == 'D1') ? "<option value='$alumni[kualifikasi_pendidikan]' selected>D1</option>" : "<option>D1</option>"; ?>
                                     <?php echo ($alumni['kualifikasi_pendidikan'] == 'D2') ? "<option value='$alumni[kualifikasi_pendidikan]' selected>D2</option>" : "<option>D2</option>"; ?>
                                     <?php echo ($alumni['kualifikasi_pendidikan'] == 'D3') ? "<option value='$alumni[kualifikasi_pendidikan]' selected>D3</option>" : "<option>D3</option>"; ?>
                                     <?php echo ($alumni['kualifikasi_pendidikan'] == 'D4/S1') ? "<option value='$alumni[kualifikasi_pendidikan]' selected>D4/S1</option>" : "<option>D4/S1</option>"; ?>
                                     <?php echo ($alumni['kualifikasi_pendidikan'] == 'S2') ? "<option value='$alumni[kualifikasi_pendidikan]' selected>S2</option>" : "<option>S2</option>"; ?>
                                     <?php echo ($alumni['kualifikasi_pendidikan'] == 'S3') ? "<option value='$alumni[kualifikasi_pendidikan]' selected>S3</option>" : "<option>S3</option>"; ?>
                                 </select>

                                 <div class="mt-3">b. Data Pekerjaan Sekarang</div>
                                 <label for="nama_perusahaan">Nama Institusi / Perusahaan</label>
                                 <input type="text" name="nama_perusahaan" class="form-control" required>
                                 <label for="jabatan">Jabatan</label>
                                 <input type="text" name="jabatan" class="form-control" required>
                                 <label for="alamat_perusahaan">Alamat Kantor</label>
                                 <textarea name="alamat_perusahaan" class="form-control" rows="3" required></textarea>
                                 <label for="kode_pos_perusahaan">Kode Pos Kantor</label>
                                 <input type="text" name="kode_pos_perusahaan" class="form-control" required>
                                 <div class="row">
                                     <div class="col-md-6">
                                         <label for="telepon_perusahaan">Nomor Telepon</label>
                                         <input type="text" name="telepon_perusahaan" class="form-control">
                                     </div>
                                     <div class="col-md-6">
                                         <label for="fax_perusahaan">Nomor Fax</label>
                                         <input type="text" name="fax_perusahaan" class="form-control">
                                     </div>
                                 </div>
                                 <label for="email_perusahaan">Email</label>
                                 <input type="email" name="email_perusahaan" class="form-control" required>
                                 <button type="submit" class="btn btn-info mt-2 btn-block"><i class="fas fa-save"></i> Simpan Data Pribadi</button>
                             </form>

                             <h6 class="mt-3">Bagian 2 : Data Sertifikasi</h6>
                             <form action="#">
                                 <label for="id_muk">Skema Sertifikasi</label>
                                 <select name="id_muk" class="form-control" required>
                                     <option value="">-- Pilih Skema Sertifikasi --</option>
                                     <?= call_option($koneksi, 'muk', 'nama_muk', 'id_muk', 'nama_muk'); ?>
                                 </select>
                                 <label for="tujuan_asesmen">Tujuan Asesmen</label>
                                 <select name="tujuan_asesmen" class="form-control" required>
                                     <option value="">-- Pilih Tujuan Asesmen --</option>
                                     <?= call_option($koneksi, 'opsi_tujuan_asesmen', 'id', 'tujuan_asesmen', 'tujuan_asesmen'); ?>
                                 </select>
                                 <button type="submit" class="btn btn-info mt-2 btn-block"><i class="fas fa-save"></i> Simpan Data Sertifikasi</button>
                             </form>
                             <h6 class="mt-3">Bagian 3 : Bukti Kelengkapan Pemohon</h6>
                             <form action="#">
                                 <label for="">Bukti Persyaratan Dasar Pemohon</label>
                                 <table class="table table-bordered">
                                     <tr>
                                         <th>Jenis Bukti</th>
                                         <th>File</th>
                                     </tr>
                                     <tr>
                                         <td valign="top">Scan Rapot</td>
                                         <td><input type="file" name="bukti" class="form-control" required></td>
                                     </tr>
                                     <tr>
                                         <td valign="bottom">Sertifikat Training</td>
                                         <td><input type="file" name="bukti" class="form-control" required></td>
                                     </tr>
                                     <tr>
                                         <td valign="bottom">Surat Referensi</td>
                                         <td><input type="file" name="bukti" class="form-control" required></td>
                                     </tr>

                                 </table>
                                 <button type="submit" class="btn btn-info mt-2 btn-block"><i class="fas fa-save"></i> Simpan Data Bukti Persyaratan</button>
                             </form>

                         </div>
                         <div class="tab-pane" id="APL02">
                             <h5>FR.APL.02 Formulir Asesmen Mandiri</h5>
                             <hr>
                             <table class="table table-bordered">
                                 <tr>
                                     <td rowspan="2">Skema Sertifikasi (KKNI/Okupasi/Klaster)</td>
                                     <td>Judul</td>
                                     <td>:</td>
                                     <td>KKNI Level 2 Perhotelan (Klaster Penyediaan Layanan Akomodasi Reception)</td>
                                 </tr>
                                 <tr>
                                     <td>Nomor</td>
                                     <td>:</td>
                                     <td>SK-TJBDG.FO.03</td>
                                 </tr>
                             </table>

                             <table class="table table-bordered">
                                 <tr>
                                     <td>PANDUAN ASESMEN MANDIRI</td>
                                 </tr>
                                 <tr>
                                     <td>
                                         Instruksi:
                                         <br>
                                         <ul>
                                             <li>Baca setiap pertanyaan di kolom sebelah kiri</li>
                                             <li>Beri tanda centang (&check;) pada kotak jika Anda yakin dapat melakukan tugas yang dijelaskan.</li>
                                             <li>Isi kolom di sebelah kanan dengan mendaftar bukti yang Anda miliki untuk menunjukkan bahwa Anda melakukan tugas-tugas ini.</li>
                                         </ul>
                                     </td>
                                 </tr>
                             </table>
                             <form name="formUnit">
                                 <?php

                                    $no_unit = 0;
                                    $sql_unit = "SELECT muk_unit.*,kode_unit,judul_unit FROM muk_unit,skema_unit WHERE muk_unit.id_skema_unit=skema_unit.id_skema_unit AND id_muk=$id_muk";
                                    // echo $sql_unit;
                                    $query_unit = mysqli_query($koneksi, $sql_unit);
                                    while ($kolom_unit = mysqli_fetch_array($query_unit)) {
                                        $no_unit++;
                                    ?>

                                     <table class="table table-bordered">
                                         <tr class="text-bold">
                                             <td rowspan="2" width="50%">Kode & Judul Kompetensi <?= $no_unit; ?> :</td>
                                             <td colspan="3"><?= $kolom_unit['kode_unit']; ?></td>
                                         </tr>
                                         <tr class="text-bold">
                                             <td colspan="3"><?= $kolom_unit['judul_unit']; ?></td>
                                         </tr>
                                         <tr>
                                             <td>Dapatkah Saya</td>
                                             <td>K</td>
                                             <td>BK</td>
                                             <td>Bukti</td>
                                         </tr>
                                         <?php
                                            $id_skema_unit = $kolom_unit['id_skema_unit'];
                                            $no_elemen = 0;
                                            $sql_elemen = "SELECT * FROM skema_elemen WHERE id_skema_unit=$id_skema_unit";
                                            // echo $sql_unit;
                                            $query_elemen = mysqli_query($koneksi, $sql_elemen);
                                            while ($kolom_elemen = mysqli_fetch_array($query_elemen)) {
                                                $no_elemen++;
                                            ?>
                                             <tr>
                                                 <td>
                                                     Elemen <?= $no_elemen; ?> : <?= $kolom_elemen['judul_elemen']; ?>
                                                     <br>
                                                     <b>Kriteria Unjuk Kerja [Dibawah]</b>
                                                 </td>
                                                 <td></td>
                                                 <td></td>
                                                 <td></td>
                                             </tr>
                                             <?php
                                                $id_skema_elemen = $kolom_elemen['id_skema_elemen'];
                                                $no_kuk = 0;
                                                $sql_kuk = "SELECT * FROM skema_kuk WHERE id_skema_elemen=$id_skema_elemen";
                                                $query_kuk = mysqli_query($koneksi, $sql_kuk);
                                                while ($kolom_kuk = mysqli_fetch_array($query_kuk)) {
                                                    $no_kuk++;
                                                    $kompeten = "kompeten" . $no_unit . $no_elemen . $no_kuk;
                                                    $belumkompeten = "belumkompeten" . $no_unit . $no_elemen . $no_kuk;
                                                ?>
                                                 <tr style="border-top-style: dotted;">
                                                     <td>
                                                         <?= $kolom_kuk['kode_kuk'] . " " . $kolom_kuk['judul_kuk']; ?>
                                                     </td>
                                                     <td>
                                                         <input type="checkbox" name="<?= $kompeten; ?>" id="<?= $kompeten; ?>" onclick="if(this.checked) {document.formUnit.<?= $belumkompeten; ?>.checked=false;}" required />
                                                     </td>
                                                     <td>
                                                         <input type="checkbox" name="<?= $belumkompeten; ?>" id="<?= $belumkompeten; ?>" onclick="if(this.checked) {document.formUnit.<?= $kompeten; ?>.checked=false;}" />
                                                     </td>
                                                     <td>Fotokopi Rapot,Sertifikat Training, Surat Rekomendasi</td>
                                                 </tr>
                                             <?php } // End While Get KUK 
                                                ?>
                                         <?php } // End While Get Elemen 
                                            ?>
                                     </table>
                                     
                                 <?php } // End While Get Unit Kerja 
                                    ?>
                             <button type="submit" class="btn btn-info btn-block"> <i class="fas fa-save"></i> Simpan</button>       
                             </form>
                         </div>
                         <div class="tab-pane" id="AK01">
                             Persetujuan Sertifikasi

                         </div>
                     </div>


                 </div>
             </div>


         </div><!-- /.container-fluid -->

     </section>
     <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->