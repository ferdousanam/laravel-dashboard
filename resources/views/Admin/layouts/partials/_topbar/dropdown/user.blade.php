<!--begin: Head -->
<div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x" style="background-image: url({{ asset('assets/media/misc/bg-1.jpg') }})">
  <div class="kt-user-card__avatar">
    <img class="kt-hidden" alt="Profile Image" src="{{ (Auth::user()->profile_image) ? asset('uploads/profile-image/'.Auth::user()->profile_image) : asset('uploads/profile-image/default.png') }}"/>

    <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
    <span class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success">{{ loginUserBadge() }}</span>
  </div>
  <div class="kt-user-card__name">
    {{ getLoginName() }}
  </div>
  <div class="kt-user-card__badge">
    {{--		<span class="btn btn-success btn-sm btn-bold btn-font-md">0 messages</span>--}}
  </div>
</div>

<!--end: Head -->

<!--begin: Navigation -->
<div class="kt-notification">
  <a href="{{ route('profile.index') }}" class="kt-notification__item">
    <div class="kt-notification__item-icon">
      <i class="flaticon2-calendar-3 kt-font-success"></i>
    </div>
    <div class="kt-notification__item-details">
      <div class="kt-notification__item-title kt-font-bold">
        My Profile
      </div>
      <div class="kt-notification__item-time">
        Account settings and more
      </div>
    </div>
  </a>
  <div class="kt-notification__custom kt-space-between">
    <a href="{{ route('logout') }}" target="_blank" class="btn btn-label btn-label-brand btn-sm btn-bold" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
      {{ __('Logout') }}
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
    </form>
  </div>
</div>

<!--end: Navigation -->
