@extends('layouts.app')

@section('content')	

@include('partials.breadcrumbs', ['method' =>['name'=>'أكواد الخصم',
'url'=>url('discount')], 'action' =>trans('main.view')])

<div class="card">
	@include('partials.card_header', ['title' =>'أكواد الخصم'])
	<div class="card-content collapse show">
		<div class="card-body">
			<p class="card-text">
				<div >
				<a href="{{url('discount','create')}}" class="btn btn-primary">@lang('main.create')</a>
				</div>
			</p>
	
		</div>
		@if (count($discounts ))
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>{{trans('main.id')}}</th>
						<th>رمز الخصم</th>
						<th>قيمة الخصم</th>
						<th>من تاريخ</th>
						<th>الى تاريخ</th>
						<th class="text-center">{{trans('main.options')}}</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($discounts as $discount)
					<tr>
						<th scope="row">{{$discount->id}}</th>
						<td>{{$discount->code }}</td>
						<td>{{$discount->value }} %</td>
						<td>{{$discount->date_from}}</td>
						<td>{{$discount->date_to}}</td>
						<td class="text-center">
							<a  href="{{url('discount/delete', $discount->id)}}">
								<i class="fas fa-trash-alt delete-item" ></i>
							</a>
							<a href="{{url('discount', $discount->id)}}/edit"><i class="fas fa-edit"></i></a>
						</td>
										
						
					</tr>	

					<div id="myModal{{$discount->id}}" class="modal fade" role="dialog">
						<div class="modal-dialog">
							<div class="modal-content">
								</br>
								<center>
									<h4 class="modal-title">اضافة القيمة العظمى للنقاط</h4>
									</br>
									<form method="POST" action="{{ url('point') }}">
										<div class="col-xl-6 col-lg-6 col-md-12 mb-1">
											<input name="_token" type="hidden" value="{{ csrf_token() }}"/>
											<input name="discount_id" type="hidden" value="{{$discount->id}}"/>
											<fieldset class="form-group">
												{!! Form::label('max_point','قيمة النقاط', ['class' => 'col-xl-8  '.trans('main.style.pull').' control-label']) !!}
												{!!  Form::number('max_point',old('max_point'),['id'=>"max_point",'class'=>"form-control"]) !!}
											</fieldset>
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-primary">
											حفظ 
											</button>
										</div>
									</form>
								</center>
							</div>

						</div>
					</div>

					

					@endforeach
				</tbody>
			</table>

			{{$discounts->appends(request()->query())}}
		</div>
	@endif
</div></div></div>
@endsection


