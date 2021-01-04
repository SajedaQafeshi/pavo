 <div class="dropdown-menu dropdown-menu-right">
 	@if(false)	
 	<a class="dropdown-item" href="user-profile.html"><i class="ft-user"></i>@lang('main.edit_profile')</a>
 	<a class="dropdown-item" href="user-cards.html"><i class="ft-check-square"></i>@lang('main.profile')</a>
   <div class="dropdown-divider"></div>
 	@endif

 
    <a class="dropdown-item"  href="{{ route('logout') }}"
onclick="event.preventDefault();
document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i>@lang('main.logout')</a>
    <a style="display: none;">
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	{{ csrf_field() }}
	</form>
	</a>

</div>