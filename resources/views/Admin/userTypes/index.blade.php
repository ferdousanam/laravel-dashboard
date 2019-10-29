@extends('Admin.layouts.app')

@push('css')
  <!-- Datatables -->
  <link href="{{asset('assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
@endpush

@section('page_title', 'User Types')
@section('page_tagline', '')

@section('content')
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>User Types List<small></small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Settings 1</a>
                </li>
                <li><a href="#">Settings 2</a>
                </li>
              </ul>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <p class="text-muted font-13 m-b-30">
            Responsive is an extension for DataTables that resolves that problem by optimising the table's
            layout for different screen sizes through the dynamic insertion and removal of columns from the
            table.
          </p>

          <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
            <tr>
              <th>SL.</th>
              <th>User Type</th>
              <th>Type Description</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @if ($userTypes)
              @foreach($userTypes as $key => $row)
                <tr id="tr-{{$row->id}}">
                  <td>{{ $key+1 }}</td>
                  <td>{{ $row->priority_name }}</td>
                  <td>{{ $row->priority_description }}</td>
                  <td>
                    @if($row->priority_status == 1)
                      <span class="btn btn-success btn-xs">Active</i></span>
                    @else
                      <span class="btn btn-warning btn-xs">Inactive</i></span>
                    @endif
                  </td>
                  <td>
                    <a href="{{ route('user-type.edit', $row->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-edit lg"></i></a>
                    <button class="btn btn-danger btn-xs" onclick="Delete({{ $row->id }})">
                      <i class="fa fa-trash lg"></i></button>
                  </td>
                </tr>
              @endforeach
            @endif
            </tbody>
          </table>


        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <!-- Datatables -->
  <script src="{{asset('assets/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
  <script src="{{asset('assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
  <script src="{{asset('assets/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
  <script src="{{asset('assets/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
  <script src="{{asset('assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
  <script src="{{asset('assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
  <script src="{{asset('assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{asset('assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
  <script src="{{asset('assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
  <script src="{{asset('assets/vendors/jszip/dist/jszip.min.js')}}"></script>
  <script src="{{asset('assets/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
  <script src="{{asset('assets/vendors/pdfmake/build/vfs_fonts.js')}}"></script>

  <script type="text/javascript">
      function Delete(id) {
          $.confirm({
              title: 'Confirm!',
              content: '<hr><strong class="text-danger">Are you sure to delete ?</strong><hr>',
              buttons: {
                  confirm: function () {
                      $.ajax({
                          headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                          url: "{{url('user-type')}}/" + id,
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

      $('#user-types-mm').addClass('kt-menu__item--submenu kt-menu__item--open kt-menu__item--here');
      $('#user-types-sm').addClass('kt-menu__item--active');
  </script>
@endpush
