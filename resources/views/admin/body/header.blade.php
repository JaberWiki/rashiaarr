
 <style>
    .header-left .input-group {
    margin-top: 10px !important;
}
.nav-header{
    background-color: black !important;
}

 </style>
<!--**********************************
            Nav header start
        ***********************************-->
 <div class="nav-header">
            <div class="brand-logo">
                
                    <b class="logo-abbr"><img src="{{ asset('backend/images/logo.png') }}" alt=""> </b>
                    <span class="logo-compact"><img src="{{ asset('backend/images/logo-compact.png') }}" alt=""></span>
                    <span class="brand-title">
                    
                    </span>
               
            </div>
    </div>
<!--**********************************
            Nav header end
        ***********************************-->
<div class="header">    
            <div class="header-content clearfix">
                
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
              
                <div class="header-right">
                    <ul class="clearfix">
                        
                        
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative"   data-toggle="dropdown">
                                <span class="activity active"></span>
                                
                                <img src="{{ asset('backend/upload/admin_profile.png') }}" height="40" width="40" alt="">
                            </div>
                            <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="{{ route('admin.profile') }}"><i class="icon-user"></i> <span>Profile</span></a>
                                        </li>
                                        
                                        <hr class="my-2">
                                        
                                        <li><a href="{{ route('admin.logout') }}"><i class="icon-key"></i> <span>Logout</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    