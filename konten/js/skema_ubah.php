<script>
  $(document).on('click','.editModal',function(){  
   
    var id = $(this).data('id');
    // alert('id');
    
    // AJAX request
    $.ajax({
      url: 'server-side/skema_unit_ubah.php',
      type: 'post',
      data: {id: id},
      success: function(response){ 
        // Add response in Modal body
        $('.isi-skema-unit-ubah').html(response);        
      }
    });
  });

  $(document).on('click','.hapusModal',function(){  
   
   var id = $(this).data('id');
   // alert('id');
   
   // AJAX request
   $.ajax({
     url: 'server-side/skema_unit_hapus.php',
     type: 'post',
     data: {id: id},
     success: function(response){ 
       // Add response in Modal body
       $('.isi-skema-unit-hapus').html(response);        
     }
   });
 });
 </script>