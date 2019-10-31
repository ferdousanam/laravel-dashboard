<!DOCTYPE html>
<html lang="en">

<!-- begin::Head -->
<head>
  <base href="">
  <meta charset="utf-8"/>
  <title>{{ config('app.name') }} | Login</title>
  <meta name="description" content="Latest updates and statistic charts">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!--begin::Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">

  <!--end::Fonts -->

  <!--begin::Global Theme Styles(used by all pages) -->
  <link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css"/>
  <link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css"/>

  <!--end::Global Theme Styles -->

  <!--begin::Layout Skins(used by all pages) -->
  <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css"/>

  <!--end::Layout Skins -->
  <link rel="shortcut icon" href="{{asset('assets/media/logos/favicon.ico')}}"/>

@stack('css')

<!-- Custom Theme Style -->
</head>
<!-- end::Head -->

<!-- begin::Body -->
<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--fixed kt-page--loading">


<!-- begin:: Page -->
<div class="kt-grid kt-grid--ver kt-grid--root kt-page">
  <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v6 kt-login--signin" id="kt_login">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--desktop kt-grid--ver-desktop kt-grid--hor-tablet-and-mobile">
      <div class="kt-grid__item kt-grid__item--fluid kt-grid__item--center kt-grid kt-grid--ver kt-login__content" style="background-image: url('{{ asset('uploads/project-info/login-bg.jpg') }}');">
        <div class="kt-login__section">
          <div class="kt-login__block">
            <h3 class="kt-login__title">{{ project()->company_name }}</h3>
            <div class="kt-login__desc">

            </div>
          </div>
        </div>
      </div>

      <div class="kt-grid__item  kt-grid__item--order-tablet-and-mobile-2  kt-grid kt-grid--hor kt-login__aside">
        <div class="kt-login__wrapper">
          <div class="kt-login__container">
            <div class="kt-login__body">
              <div class="kt-login__logo">
                <a href="#">
                  <img src="{{ asset('uploads/project-info/'.project()->company_logo) }}">
                </a>
              </div>

              <div class="kt-login__signin">
                <div class="kt-login__head">
                  <h3 class="kt-login__title">Sign In</h3>
                </div>
                <div class="kt-login__form">
                  <form class="kt-form" method="POST" action="{{ route('admin.login') }}">
                    @csrf

                    <div class="form-group">
                      <input class="form-control @error('email') is-invalid @enderror" type="email" placeholder="Email" name="email" id="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                      @error('email')
                      <span class="form-text text-danger" role="alert">
                      <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <input class="form-control form-control-last @error('password') is-invalid @enderror" type="password" placeholder="Password" name="password" id="password" value="{{ old('password') }}" required>
                      @error('password')
                      <span class="form-text text-danger" role="alert">
                      <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                    <div class="kt-login__extra">
                      <label class="kt-checkbox">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                        <span></span>
                      </label>
                      <a href="javascript:;" id="kt_login_forgot">Forget Password ?</a>
                    </div>
                    <div class="kt-login__actions">
                      <button id="submit" type="submit" class="btn btn-brand btn-pill btn-elevate">{{ __('Login') }}</button>
                    </div>
                  </form>
                </div>
              </div>


              @if (Route::has('register'))
                <div class="kt-login__signup">
                  <div class="kt-login__head">
                    <h3 class="kt-login__title">Sign Up</h3>
                    <div class="kt-login__desc">Enter your details to create your account:</div>
                  </div>
                  <div class="kt-login__form">
                    <form class="kt-form" action="">
                      <div class="form-group">
                        <input class="form-control" type="text" placeholder="Fullname" name="fullname">
                      </div>
                      <div class="form-group">
                        <input class="form-control" type="text" placeholder="Email" name="email" autocomplete="off">
                      </div>
                      <div class="form-group">
                        <input class="form-control" type="password" placeholder="Password" name="password">
                      </div>
                      <div class="form-group">
                        <input class="form-control form-control-last" type="password" placeholder="Confirm Password" name="rpassword">
                      </div>
                      <div class="kt-login__extra">
                        <label class="kt-checkbox">
                          <input type="checkbox" name="agree"> I Agree the <a href="#">terms and conditions</a>.
                          <span></span>
                        </label>
                      </div>
                      <div class="kt-login__actions">
                        <button id="kt_login_signup_submit" class="btn btn-brand btn-pill btn-elevate">Sign Up</button>
                        <button id="kt_login_signup_cancel" class="btn btn-outline-brand btn-pill">Cancel</button>
                      </div>
                    </form>
                  </div>
                </div>
              @endif

              <div class="kt-login__forgot">
                <div class="kt-login__head">
                  <h3 class="kt-login__title">Forgotten Password ?</h3>
                  <div class="kt-login__desc">Enter your email to reset your password:</div>
                </div>
                <div class="kt-login__form">
                  <form class="kt-form" action="">
                    <div class="form-group">
                      <input class="form-control" type="text" placeholder="Email" name="email" id="kt_email" autocomplete="off">
                    </div>
                    <div class="kt-login__actions">
                      <button id="kt_login_forgot_submit" class="btn btn-brand btn-pill btn-elevate">Request</button>
                      <button id="kt_login_forgot_cancel" class="btn btn-outline-brand btn-pill">Cancel</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          @if (Route::has('register'))
            <div class="kt-login__account">
            <span class="kt-login__account-msg">
                Don't have an account yet ?
            </span>&nbsp;&nbsp;
              <a href="{{ route('register') }}" id="kt_login_signup" class="kt-login__account-link">{{ __('Register') }}</a>
            </div>
          @endif

        </div>
      </div>

    </div>
  </div>
</div>
<!-- end:: Page -->


<!-- begin::Global Config(global config for global JS sciprts) -->
<script>
    var KTAppOptions = {
        "colors": {
            "state": {
                "brand": "#2c77f4",
                "light": "#ffffff",
                "dark": "#282a3c",
                "primary": "#5867dd",
                "success": "#34bfa3",
                "info": "#36a3f7",
                "warning": "#ffb822",
                "danger": "#fd3995"
            },
            "base": {
                "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
                "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
            }
        }
    };
</script>

<!-- end::Global Config -->

<!--begin::Global Theme Bundle(used by all pages) -->
<script src="{{asset('assets/plugins/global/plugins.bundle.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/scripts.bundle.js')}}" type="text/javascript"></script>

<!--end::Global Theme Bundle -->

<!--begin::Page Vendors(used by this page) -->

<!--end::Page Vendors -->

<script src="{{asset('assets/js/pages/custom/login/login-general.js')}}" type="text/javascript"></script>
<script src="{{asset('js/app.js')}}" type="text/javascript"></script>
<!--begin::Page Scripts(used by this page) -->
@stack('scripts')

<!--end::Page Scripts -->
</body>

</html>
