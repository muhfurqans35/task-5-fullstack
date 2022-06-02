<!--  nav start-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark text-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">MF</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link {{ $active ==="home" ? 'active' : '' }}" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ $active ==="about" ? 'active' : '' }}" href="/about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ $active ==="articles" ? 'active' : '' }}" href="/articles">Articles</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ $active ==="categories" ? 'active' : '' }}" href="/categories">Categories</a>
          </li>
        </ul>

        
      
        
        
        <ul class="navbar-nav ms-auto">
          @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Welcome back, {{ auth()->user()->name }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i> My Dashboard</a></li>
              <li><hr class="dropdown-divider"></li>
              <li>
                
                <form action="/signout" method="post">
                  @csrf
                  <button type="submit" class="dropdown-item">
                    <i class="bi bi-box-arrow-in-right"></i> Sign Out</a></li></button>  
                  </form>
            </ul>
          </li>
          @else
          <li class="nav-item">
            <a href="/signin"class="nav-link {{ $active ==="signin" ? 'active' : '' }}"><i class="bi bi-box-arrow-in-right"></i> Sign In</a>
          </li>
          @endauth
        </ul>
        
      </div>
    </div>
  </nav>
<!--  nav end-->