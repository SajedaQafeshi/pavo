  <div class="main-menu menu-fixed menu-light menu-accordion" data-scroll-to-active="true" >
      <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
          <li class=" navigation-header"><span>@lang('main.menu')</span><i class=" ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="General"></i>
          </li>

        <li class=" nav-item"><a href="{{url('customers')}}"><i class="fas  fa-user"></i>
        <span class="menu-title" data-i18n="">الزبائن</span></a>
        </li>
        <li class=" nav-item"><a href="{{url('order')}}"><i class="fas fa-shopping-cart"></i>
        <span class="menu-title" data-i18n="">الطلبيات</span></a>
        </li>
        <li class=" nav-item"><a href="{{url('category')}}"><i class="fas fa-list-alt"></i>
        <span class="menu-title" data-i18n="">الأصناف</span></a>
        </li>
        <li class=" nav-item"><a href="{{url('discount')}}"><i class="fas fa-percent"></i>
        <span class="menu-title" data-i18n="">أكواد الخصم</span></a>
        </li>
        <li class=" nav-item"><a href="{{url('region')}}"><i class="fas fa-chart-area"></i>
        <span class="menu-title" data-i18n="">المناطق</span></a>
        </li>
         <li class=" nav-item"><a href="{{url('city')}}"><i class="fas fa-city"></i>
         <span class="menu-title" data-i18n="">المدن</span></a>
        </li>
        <li class=" nav-item"><a href="{{url('favorite')}}"><i class="fas fa-heart" style="color: red;"></i>
        <span class="menu-title" data-i18n="">المميزة</span></a>
        </li>
        <li class=" nav-item"><a href="{{url('setting')}}"><i class="fas fa-cogs"></i>
        <span class="menu-title" data-i18n="">الاعدادات</span></a>
        </li> 
        <li class=" nav-item"><a href="{{url('advertisnment')}}"><i class="fas fa-ad" ></i>
        <span class="menu-title" data-i18n="">الاعلانات</span></a>
        </li>
        <li class=" nav-item"><a href="{{url('invoice')}}"><i class="far fa-file-alt"></i>
        <span class="menu-title" data-i18n="">الكشف</span></a>
        </li>
        <li class=" nav-item"><a href="{{url('subscribe')}}"><i class="fas fa-box"></i>
        <span class="menu-title" data-i18n="">الاشتراكات</span></a>
        </li>
        <li class=" nav-item"><a href="{{url('point')}}"><i class="fas fa-star"></i>
          <span class="menu-title" data-i18n="">نقاط الخصم</span></a>
          </li>
        
          @if(
                 Gate::check('index_admins') 
              || Gate::check('index_clients')  
              || Gate::check('index_supports')
            )
           <li class=" nav-item"><a href="#"><i class="fas fa-user"></i><span class="menu-title" data-i18n="">@lang('main.users')</span></a>
            <ul class="menu-content">
              @can('index_admins')
              <li><a class="menu-item" href="{{url('admins')}}">@lang('main.admins')</a></li>
              @endcan
              @can('index_clients')
              <li><a class="menu-item" href="{{url('clients')}}">@lang('main.clients')</a></li>
              @endcan
               @can('index_sellers')
              <li><a class="menu-item" href="{{url('sellers')}}">@lang('main.sellers')</a></li>
              @endcan
              @can('index_supports')
              <li><a class="menu-item" href="{{url('supports')}}">@lang('main.supports')</a></li>
              @endcan
            </ul>
          </li>
          @endif

         @if(Gate::check('create_types') || Gate::check('index_types'))
           <li class=" nav-item"><a href="#"><i class="fas fa-list"></i><span class="menu-title" data-i18n="">@lang('main.types')</span></a>
            <ul class="menu-content">
              @can('create_types')
                <li>
                  <a class="menu-item" href="{{url('types','create')}}">@lang('main.create')</a>
                </li>
              @endcan
              @can('index_types')
              <li><a class="menu-item" href="{{url('types')}}">@lang('main.view')</a>
              </li>
              @endcan
            </ul>
          </li>
          @endif

               @if(Gate::check('create_attributes') || Gate::check('index_attributes'))
           <li class=" nav-item"><a href="#"><i class="fas fa-sitemap"></i><span class="menu-title" data-i18n="">@lang('main.attributes')</span></a>
            <ul class="menu-content">
              @can('create_attributes')
                <li>
                  <a class="menu-item" href="{{url('attributes','create')}}">@lang('main.create')</a>
                </li>
              @endcan
              @can('index_attributes')
              <li><a class="menu-item" href="{{url('attributes')}}">@lang('main.view')</a>
              </li>
              @endcan
            </ul>
          </li>
          @endif

            @if(Gate::check('index_medias'))
           <li class=" nav-item"><a href="#"><i class="fas fa-image"></i><span class="menu-title" data-i18n="">@lang('main.medias')</span></a>
            <ul class="menu-content">
        
              @can('index_medias')
              <li><a class="menu-item" href="{{url('medias')}}">@lang('main.view')</a>
              </li>
              @endcan
            </ul>
          </li>
          @endif

          

            @if(Gate::check('create_lists') || Gate::check('index_lists'))
           <li class=" nav-item"><a href="#"><i class="fas fa-plus-square"></i><span class="menu-title" data-i18n="">@lang('main.lists')</span></a>
            <ul class="menu-content">
              @can('create_lists')
                <li>
                  <a class="menu-item" href="{{url('lists','create')}}">@lang('main.create')</a>
                </li>
              @endcan
              @can('index_lists')
              <li><a class="menu-item" href="{{url('lists')}}">@lang('main.view')</a>
              </li>
              @endcan
            </ul>
          </li>
          @endif

        

     
           @if(Gate::check('create_permissions') || Gate::check('index_permissions'))
           <li class=" nav-item"><a href="#"><i class="fas fa-low-vision"></i><span class="menu-title" data-i18n="">@lang('main.permissions')</span></a>
            <ul class="menu-content">
              @can('create_permissions')
                <li>
                  <a class="menu-item" href="{{url('permissions','create')}}">@lang('main.create')</a>
                </li>
              @endcan
              @can('index_permissions')
              <li><a class="menu-item" href="{{url('permissions')}}">@lang('main.view')</a>
              </li>
              @endcan
            </ul>
          </li>
          @endif

          @if(Gate::check('create_roles') || Gate::check('index_roles'))
           <li class=" nav-item"><a href="#"><i class="fas fa-lock"></i><span class="menu-title" data-i18n="">@lang('main.roles')</span></a>
            <ul class="menu-content">
              @can('create_roles')
                <li>
                  <a class="menu-item" href="{{url('roles','create')}}">@lang('main.create')</a>
                </li>
              @endcan
               @can('index_roles')
                <li>
                  <a class="menu-item" href="{{url('roles')}}">@lang('main.view')</a>
                </li>
              @endcan
            </ul>
          </li>
          @endif

           @if(Gate::check('create_regions') || Gate::check('index_regions'))
          <li class=" nav-item"><a href="#"><i class="fas fa-map-marker-alt"></i><span class="menu-title" data-i18n="">@lang('main.regions')</span></a>
            <ul class="menu-content">
               @can('create_regions')
                <li>
                  <a class="menu-item" href="{{url('regions','create')}}">@lang('main.create')</a>
                </li>
              @endcan
              @can('index_regions')
                <li>
                  <a class="menu-item" href="{{url('regions')}}">@lang('main.view')</a>
                </li>
              @endcan
            </ul>
          </li>
          @endif
       
   

     
          

   
          @can('settings_settings')
          <li class=" nav-item"><a href="{{url('settings/settings')}}"><i class="fas fa-cogs"></i><span class="menu-title" data-i18n="">@lang('main.settings')</span></a>
       
          </li>
          @endcan
   
        </ul>
      </div>
    </div>