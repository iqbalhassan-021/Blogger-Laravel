

<header>
        <div class="logo">
            <a href="{{url('/')}}">
                {{$siteDetails->last()->sitename}}
            </a>
        </div>
        <div class="right">
            <form class="search-form" action="{{ url('search') }}" method="get">
                <input type="text" class="search-input" name="search" placeholder="Search...">
                <button type="submit" class="search-button">Search</button>
            </form>
            <a href="{{url('/auth')}}" class="login-button">
                Login
            </a>
        </div>
    </header>
    