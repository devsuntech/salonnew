<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
        @if(Auth::user()->user_type=='admin')
      <a href="{{ route('admin.dashboard') }}" class="nav-link">Home</a>
      @elseif(Auth::user()->user_type=='vendor')
      <a href="{{ route('vendor.dashboard') }}" class="nav-link">Home</a>
      @endif
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-user"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header">{{ Auth::user()->name }}</span>
        <div class="dropdown-divider"></div>
         @if(Auth::user()->user_type=='admin')
        <a href="{{route('admin.changepassword')}}" class="dropdown-item">
          <i class="fas fa-lock mr-2"></i>Change Password
        </a>
         @elseif(Auth::user()->user_type=='vendor')
              <a href="{{route('vendor.editprofile')}}" class="dropdown-item">
          <i class="fas fa-lock mr-2"></i>Edit Profile
        </a>
         <a href="{{route('vendor.changepassword')}}" class="dropdown-item">
          <i class="fas fa-lock mr-2"></i>Change Password
        </a>
        @endif
        <div class="dropdown-divider"></div>
        <a  class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-unlock mr-2"></i>Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
      </div>
    </li>
  </ul>
</nav>
<!-- /.navbar -->
