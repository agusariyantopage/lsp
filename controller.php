<?php
    $konten_js=""; // Konten Javascript Pada Halaman Tertentu

    if(empty($_GET['p'])){
        $title  =$APP_TITLE." ".$APP_VERSION; 
        $konten="konten/home.php";    
    }

    // (START) Menu Master Data
    else if($_GET['p']=='skema'){
        $title  =$APP_TITLE." ".$APP_VERSION." | Data Skema Sertifikasi";
        $konten="konten/skema.php";
        $konten_js="konten/js/skema.php";
    }
    else if($_GET['p']=='skema-ubah'){
        $title  =$APP_TITLE." ".$APP_VERSION." | Ubah Skema Sertifikasi";
        $konten="konten/skema-ubah.php";  
        $konten_js="konten/js/skema_ubah.php";      
    }
    else if($_GET['p']=='skema-rincian'){
        $title  =$APP_TITLE." ".$APP_VERSION." | Rincian Elemen Skema Sertifikasi";
        $konten="konten/skema-rincian.php";  
        $konten_js="konten/js/skema_rincian.php";      
    }
    else if($_GET['p']=='tuk'){
        $title  =$APP_TITLE." ".$APP_VERSION." | Data Tempat Uji Kompetensi";
        $konten="konten/tuk.php";
        $konten_js="konten/js/tuk.php";
    }
    else if($_GET['p']=='asesor'){
        $title  =$APP_TITLE." ".$APP_VERSION." | Data Asesor";
        $konten="konten/asesor.php";
        $konten_js="konten/js/asesor.php";
    }
    else if($_GET['p']=='sdm'){
        $title  =$APP_TITLE." ".$APP_VERSION." | Data Sumber Daya Manusia";
        $konten="konten/sdm.php";
        $konten_js="konten/js/sdm.php";
    }
    
    // (END) Menu Master Data

    // (START) Menu Perangkat Uji
    else if($_GET['p']=='master-muk'){
        $title  =$APP_TITLE." ".$APP_VERSION." | Data Master Materi Uji Kompetensi";
        $konten="konten/master-muk.php";
        $konten_js="konten/js/master_muk.php";
    }    
    else if($_GET['p']=='muk'){
        $title  =$APP_TITLE." ".$APP_VERSION." | Komponen Materi Uji Kompetensi";
        $konten="konten/muk.php";
        $konten_js="konten/js/muk.php";
    }    
    // (END) Menu Perangkat Uji

    else if($_GET['p']=='user'){
        $title  =$APP_TITLE." ".$APP_VERSION." | User";
        $konten="konten/user.php";
    }

    // (START) Menu Asesi
    else if($_GET['p']=='registrasi-asesmen'){
        $title  =$APP_TITLE." ".$APP_VERSION." | Registrasi Asesmen";
        $konten="konten/asesi_registrasi_asesmen.php";
    }    
    else if($_GET['p']=='pra-asesmen'){
        $title  =$APP_TITLE." ".$APP_VERSION." | Pra Asesmen";
        $konten="konten/asesi_pra-asesmen.php";
    }    
    else if($_GET['p']=='asesmen'){
        $title  =$APP_TITLE." ".$APP_VERSION." | Asesmen";
        $konten="konten/asesi_asesmen.php";
    }    
    else if($_GET['p']=='pasca-asesmen'){
        $title  =$APP_TITLE." ".$APP_VERSION." | Pasca Asesmen";
        $konten="konten/asesi_pasca-asesmen.php";
    }    
    // (END) Menu Asesi


    // (START)  Menu Pemeliharaan   
    else if($_GET['p']=='backup'){
        $title  =$APP_TITLE." ".$APP_VERSION." | Backup Data";
        $konten="konten/backup.php";
    }
    else if($_GET['p']=='restore'){
        $title  =$APP_TITLE." ".$APP_VERSION." | Restore Data";
        $konten="konten/restore.php";
    }
    // (END)  Menu Pemeliharaan
    else {
        $title  =$APP_TITLE." ".$APP_VERSION." | Not Found";
        $konten="konten/404.php";
    }
    
?>