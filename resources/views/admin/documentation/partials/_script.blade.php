<script>
    $(document).ready(function() {
      $('#img').dropify();
    });

    $('#submit_doc').click(function(event){
      event.preventDefault();

      var form = $('#documentation-upload-form');

      var formData = new FormData(form[0]);
      
      console.log(form.serialize());
      $.ajax({
                url: form.attr('action'),
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    Swal.fire({
                        title: 'Success',
                        text: "File successfully uploaded!",
                        icon: 'success',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Okay'
                    })
                    .then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    })
                },
                error: function(xhr, status, error) {
                    console.error('Request failed with status: ' + status);
                }
            });
    })
</script>