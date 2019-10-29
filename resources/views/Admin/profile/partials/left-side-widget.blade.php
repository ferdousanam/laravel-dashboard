<!--Begin:: App Aside Mobile Toggle-->
<button class="kt-app__aside-close" id="kt_user_profile_aside_close">
  <i class="la la-close"></i>
</button>

<!--End:: App Aside Mobile Toggle-->
<!--Begin:: App Aside-->
<div class="kt-grid__item kt-app__toggle kt-app__aside" id="kt_user_profile_aside">

  <!--begin:: Widgets/Applications/User/Profile1-->
  <div class="kt-portlet ">
    <div class="kt-portlet__head  kt-portlet__head--noborder">
        <?php /* ?>
      <div class="kt-portlet__head-label">
        <h3 class="kt-portlet__head-title">
        </h3>
      </div>
      <div class="kt-portlet__head-toolbar">
        <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown">
          <i class="flaticon-more-1"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-menu-fit dropdown-menu-md">

          <!--begin::Nav-->
          <ul class="kt-nav">
            <li class="kt-nav__head">
              Export Options
              <span data-toggle="kt-tooltip" data-placement="right" title="Click to learn more...">
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--brand kt-svg-icon--md1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24"/>
																		<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
																		<rect fill="#000000" x="11" y="10" width="2" height="7" rx="1"/>
																		<rect fill="#000000" x="11" y="7" width="2" height="2" rx="1"/>
																	</g>
																</svg> </span>
            </li>
            <li class="kt-nav__separator"></li>
            <li class="kt-nav__item">
              <a href="#" class="kt-nav__link">
                <i class="kt-nav__link-icon flaticon2-drop"></i>
                <span class="kt-nav__link-text">Activity</span>
              </a>
            </li>
            <li class="kt-nav__item">
              <a href="#" class="kt-nav__link">
                <i class="kt-nav__link-icon flaticon2-calendar-8"></i>
                <span class="kt-nav__link-text">FAQ</span>
              </a>
            </li>
            <li class="kt-nav__item">
              <a href="#" class="kt-nav__link">
                <i class="kt-nav__link-icon flaticon2-telegram-logo"></i>
                <span class="kt-nav__link-text">Settings</span>
              </a>
            </li>
            <li class="kt-nav__item">
              <a href="#" class="kt-nav__link">
                <i class="kt-nav__link-icon flaticon2-new-email"></i>
                <span class="kt-nav__link-text">Support</span>
                <span class="kt-nav__link-badge">
																	<span class="kt-badge kt-badge--success kt-badge--rounded">5</span>
																</span>
              </a>
            </li>
            <li class="kt-nav__separator"></li>
            <li class="kt-nav__foot">
              <a class="btn btn-label-danger btn-bold btn-sm" href="#">Upgrade plan</a>
              <a class="btn btn-clean btn-bold btn-sm" href="#" data-toggle="kt-tooltip" data-placement="right" title="Click to learn more...">Learn
                more</a>
            </li>
          </ul>

          <!--end::Nav-->
        </div>
      </div>
    <?php */ ?>
    </div>
    <div class="kt-portlet__body kt-portlet__body--fit-y">

      <!--begin::Widget -->
      <div class="kt-widget kt-widget--user-profile-1">
        <div class="kt-widget__head">
          <div class="kt-widget__media">
            <img src="{{ (Auth::user()->profile_image) ? asset('uploads/profile-image/'.Auth::user()->profile_image) : asset('uploads/profile-image/default.png') }}" alt="image">
          </div>
          <div class="kt-widget__content">
            <div class="kt-widget__section">
              <a href="#" class="kt-widget__username">
                {{ Auth::user()->name }}
                <i class="flaticon2-correct kt-font-success"></i>
              </a>
              <span class="kt-widget__subtitle">
{{--           Head of Development--}}
              </span>
            </div>
              <?php /* ?>
                <div class="kt-widget__action">
                  <button type="button" class="btn btn-info btn-sm">chat</button>&nbsp;
                  <button type="button" class="btn btn-success btn-sm">follow</button>
                </div>
              <?php */ ?>
          </div>
        </div>
        <div class="kt-widget__body">
          <div class="kt-widget__content">
            <div class="kt-widget__info">
              <span class="kt-widget__label">Email:</span>
              <a href="#" class="kt-widget__data">{{ Auth::user()->email }}</a>
            </div>
            <div class="kt-widget__info">
              <span class="kt-widget__label">Phone:</span>
              <a href="#" class="kt-widget__data">{{ (isset(Auth::user()->profile->phone)) ? Auth::user()->profile->phone : '' }}</a>
            </div>
            <div class="kt-widget__info">
              <span class="kt-widget__label">Location:</span>
              <span class="kt-widget__data">{{ (isset(Auth::user()->profile->address)) ? Auth::user()->profile->address : '' }}</span>
            </div>
          </div>
          <div class="kt-widget__items">
            <a href="{{ route('profile.index') }}" class="kt-widget__item" id="profile-overview-link">
              <span class="kt-widget__section">
                <span class="kt-widget__icon">
                </span>
                <span class="kt-widget__desc">
                  Profile Overview
                </span>
              </span>
            </a>
            <a href="{{ route('profile.edit', 0) }}" class="kt-widget__item" id="profile-edit-link">
              <span class="kt-widget__section">
                <span class="kt-widget__icon">
                </span>
                <span class="kt-widget__desc">
                  Update Information
                </span>
              </span>
            </a>
            <a href="{{ route('edit-avatar') }}" class="kt-widget__item" id="edit-avatar-link">
              <span class="kt-widget__section">
                <span class="kt-widget__icon">
                </span>
                <span class="kt-widget__desc">
                  Update Avatar
                </span>
              </span>
            </a>
            <a href="{{ route('edit-password') }}" class="kt-widget__item" id="profile-change-password-link">
              <span class="kt-widget__section">
                <span class="kt-widget__icon">
                </span>
                <span class="kt-widget__desc">
                  Change Password
                </span>
              </span>
            </a>
          </div>
        </div>
      </div>

      <!--end::Widget -->
    </div>
  </div>

  <!--end:: Widgets/Applications/User/Profile1-->
</div>

<!--End:: App Aside-->
