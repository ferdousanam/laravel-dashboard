<script type="text/javascript">
    $(document).ready(function () {
        $('table').on('click', '.delete-button', function () {
            let id = $(this).attr('data-id');
            $('#modal-delete-button').unbind().click(function () {
                $.ajax({
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                    url: "{{ url()->current() }}/" + id,
                    type: 'DELETE',
                    dataType: 'json',
                    data: {},
                    success: function (response) {
                        console.log(response);
                        if (response.success) {
                            $('#tr-' + id).fadeOut();
                        } else {
                            toastr.error("Whoops! Something Went Wrong!")
                        }
                    }
                }).done(function () {

                });
            });
        });
    });
</script>
