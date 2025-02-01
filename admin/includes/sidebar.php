<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Mains</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                Admin Center
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="admins">Add Admins</a>
                                    <a class="nav-link" href="admins-records">Admins</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"> <i class="fas fa-money-bill-wave"></i></div>
                                Payments Center
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="payment">Add Payments</a>
                                    <a class="nav-link" href="payment-record">Payment</a>
                                    <a class="nav-link" href="payment-record">Approve Withdrawals</a>
                                    <a class="nav-link" href="payment-record">Approve Deposits</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Countries Center
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="country">Add Countries</a>
                                    <a class="nav-link" href="country-records">Countries</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts3" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fa fa-clone" aria-hidden="true"></i></div>
                                Others
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts3" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="others">Surveys</a>
                                    <a class="nav-link" href="others">Games</a>
                                    <a class="nav-link" href="others">Blogs</a>
                                </nav>
                            </div>
                           
                            <div class="sb-sidenav-menu-heading">Generals</div>
                            <a class="nav-link" href="users">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-circle"></i></div>
                                Users
                            </a>
                            <a class="nav-link" href="earning">
                                <div class="sb-nav-link-icon"><i class="fas fa-wallet"></i></div>
                                Wallets
                            </a>
                            <a class="nav-link" href="transactions">
                                <div class="sb-nav-link-icon"><i class="fas fa-receipt"></i></i></div>
                                Transactions
                            </a>
                            <a class="nav-link" href="refferal">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Networking
                            </a>
                            

                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?= htmlspecialchars($uname, ENT_QUOTES, 'UTF-8') ?>
                    </div>
                </nav>
            </div>