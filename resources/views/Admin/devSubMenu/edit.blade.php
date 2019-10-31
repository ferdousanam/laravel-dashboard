@extends('Admin.layouts.app')

@section('page_title', 'Edit Sub Menu')
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
    <form id="menu-form" action="{{ route('sub-menu.update', $sub_menu->id) }}" method="POST" class="kt-form kt-form--label-right">
      <div class="kt-portlet__body">
        @method('PUT')
        @csrf

        <div class="form-group row">
          <label for="serial_no" class="col-2 col-form-label">Serial No *</label>
          <div class="col-10">
            <input class="form-control" type="text" id="serial_no" name="serial_no" value="{{ old('serial_no', $sub_menu->serial_no) }}" placeholder="Serial No." required>
          </div>
        </div>
        <div class="form-group row">
          <label for="parent_id" class="col-2 col-form-label">Parent Menu *</label>
          <div class="col-10">
            <select name="parent_id" id="parent_id" class="form-control chosen" required>
              <option>Select Parent Menu</option>
              @if(isset($main_menus) && count($main_menus)>0)
                @foreach ($main_menus as $main_menu)
                  <option value="{{$main_menu->id}}" {{ ($main_menu->id == old('parent_id', $sub_menu->parent->id)) ? ' selected' : '' }}>{{$main_menu->menu_name}}</option>
                @endforeach
              @endif
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="menu_name" class="col-2 col-form-label">Menu Title *</label>
          <div class="col-10">
            <input class="form-control" type="text" id="menu_name" name="menu_name" value="{{ old('menu_name', $sub_menu->menu_name) }}" placeholder="Menu Title" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="selector" class="col-2 col-form-label">Selector *</label>
          <div class="col-10">
            <input class="form-control" type="text" id="selector" name="selector" value="{{ old('selector', $sub_menu->selector) }}" placeholder="Menu ID Selector" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="route_name" class="col-2 col-form-label">Route Url *</label>
          <div class="col-10">
            <input class="form-control" type="text" id="route_name" name="route_name" value="{{ old('route_name', $sub_menu->route_name) }}" placeholder="Route Url" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="icon" class="col-2 col-form-label">Icon Name</label>
          <div class="col-10">
            <div class="input-group">
              <div class="input-group-prepend"><span class="input-group-text"><i class="{{ old('icon', $sub_menu->icon) }} kt-font-brand"></i></span></div>
              <input class="form-control" type="text" id="icon" name="icon" placeholder="fa fa-home" value="{{ old('icon', $sub_menu->icon) }}" aria-describedby="icon">
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="status" class="col-2 col-form-label">Status *</label>
          <div class="col-10">
            <div class="kt-radio-inline">
              <label class="kt-radio">
                <input type="radio" name="status" value="1"
                  {{(old('status', $sub_menu->status) == 1) ? 'checked' : ''}}>
                Active
                <span></span>
              </label>
              <label class="kt-radio">
                <input type="radio" name="status" value="0"
                  {{(old('status', $sub_menu->status) == 0) ? 'checked' : ''}}>
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
                <a href="{{ route('sub-menu.index') }}" class="btn btn-primary">Cancel</a>
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
      $('#sub-menus-mm').addClass('kt-menu__item--submenu kt-menu__item--open kt-menu__item--here');
      $('#sub-menus--edit-sm').addClass('kt-menu__item--active');
  </script>
@endpush
