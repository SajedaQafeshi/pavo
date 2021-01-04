@extends('layouts.app')
@section('content')

	@include('partials.breadcrumbs', ['method' =>['name'=>trans('main.settings'),'url'=>url('setting')], 'action' =>trans('main.view')])
	<div class="card">
		@include('partials.card_header', ['title' =>trans('main.settings')])
		<div class="card-content collapse show">
			<div class="card-body">
				<a href="{{url('setting','create')}}" class="btn btn-primary">
				@lang('main.create')</a>
			</div>
			<div class="table-responsive">
				@if (count($settings))

				<table class="table table-striped " >
					<thead>
						<tr>
							<th>{{trans('main.about_us')}}</th>
							<th>{{trans('main.about_us_english')}}</th>
							<th class="text-center">{{trans('main.options')}}</th>
						</tr>
					</thead>
					<tbody>
					@foreach ($settings as $setting)
						@if($setting->translate('en')->is_archived == 0)
						<tr>
							<td>{{$setting->translate('ar')->about_us}}</td>
							<td>{{$setting->translate('en')->about_us}}</td>
							<td class="text-center">
								<a href="{{url('setting',$setting->id)}}/edit"><i class="fas fa-edit"></i></a>
								<a href="{{url('setting/archive',$setting->id)}}">
									<i class="fas fa-trash-alt delete-item"></i>
								</a>
							</td>
						</tr>
						@endif
					@endforeach
					</tbody>
				</table>

				
			</div>
			@endif
		</div>
	</div>
</div>
@endsection