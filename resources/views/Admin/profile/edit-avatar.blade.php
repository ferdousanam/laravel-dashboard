@extends('Admin.layouts.app')

@section('page_title', 'Edit Profile')
@section('page_tagline', '')

@section('content')
  <!--Begin::App-->
  <div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app">

  @include('Admin.profile.partials.left-side-widget')

  <!--Begin:: App Content-->
    <div class="kt-grid__item kt-grid__item--fluid kt-app__content">
      <div class="row">
        <div class="col-xl-12">
          <div class="kt-portlet">
            <div class="kt-portlet__head">
              <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">Update Avatar <small>update your avatar</small>
                </h3>
              </div>
              <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                  <div class="dropdown dropdown-inline">
                    <button type="button" class="btn btn-label-brand btn-sm btn-icon btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="flaticon2-gear"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                      <ul class="kt-nav">
                        <li class="kt-nav__section kt-nav__section--first">
                          <span class="kt-nav__section-text">Actions</span>
                        </li>
                        <li class="kt-nav__item">
                          <a href="{{ route('profile.edit', 0) }}" class="kt-nav__link">
                            <i class="kt-nav__link-icon la la-pencil-square-o"></i>
                            <span class="kt-nav__link-text">Edit</span>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <form class="kt-form kt-form--label-right" method="POST" action="{{ route('update-avatar') }}" enctype="multipart/form-data">
              @csrf
              <div class="kt-portlet__body">
                <div class="kt-section kt-section--first">
                  <div class="kt-section__body">
                    <div class="form-group row">
                      <div class="col-lg-9 col-xl-6 offset-lg-3 offset-xl-3 avatar-upload">
                        <img src="{{ (Auth::user()->profile_image) ? asset('uploads/profile-image/'.Auth::user()->profile_image) : asset('uploads/profile-image/default.png') }}" class="rounded" alt="{{ $user->profile_image }}">
                      </div>
                    </div>
                    <div class="form-group form-group-last row">
                      <label class="col-xl-3 col-lg-3 col-form-label">Profile Avatar</label>
                      <div class="col-lg-9 col-xl-6">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input-anam" id="profile_avatar" name="profile_avatar" accept=".png, .jpg, .jpeg">
                          <label class="custom-file-label text-left" for="profile_avatar">Choose Photo</label>
                        </div>
                        <span class="form-text text-danger">{{ ($errors->has('profile_avatar')) ? $errors->first('profile_avatar') : '' }}</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="kt-portlet__foot">
                <div class="kt-form__actions">
                  <div class="row">
                    <div class="col-lg-3 col-xl-3">
                    </div>
                    <div class="col-lg-9 col-xl-9">
                      <button type="submit" class="btn btn-success">Update</button>&nbsp;
                      <button type="reset" class="btn btn-secondary">Cancel</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!--End:: App Content-->
  </div>

  <!--End::App-->

@endsection
@push('scripts')
  <script>
      $('#edit-avatar-link').addClass('kt-widget__item--active');
      @if((Session::has('success')))
      toastr.success("{{ Session::get('success') }}");
      @endif

      @if((Session::has('error')))
      toastr.success("{{ Session::get('error') }}");
      @endif

  </script>
@endpush
