@extends('Admin.layouts.app')

@section('page_title', 'Edit User Type')
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
    <form id="menu-form" action="{{ route('user-type.update', $user_type->id) }}" method="POST" class="kt-form kt-form--label-right">
      <div class="kt-portlet__body">
        @method('PUT')
        @csrf

        <div class="form-group row">
          <label for="priority_name" class="col-2 col-form-label">User Type:</label>
          <div class="col-10">
            <input class="form-control" type="text" id="priority_name" name="priority_name" value="{{ old('priority_name', $user_type->priority_name) }}" placeholder="User Type" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="priority_description" class="col-2 col-form-label">Description:</label>
          <div class="col-10">
            <textarea name="priority_description" id="priority_description" class="form-control" rows="10" placeholder="Type Description">{{ old('priority_description', $user_type->priority_description) }}</textarea>
          </div>
        </div>
        <div class="form-group row">
          <label for="priority_status" class="col-2 col-form-label">Status:</label>
          <div class="col-10">
            <div class="kt-radio-inline">
              <label class="kt-radio">
                <input type="radio" name="priority_status" value="1"
                  {{(old('priority_status', $user_type->priority_status) == 1) ? 'checked' : ''}}>
                Active
                <span></span>
              </label>
              <label class="kt-radio">
                <input type="radio" name="priority_status" value="0"
                  {{(old('priority_status', $user_type->priority_status) == 0) ? 'checked' : ''}}>
                Inactive
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
                <a href="{{ route('user-type.index') }}" class="btn btn-primary">Cancel</a>
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
      $('#user-types-mm').addClass('kt-menu__item--submenu kt-menu__item--open kt-menu__item--here');
      $('#user-types--edit-sm').addClass('kt-menu__item--active');
  </script>
@endpush
