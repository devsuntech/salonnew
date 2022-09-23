<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
    @if(Auth::user()->user_type=='admin')
      <a href="{{ route('admin.dashboard') }}" class="brand-link">
      @elseif(Auth::user()->user_type=='vendor')
      <a href="{{ route('vendor.dashboard') }}" class="brand-link">
      @endif
        <img src="{{ asset('storage/admin/dist/img/AdminLTELogo.png') }}" alt="{{ env('APP_NAME') }}" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ Auth::user()->name }}</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        @if(Auth::user()->user_type=='admin')
        <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->


       {{--  <li class="nav-item">
           <a href="{{ route('admin.amenities') }}" class="nav-link">
             <i class="nav-icon fas fa-th"></i>
             <p>
              {{__('Amenity')}}
             </p>
           </a>
         </li>  --}}
        <li class="nav-item">
           <a href="{{ route('admin.coupons') }}" class="nav-link">
             <i class="nav-icon fas fa-th"></i>
             <p>
              {{__('Coupon')}}
             </p>
           </a>
         </li>
        <li class="nav-item">
         <a href="{{ route('admin.categories') }}" class="nav-link">
           <i class="nav-icon fas fa-th"></i>
           <p>
            {{__('Category')}}
           </p>
         </a>
       </li>
         <li class="nav-item">
           <a href="{{ route('admin.services') }}" class="nav-link">
             <i class="nav-icon fas fa-th"></i>
             <p>
              {{__('Services')}}
             </p>
           </a>
         </li>
        <li class="nav-item">
           <a href="{{ route('admin.subservices') }}" class="nav-link">
             <i class="nav-icon fas fa-th"></i>
             <p>
              {{__('Subservice')}}
             </p>
           </a>
         </li>
         <li class="nav-item">
           <a href="{{ route('admin.packages') }}" class="nav-link">
             <i class="nav-icon fas fa-th"></i>
             <p>
              {{__('Membership Plan')}}
             </p>
           </a>
         </li>
         <li class="nav-item">
           <a href="{{ route('admin.vendors') }}" class="nav-link">
             <i class="nav-icon fas fa-th"></i>
             <p>
              {{__('Vendors')}}
             </p>
           </a>
         </li>

         <li class="nav-item">
           <a href="{{ route('admin.pages') }}" class="nav-link">
             <i class="nav-icon fas fa-th"></i>
             <p>
              {{__('Pages')}}
             </p>
           </a>
         </li>
         <li class="nav-item">
           <a href="{{ route('admin.subscriptions') }}" class="nav-link">
             <i class="nav-icon fas fa-th"></i>
             <p>
              {{__('Subscriptions List')}}
             </p>
           </a>
         </li>
         <li class="nav-item">
           <a href="{{ route('admin.queries') }}" class="nav-link">
             <i class="nav-icon fas fa-th"></i>
             <p>
              {{__('Queries')}}
             </p>
           </a>
         </li>

         <li class="nav-item">
           <a href="{{ route('admin.settings') }}" class="nav-link">
             <i class="nav-icon fas fa-th"></i>
             <p>
              {{__('App Settings')}}
             </p>
           </a>
         </li>
         @elseif (Auth::user()->user_type=='vendor')
         <li class="nav-item">
            <a href="{{ route('vendor.coupons') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
               {{__('Coupons')}}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('vendor.services') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
               {{__('Services')}}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('vendor.galleries') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
               {{__('Gallery')}}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('vendor.staff') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
               {{__('Staff')}}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('vendor.bookings') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
               {{__('My Booking')}}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('vendor.ratings') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
               {{__('My Ratings')}}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('vendor.queries') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
               {{__('My Queries')}}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('vendor.allinvoices') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
               {{__('Invoices')}}
              </p>
            </a>
          </li>
         @endif
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
