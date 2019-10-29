@extends('Admin.layouts.app')

@push('css')
@endpush

@section('page_title', 'Project Details Menu')
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
    <form id="menu-form" action="{{ route('project-details.update', $project->id) }}" method="POST" class="kt-form kt-form--label-right" enctype="multipart/form-data">
      <div class="kt-portlet__body">
        @method('PUT')
        @csrf

        <div class="form-group row">
          <label for="project_name" class="col-2 col-form-label">Project Name:</label>
          <div class="col-10">
            <input class="form-control" type="text" id="project_name" name="project_name" value="{{ old('project_name', $project->app_name) }}" placeholder="Project Name" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="company_name" class="col-2 col-form-label">Company Name:</label>
          <div class="col-10">
            <input class="form-control" type="text" id="company_name" name="company_name" value="{{ old('company_name', $project->company_name) }}" placeholder="Company Name" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="company_address" class="col-2 col-form-label">Company Address:</label>
          <div class="col-10">
            <textarea name="company_address" id="company_address" class="form-control" rows="3" placeholder="Company Address">{{ old('company_address', $project->company_address) }}</textarea>
          </div>
        </div>
        <div class="form-group row">
          <label for="contact_number" class="col-2 col-form-label">Contact Number:</label>
          <div class="col-10">
            <input class="form-control" type="text" id="contact_number" name="contact_number" value="{{ old('contact_number', $project->company_contact) }}" placeholder="Contact Number">
          </div>
        </div>
        <div class="form-group row">
          <label for="company_logo" class="col-2 col-form-label">Company Logo:</label>
          <div class="col-10">
            <div class="kt-avatar kt-avatar--outline">
              <div style="
                border: 1px solid;
                padding: 5px;
                margin: 5px 5px 5px 0;">
                <img src="{{ ($project->company_logo) ? asset('uploads/project-info/'.$project->company_logo) : asset('uploads/profile-image/default.png') }}" class="rounded" alt="{{ $project->company_logo }}">
              </div>
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input-anam" id="company_logo" name="company_logo" accept=".png, .jpg, .jpeg">
              <label class="custom-file-label text-left" for="company_logo">Choose Photo</label>
            </div>
            <span class="form-text text-danger">{{ ($errors->has('company_logo')) ? $errors->first('company_logo') : '' }}</span>
          </div>
        </div>
        <div class="form-group row">
          <label for="brand_logo" class="col-2 col-form-label">Brand Logo:</label>
          <div class="col-10">
            <div class="kt-avatar kt-avatar--outline">
              <div style="
                border: 1px solid;
                padding: 5px;
                margin: 5px 5px 5px 0;">
                <img src="{{ ($project->brand_logo) ? asset('uploads/project-info/'.$project->brand_logo) : asset('uploads/profile-image/default.png') }}" class="rounded" alt="{{ $project->brand_logo }}">
              </div>
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input-anam" id="brand_logo" name="brand_logo" accept=".png, .jpg, .jpeg">
              <label class="custom-file-label text-left" for="brand_logo">Choose Photo</label>
            </div>
            <span class="form-text text-danger">{{ ($errors->has('brand_logo')) ? $errors->first('brand_logo') : '' }}</span>
          </div>
        </div>
        <div class="form-group row">
          <label for="app_icon" class="col-2 col-form-label">App Icon:</label>
          <div class="col-10">
            <div class="kt-avatar kt-avatar--outline">
              <div style="
                border: 1px solid;
                padding: 5px;
                margin: 5px 5px 5px 0;">
                <img src="{{ ($project->app_icon) ? asset('uploads/project-info/'.$project->app_icon) : asset('uploads/profile-image/default.png') }}" class="rounded" alt="{{ $project->app_icon }}">
              </div>
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input-anam" id="app_icon" name="app_icon" accept=".ico">
              <label class="custom-file-label text-left" for="app_icon">Choose Photo</label>
            </div>
            <span class="form-text text-danger">{{ ($errors->has('app_icon')) ? $errors->first('app_icon') : '' }}</span>
          </div>
        </div>
        <div class="kt-portlet__foot">
          <div class="kt-form__actions">
            <div class="row">
              <div class="col-2">
              </div>
              <div class="col-10">
                <button type="submit" class="btn btn-success">Update</button>
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
      $('#project-details-mm').addClass('kt-menu__item--submenu kt-menu__item--open kt-menu__item--here');
      $('#project-details-sm').addClass('kt-menu__item--active');
  </script>
@endpush
