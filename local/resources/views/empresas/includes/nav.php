<nav class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-semi-dark navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav">
                <li class="nav-item mobile-menu hidden-md-up float-xs-left">
                    <a class="nav-link nav-menu-main menu-toggle hidden-xs">
                        <i class="icon-menu5 font-large-1">
                        </i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="navbar-brand nav-link" href="index.html">
                        <img alt="branding logo" class="brand-logo" data-collapse="<?= $ruta;?>app-assets/images/logo/robust-logo-small.png" data-expand="<?= $ruta;?>app-assets/images/logo/robust-logo-light.png" src="<?= $ruta;?>app-assets/images/logo/robust-logo-light.png"/>
                    </a>
                </li>
                <li class="nav-item hidden-md-up float-xs-right">
                    <a class="nav-link open-navbar-container" data-target="#navbar-mobile" data-toggle="collapse">
                        <i class="icon-ellipsis pe-2x icon-icon-rotate-right-right">
                        </i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="navbar-container content container-fluid">
            <div class="collapse navbar-toggleable-sm" id="navbar-mobile">
                <ul class="nav navbar-nav">
                    <li class="nav-item hidden-sm-down">
                        <a class="nav-link nav-menu-main menu-toggle hidden-xs">
                            <i class="icon-menu5">
                            </i>
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav float-xs-right">
                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" data-toggle="dropdown" href="#">
                            <span class="avatar avatar-online">
                                <img alt="avatar" src="<?= $ruta;?>app-assets/images/portrait/small/avatar-s-1.png">
                                    <i>
                                    </i>
                                </img>
                            </span>
                            <span class="user-name">
                                John Doe
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">
                                <i class="icon-head">
                                </i>
                                Edit Profile
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="icon-mail6">
                                </i>
                                My Inbox
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="icon-clipboard2">
                                </i>
                                Task
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="icon-calendar5">
                                </i>
                                Calender
                            </a>
                            <div class="dropdown-divider">
                            </div>
                            <a class="dropdown-item" href="#">
                                <i class="icon-power3">
                                </i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>