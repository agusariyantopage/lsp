<?php
    session_start();
?>
<script>
    var sessionValue = <?php echo $_SESSION['backend_user_nama']; ?>;
    
    if(sessionValue===''){
        Swal.fire({
        //position: 'top-end',
        icon: 'success',
        title: 'Berhasil Memproses Data',
        showConfirmButton: false,
        timer: 1000
        
        })
    } else {
        Swal.fire({
        //position: 'top-end',
        icon: 'error',
        title: 'sessionValue',
        showConfirmButton: false,
        timer: 1000
        
        })
    }    
</script>
   