    <header>
        <div class="header-area ">
            {{-- <div class="header-top_area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-8">
                            <div class="short_contact_list">
                                <ul>
                                    <li><a href="#">+880 4664 216</a></li>
                                    <li><a href="#">Mon - Sat 10:00 - 7:00</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-4 ">
                            <div class="social_media_links">
                                <a href="#">
                                    <i class="fa fa-facebook"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div id="sticky-header" style="background-color: rgba(190,190,190,.8)" class="main-header-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-2">
                            <div class="logo">
                                <a href="index.html">
                                    <img src="img/logo.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-10">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="{{ route('home') }}" @class(['active' => Route::is('home')])>home</a></li>
                                        <li><a href="{{ Route::is('lapin') ? '#' : route('lapin') }}"
                                                @class(['active' => Route::is('lapin')])>Lapins</a></li>
                                        <li> <a href="{{route('cochons')}}" @class(['active' => Route::is('cochons')])>Cochons</a> </li>
                                        <li><a href="{{route('cailles')}}"  @class(['active' => Route::is('cailles')]) >Cailles</a></li>
                                        <li><a href="{{route('chiens')}}"  @class(['active' => Route::is('chiens')])>Chiens</a></li>
                                        @auth
                                            <li> <a href="{{ route('dashboard') }}" >Dashboard</a></l>
                                        @endauth
                                        @guest
                                            <li class="btn-group"><a href="{{route('login')}}">se connecter</a></li>
                                        @endguest
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
