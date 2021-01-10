<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.79.0">
  <title>@yield('title')</title>
  @yield('style')
</head>

<body>
  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="/allStaff">Creativ Task</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
      data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class=" navbar-brand col-md-3 col-lg-2 me-0 bg-secondary p-0">
      <a class="dropdown-item active" href="/setlocale/en">English</a>
      <a class="dropdown-item secondary" href="/setlocale/ar">العربية</a>
    </div>

    <ul class="navbar-nav px-3">
      <li class="nav-item dropdown">
            <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                {{ __('side.Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
    </li>
    </ul>
  </header>

  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
          <ul class="nav flex-column m-auto">
            <li class="nav-item nav-title">
                <i class="bi bi-newspaper my-icons"></i>
                {{ __('side.News') }}
            </li>
            <li class="nav-item nav-sub">
              <a class="nav-link @if(isset($nav) && $nav=='Newslist') active @endif " aria-current="page" href="/allNews">
                {{ __('side.News list') }}
              </a>
            </li>
            <li class="nav-item nav-sub">
              <a class="nav-link @if(isset($nav) && $nav=='Newsadd') active @endif" href="/createNews">
                {{ __('side.Add News') }}
              </a>
            </li>
            <li class="nav-item nav-title">
                <i class="bi bi-person-lines-fill"></i>
                {{ __('side.Patients') }}
            </li>
            <li class="nav-item nav-sub">
              <a class="nav-link @if(isset($nav) && $nav=='Pationlist') active @endif" aria-current="page" href="/allPation">
                {{ __('side.Patient list') }}
              </a>
            </li>
            <li class="nav-item nav-sub">
              <a class="nav-link @if(isset($nav) && $nav=='Pationadd') active @endif" href="/createPation">
                {{ __('side.Add Patient') }}
              </a>
            </li>
            <li class="nav-item nav-title">
                <i class="bi bi-people-fill"></i>
                {{ __('side.Staff') }}
            </li>
            <li class="nav-item nav-sub">
              <a class="nav-link @if(isset($nav) && $nav=='Stafflist') active @endif" aria-current="page" href="/allStaff">
                {{ __('side.Staff list') }}
              </a>
            </li>
            <li class="nav-item nav-sub">
              <a class="nav-link @if(isset($nav) && $nav=='Staffadd') active @endif" href="/createStaff">
                {{ __('side.Add Staff') }}
              </a>
            </li>
          </ul>

        </div>
      </nav>

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 ">
        @yield('content')
      </main>


    </div>
  </div>

  @yield('js')

</body>

</html>