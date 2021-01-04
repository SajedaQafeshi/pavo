@extends('layouts.app')

@section('content')	

@include('partials.breadcrumbs', ['method' =>['name'=>'الكشف',
'url'=>url('orders')], 'action' =>trans('main.view')])

<div class="card">
	@include('partials.card_header', ['title' =>'الكشف'])
	<div class="card-content collapse show">
		
		@if (count($orders ))
		<div class="table-responsive">
			<table class="table table-striped">
				@foreach ($orders as $order)
				<?php
					
					$customer = \App\Model\Customer::find( $order->cutomer_id);
					$region = \App\Model\Region::find($order->region_id);
					$orderItems = \App\Model\OrderItem::where('order_id', $order->id)->get();
				?>
				<thead>
					<tr>
						<td ><span style="color:#024d2e; font-weight:bold; font-size:16px"> اسم الزبون :</span>  <span>{{$customer->name}} </span></td>
						<td ></td>
						<td ><span style="color:#024d2e; font-weight:bold; font-size:16px"> البريد الالكتروني :</span>  <span>  {{$customer->email}}</span></td>
						<td ></td>
					</tr>
					<tr>
						<td ><span style="color:#024d2e; font-weight:bold; font-size:15px"> 
						 سعر الطلبية :</span>  <span>  {{$order->total_price}}</span></td>
						 <td ></td>
						<td ><span style="color:#024d2e; font-weight:bold; font-size:15px">
						  تاريخ الطلبية :</span>  <span>{{$order->created_at->format('d/m/Y')}} </span></td>
						
						 <td ><span style="color:#024d2e; font-weight:bold; font-size:15px"> 
						 سعر التوصيل :</span>  <span>  {{$region->translate('ar')->price}}</span></td>
					</tr>
					<tr>
						<th>اسم المنتج</th>
						<th>السعر</th>
						<th>الخصم</th>
						<th>سعر الجملة</th>
						<th>سعر المفرق</th>
						<th>اللون</th>
        				<th>الحجم</th>
					</tr>
				</thead>
				@foreach ($orderItems as $orderItem)
			
				<tbody>
					<?php
						$product = \App\Model\Product::find($orderItem->product_id);
						$size = \App\Model\Size::find($orderItem->size_id);
						$color = \App\Model\Color::find($orderItem->color_id);
					?>
					<tr>
						<td>{{$product->translate('ar')->name}}</td>
						<td>{{$product->translate('ar')->price}}</td>
						<td>{{$product->translate('ar')->discount}}</td>
						<td>{{$product->translate('ar')->wholesale}}</td>
					
						
						<td>{{$product->translate('ar')->disposal}}</td>
						<td>
							<span class="dot" style="background-color: {{$color->code}}"></span>
						</td>
						<td>{{$size->name}}</td>
					</tr>	
				</tbody>
				
				@endforeach
				@endforeach
				<tfoot>
					<tr>
						<td colspan="3">
							<div class="container">
								<div class="row">
									<div class="col-md-12">
										<button type="button" class="btn btn-labeled btn-success">
											<span class="btn-label"></span>
											السعر الكلي : {{$totalPrice}}
										</button>
										<button type="button" class="btn btn-labeled btn-success">
											<span class="btn-label"></span>
											سعر الطرد بالجملة : {{$wholePrice}}
										</button>
										<button type="button" class="btn btn-labeled btn-danger">
											<span class="btn-label"></span>
											صافي الربح : {{$totalPrice- $wholePrice}}
										</button>
										
										
									</div>
								</div>
							</div>
						 </td>
					</tr>
				</tfoot>
			</table>

			{{$orders->appends(request()->query())}}
		</div>
	@endif
</div></div></div>
@endsection


<style>
</style>