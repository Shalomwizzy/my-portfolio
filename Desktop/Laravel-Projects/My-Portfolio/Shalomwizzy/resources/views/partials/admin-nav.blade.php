
    <div id="main-container">
      <a href="" class="navbar-brand">
        <img class="myimage" src="{{asset('images/my classic photo.JPG') }}" alt="Logo"> <h6>Welcome back Shalomvic</h6>    
      </a>

      <span class="mode-change d-flex justify-content-center mt-5">
        <a href="#" class="navbar-brand" id="toggle-dark-mode">
          <i class="fas fa-sun"></i> 
          <i class="fas fa-moon"></i>
       
      </a>
      </span>


        <div class="menu">
            <ul class="menu-content">
              <li class="nav-item">
                <a class="nav-link animate__animated animate__flip button-link" aria-current="page" href="{{ route('admin.welcome') }}"><i class="fa-solid fa-house"></i>
                 Home
                </a>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fa-solid fa-tag"></i>
                  Category
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{ route('category.create') }}">Category Create </a></li>
                  <li><a class="dropdown-item" href="{{ route('category.index') }}">Category Index</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                </ul>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> 
                  <i class="fa-solid fa-folder"></i>
                  Learnings
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{ route('learnings.create') }}">learning Create </a></li>
              
                  <li><a class="dropdown-item" href="{{ route('learnings.index') }}">Learning Index</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                </ul>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> 
                  <i class="fa-solid fa-folder"></i>
                  Projects
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{ route('projects.create') }}">Project Create </a></li>
                  <li><a class="dropdown-item" href="{{ route('projects.index') }}">project Index</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                </ul>
              </li>

    
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> 
                    <i class="fa-solid fa-folder"></i>
                    Skills
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('skills.create') }}">Skill Create </a></li>
                    <li><a class="dropdown-item" href="{{ route('skills.index') }}">Skill Index</a></li>
                    <li>
                      <hr class="dropdown-divider">
                    </li>
                
                  </ul>

                  <li class="nav-item">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="btn logout-btn text-white">Logout</button>
                    </form>
                </li>
        
                </li>

          
        </div>
    </div>


 

