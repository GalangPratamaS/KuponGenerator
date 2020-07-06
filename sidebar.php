<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                    data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Dashboards</li>
                <li>
                    <a href="index.php" <?php if($page == "Home") echo "class='mm-active'";?>>
                        <i class="metismenu-icon pe-7s-rocket"></i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="dashboard_redeem.php" <?php if($page == "redeem") echo "class='mm-active'";?>>
                        <i class="metismenu-icon pe-7s-ticket"></i>
                        Generate Coupon
                    </a>
                </li>
                <li class="app-sidebar__heading">Setting</li>
                <li>
                    <a href="#" <?php if($page == "register" || $page == "kelola_akun"){ echo "class='mm-active'";}?>>
                        <i class="metismenu-icon pe-7s-diamond"></i>
                        Manage
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="register.php" <?php if($page == "register") echo "class='mm-active'";?>>
                                <i class="metismenu-icon"></i>
                                Regist Account
                            </a>
                        </li>
                        <li>
                            <a href="kelola_akun.php" <?php if($page == "kelola_akun") echo "class='mm-active'";?>>
                                <i class="metismenu-icon"></i>
                                Manage Account
                            </a>
                        </li>
                       
                    </ul>
                </li>
               


            </ul>
        </div>
    </div>
</div>