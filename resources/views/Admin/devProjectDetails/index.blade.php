@extends('Admin.layouts.app')

@push('css')
@endpush

@section('page_title', 'Project Details Menu')
@section('page_tagline', '')

@section('content')

@endsection

@push('scripts')
    <script type="text/javascript">
        function Delete(id) {
            $.confirm({
                title: 'Confirm!',
                content: '<hr><strong class="text-danger">Are you sure to delete ?</strong><hr>',
                buttons: {
                    confirm: function () {
                        $.ajax({
                            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                            url: "{{url('project-details')}}/" + id,
                            type: 'DELETE',
                            dataType: 'json',
                            data: {},
                            success: function (response) {
                                if (response.success) {
                                    $('#tr-' + id).fadeOut();
                                } else {
                                    $.alert({
                                        title: "Whoops!",
                                        content: "<hr><strong class='text-danger'>Something Went Wrong!</strong><hr>",
                                        type: "red"
                                    });
                                }
                            }
                        });
                    },
                    cancel: function () {

                    }
                }
            });
        }
    </script>
@endpush
