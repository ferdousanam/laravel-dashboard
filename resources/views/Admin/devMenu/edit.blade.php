@extends('Admin.layouts.app')

@section('page_title', 'Edit Main Menu')
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
    <form id="menu-form" action="{{ route('main-menu.update', $main_menu->id) }}" method="POST" class="kt-form kt-form--label-right">
      <div class="kt-portlet__body">
        @method('PUT')
        @csrf

        <div class="form-group row">
          <label for="serial_no" class="col-2 col-form-label">Serial No *</label>
          <div class="col-10">
            <input class="form-control" type="text" id="serial_no" name="serial_no" value="{{ old('serial_no', $main_menu->serial_no) }}" placeholder="Serial No." required>
          </div>
        </div>
        <div class="form-group row">
          <label for="menu_name" class="col-2 col-form-label">Menu Title *</label>
          <div class="col-10">
            <input class="form-control" type="text" id="menu_name" name="menu_name" value="{{ old('menu_name', $main_menu->menu_name) }}" placeholder="Menu Title" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="route_name" class="col-2 col-form-label">Route Url *</label>
          <div class="col-10">
            <input class="form-control" type="text" id="route_name" name="route_name" value="{{ old('route_name', $main_menu->route_name) }}" placeholder="Route Url" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="icon" class="col-2 col-form-label">Icon Name</label>
          <div class="col-10">
            <div class="input-group">
              <div class="input-group-prepend"><span class="input-group-text"><i class="{{ old('icon', $main_menu->icon) }} kt-font-brand"></i></span></div>
              <input class="form-control" type="text" id="icon" name="icon" placeholder="fa fa-home" value="{{ old('icon', $main_menu->icon) }}" aria-describedby="icon">
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="status" class="col-2 col-form-label">Status *</label>
          <div class="col-10">
            <div class="kt-radio-inline">
              <label class="kt-radio">
                <input type="radio" name="status" value="1"
                  {{(old('status', $main_menu->status) !== 0) ? 'checked' : ''}}>
                Active
                <span></span>
              </label>
              <label class="kt-radio">
                <input type="radio" name="status" value="0"
                  {{(old('status', $main_menu->status) === 0) ? 'checked' : ''}}>
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
                <a href="{{ route('main-menu.index') }}" class="btn btn-primary">Cancel</a>
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
      $('#main-menus-mm').addClass('kt-menu__item--submenu kt-menu__item--open kt-menu__item--here');
      $('#main-menus--edit-sm').addClass('kt-menu__item--active');
  </script>
@endpush
