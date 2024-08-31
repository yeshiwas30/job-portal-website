<div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="{{route('dashboard')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Jobs
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>

                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{route('job.create')}}">Create job</a>
                                    <a class="nav-link" href="{{route('job.index')}}">Your jobs</a>
                                </nav>
                            </div>
                            <a class="nav-link" href="{{route('applicants.index')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Applicants
                            </a>
                            <a class="nav-link" href="{{route('subscribe')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Subscription
                            </a>
                            <a class="nav-link" href="/user/profile">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Accont settings
                            </a>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        {{auth()->user()->name}}
                    </div>
                </nav>
            </div>