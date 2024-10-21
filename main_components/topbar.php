<div class="nk-wrap ">
    <div class="nk-header nk-header-fixed is-light">
        <div class="container-fluid">
            <div class="nk-header-wrap">
                <div class="nk-menu-trigger d-xl-none ms-n1"><a href="#"
                        class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em
                            class="icon ni ni-menu"></em></a></div>
                <div class="nk-header-brand d-xl-none"><a href="index" class="logo-link"><img
                            class="logo-light logo-img" src="./assets/logo&fav/logo.png"
                            srcset="/demo2/images/logo2x.png 2x" alt="logo"><img class="logo-dark logo-img"
                            src="./assets/logo&fav/logo.png" srcset="/demo2/images/logo-dark2x.png 2x"
                            alt="logo-dark"></a></div>
                
                <div class="nk-header-tools">
                    <ul class="nk-quick-nav">

  
             
                        <li class="dropdown user-dropdown"><a href="#" class="dropdown-toggle me-n1"
                                data-bs-toggle="dropdown">
                                <div class="user-toggle">
                                    <div class="user-avatar sm"><em class="icon ni ni-user-alt"></em></div>
                                    <div class="user-info d-none d-xl-block">
                                        <div class="user-name dropdown-indicator"><?php echo $_SESSION['username'] ?></div>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-md dropdown-menu-end">
                                <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                    <div class="user-card">
                                        <div class="user-avatar"><span<em class="icon ni ni-user-alt"></em></span></div>
                                        <div class="user-info"><span class="lead-text"><?php echo $_SESSION['username'] ?></span><span
                                                class="sub-text"><?php echo $_SESSION['email'] ?></span></div>
                                    </div>
                                </div>
                                
                                <div class="dropdown-inner">
                                    <ul class="link-list">
                                        <li>
                                            <a href="logout"><em class="icon ni ni-signout"></em><span>Sign
                                                    out</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>