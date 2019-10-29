@extends('Admin.layouts.app')

@section('page_title', 'Add New User')
@section('page_tagline', '')

@section('content')
  @include('Admin.msg.message')
  <!--begin::Portlet-->
  <div class="kt-portlet">
    <div class="kt-portlet__head">
      <div class="kt-portlet__head-label">
        <h3 class="kt-portlet__head-title">

        </h3>
      </div>
    </div>

    <!--begin::Form-->
    <form id="menu-form" action="{{ route('user.store') }}" method="POST" class="kt-form kt-form--label-right">
      <div class="kt-portlet__body">
        @csrf

        <div class="form-group row">
          <label for="name" class="col-2 col-form-label">Full Name:</label>
          <div class="col-10">
            <input class="form-control" type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Full Name" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="email" class="col-2 col-form-label">Email:</label>
          <div class="col-10">
            <input class="form-control" type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Email" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="password" class="col-2 col-form-label">Password:</label>
          <div class="col-10">
            <input class="form-control" type="password" id="password" name="password" placeholder="Password" value="{{ old('password') }}" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="user_level" class="col-2 col-form-label">User Level:</label>
          <div class="col-10">
            <select name="user_level" id="user_level" class="form-control chosen" required>
              <option value="">Select User Level</option>
              @if(isset($priority) && count($priority)>0)
                @foreach ($priority as $pr)
                  <option value="{{$pr->id}}">{{$pr->priority_name}}</option>
                @endforeach
              @endif
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="status" class="col-2 col-form-label">Status:</label>
          <div class="col-10">
            <div class="kt-radio-inline">
              <label class="kt-radio">
                <input type="radio" name="status" value="1" checked> Active
                <span></span>
              </label>
              <label class="kt-radio">
                <input type="radio" name="status" value="0"> Inactive
                <span></span>
              </label>
            </div>
            <span class="form-text text-muted"></span>
          </div>
        </div>
        <div class="kt-portlet__foot">
          <div class="kt-form__actions">
            <div class="row">
              <div class="col-2">
              </div>
              <div class="col-10">
                <a href="{{ route('user.index') }}" class="btn btn-primary">Cancel</a>
                <button type="submit" class="btn btn-success">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>

  <!--end::Portlet-->
@endsection

@push('scripts')
  <script>
      $('#user-mm').addClass('kt-menu__item--submenu kt-menu__item--open kt-menu__item--here');
      $('#user--create-sm').addClass('kt-menu__item--active');
  </script>
@endpush
