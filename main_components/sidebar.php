<body class="nk-body bg-lighter npc-default has-sidebar ">

    <div class="nk-app-root">

        <div class="nk-main ">

            <div class="nk-sidebar nk-sidebar-fixed is-light " data-content="sidebarMenu">

                <div class="nk-sidebar-element nk-sidebar-head">

                    <div class="nk-sidebar-brand"><a href="index" class="logo-link nk-sidebar-logo"><img

                                class="logo-light logo-img" src="./assets/logo&fav/logo.png" srcset="/assets/logo&fav/images/logo.png 2x"

                                alt="logo"><img class="logo-dark logo-img" src="./assets/logo&fav/logo.png"

                                srcset="/assets/logo&fav/images/logo.png 2x" alt="logo-dark"><img

                                class="logo-small logo-img logo-img-small" src="./assets/logo&fav/logo.png"

                                srcset="/assets/logo&fav/images/logo.png 2x" alt="logo-small"></a></div>

                    <div class="nk-menu-trigger me-n2"><a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none"

                            data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a><a href="#"

                            class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex"

                            data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a></div>

                </div>

                <div class="nk-sidebar-element">

                    <div class="nk-sidebar-content">

                        <div class="nk-sidebar-menu" data-simplebar>

                            <ul class="nk-menu">



                                <li class="nk-menu-item has-sub"><a href="#" class="nk-menu-link nk-menu-toggle"><span
                                            class="nk-menu-icon"><em
                                                class="icon ni ni-table-view-fill"></em></span><span
                                            class="nk-menu-text">Add</span></a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item"><a href="add-website"
                                                class="nk-menu-link"><span class="nk-menu-text">Add Websites</span></a>
                                        </li>

                                    </ul>

                                </li>

                                <li class="nk-menu-item has-sub"><a href="#" class="nk-menu-link nk-menu-toggle"><span

                                            class="nk-menu-icon"><em class="icon ni ni-user-alt-fill"></em></span><span

                                            class="nk-menu-text">Users</span></a>

                                    <ul class="nk-menu-sub">



                                        <li class="nk-menu-item"><a href="add-user"

                                                class="nk-menu-link"><span class="nk-menu-text">Add User</span></a>

                                        </li>

                                        <li class="nk-menu-item"><a href="view-user"

                                                class="nk-menu-link"><span class="nk-menu-text">View User</span></a>

                                        </li>

                                    </ul>

                                </li>


                                        <?php




                                        $query = "SELECT `id`, `website_name` FROM `websites`";
                                        $queryResult = $conn->query($query);
                                        if ($queryResult->num_rows > 0) {
                                            while ($row = $queryResult->fetch_assoc()) {
                                        ?>


                                                <li class="nk-menu-item has-sub"><a href="website?webid=<?php echo $row['id']; ?>" class="nk-menu-link "><span

                                                            class="nk-menu-icon"><em class="icon ni ni-b-si"></em></span><span

                                                            class="nk-menu-text"><?php echo $row['website_name']; ?></span></a>
                                                </li>



                                        <?php

                                            }
                                        } else {

                                            echo "<li><i class='bx bx-right-arrow-alt'></i>No Websites.</li>";

                                        }

                                        ?>



                            </ul>

                        </div>

                    </div>

                </div>

            </div>