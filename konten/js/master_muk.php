<script>
  $(document).on('click','.tambahMUKModal',function(){  
   
    var id = $(this).data('id');
    // alert('id');
    
    // AJAX request
    $.ajax({
      url: 'server-side/muk_tambah.php',
      type: 'post',
      data: {id: id},
      success: function(response){ 
        // Add response in Modal body
        $('.isi-tambah').html(response);        
      }
    });
  });

  $(document).on('click','.editModal',function(){  
   
    var id = $(this).data('id');
    // alert('id');
    
    // AJAX request
    $.ajax({
      url: 'server-side/muk_master_ubah.php',
      type: 'post',
      data: {id: id},
      success: function(response){ 
        // Add response in Modal body
        $('.isi-ubah').html(response);        
      }
    });
  });

  $(document).on('click','.hapusModal',function(){  
   
   var id = $(this).data('id');
   // alert('id');
   
   // AJAX request
   $.ajax({
     url: 'server-side/muk_master_hapus.php',
     type: 'post',
     data: {id: id},
     success: function(response){ 
       // Add response in Modal body
       $('.isi-hapus').html(response);        
     }
   });
 });
 </script>