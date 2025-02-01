<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="{{ route('home') }}">Penjualan Sepatu</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                </li>
                @auth
                    <li class="nav-item"><a class="nav-link" href="{{ route('transaction.index') }}">My Purchase</a></li>
                @endauth
            </ul>
            @guest
                <div class="d-flex">
                    <a class="btn btn-outline-dark m-2" href="{{ route('login') }}">
                        Login
                    </a>
                    <a class="btn btn-outline-dark m-2" href="{{ route('register') }}">
                        Register
                    </a>
                </div>
            @endguest
            @auth
                @hasrole('admin')
                    <div class="d-flex">
                        <a class="btn btn-outline-dark m-2" href="{{ route('filament.admin.pages.dashboard') }}">
                            Dashboard
                        </a>
                    </div>
                @endhasrole
                @hasrole('customer')
                    <div class="d-flex">
                        <a class="btn btn-outline-dark m-2" href="{{ route('profile.edit') }}">
                            My Profile
                        </a>
                    </div>
                    <div class="d-flex">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-outline-dark m-2" href="{{ route('logout') }}">
                                Logout
                            </button>
                        </form>
                    </div>
                @endhasrole
            @endauth
        </div>
    </div>
</nav>
