    {{-- Off-Canvas Category Menu --}}
    <div class="offcanvas-container" id="shop-categories">
      @if (Auth::user())
        <a class="account-link" href="{{ route('member.show', Auth::user()) }}">
          <div class="user-ava">
            <img src="/img/account/user-ava-md.jpg" alt="{{ (!is_null(Auth::user()->firstname)) ? Auth::user()->firstname : null }} {{ (!is_null(Auth::user()->lastname)) ? Auth::user()->lastname : null }}">
          </div>
          <div class="user-info">
            <h6 class="user-name">{{ (!is_null(Auth::user()->firstname)) ? Auth::user()->firstname : null }} {{ (!is_null(Auth::user()->lastname)) ? Auth::user()->lastname : null }}</h6>
            <span class="text-sm text-white opacity-60">{{ (!is_null(Auth::user()->created_at)) ? Auth::user()->created_at->format('F j, Y') : null }}</span>
          </div>
        </a>
      @else
      <a class="account-link" href="{{ route('login') }}">
        <div class="user-ava">
          <img src="/img/account/user-ava-md.jpg" alt="">
        </div>
        <div class="user-info">
          <h6 class="user-name">Login</h6>
        </div>
      </a> 
      @endif
      <nav class="offcanvas-menu">
        <ul class="menu">
          <li class="active"><span><a href="/"><span>Home</span></a></span></li>
          <li class="has-children"><span><a href="/destinations"><span>Destinations</span></a><span class="sub-menu-toggle"></span></span>
            <ul class="offcanvas-submenu">
              @foreach ($activePasses->sortBy('name') as $ap)
                <li><a href="{{ route('destinations.passes.show', [$ap->destinations->first()->slug,$ap->slug]) }}">{{ $ap->destinations->first()->name }}</a></li>
              @endforeach
            </ul>
          </li>
          <li><span><a href="/how">How it Works</a></span></li>
          <li><span><a href="/foundation">100% to Kids</a></span></li>
          <li><span><a href="/faqs">FAQs</a></span></li>
        </ul>
      </nav>
    </div>
    {{-- Off-Canvas Mobile Menu --}}
    <div class="offcanvas-container" id="mobile-menu">
      @if (Auth::user())
        <a class="account-link" href="{{ route('member.show', Auth::user()) }}">
          <div class="user-ava">
            <img src="/img/account/user-ava-md.jpg" alt="{{ (!is_null(Auth::user()->firstname)) ? Auth::user()->firstname : null }} {{ (!is_null(Auth::user()->lastname)) ? Auth::user()->lastname : null }}">
          </div>
          <div class="user-info">
            <h6 class="user-name">{{ (!is_null(Auth::user()->firstname)) ? Auth::user()->firstname : null }} {{ (!is_null(Auth::user()->lastname)) ? Auth::user()->lastname : null }}</h6>
            <span class="text-sm text-white opacity-60">{{ (!is_null(Auth::user()->created_at)) ? Auth::user()->created_at->format('F j, Y') : null }}</span>
          </div>
        </a>
      @else
      <a class="account-link" href="{{ route('login') }}">
        <div class="user-ava">
          <img src="/img/account/user-ava-md.jpg" alt="">
        </div>
        <div class="user-info">
          <h6 class="user-name">Login</h6>
        </div>
      </a> 
      @endif   
      <nav class="offcanvas-menu">
        <ul class="menu">
          <li class="active"><span><a href="/"><span>Home</span></a></span></li>
          <li class="has-children"><span><a href="/destinations"><span>Destinations</span></a><span class="sub-menu-toggle"></span></span>
            <ul class="offcanvas-submenu">
              @foreach ($activePasses->sortBy('name') as $ap)
                <li><a href="{{ route('destinations.passes.show', [$ap->destinations->first()->slug,$ap->slug]) }}">{{ $ap->destinations->first()->name }}</a></li>
              @endforeach
            </ul>
          </li>
          <li><span><a href="/how">How it Works</a></span></li>
          <li><span><a href="/foundation">100% to Kids</a></span></li>
          <li><span><a href="/faqs">FAQs</a></span></li>
        </ul>
      </nav>
    </div>
    {{-- Navbar --}}
    {{-- Remove "navbar-sticky" class to make navigation bar scrollable with the page. --}}
    <header class="navbar navbar-sticky">
      {{-- Search --}}
      <form class="site-search" method="get">
        <input type="text" name="site_search" placeholder="Find your park...">
        <div class="search-tools"><span class="clear-search">Clear</span><span class="close-search"><i class="icon-cross"></i></span></div>
      </form>
      <div class="site-branding">
        <div class="inner">
          {{-- Off-Canvas Toggle (#shop-categories) --}}<a class="offcanvas-toggle cats-toggle" href="#shop-categories" data-toggle="offcanvas"></a>
          {{-- Off-Canvas Toggle (#mobile-menu) --}}<a class="offcanvas-toggle menu-toggle" href="#mobile-menu" data-toggle="offcanvas"></a>
          {{-- Site Logo --}}<a class="site-logo" href="/"><img src="/img/logo/logo.png" alt="Get Outside Pass"></a>
        </div>
      </div>
      {{-- Main Navigation --}}
      <nav class="site-menu">
        <ul>
          <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="/"><span>Home</span></a></li>
          <li class="has-megamenu {{ Request::is('d*') ? 'active' : '' }}"><a href="/destinations"><span>Destinations</span></a>
            <ul class="mega-menu">
              <li>
                <section class="promo-box" style="background-image: url(/img/destinations/glacier-300x300.jpg);">
                  <span class="overlay-dark" style="opacity: .45;"></span>
                  <div class="promo-box-content text-center padding-top-3x padding-bottom-3x">
                    <h4 class="text-light text-thin text-shadow">{{ count($activePasses->where('id',4)->first()->discounts->where('active',1)) }} Discounts</h4>
                     <a class="btn btn-sm btn-primary" href="{{ route('destinations.passes.show', ['glacier','go-glacier-2019']) }}">
                      <h3 class="text-bold text-light text-shadow">{{ $activePasses->where('id',4)->first()->destinations->first()->short_name }}</h3>
                    </a>
                  </div>
                </section>
              </li>
              <li><span class="mega-menu-title">Our National Parks</span>
                <ul class="sub-menu">
                  @foreach ($activePasses->sortBy('name') as $ap)
                    <li><a href="{{ route('destinations.passes.show', [$ap->destinations->first()->slug,$ap->slug]) }}">{{ $ap->destinations->first()->name }}</a></li>
                  @endforeach
                  {{-- <li><a href="/destinations"><span class="dp-primary"><strong>VIEW ALL</strong> <i class="icon-arrow-right"></i></span></a></li> --}}
                </ul>
              </li>
              <li>
                <section class="promo-box" style="background-image: url(/img/destinations/yellowstone-300x300.jpg);">
                  <span class="overlay-dark" style="opacity: .45;"></span>
                  <div class="promo-box-content text-center padding-top-3x padding-bottom-3x">
                    <h4 class="text-light text-thin text-shadow">{{ count($activePasses->where('id',3)->first()->discounts->where('active',1)) }} Discounts</h4>
                     <a class="btn btn-sm btn-primary" href="{{ route('destinations.passes.show', ['yellowstone','go-yellowstone-2019']) }}">
                      <h3 class="text-bold text-light text-shadow">{{ $activePasses->where('id',3)->first()->destinations->first()->short_name }}</h3>
                    </a>
                  </div>
                </section>
              </li>
              <li>
                <section class="promo-box" style="background-image: url(/img/destinations/zion-300x300.jpg);">
                  <span class="overlay-dark" style="opacity: .45;"></span>
                  <div class="promo-box-content text-center padding-top-3x padding-bottom-3x">
                    <h4 class="text-light text-thin text-shadow">{{ count($activePasses->where('id',6)->first()->discounts->where('active',1)) }} Discounts</h4>
                     <a class="btn btn-sm btn-primary" href="{{ route('destinations.passes.show', ['zion','go-zion-2019']) }}">
                      <h3 class="text-bold text-light text-shadow">{{ $activePasses->where('id',6)->first()->destinations->first()->short_name }}</h3>
                    </a>
                  </div>
                </section>
              </li>
            </ul>
          </li>
          <li class="{{ Request::is('how*') ? 'active' : '' }}"><a href="/how"><span>How it Works</span></a></li>
          <li class="{{ Request::is('foundation*') ? 'active' : '' }}"><a href="/foundation"><span>100% to Kids</span></a></li>
        </ul>
      </nav>
      {{-- Toolbar --}}
      <div class="toolbar">
        <div class="inner">
          <div class="tools">
            {{-- <div class="search"><i class="icon-search"></i></div> --}}
            <div class="account"><a href="{{ route('member.show', Auth::user()) }}"></a><i class="icon-head"></i>
              <ul class="toolbar-dropdown">
                @if (Auth::user())
                  <li class="sub-menu-user">
                    <div class="user-ava">
                      <img src="/img/account/user-ava-sm.jpg" alt="{{ (!is_null(Auth::user()->firstname)) ? Auth::user()->firstname : null }} {{ (!is_null(Auth::user()->lastname)) ? Auth::user()->lastname : null }}">
                    </div>
                    <div class="user-info">
                      <h6 class="user-name">{{ (!is_null(Auth::user()->firstname)) ? Auth::user()->firstname : null }} {{ (!is_null(Auth::user()->lastname)) ? Auth::user()->lastname : null }}</h6><span class="text-xs text-muted">{{ (!is_null(Auth::user()->created_at)) ? Auth::user()->created_at->format('F j, Y') : null }}</span>
                    </div>
                  </li>
                  <li><a href="{{ route('member.show', Auth::user()) }}">My Passes <span class="badge badge-primary badge-pill">{{ count(Auth::user()->purchases) }}</span></a></li>
                  <li><a href="{{ route('member.edit', Auth::user()) }}">My Profile</a></li>
                  <li class="sub-menu-separator"></li>
                  <li><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i class="icon-unlock"></i>Logout</a></li>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                  </form>
                  @else
                    <li><a href="{{ route('login') }}">Login</a></li>
                  @endif
              </ul>
            </div>
          </div>
        </div>
      </div>
    </header>