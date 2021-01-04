@extends('layouts.app')
@section('content')


	@include('partials.breadcrumbs', ['method' =>['name'=>trans('main.cities'),'url'=>url('city')], 'action' =>trans('main.view')])
	<div class="card">
		@include('partials.card_header', ['title' =>trans('main.cities')])
		<div class="card-content collapse show">
			<div class="card-body">
				<a href="{{url('city','create')}}" class="btn btn-primary">
				@lang('main.create')</a>
			</div>
			<div class="table-responsive">
				@if (count($cities))

				<table class="table table-striped " >
					<thead>
						<tr>
							<th>{{trans('main.id')}}</th>
							<th>{{trans('main.ename')}}</th>
							<th>{{trans('main.aname')}}</th>
							<th>{{trans('main.visibility')}}</th>
							<th>{{trans('main.created_at')}}</th>
							<th>{{trans('main.created_at_time')}}</th>
							<th class="text-center">{{trans('main.options')}}</th>
						</tr>
					</thead>
					<tbody>
					@foreach ($cities as $city)
						@if($city->translate('en')->is_archived == 0)
						<tr>
							<th scope="row">{{$city->id}}</th>
							<td>{{ $city->translate('en')->name }}</td>
							<td>{{ $city->translate('ar')->name }}</td>
							@if($city->translate('ar')->visible == 1)<td>{{trans('main.visible')}}</td>
							@else <td>{{trans('main.nonvisible')}}</td>
							@endif
							<td>{{$city->created_at->format('d/m/Y')}}</td>
							<td>{{$city->created_at->format('H:i:s')}}</td>
							<td class="text-center">
								<a href="{{url('city',$city->id)}}/edit">
									<i class="fas fa-edit"></i>
								</a>
								<a href="{{url('city/archive',$city->id)}}">
									<i class="fas fa-trash-alt delete-item"></i>
								</a>
							</td>
						</tr>
						@endif
					@endforeach
					</tbody>
				</table>

				{{$cities->appends(request()->query())}}
			</div>
			@endif
		</div>
	</div>
</div>
@endsection