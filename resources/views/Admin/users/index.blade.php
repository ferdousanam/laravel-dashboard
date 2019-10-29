@extends('Admin.layouts.app')

@section('page_title', 'Users')
@section('page_tagline', 'All Users')

@push('css')
  <!-- Datatables -->
  <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet">
@endpush

@section('page_title', 'Users')
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
          Users List
        </h3>
      </div>
      <div class="kt-portlet__head-toolbar">
        <div class="kt-portlet__head-wrapper">
          <div class="kt-portlet__head-actions">
            <div class="dropdown dropdown-inline">
              <button type="button" class="btn btn-default btn-icon-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="la la-download"></i> Export
              </button>
              <div class="dropdown-menu dropdown-menu-right">
                <ul class="kt-nav">
                  <li class="kt-nav__section kt-nav__section--first">
                    <span class="kt-nav__section-text">Choose an option</span>
                  </li>
                  <li class="kt-nav__item">
                    <a href="#" class="kt-nav__link">
                      <i class="kt-nav__link-icon la la-print"></i>
                      <span class="kt-nav__link-text">Print</span>
                    </a>
                  </li>
                  <li class="kt-nav__item">
                    <a href="#" class="kt-nav__link">
                      <i class="kt-nav__link-icon la la-copy"></i>
                      <span class="kt-nav__link-text">Copy</span>
                    </a>
                  </li>
                  <li class="kt-nav__item">
                    <a href="#" class="kt-nav__link">
                      <i class="kt-nav__link-icon la la-file-excel-o"></i>
                      <span class="kt-nav__link-text">Excel</span>
                    </a>
                  </li>
                  <li class="kt-nav__item">
                    <a href="#" class="kt-nav__link">
                      <i class="kt-nav__link-icon la la-file-text-o"></i>
                      <span class="kt-nav__link-text">CSV</span>
                    </a>
                  </li>
                  <li class="kt-nav__item">
                    <a href="#" class="kt-nav__link">
                      <i class="kt-nav__link-icon la la-file-pdf-o"></i>
                      <span class="kt-nav__link-text">PDF</span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            &nbsp;
            <a href="#" class="btn btn-brand btn-elevate btn-icon-sm">
              <i class="la la-plus"></i>
              New Record
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="kt-portlet__body">

      <!--begin: Datatable -->
      <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
        <thead>
        <tr>
          <th>SL.</th>
          <th>Full Name</th>
          <th>Email</th>
          <th>Image</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @if ($users)
          @foreach($users as $key => $row)
            <tr id="tr-{{$row->id}}">
              <td>{{ $key+1 }}</td>
              <td>{{ $row->name }}</td>
              <td>{{ $row->email }}</td>
              <td align="center">
                @if (isset($row->profile_image))
                  <img class="img-responsive" src="{{ asset('uploads/profile-image/'.$row->profile_image) }}"
                       alt="Profile Image" style="max-height: 50px;">
                @endif
              </td>
              <td class="text-center">
                @if($row->status == 1)
                  <span class="kt-badge kt-badge--success kt-badge--inline kt-badge--pill">Active</span>
                @else
                  <span class="kt-badge kt-badge--warning kt-badge--inline kt-badge--pill">Inactive</span>
                @endif
              </td>
              <td class="text-center">
                <a href="{{ route('user.edit', $row->id) }}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="View">
                  <i class="la la-edit"></i>
                </a>
                <button class="btn btn-sm btn-clean btn-icon btn-icon-md" onclick="Delete({{ $row->id }})">
                  <i class="fa fa-trash lg"></i></button>
              </td>
            </tr>
          @endforeach
        @endif
        </tbody>
      </table>

      <!--end: Datatable -->
    </div>
  </div>
@endsection

@push('scripts')
  <!-- Datatables -->
  <script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>

  <script type="text/javascript">
      function Delete(id) {
          $.confirm({
              title: 'Confirm!',
              content: '<hr><strong class="text-danger">Are you sure to delete ?</strong><hr>',
              buttons: {
                  confirm: function () {
                      $.ajax({
                          headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                          url: "{{url('user')}}/" + id,
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

      "use strict";
      var KTDatatablesBasicBasic = function () {

          var initTable1 = function () {
              var table = $('#kt_table_1');

              // begin first table
              table.DataTable({
                  responsive: true,

                  // DOM Layout settings
                  dom: `<'row'<'col-sm-12'tr>>
			<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,

                  lengthMenu: [5, 10, 25, 50],

                  pageLength: 10,

                  language: {
                      'lengthMenu': 'Display _MENU_',
                  },

                  // Order settings
                  order: [[1, 'asc']],
              });

              table.on('change', '.kt-group-checkable', function () {
                  var set = $(this).closest('table').find('td:first-child .kt-checkable');
                  var checked = $(this).is(':checked');

                  $(set).each(function () {
                      if (checked) {
                          $(this).prop('checked', true);
                          $(this).closest('tr').addClass('active');
                      } else {
                          $(this).prop('checked', false);
                          $(this).closest('tr').removeClass('active');
                      }
                  });
              });

              table.on('change', 'tbody tr .kt-checkbox', function () {
                  $(this).parents('tr').toggleClass('active');
              });
          };

          return {

              //main function to initiate the module
              init: function () {
                  initTable1();
              },

          };

      }();

      jQuery(document).ready(function () {
          KTDatatablesBasicBasic.init();
      });

      $('#user-mm').addClass('kt-menu__item--submenu kt-menu__item--open kt-menu__item--here');
      $('#user-sm').addClass('kt-menu__item--active');
  </script>
@endpush
