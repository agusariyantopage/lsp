<?php
    $konten_js=""; // Konten Javascript Pada Halaman Tertentu

    if(empty($_GET['p'])){
        $title  =$APP_TITLE." ".$APP_VERSION; 
        $konten="konten/home.php";    
    }

    // (START) Menu Master Data
    else if($_GET['p']=='skema'){
        $title  =$APP_TITLE." ".$APP_VERSION." | Skema Sertifikasi";
        $konten="konten/skema.php";
        $konten_js="konten/js/skema.php";
    }
    else if($_GET['p']=='skema-ubah'){
        $title  =$APP_TITLE." ".$APP_VERSION." | Ubah Skema Sertifikasi";
        $konten="konten/skema-ubah.php";  
        $konten_js="konten/js/skema_ubah.php";      
    }
    
    // (END) Menu Master Data

    else if($_GET['p']=='user'){
        $title  =$APP_TITLE." ".$APP_VERSION." | User";
        $konten="konten/user.php";
    }

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
        $konten="konten/home.php";
    }
    
?>