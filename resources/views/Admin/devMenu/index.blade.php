@extends('Admin.layouts.app')

@push('css')
  <!-- Datatables -->
  <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet">
@endpush

@section('page_title', 'Main Menu')
@section('page_tagline', '')

@section('content')
  @include('Admin.msg.message')
  <div class="kt-portlet kt-portlet--mobile">
    <div class="kt-portlet__head kt-portlet__head--lg">
      <div class="kt-portlet__head-label">
        <span class="kt-portlet__head-icon">
          <i class="kt-font-brand flaticon2-line-chart"></i>
        </span>
        <h3 class="kt-portlet__head-title">
          Main Menu List
        </h3>
      </div>
    </div>
    <div class="kt-portlet__body">

      <!--begin: Datatable -->
    {!! $dataTable->table(['class' => 'table table-striped- table-bordered table-hover table-checkable dataTable no-footer dtr-inline'], true) !!}

    <!--end: Datatable -->
    </div>
  </div>
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
                          url: "{{url('main-menu')}}/" + id,
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

      $('#main-menus-mm').addClass('kt-menu__item--submenu kt-menu__item--open kt-menu__item--here');
      $('#main-menus-sm').addClass('kt-menu__item--active');
  </script>
  <!-- Datatables -->
  <script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
  <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}" type="text/javascript"></script>
  {!! $dataTable->scripts() !!}
@endpush
