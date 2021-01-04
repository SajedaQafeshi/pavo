<footer class="container-fluid py-5 blog-footer">
@yield('footer')

		@if ($settings ?? '')
		@foreach ($settings as $setting)
		<div class="row">
			<div class="col-12 col-md">
				<img src="{{'/img/delivery.png'}}"height="60" alt="">
				<h1>{{ __('main.deleiveryServices') }}</h1>
				@if (app()->isLocale('en'))
					<h3>{{$setting->translate('en')->delivery}}</h3>
				@else @if (app()->isLocale('ar'))
					<h3>{{$setting->translate('ar')->delivery}}</h3>
				@endif
				@endif
				
			</div>
			<div class="col-12 col-md">
				<img src="{{'/img/tick-box.png'}}" alt="">
				<h1>{{ __('main.satProduct') }}</h1>
				<h3>{{$setting->about_products}}</h3>
			</div>
			<div class="col-12 col-md">
				<img src="{{'/img/24.png'}}" alt="">
				<h1>{{ __('main.supportAndCon') }}</h1>
				<h3>{{$setting->support}}</h3>
			</div>
			<!-- <div class="col-12 col-md">

			</div> -->
		</div>
		<div class="row" id="about">
			<div class="col-12 col-md">
				<h1>{{ __('main.about') }}</h1>
				<h3>{{$setting->about_us}}</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-12 col-md">
				<h1>{{ __('main.joinWithUs') }}</h1>
				<h3>{{ __('main.joinWithUsDescription') }}</h3>
				<form id="subscriptionForm">
				<div class="input-group" dir="rtl">
					<div class="input-group-prepend">
						<div class="input-group-text" id="btnGroupAddon2">
						{{ __('main.join') }}
						</div>
					</div>
					
						<input name="_token" type="hidden" value="{{ csrf_token() }}"/>
						<input type="text" id="subscription" name="email" class="form-control" 
							placeholder="{{ __('main.email') }}"
							aria-label="البريد الالكتروني" 
							aria-describedby="btnGroupAddon2">
							<button  id="submit" hidden></button>
					</form>
				</div>
				<b><span class="text-success" id="success-message"></span><b>
			</div>
			
		</div>
		@endforeach
		@endif
		<div class="row copy-side">
			<div class="col-12 col-md">
				<h4>
					Copyright &copy; All Rights Reserved By Pavo cristatus fashion | <script>document.write(new Date().getFullYear())</script>
				</h4>
			</div>
			<div class="col-12 col-md">
				<div class="col-12 col-md">
					<a class="text-muted" href="https://www.facebook.com/Pavo-cristatus-fashion-105179064749957/"><img
							src="{{'/img/facebook.png'}}"  height="42" alt=""></a>
					<a class="text-muted" href="https://www.instagram.com/pavo_cristatus_fashion/?r=nametag"><img
							src="{{'/img/instagram.png'}}" height="42" alt=""></a>
				</div>
				<div class="col-12 col-md">
					
				</div>

			</div>
		</div>
	</footer>