@extends('layouts.app')

@section('content')	

@include('partials.breadcrumbs', ['method' =>['name'=>'الكشف',
'url'=>url('point')], 'action' =>trans('main.view')])

<div class="card">
	@include('partials.card_header', ['title' =>'الكشف'])
	<div class="card-content collapse show">
		
		@if (count($point ))
		<div class="table-responsive">
			<table class="table table-striped ">
				<thead>
					<tr>
						<th>{{ trans('main.id') }}</th>
						<th>{{ trans('main.point') }}</th>
						<th>{{ trans('main.pointDiscount') }}</th>
						
					</tr>
				</thead>
				<tbody>
					@foreach ($point as  $index => $p)
						<tr>
							<th scope="row">{{ $index + 1 }}</th>
							
							<td>{{ $p->max_point }}</td>
							<td>{{ $p->value }}</td>
							<td class="text-center">

								<a href="{{ url('point', $p->id) }}/edit"><i
										class="fas fa-edit"></i></a>

							</td>
						</tr>

					@endforeach
				</tbody>
			</table>

		</div>
	@endif
</div></div></div>
@endsection


<style>
</style>