<li class="kt-menu__section ">
  <h4 class="kt-menu__section-text">Super Admin Menu</h4>
  <i class="kt-menu__section-icon flaticon-more-v2"></i>
</li>
<li id="user-mm" class="kt-menu__item" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
  <a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon fa fa-users"></i><span class="kt-menu__link-text">User</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
  <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
    <ul class="kt-menu__subnav">
      <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true">
        <span class="kt-menu__link"><span class="kt-menu__link-text">User</span></span>
      </li>
      <li id="user-sm" class="kt-menu__item" aria-haspopup="true">
        <a href="{{ route('user.index') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Show All User</span></a>
      </li>
      <li id="user--create-sm" class="kt-menu__item" aria-haspopup="true">
        <a href="{{ route('user.create') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Add New User</span></a>
      </li>
    </ul>
  </div>
</li>
<li id="user-types-mm" class="kt-menu__item" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
  <a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon fa fa-arrows-alt"></i><span class="kt-menu__link-text">User Types</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
  <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
    <ul class="kt-menu__subnav">
      <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true">
        <span class="kt-menu__link"><span class="kt-menu__link-text">User Types</span></span></li>
      <li id="user-types-sm" class="kt-menu__item" aria-haspopup="true">
        <a href="{{ route('user-type.index') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Show User Types</span></a>
      </li>
      <li id="user-types--create-sm" class="kt-menu__item" aria-haspopup="true">
        <a href="{{ route('user-type.create') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Create User Type</span></a>
      </li>
    </ul>
  </div>
</li>
<li id="user-priority-level-mm" class="kt-menu__item" aria-haspopup="true">
  <a href="{{ route('user-priority-level.index') }}" class="kt-menu__link "><i class="kt-menu__link-icon fa fa-cog"></i><span class="kt-menu__link-text">User Priority Settings</span></a>
</li>
