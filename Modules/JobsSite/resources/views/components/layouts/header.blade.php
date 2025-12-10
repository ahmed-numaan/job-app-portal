<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="{{route('welcome')}}" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
        <h1 class="m-0 text-primary">{{ config('app.name', 'JobEntry') }}</h1>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="{{route('welcome')}}" class="nav-item nav-link active">Home</a>
            <a href="{{route('jobslist')}}" class="nav-item nav-link">Recent Jobs</a>
            <a href="{{route('search')}}" class="nav-item nav-link">Search Jobs</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Company</a>
                <div class="dropdown-menu rounded-0 m-0">
                    <a href="{{route('about')}}" class="dropdown-item">About</a>
                    <a href="{{route('testimonials')}}" class="dropdown-item">Testimonial</a>
                    <a href="{{route('contact')}}" class="dropdown-item">Contact</a>
                </div>
            </div>
            @guest
                <a href="{{route('login')}}" class="nav-item nav-link">Login</a>
            @else
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{ Auth::user()->name }}</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        <a href="{{route('applications')}}" class="dropdown-item">My Applications</a>
                        <a href="{{route('profile')}}" class="dropdown-item">My Profile</a>
                        <a href="{{route('change_password')}}" class="dropdown-item">Change Password</a>
                    </div>
                </div>
            @endguest
        </div>
        @guest
        <a href="{{ route('register') }}" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Register<i class="fa fa-arrow-right ms-3"></i></a>
        @else
        <a class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">Logout<i class="fa fa-arrow-right ms-3"></i>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </a>
        @endguest
    </div>
</nav>
<!-- Navbar End -->