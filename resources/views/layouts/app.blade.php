<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" href="assets/images/Group 5.png" />

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Ramaraja&display=swap"
      rel="stylesheet"
    />

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />

    <link rel="stylesheet" href="/style/main.css" />

    <title>Mint Cherry High School</title>
  </head>
  <body>
    <!-- Navbar -->
    <header>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
          <a class="navbar-brand" href="#">
            <img
              src="/assets/images/Group 4.png"
              alt=""
              width="250"
              height="45"
              class="d-inline-block align-text-top"
            />
          </a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a
                  class="nav-link {{Route::is('home') ? 'active disabled' : ''}}"
                  aria-current="page"
                  href="/"
                  aria-disabled="true"
                  >Home</a
                >
              </li>
              <li class="nav-item">
                <!-- <a class="nav-link" href="news.html">News</a> -->
              </li>
              @if(Auth::check())
              <li class="nav-item">
                <a class="nav-link {{Route::is('account') ? 'active disabled' : ''}}" href="/account/{{auth()->user()->uuid}}">Account</a>
              </li>
              @else
              <li class="nav-item">
                <a class="nav-link {{Route::is('login') ? 'active disabled' : ''}}" href="/login">Log In</a>
              </li>
              @endif
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <!-- End of Navbar -->

    @yield('content')
    <div>
      <p class="p3">@2022 - Mint Cherry High School</p>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
    @if(session('Error'))
      <script>
        alert('Insufficient Access')
      </script>
    @endif
  </body>
</html>
