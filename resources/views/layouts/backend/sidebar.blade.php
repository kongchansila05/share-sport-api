<ul class="navbar-nav bg-gradient-sila sidebar sidebar-dark accordion" id="accordionSidebar">



    <!-- Sidebar - Brand -->

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">

        <div class="sidebar-brand-icon">

            {{-- <i class="fab fa-laravel"></i> --}}

            <img src="/images/logo.jpg" alt="logo" width="100%" style="border-radius: 50px">

        </div>

        <div class="sidebar-brand-text mx-3">ShareSport</div>

    </a>



    <!-- Divider -->

    <hr class="sidebar-divider my-0">



    <!-- Nav Item - Pages Collapse Menu -->

    <li class="nav-item  @yield('highlight')">

        <a class="nav-link collapsed" href="#"  data-toggle="collapse" data-target="#highlight"

            aria-expanded="true" aria-controls="highlight">

            <i class="fas fa-fw fa-cog"></i>

            <span>HighLight</span>

        </a>

        <div id="highlight" class="collapse @yield('highlight-show')" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

            <div class="bg-gradient-bg py-2 collapse-inner rounded">

                <a class="collapse-item @yield('list-hight-light')"  href="{{ route('highlight') }}">List HighLight</a>

                <a class="collapse-item @yield('add-hight-light')" href="{{ route('highlight/create') }}">Add HighLight</a>

            </div>

        </div>

    </li>

    <!-- Nav Item - Pages Collapse Menu -->

    <li class="nav-item  @yield('livestream')">

        <a class="nav-link collapsed" href="#"  data-toggle="collapse" data-target="#livestream"

            aria-expanded="true" aria-controls="livestream">

            <i class="fas fa-fw fa-cog"></i>

            <span>Livestream</span>

        </a>

        <div id="livestream" class="collapse @yield('livestream-show')" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

            <div class="bg-gradient-bg py-2 collapse-inner rounded">

                <a class="collapse-item @yield('list-hight-light')"  href="{{ route('livestream') }}">List Livestream</a>

                <a class="collapse-item @yield('add-hight-light')" href="{{ route('livestream/create') }}">Add Livestream</a>

            </div>

        </div>

    </li>

    <!-- Nav Item - Pages Collapse Menu -->

    <li class="nav-item  @yield('article')">

        <a class="nav-link collapsed" href="#"  data-toggle="collapse" data-target="#article"

            aria-expanded="true" aria-controls="article">

            <i class="fas fa-fw fa-cog"></i>

            <span>Articlet</span>

        </a>

        <div id="article" class="collapse @yield('article-show')" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

            <div class="bg-gradient-bg py-2 collapse-inner rounded">

                <a class="collapse-item @yield('list-hight-light')"  href="{{ route('article') }}">List Article</a>

                <a class="collapse-item @yield('add-hight-light')" href="{{ route('article/create') }}">Add Article</a>

            </div>

        </div>

    </li>

    <!-- Nav Item - Pages Popular Menu -->

    <li class="nav-item  @yield('popular')">

        <a class="nav-link collapsed" href="#"  data-toggle="collapse" data-target="#popular"

            aria-expanded="true" aria-controls="popular">

            <i class="fas fa-fw fa-cog"></i>

            <span>Popular</span>

        </a>

        <div id="popular" class="collapse @yield('popular-show')" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

            <div class="bg-gradient-bg py-2 collapse-inner rounded">

                <a class="collapse-item @yield('list-hight-light')"  href="{{ route('popular') }}">List Popular</a>

                <a class="collapse-item @yield('add-hight-light')" href="{{ route('popular/create') }}">Add Popular</a>

            </div>

        </div>

    </li>

      <!-- Nav Item - Pages Category Menu -->

      <li class="nav-item @yield('Setting-active')">

        <a class="nav-link collapsed " href="#" data-toggle="collapse" data-target="#Category"

            aria-expanded="true" aria-controls="Category">

                  <i class="fas fa-fw fa-cog"></i>

            <span>Settings</span>

        </a>

        <div id="Category" class="collapse @yield('Setting')" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

            <div class="bg-gradient-bg py-2 collapse-inner rounded">

                <a class="collapse-item @yield('list_Bot')" href="{{ route('bot') }}">Bot</a>

                <a class="collapse-item @yield('list_Category')" href="{{ route('category') }}">Categories</a>
                <a class="collapse-item @yield('list_Banner')" href="{{ route('banner') }}">Banner</a>

            </div>

        </div>

    </li>



    <!-- Nav Item - Pages Collapse Menu -->

    <li hidden class="nav-item">

        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"

            aria-expanded="true" aria-controls="collapseTwo">

            <i class="fas fa-fw fa-cog"></i>

            <span>Components</span>

        </a>

        <div id="collapseTwo" class="collapse @yield('Components')" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

            <div class="bg-gradient-bg py-2 collapse-inner rounded">

                <h6 class="collapse-header text-write">Custom Components:</h6>

                <a class="collapse-item @yield('Buttons')" href="{{ route('buttons') }}">Buttons</a>

                <a class="collapse-item @yield('Cards')"  href="{{ route('cards') }}">Cards</a>

            </div>

        </div>

    </li>

    <!-- Nav Item - Utilities Collapse Menu -->

    <li hidden class="nav-item">

        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"

            aria-expanded="true" aria-controls="collapseUtilities">

            <i class="fas fa-fw fa-wrench"></i>

            <span>Utilities</span>

        </a>

        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"

            data-parent="#accordionSidebar">

            <div class="bg-gradient-bg py-2 collapse-inner rounded">

                <h6 class="collapse-header">Custom Utilities:</h6>

                <a class="collapse-item" href="{{ route('utilities-colors') }}">Colors</a>

                <a class="collapse-item" href="{{ route('utilities-borders') }}">Borders</a>

                <a class="collapse-item" href="{{ route('utilities-animations') }}">Animations</a>

                <a class="collapse-item" href="{{ route('utilities-other') }}">Other</a>

            </div>

        </div>

    </li>



    <!-- Divider -->

    <hr hidden class="sidebar-divider">



    <!-- Heading -->

    <div hidden class="sidebar-heading">

        Addons

    </div>



    <!-- Nav Item - Pages Collapse Menu -->

    <li hidden class="nav-item">

        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"

            aria-expanded="true" aria-controls="collapsePages">

            <i class="fas fa-fw fa-folder"></i>

            <span>Pages</span>

        </a>

        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">

            <div class="bg-gradient-bg py-2 collapse-inner rounded">

                <h6 class="collapse-header">Login Screens:</h6>

                <a class="collapse-item" href="{{ route('login') }}">Login</a>

                <a class="collapse-item" href="{{ route('register') }}">Register</a>

                <div class="collapse-divider"></div>

                <h6 class="collapse-header">Other Pages:</h6>

                <a class="collapse-item" href="{{ route('404-page') }}">404 Page</a>

                <a class="collapse-item" href="{{ route('blank-page') }}">Blank Page</a>

            </div>

        </div>

    </li>



    <!-- Nav Item - Charts -->

    <li hidden class="nav-item">

        <a class="nav-link" href="{{ route('chart') }}">

            <i class="fas fa-fw fa-chart-area"></i>

            <span>Charts</span></a>

    </li>



    <!-- Nav Item - Tables -->

    <li hidden class="nav-item" >

        <a class="nav-link" href="{{ route('tables') }}">

            <i class="fas fa-fw fa-table"></i>

            <span>Tables</span></a>

    </li>

    <!-- Divider -->

    <hr  class="sidebar-divider d-none d-md-block">



    <!-- Sidebar Toggler (Sidebar) -->

    <div class="text-center d-none d-md-inline">

        <button class="rounded-circle border-0" id="sidebarToggle"></button>

    </div>

</ul>