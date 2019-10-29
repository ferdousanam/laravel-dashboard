@extends('Admin.layouts.app')

@section('page_title', 'Dashboard')
@section('page_tagline', 'Admin Dashboard')

@section('content')

@endsection

@push('scripts')
  <script>
    $('#dashboard-mm').addClass('kt-menu__item--active');
  </script>
@endpush
