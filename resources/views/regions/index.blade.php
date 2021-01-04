@extends('layouts.app')
@section('content')

	@include('partials.breadcrumbs', ['method' =>
	['name'=>trans('المناطق'),'url'=>url('region')], 'action' =>trans('main.view')])
	<div class="card">
		@include('partials.card_header', ['title' =>'المناطق'])
		<div class="card-content collapse show">
			<div class="card-body">
				<a href="{{url('region','create')}}" class="btn btn-primary">
				@lang('main.create')</a>
			</div>
			<div class="table-responsive">
				@if (count($regions))

				<table class="table table-striped " >
					<thead>
						<tr>
							<th>{{trans('main.id')}}</th>
							<th>{{trans('main.ename')}}</th>
							<th>{{trans('main.aname')}}</th>
							<th>{{trans('main.deliveryPrice')}}</th>
							<th>{{trans('main.visibility')}}</th>
							<th>{{trans('main.created_at')}}</th>
							<th>{{trans('main.created_at_time')}}</th>
							<th class="text-center">{{trans('main.options')}}</th>
						</tr>
					</thead>
					<tbody>
					@foreach ($regions as $region)
						@if($region->translate('en')->is_archived == 0)
						<tr>
							<th scope="row">{{$region->id}}</th>
							<td>{{ $region->translate('en')->name }}</td>
							<td>{{ $region->translate('ar')->name }}</td>
							<td>{{$region->translate('ar')->price}}</td>
							@if($region->translate('ar')->visible == 1)<td>{{trans('main.visible')}}</td>
							@else <td>{{trans('main.nonvisible')}}</td>
							@endif
							<td>{{$region->created_at->format('d/m/Y')}}</td>
							<td>{{$region->created_at->format('H:i:s')}}</td>
							<td class="text-center">
								<a href="{{url('region',$region->id)}}/edit"><i class="fas fa-edit"></i></a>
								<a href="{{url('region/archive',$region->id)}}">
									<i class="fas fa-trash-alt delete-item"></i>
								</a>
							</td>
						</tr>
						@endif
					@endforeach
					</tbody>
				</table>

				{{$regions->appends(request()->query())}}
			</div>
			@endif
		</div>
	</div>
</div>
@endsection