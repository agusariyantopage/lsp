<script>
  $(document).on('click','.setupElemenModal',function(){  
   
    var id = $(this).data('id');
    // alert('id');
    
    // AJAX request
    $.ajax({
      url: 'server-side/muk_setup.php',
      type: 'post',
      data: {id: id},
      success: function(response){ 
        // Add response in Modal body
        $('.isi-setup').html(response);        
      }
    });
  });

  $(document).on('click','.editModal',function(){  
   
    var id = $(this).data('id');
    // alert('id');
    
    // AJAX request
    $.ajax({
      url: 'server-side/muk_ubah.php',
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
     url: 'server-side/muk_hapus.php',
     type: 'post',
     data: {id: id},
     success: function(response){ 
       // Add response in Modal body
       $('.isi-hapus').html(response);        
     }
   });
 });
 </script>