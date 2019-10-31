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
  @include('Admin.components.delete-modal')
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
    </div>
    <div class="kt-portlet__body">

      <!--begin: Datatable -->
    {!! $dataTable->table(['class' => 'table table-striped- table-bordered table-hover table-checkable dataTable no-footer dtr-inline'], true) !!}

    <!--end: Datatable -->
    </div>
  </div>
@endsection

@push('scripts')
  @include('Admin.scripts.delete')
  <script type="text/javascript">
      $(document).ready(function () {
          $('#user-mm').addClass('kt-menu__item--submenu kt-menu__item--open kt-menu__item--here');
          $('#user-sm').addClass('kt-menu__item--active');
      });
  </script>
  <!-- Datatables -->
  <script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
  <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}" type="text/javascript"></script>
  {!! $dataTable->scripts() !!}
@endpush
