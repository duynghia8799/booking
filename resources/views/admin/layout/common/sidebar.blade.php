<!-- BEGIN: Left Aside -->
<button class="m-aside-left-close m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
    <i class="la la-close">
    </i>
</button>
<div class="m-grid__item m-aside-left m-aside-left--skin-dark " id="m_aside_left">
    <!-- BEGIN: Aside Menu -->
    <div class="m-aside-menu m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " id="m_ver_menu" m-menu-dropdown-timeout="500" m-menu-scrollable="1" m-menu-vertical="1" style="position: relative;">
        <ul class="m-menu__nav m-menu__nav--dropdown-submenu-arrow ">
            <li aria-haspopup="true" class="m-menu__item m-menu__item--active">
                <a class="m-menu__link " href="">
                    <i class="m-menu__link-icon flaticon-line-graph">
                    </i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">    
                            <span class="m-menu__link-text">
                                Dashboard
                            </span>
                        </span>
                    </span>
                </a>
            </li>
            <li class="m-menu__section ">
                <h4 class="m-menu__section-text">
                    Tùy chọn
                </h4>
                <i class="m-menu__section-icon flaticon-more-v3">
                </i>
            </li>
            <li aria-haspopup="true" class="m-menu__item m-menu__item--submenu" m-menu-submenu-toggle="hover">
                <a class="m-menu__link m-menu__toggle" href="javascript:;">
                    <i class="m-menu__link-icon fa fa-users">
                    </i>
                    <span class="m-menu__link-text">
                        Nhân viên
                    </span>
                    <i class="m-menu__ver-arrow la la-angle-right">
                    </i>
                </a>
                <div class="m-menu__submenu ">
                    <ul class="m-menu__subnav">
                        <li aria-haspopup="true" class="m-menu__item ">
                            <a class="m-menu__link " href="{{route('staff.index')}}">
                                <i class="m-menu__link-icon la la-list-ol">
                                </i>
                                <span class="m-menu__link-text">
                                    Danh sách
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li aria-haspopup="true" class="m-menu__item m-menu__item--submenu" m-menu-submenu-toggle="hover">
                <a class="m-menu__link m-menu__toggle" href="javascript:;">
                    <i class="m-menu__link-icon flaticon-list">
                    </i>
                    <span class="m-menu__link-text">
                        Dịch vụ
                    </span>
                    <i class="m-menu__ver-arrow la la-angle-right">
                    </i>
                </a>
                <div class="m-menu__submenu ">
                    <ul class="m-menu__subnav">
                        <li aria-haspopup="true" class="m-menu__item ">
                            <a class="m-menu__link " href="{{route('service.index')}}">
                                <i class="m-menu__link-icon la la-list-ol">
                                </i>
                                <span class="m-menu__link-text">
                                    Danh sách
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li aria-haspopup="true" class="m-menu__item m-menu__item--submenu" m-menu-submenu-toggle="hover">
                <a class="m-menu__link m-menu__toggle" href="{{route('order.index')}}">
                    <i class="m-menu__link-icon flaticon-calendar">
                    </i>
                    <span class="m-menu__link-text">
                        Lịch hẹn
                    </span>
                    <i class="m-menu__ver-arrow la la-angle-right">
                    </i>
                </a>
            </li>
            <li aria-haspopup="true" class="m-menu__item m-menu__item--submenu" m-menu-submenu-toggle="hover">
                <a class="m-menu__link m-menu__toggle" href="javascript:;">
                    <i class="m-menu__link-icon fa fa-users">
                    </i>
                    <span class="m-menu__link-text">
                        Khách hàng
                    </span>
                    <i class="m-menu__ver-arrow la la-angle-right">
                    </i>
                </a>
                <div class="m-menu__submenu ">
                    <ul class="m-menu__subnav">
                        <li aria-haspopup="true" class="m-menu__item ">
                            <a class="m-menu__link " href="{{route('customer.index')}}">
                                <i class="m-menu__link-icon la la-list-ol">
                                </i>
                                <span class="m-menu__link-text">
                                    Danh sách
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
    <!-- END: Aside Menu -->
</div>
<!-- begin::Scroll Top -->
<div class="m-scroll-top" id="m_scroll_top">
    <i class="la la-arrow-up">
    </i>
</div>
<!-- end::Scroll Top -->
