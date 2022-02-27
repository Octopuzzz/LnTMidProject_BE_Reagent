
<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container">
      <a class="navbar-brand" href="/">PerpusNas</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ $status === 'Home' ? 'active' : ' '}}" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{  Str::contains($status,'All Book') ? 'active' : ' ' }}" href="/blog">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ $status === 'About' ? 'active' : ' ' }}" href="/about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ $status === 'Categories' ? 'active' : ' ' }}" href="/categories">Categories</a>
          </li>
        </ul>
                <ul class="navbar-nav ms-auto">
                    @auth

                        {{-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><hr class="dropdown-divider"></li>
                            </ul>
                        </li> --}}
                        <li  class="nav-item mx-5">
                            <a class="nav-link" href="/dashboard">
                                <i class="bi bi-layout-text-sidebar-reverse"></i>
                                My Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <form action="/logout" method="post">
                                @csrf
                                <button class="nav-link bg-danger border-0">
                                    <i class="bi bi-box-arrow-in-left"></i>
                                    Logout
                                </button>
                            </form>
                        </li>
                    @endauth
                    @guest

                        <li class="nav-item">
                            <a href="/login" class="nav-link {{ $status === 'Login' ? 'active' : ' '}}">
                                <i class="bi bi-box-arrow-in-right"></i>
                                </i>Login</a>
                        </li>

                    @endguest
                </ul>
            </div>
        </div>
  </nav>

