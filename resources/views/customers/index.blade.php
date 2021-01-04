@extends('layouts.app')

@section('content')	

@include('partials.breadcrumbs', ['method' =>['name'=>'الزبائن',
'url'=>url('customers')], 'action' =>trans('main.view')])

<div class="card">
	@include('partials.card_header', ['title' =>'الزبائن'])
	<div class="card-content collapse show">
		<div class="card-body">
			<a href="{{url('customers','create')}}"class="btn btn-primary">
			انشاء زبائن</a>
		</div>
		@if (count($customers ))
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>{{trans('main.id')}}</th>
						<th>{{trans('main.name')}}</th>
						<th>{{trans('main.email')}}</th>
						<th>{{trans('main.mobile')}}</th>
						<th>{{trans('main.created_at')}}</th>
						<th>تفعيل الحساب</th>
						<th class="text-center">{{trans('main.options')}}</th>
						<th>{{trans('main.show')}}</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($customers as $customer)
					<tr>
						<th scope="row">{{$customer->id}}</th>
						<td>{{$customer->name}}</td>
						<td>{{$customer->email}}</td>
						<td>{{$customer->phone}}</td>
						<td>{{$customer->created_at->format('d/m/Y')}}</td>
						@if($customer->activate_account == 0)
							<td><a href="{{url('customers/activate',$customer->id)}}">تفعيل</a></td>
						@else 
							<td><a href="{{url('customers/deactivate',$customer->id)}}">الغاء التفعيل</a></td>
						@endif
						<td class="text-center">
							<i class="fas fa-trash-alt delete-item"  delete_item_id="{{$customer->id}}"></i>
							<a href="{{url('customers',$customer->id)}}/edit"><i class="fas fa-edit"></i></a>
						</td>
						<td><a href="{{url('customers',$customer->id)}}">@lang('main.show')</a></td>
					</tr>	
					@endforeach
				</tbody>
			</table>

			{{$customers->appends(request()->query())}}
		</div>
	@endif
</div></div></div>
@endsection


