@extends('Admin.layouts.app')

@section('page_title', 'User Profile')
@section('page_tagline', Auth::user()->name)

@push('css')
@endpush

@section('content')
  <!--Begin::App-->
  <div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app">

  @include('Admin.profile.partials.left-side-widget')

  <!--Begin:: App Content-->
    <div class="kt-grid__item kt-grid__item--fluid kt-app__content">
      <div class="row">
        <div class="col-xl-12">
          <div class="kt-portlet kt-portlet--height-fluid">
            <div class="kt-portlet__head">
              <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">Change Password<small>change or reset your account password</small>
                </h3>
              </div>
              <div class="kt-portlet__head-toolbar kt-hidden">
                <div class="kt-portlet__head-toolbar">
                  <div class="dropdown dropdown-inline">
                    <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="la la-sellsy"></i>
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
            <form class="kt-form kt-form--label-right" method="POST" action="{{ route('update-password') }}">
              @csrf
              <div class="kt-portlet__body">
                <div class="kt-section kt-section--first">
                  <div class="kt-section__body">
                    <div class="alert alert-solid-danger alert-bold fade show kt-margin-t-20 kt-margin-b-40" role="alert">
                      <div class="alert-icon"><i class="fa fa-exclamation-triangle"></i></div>
                      <div class="alert-text">Configure user passwords to expire periodically. Users will need warning
                        that their passwords are going to expire, <br>or they might inadvertently get locked out of the
                        system!
                      </div>
                      <div class="alert-close">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true"><i class="la la-close"></i></span>
                        </button>
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-xl-3"></label>
                      <div class="col-lg-9 col-xl-6">
                        <h3 class="kt-section__title kt-section__title-sm">Change Or Recover Your Password:</h3>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-xl-3 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-lg-9 col-xl-6">
                        <input type="password" class="form-control" value="" placeholder="Current password" name="current_password">
                        <span class="form-text text-danger">{{ ($errors->has('current_password')) ? $errors->first('current_password') : '' }}</span>
                        <span class="form-text text-danger">{{ (Session::has('current_password')) ? Session::get('current_password') : '' }}</span>
                        <a href="#" class="kt-link kt-font-sm kt-font-bold kt-margin-t-5">Forgot password ?</a>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-xl-3 col-lg-3 col-form-label">New Password</label>
                      <div class="col-lg-9 col-xl-6">
                        <input type="password" class="form-control" value="" placeholder="New password" name="password">
                        <span class="form-text text-danger">{{ ($errors->has('password')) ? $errors->first('password') : '' }}</span>
                      </div>
                    </div>
                    <div class="form-group form-group-last row">
                      <label class="col-xl-3 col-lg-3 col-form-label">Confirm Password</label>
                      <div class="col-lg-9 col-xl-6">
                        <input type="password" class="form-control" value="" placeholder="Verify password" name="password_confirmation">
                        <span class="form-text text-danger">{{ ($errors->has('password_confirmation')) ? $errors->first('password_confirmation') : '' }}</span>
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
                      <button type="submit" class="btn btn-brand btn-bold">Change Password</button>&nbsp;
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
      $('#profile-change-password-link').addClass('kt-widget__item--active');
      @if((Session::has('success')))
        toastr.success("{{ Session::get('success') }}");
      @endif
      @if((Session::has('error')))
        toastr.success("{{ Session::get('error') }}");
      @endif
  </script>
@endpush
