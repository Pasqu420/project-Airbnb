<header id="header-homepage">
  <div class="outer-container">
    <div class="bigger-header">
      <div> <!-- Questo div è header con logo/diventaHost/Login -->
      <span>
          <a href="{{route('homepage')}}">
            <img src="{{asset('storage/assets/lg_color0.png')}}" alt="logo-image">
          </a>
      </span>
        <span>
          <!-- LOGIN NO BOOTSTRAP - DA IMPLEMENTARE <UL><LI> ESSENDO UN MENU -->
          @guest
            @if (Route::has('register'))
              <a href="{{ route('register') }}">
                {{ __('Diventa un Host') }}
              </a>
            @endif
            <a href="{{ route('login') }}">
              <i class="fas fa-bars"></i>
              <i class="fas fa-user"></i>
            </a>
          @endguest
          @auth
            <a href="#">
              {{ Auth::user()->name }}
            </a>
            <a href="{{ route('logout')}}" onclick="
                event.preventDefault();
                document.getElementById('form_logout').submit();"
            >
                {{ __('Logout') }}
            </a>
            <form id="form_logout" method="POST" action="{{ route('logout') }}">
                @csrf
            </form>
            <div>
                <a href="{{route('dashboard',Auth::id())}}">
                    Dashboard
                </a>
            </div>
          @endauth
      </div>

    <div> <!-- INIZIO div in header con la navbar1 (width 100%)-->
      <div class="navbar1"> <!-- INIZIO Navbar1 (width 70%)-->
        <form action="{{Route('search')}}" method="post" enctype="multipart/form-data" style="display:flex">
        @method('post')
        @csrf
            <div>
              {{-- <a href="#"> --}}
                <label><h3>Dove</h3></label>
                <input type="text" name="where" id="where"
                 value="" placeholder="all">
                {{-- <p>Dove vuoi andare?</p> --}}
              </a>
            </div>
            <div>
              {{-- <a href="#"> --}}
                <label><h3>Check-In</h3></label>
                <input type="date" name="check_in" id="check_in"
                 value="check_in">
                {{-- <p>Aggiungi data</p> --}}
              </a>
            </div>
            <div>
              {{-- <a href="#"> --}}
                <label><h3>Check-Out</h3></label>
                <input type="date" name="check_out" id="check_out"
                 value="check_out" >
                {{-- <p>Aggiungi data</p> --}}
              </a>
            </div>
            <div>
              {{-- <a href="#"> --}}
                <label><h3>Ospiti</h3></label>
                <input type="number" name="guest" id="guest"
                 value="1" style="width: 50px;">
                {{-- <p>Aggiungi ospiti</p> --}}
              </a>
              <button type="submit">
                      <i class="fas fa-search"></i>
              </button>
            </div>
        </form>
      </div> <!-- FINE Navbar1 (width 70%)-->
    </div> <!-- FINE div in header con la navbar1 (width 100%)-->
  </div> <!-- END OF BIGGER HEADER -->
</div> <!-- END OF OUTER CONTAINER -->
