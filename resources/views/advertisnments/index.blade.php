@extends('layouts.app')
@section('content')

	@include('partials.breadcrumbs', ['method' =>
	['name'=>trans('الاعلانات'),'url'=>url('advertisnment')], 'action' =>trans('main.view')])
	<div class="card">
		@include('partials.card_header', ['title' =>'الاعلانات'])
		<div class="card-content collapse show">
			<div class="card-body">
				<a href="{{url('advertisnment','create')}}" class="btn btn-primary">
				@lang('main.create')</a>
			</div>
			<div class="table-responsive">
				@if (count($advertisnments))

				<table class="table table-striped " >
					<thead>
						<tr>
							<th>{{trans('main.id')}}</th>
							<th>{{trans('main.titleArabic')}}</th>
							<th>{{trans('main.titleEnglish')}}</th>
							<th>{{trans('main.advertType')}}</th>
							<th>{{trans('main.visibility')}}</th>
							<th>{{trans('main.created_at')}}</th>
							<th>{{trans('main.created_at_time')}}</th>
							<th class="text-center">{{trans('main.options')}}</th>
						</tr>
					</thead>
					<tbody>
					@foreach ($advertisnments as $advertisnment)
						@if($advertisnment->translate('en')->is_archived == 0)
						<tr>
							<td>{{ $advertisnment->id }}</td>
							<td>{{ $advertisnment->translate('en')->title }}</td>
							<td>{{ $advertisnment->translate('ar')->title }}</td>

							@if($advertisnment->translate('ar')->type == "main")<td>اعلان رئيسي</td>
							@else <td>اعلان فرعي</td>
							@endif

							@if($advertisnment->translate('ar')->visible == 1)<td>{{trans('main.visible')}}</td>
							@else <td>{{trans('main.nonvisible')}}</td>
							@endif
							<td>{{$advertisnment->created_at->format('d/m/Y')}}</td>
							<td>{{$advertisnment->created_at->format('H:i:s')}}</td>
							<td class="text-center">
								<a href="{{url('advertisnment',$advertisnment->id)}}/edit"><i class="fas fa-edit"></i></a>
								<a href="{{url('advertisnment/archive',$advertisnment->id)}}">
									<i class="fas fa-trash-alt delete-item"></i>
								</a>
							</td>
						</tr>
						@endif
					@endforeach
					</tbody>
				</table>

				{{$advertisnments->appends(request()->query())}}
			</div>
			@endif
		</div>
	</div>
</div>
@endsection