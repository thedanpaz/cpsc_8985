<header class="header-section">
    <div class="container-fluid">
        <div class="logo">
            <a href="/"><img src="{{ asset('img/logo.png') }}" alt=""></a>
        </div>
        <nav class="main-menu mobile-menu">
            <ul>
                <li class="active"><a href="/">Home</a></li>
                <li><a href="{{ route('theme.how-it-works') }}">Explore</a></li>
                <li><a href="{{ route('theme.listings') }}">More Cities</a></li>
                <li><a href="{{ route('theme.blog') }}">News</a></li>
                <li><a href="{{ route('theme.contact') }}">Contact</a></li>
            </ul>
        </nav>
        <div class="header-right">
            <div class="user-access">
                @if(!Auth::check())
                    <a href="{{ route('register') }}">Register/</a>
                    <a href="{{ route('login') }}">Login</a>
                @else
                    <a href="{{ route('console.home') }}">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</a>
                @endif
            </div>
            <a href="#" class="primary-btn">Add Listing</a>
        </div>
        <div id="mobile-menu-wrap"></div>
    </div>
</header>