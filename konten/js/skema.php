<script>
  $(document).on('click','.editModal',function(){  
   
    var id = $(this).data('id');
    // alert('id');
    
    // AJAX request
    $.ajax({
      url: 'server-side/skema_ubah.php',
      type: 'post',
      data: {id: id},
      success: function(response){ 
        // Add response in Modal body
        $('.isi-skema-ubah').html(response);        
      }
    });
  });

  $(document).on('click','.hapusModal',function(){  
   
   var id = $(this).data('id');
   // alert('id');
   
   // AJAX request
   $.ajax({
     url: 'server-side/skema_hapus.php',
     type: 'post',
     data: {id: id},
     success: function(response){ 
       // Add response in Modal body
       $('.isi-skema-hapus').html(response);        
     }
   });
 });
 </script>