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
          <div class="kt-portlet">
            <div class="kt-portlet__head">
              <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">User Information
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
            <form class="kt-form kt-form--label-right">
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
                      <label class="col-xl-3 col-lg-3">Last Successful Login</label>
                      <div class="col-lg-9 col-xl-6">
                        <p class="">{{ (isset(Auth::user()->last_login_at)) ? Auth::user()->last_login_at->format('d-m-Y h:i:s A') : '' }}</p>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-xl-3 col-lg-3">Last Failed Login</label>
                      <div class="col-lg-9 col-xl-6">
                        <p class="">{{ (isset(Auth::user()->last_failed_login_at) ? Auth::user()->last_failed_login_at->format('d-m-Y h:i:s A') : '') }}</p>
                      </div>
                    </div>
                    <?php /* ?>
                    <div class="row">
                      <label class="col-xl-3"></label>
                      <div class="col-lg-9 col-xl-6">
                        <h3 class="kt-section__title kt-section__title-sm">Contact Info:</h3>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-xl-3 col-lg-3">Address</label>
                      <div class="col-lg-9 col-xl-6">
                        <p class="">{{ (isset(Auth::user()->profile->address)) ? Auth::user()->profile->address : '' }}</p>
                      </div>
                    </div>
                    <?php */ ?>
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
      $('#profile-overview-link').addClass('kt-widget__item--active');
  </script>
@endpush
