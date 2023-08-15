<?php
function call_option($koneksi, $nama_tabel, $order_by, $value, $display)
{
    $sql = "SELECT * FROM " . $nama_tabel . " ORDER BY " . $order_by;
    $query = mysqli_query($koneksi, $sql);
    while ($kolom = mysqli_fetch_array($query)) {
        echo "<option value='$kolom[$value]'>$kolom[$display]</option>";
    }
}

function call_option_selected($koneksi, $nama_tabel, $order_by, $value, $display, $selected_id)
{
    $sql = "SELECT * FROM " . $nama_tabel . " ORDER BY " . $order_by;
    $query = mysqli_query($koneksi, $sql);
    while ($kolom = mysqli_fetch_array($query)) {
        echo ($selected_id == $kolom[$value]) ? "<option value='$kolom[$value]' selected>$kolom[$display]</option>" : "<option value='$kolom[$value]'>$kolom[$display]</option>";
    }
}

function call_option_selected_parametered($koneksi, $nama_tabel, $order_by, $value, $display, $selected_id,$parameter)
{
    $sql = "SELECT * FROM " . $nama_tabel . " WHERE ".$parameter." ORDER BY " . $order_by;
    $query = mysqli_query($koneksi, $sql);
    while ($kolom = mysqli_fetch_array($query)) {
        echo ($selected_id == $kolom[$value]) ? "<option value='$kolom[$value]' selected>$kolom[$display]</option>" : "<option value='$kolom[$value]'>$kolom[$display]</option>";
    }
}

// Fungsi  Get Data
function get_all_data($koneksi,$nama_tabel,$kolom_ditampilkan)
{
    $sql = "SELECT * FROM " . $nama_tabel;
    $query = mysqli_query($koneksi, $sql);    
    while($kolom = mysqli_fetch_array($query)){
        echo "<tr>";
            $array=explode(",",$kolom_ditampilkan);
            $jumlah_data=count($array);
            for($i=0;$i<$jumlah_data;$i++){
                echo "<td>".$kolom[$array[$i]]."</td>";
            }
        echo "</tr>";
    }   
    
}

// Fungsi  Get Single Data
function get_single_data($koneksi,$nama_tabel,$kolom_kunci,$nilai_kunci)
{
    $sql = "SELECT * FROM " . $nama_tabel . " WHERE " . $kolom_kunci ."=".$nilai_kunci;
    $query = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_array($query);
    return $data;
}
// Fungsi  Get Last Data
function get_last_data($koneksi,$nama_tabel,$order_by)
{
    $sql = "SELECT * FROM " . $nama_tabel . " ORDER BY ".$order_by." DESC LIMIT 1";
    $query = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_array($query);
    return $data;
}

// Fungsi  Get Jumlah Data (Menampilkan Jumlah Data Dari Hasil Query)
function get_jumlah_data($koneksi,$nama_tabel,$kolom_kunci,$nilai_kunci)
{
    $sql = "SELECT * FROM " . $nama_tabel . " WHERE dihapus_pada IS NULL AND " . $kolom_kunci ."=".$nilai_kunci;
    $query = mysqli_query($koneksi, $sql);
    $data = mysqli_num_rows($query);
    return $data;
}


function pesan_transaksi($koneksi)
    {
        $sukses = mysqli_affected_rows($koneksi);
        if ($sukses >= 1) {
            $_SESSION['status_proses'] = 'SUKSES';
        } else {
            $_SESSION['status_proses'] = 'GAGAL';
        }
    }
?>
