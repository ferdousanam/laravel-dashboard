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
                <h3 class="kt-portlet__head-title">User Information <small>update your personal information</small>
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
            <form class="kt-form kt-form--label-right" method="POST" action="{{ route('profile.update', 0) }}">
              @method('PUT')
              @csrf
              <div class="kt-portlet__body">
                <div class="kt-section kt-section--first">
                  <div class="kt-section__body">
                    <div class="row">
                      <label class="col-xl-3"></label>
                      <div class="col-lg-9 col-xl-6">
                        <h3 class="kt-section__title kt-section__title-sm">User Info:</h3>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-xl-3 col-lg-3 col-form-label">Avatar</label>
                      <div class="col-lg-9 col-xl-6">
                        <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar">
                          <div class="kt-avatar__holder" style="background-image: url('{{ (Auth::user()->profile_image) ? asset('uploads/profile-image/'.Auth::user()->profile_image) : asset('uploads/profile-image/default.png') }}')"></div>
                          <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
                            <a href="{{ route('edit-avatar') }}"><i class="fa fa-pen"></i></a>
                          </label>
                          <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                            <i class="fa fa-times"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-xl-3 col-lg-3 col-form-label">Full Name</label>
                      <div class="col-lg-9 col-xl-6">
                        <input class="form-control" type="text" name="name" value="{{ old('name', $user->name) }}">
                        <span class="form-text text-danger">{{ ($errors->has('name')) ? $errors->first('name') : '' }}</span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-xl-3 col-lg-3 col-form-label">Company Name</label>
                      <div class="col-lg-9 col-xl-6">
                        <input class="form-control" type="text" name="company_name" value="{{ old('company_name', (isset($user->profile->company_name)) ? $user->profile->company_name : '') }}">
                        <span class="form-text text-danger">{{ ($errors->has('company_name')) ? $errors->first('company_name') : '' }}</span>
                        <span class="form-text text-muted">We don't share you company name info to others</span>
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-xl-3"></label>
                      <div class="col-lg-9 col-xl-6">
                        <h3 class="kt-section__title kt-section__title-sm">Contact Info:</h3>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-xl-3 col-lg-3 col-form-label">Contact Phone</label>
                      <div class="col-lg-9 col-xl-6">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="la la-phone"></i></span></div>
                          <input type="text" class="form-control" name="phone" value="{{ old('phone', (isset($user->profile->phone)) ? $user->profile->phone : '') }}" placeholder="Phone" aria-describedby="basic-addon1">
                        </div>
                        <span class="form-text text-danger">{{ ($errors->has('phone')) ? $errors->first('phone') : '' }}</span>
                        <span class="form-text text-muted">We'll never share your phone with anyone else.</span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-xl-3 col-lg-3 col-form-label">Email Address</label>
                      <div class="col-lg-9 col-xl-6">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="la la-at"></i></span></div>
                          <input type="text" class="form-control" name="email" value="{{ old('email', $user->email) }}" placeholder="Email" aria-describedby="basic-addon1">
                        </div>
                        <span class="form-text text-danger">{{ ($errors->has('email')) ? $errors->first('email') : '' }}</span>
                      </div>
                    </div>
                    <div class="form-group form-group-last row">
                      <label class="col-xl-3 col-lg-3 col-form-label">Address</label>
                      <div class="col-lg-9 col-xl-6">
                        <textarea name="address" id="address" class="form-control" rows="5" placeholder="Address">{{ old('address', (isset($user->profile->address)) ? $user->profile->address : '') }}</textarea>
                        <span class="form-text text-danger">{{ ($errors->has('address')) ? $errors->first('address') : '' }}</span>
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
      $('#profile-edit-link').addClass('kt-widget__item--active');
        @if((Session::has('success')))
          toastr.success("{{ Session::get('success') }}");
        @endif
        @if((Session::has('error')))
          toastr.success("{{ Session::get('error') }}");
        @endif
  </script>
@endpush
