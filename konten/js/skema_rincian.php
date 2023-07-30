<script>
  $(document).on('click', '.tambahElemenModal', function() {

    var id = $(this).data('id');

    $.ajax({
      url: 'server-side/elemen_tambah.php',
      type: 'post',
      data: {
        id: id
      },
      success: function(response) {
        // Add response in Modal body
        $('.isi-elemen-tambah').html(response);
      }
    });
  });

  $(document).on('click', '.ubahElemenModal', function() {

    var id = $(this).data('id');
    // alert(id)
    $.ajax({
      url: 'server-side/elemen_ubah.php',
      type: 'post',
      data: {
        id: id
      },
      success: function(response) {
        // Add response in Modal body
        $('.isi-elemen-ubah').html(response);
      }
    });
  });

  $(document).on('click', '.hapusElemenModal', function() {

    var id = $(this).data('id');
    // alert(id)
    $.ajax({
      url: 'server-side/elemen_hapus.php',
      type: 'post',
      data: {
        id: id
      },
      success: function(response) {
        // Add response in Modal body
        $('.isi-elemen-hapus').html(response);
      }
    });
  });

  $(document).on('click', '.tambahKUKModal', function() {

    var id = $(this).data('id');

    $.ajax({
      url: 'server-side/kuk_tambah.php',
      type: 'post',
      data: {
        id: id
      },
      success: function(response) {
        // Add response in Modal body
        $('.isi-kuk-tambah').html(response);
      }
    });
  });

  $(document).on('click', '.ubahKUKModal', function() {

    var id = $(this).data('id');

    $.ajax({
      url: 'server-side/kuk_ubah.php',
      type: 'post',
      data: {
        id: id
      },
      success: function(response) {
        // Add response in Modal body
        $('.isi-kuk-ubah').html(response);
      }
    });
  });

  $(document).on('click', '.hapusKUKModal', function() {

    var id = $(this).data('id');

    $.ajax({
      url: 'server-side/kuk_hapus.php',
      type: 'post',
      data: {
        id: id
      },
      success: function(response) {
        // Add response in Modal body
        $('.isi-kuk-hapus').html(response);
      }
    });
  });
</script>