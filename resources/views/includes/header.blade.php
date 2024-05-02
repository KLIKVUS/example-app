<header>
    <nav class="navbar navbar-expand-md bg-light-subtle px-1">
        <div class="container">
            <a
                href="{{ route('home.index') }}"
                class="navbar-brand"
            >{{ config('app.name') }}</a>

            <button
                type="button"
                class="navbar-toggler"
                data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            <div
                class="offcanvas offcanvas-end"
                tabindex="-1"
                id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel"
            >
                <div class="offcanvas-header">
                    <h5
                        class="offcanvas-title"
                        id="offcanvasNavbarLabel"
                    >{{ __('Меню') }}</h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="offcanvas"
                        aria-label="Close"
                    ></button>
                </div>

                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a
                                href="{{ route('home.index') }}"
                                class="nav-link"
                                aria-current="page"
                            >{{ __('Главная') }}</a>
                        </li>
                        @auth
                            <li class="nav-item bg-danger rounded-5 text-center">
                                <a
                                    href="{{ route('auth.destroy') }}"
                                    class="nav-link text-light"
                                    aria-current="page"
                                >{{ __('Выйти') }}</a>
                            </li>
                        @endauth
                        @guest
                            <li class="nav-item bg-primary rounded-5 text-center">
                                <a
                                    href="{{ route('auth.login.create') }}"
                                    class="nav-link text-light"
                                    aria-current="page"
                                >{{ __('Войти') }}</a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
