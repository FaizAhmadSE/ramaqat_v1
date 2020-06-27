<!-- Start your project here-->
<header>
 <!-- Start your project here-->
 <nav>
    <div class="d-flex justify-content-between top-header">
      <div class="col-12 col-sm-3">
      <ul class="ulDBlockMenu">
        <li>
          <img src="{{asset('assets/frontend/img/toggle-menu.png')}}" class="openbtn" onclick="openNav()">
        </li>
        <li>
          <img class="animated fadeIn logo_img" src="{{asset('assets/frontend/img/logo.png')}}">
        </li>

      </ul>
      </div>
      <div class="col-12 col-sm-4">
      <div class="HeaderSearch d-none d-sm-block">
        <input class="SearchInput z-depth-1" type="search" placeholder="Search">
        <img class="plumIcon" src="{{asset('assets/frontend/img/search (2).png')}}">
      </div>
      </div>
      <div class="col-12 col-sm-5">
        <ul class="ulDBlock d-none d-sm-block">
            <li>
                <div class="custom-select">
                <select>
                    <option class="plum-text" value="0">Language</option>
                    <option value="1">English</option>
                    <option value="1">Arabic</option>
                </select>
                </div>
            </li>
            <li><img src="{{asset('assets/frontend/img/line.png')}}" alt="cart"></li>
            <li>
            <a href="#"><img src="{{asset('assets/frontend/img/supermarket.png')}}" alt="cart"></a>
            </li>
            @guest
            <li>
                <a href="{{route('login')}}"><button class="btn white-btn">Login</button></a>
            </li>
            <li>
                <a href="{{route('register')}}"><button class="btn plum-btn">Signup</button></a>
            </li>
                @endguest
            @auth
                <li>
                    <a href=""><button class="btn white-btn">{{\Illuminate\Support\Facades\Auth::user()->name}}</button></a>
                </li>
                <li>
                    <a href="{{route('logout')}}"><button class="btn plum-btn">Logout</button></a>
                </li>
                @endauth
        </ul>
      </div>

    </div>
  </nav>

<!--   sidebar -->

    <div id="mySidebar" class="sidebar">
            <div class="row login_id">
                <img src="{{asset('assets/frontend/img/singup_person.png')}}">

              <!-- <div class="mb-1 white-text">Sign up to receive our weekly newsletter</div> -->
              <div class="flex-center mb-1 mt-1 offline_courses">
                <u><a class="Socialb plum-text singup_id_name" href="#">Sayed Muhammad Ahtesham</a></u>
              </div>
              <p>mahtesham42@gmail.com</p>


            </div>
            <div class="row sidebar_icons">
              <a href="javascript:void(0)" class="closebtn close_sidbar" onclick="closeNav()">×</a>
              <a href="#"><img src="{{asset('assets/frontend/img/dark_mode.png')}}">Dark Mode</a>
              <a href="#"><img src="{{asset('assets/frontend/img/online_courses.png')}}">Online Courses</a>
              <a href="#"><img src="{{asset('assets/frontend/img/offline_courses.png')}}">Offline Courses</a>
              <a href="#"><img src="{{asset('assets/frontend/img/your_courses.png')}}">Your Courses</a>
              <a href="#"><img src="{{asset('assets/frontend/img/favourites%20.png')}}">Favourites </a>
              <a href="#"><img src="{{asset('assets/frontend/img/currency_rate.png')}}">Currency Rate</a>
              <a href="#"><img src="{{asset('assets/frontend/img/contact_us.png')}}">Contact Us</a>
            </div>
    </div>
</header>
<!--Header End Here  -->
