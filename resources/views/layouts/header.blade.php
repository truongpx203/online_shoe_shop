<!-- Start Header Area -->
<header class="header_area sticky-header">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light main_box">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="{{ route('home') }}"><img src="{{ asset('template/img/logo.png') }}" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item {{ (request()->is('/')) ? 'active' : '' }}"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                        <li class="nav-item {{ (request()->is('product.index')) ? 'active' : '' }}">

                            <a href="{{route('product.index')}}" class="nav-link" 
                               >Product</a>
                        </li>
                        <li class="nav-item"><a class="nav-link {{ (request()->is('contact')) ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="nav-item "><a href="{{ route('cart') }}" class="cart "><span class="ti-bag {{ (request()->is('cart*')) ? 'text-warning' : '' }}"></span></a></li>
                      
                        {{-- $a = count(session()->get('cart')) --}}

                            @if(Auth::check())
                            <li class="nav-item dropdown">
                                <span class="dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                  {{ Auth::user()->name }}
                              </span>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                                </ul>
                            </li>
                            @else
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="cart"><span class="fa fa-user {{ (request()->is('login')) ? 'text-warning' : '' }}"></span></a>
                            </li>
                            @endif
                        <li class="nav-item">
                            <button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="search_input" id="search_input_box">
        <div class="container">
            <form class="d-flex justify-content-between">
                <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                <button type="submit" class="btn"></button>
                <span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
            </form>
        </div>
    </div>
</header>
<!-- End Header Area -->
