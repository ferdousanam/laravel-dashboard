<li class="kt-menu__section ">
  <h4 class="kt-menu__section-text">Developer Options</h4>
  <i class="kt-menu__section-icon flaticon-more-v2"></i>
</li>
<li id="project-details-mm" class="kt-menu__item" aria-haspopup="true">
  <a href="project-details" class="kt-menu__link "><i class="kt-menu__link-icon fa fa-cog"></i><span class="kt-menu__link-text">Project Details</span></a>
</li>
<li id="main-menus-mm" class="kt-menu__item" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
  <a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon la la-git"></i><span class="kt-menu__link-text">Main Menus</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
  <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
    <ul class="kt-menu__subnav">
      <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true">
        <span class="kt-menu__link"><span class="kt-menu__link-text">Main Menus</span></span>
      </li>
      <li id="main-menus-sm" class="kt-menu__item" aria-haspopup="true">
        <a href="{{ route('main-menu.index') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Show Main Menus</span></a>
      </li>
      <li id="main-menus--create-sm" class="kt-menu__item" aria-haspopup="true">
        <a href="{{ route('main-menu.create') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Create Main Menu</span></a>
      </li>
    </ul>
  </div>
</li>
<li id="sub-menus-mm" class="kt-menu__item" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
  <a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon socicon-buffer"></i><span class="kt-menu__link-text">Sub Menu</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
  <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
    <ul class="kt-menu__subnav">
      <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true">
        <span class="kt-menu__link"><span class="kt-menu__link-text">Sub Menu</span></span>
      </li>
      <li id="sub-menus-sm" class="kt-menu__item" aria-haspopup="true">
        <a href="{{ route('sub-menu.index') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Show Sub Menus</span></a>
      </li>
      <li id="sub-menus--create-sm" class="kt-menu__item" aria-haspopup="true">
        <a href="{{ route('sub-menu.create') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Create Sub Menu</span></a>
      </li>
    </ul>
  </div>
</li>
