<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('') ? 'home' : '' }}"
                       href="{{ route('home') }}">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.news.create') ? 'active' : '' }}"
                       href="{{ route('admin.news.create') }}">Добавить новость</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.resources.index') ? 'active' : '' }}"
                       href="{{ route('admin.resources.index') }}">Ресурсы</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.resources.create') ? 'active' : '' }}"
                       href="{{ route('admin.resources.create') }}">Добавить ресурс</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.parser') ? 'active' : '' }}"
                       href="{{ route('admin.parser') }}">Парсер</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.updateUser') ? 'active' : '' }}"
                       href="{{ route('admin.updateUser') }}">Users</a>
                </li>


            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('updateProfile') }}">
                                Profile
                            </a>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
