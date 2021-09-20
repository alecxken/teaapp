  <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" style="background-color: white;" href="{{url('')}}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class=""><img src="{{url('images/logo.png')}}" width="30px"></i>
                </div>
                <div class="sidebar-brand-text text-dark mx-3">TEA ADMIN <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{url('home')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
              <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwos"
                    aria-expanded="true" aria-controls="collapseTwos">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Farmers Module</span>
                </a>
                <div id="collapseTwos" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                         <a class="collapse-item" href="{{url('new-farmer')}}">Farmers Management</a>
                         <a class="collapse-item" href="{{url('new-collection')}}">Collection Management</a>
                         <a class="collapse-item" href="{{url('new-payment')}}">Payments Management</a>
                     
                    </div>
                </div>
            </li>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Settings Module</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                         <a class="collapse-item" href="{{url('create_user')}}">User Management</a>
                         <a class="collapse-item" href="{{url('manage_roles')}}">Role Management</a>
                     
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
        
            <!-- Nav Item - Tables -->
          

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
         