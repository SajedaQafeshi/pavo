    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-light navbar-border">
      <div class="navbar-wrapper">
        <div class="navbar-header">
          <ul class="nav navbar-nav flex-row">
            <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
            <li class="nav-item"><a class="navbar-brand" href="{{url('home')}}">
            <img class="brand-logo" alt="stack admin logo" src="{{url('/opa_logo1.png')}}" 
            style="height: 35px;">
                <h2 class="brand-text">Pavo Cristatus</h2></a></li>
            <li class="nav-item d-md-none">
            <a class="nav-link open-navbar-container" data-toggle="collapse" 
            data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a></li>
          </ul>
        </div>
        <div class="navbar-container content">
          <div class="collapse navbar-collapse" id="navbar-mobile">
            <ul class="nav navbar-nav mr-auto float-left">
              <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="fas fa-bars"></i></a></li>
            
                @include('partials.mega')
              
              <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="fas fa-compress-arrows-alt"></i></a></li>
             
              @if(false)
              <li class="nav-item nav-search"><a class="nav-link nav-link-search" href="#"><i class="fas fa-search"></i></a>
                <div class="search-input">
                  <input class="input" type="text" placeholder="@lang('main.search')....">
                </div>
              </li>
              @endif


            </ul>
            <ul class="nav navbar-nav float-right">

              @if(false)
              <li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-sa"></i><span class="selected-language"></span></a>
                
                @include('partials.languges')
              </li>
              <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="fas fa-bell"></i><span class="badge badge-pill badge-default badge-danger badge-default badge-up">{{Auth::user()->unreadNotifications->count()}}</span></a>
                @include('partials.notifications')
              </li>
              <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="far fa-envelope"></i><span class="badge badge-pill badge-default badge-warning badge-default badge-up">3</span></a>
                  @include('partials.messages')
              </li>
              @endif

              <li class="dropdown dropdown-user nav-item">
                

              
              <a class="dropdown-item" href="{{ url('/logout') }}">
              {{ __('product.logout') }}</a>

               @include('partials.user_info')
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>