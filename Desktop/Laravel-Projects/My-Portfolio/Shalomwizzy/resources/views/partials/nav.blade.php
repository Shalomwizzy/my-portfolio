<nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top"> <!-- Add the 'fixed-top' class here -->
  <div class="container-fluid">
      <a href="" class="navbar-brand">
          <img class="myimage" src="{{asset('images/my classic photo.JPG') }}" alt="Logo"> SHALOMVIC
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
          aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                  <a class="nav-link animate__animated  animate__flip button-link"  aria-current="page"
                      href="{{ route('welcome') }}"><i class="fa-solid fa-house"></i>
                      Home
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link animate__animated animate__flip" href="#"><i
                          class="fa-solid fa-address-card "></i> About</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link animate__animated animate__flip" href="{{ route('projects.userIndex') }}"> <i
                          class="fa-solid fa-folder fa-beat"></i> Projects</a>
              </li>

              {{-- <li class="nav-item admin-only">
                <a href="{{ route('login') }}" class="nav-link text-nowrap"> Login <i class="fa-solid fa-user"></i></a>
            </li>
            <li class="nav-item admin-only">
                <a href="{{ route('register') }}" class="nav-link text-nowrap">Register <i class="fa-solid fa-user"></i></a>
            </li> --}}


              <li class="nav-item">
                  <a class="nav-link animate__animated animate__flip" href="{{ route('skills.userIndex') }}"> <i
                          class="fa-solid fa-certificate"></i> Skills</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link animate__animated animate__flip" href="{{ route('learnings.userIndex') }}"><i
                          class="fa-solid fa-book"></i> Learning</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link animate__animated animate__flip" href="{{ route('contact.me') }}"> <i
                          class="fa-solid fa-message"></i> Contact</a>
              </li>
          </ul>

          <span class="mode-change">
              <a href="#" class="navbar-brand" id="toggle-dark-mode">
                  <i class="fas fa-sun"></i>
                  <i class="fas fa-moon"></i>
              </a>
          </span>
         
          <li class="nav-item admin-only">
            <a href="{{ route('login') }}" class="nav-link text-nowrap"> Login <i class="fa-solid fa-user"></i></a>
        </li>
        <li class="nav-item admin-only">
            <a href="{{ route('register') }}" class="nav-link text-nowrap">Register <i class="fa-solid fa-user"></i></a>
        </li>
      </div>
  </div>
</nav>

<style>
    /* Add this style to your CSS or in the style section of your HTML */
    .admin-only {
        display: none; /* Hide the element */
    }
</style>
