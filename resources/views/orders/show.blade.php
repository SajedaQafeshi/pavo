@extends('layouts.app')

<?php
    $customer = \App\Model\Customer::find( $order->cutomer_id);
    $region = \App\Model\Region::find($order->region_id);
?>

@section('content')
@include('partials.breadcrumbs', ['method' =>['name'=>'الطلبيات',
'url'=>url('order')], 'action' =>$customer->name])


<div class="card">
	<div class="card-content collapse show">
		<div class="card-body">
			<h1>طلبية {{$customer->name}} </h1>
			
	
		</div>
		<div class="table-responsive">
			@if (count($orderItems))

<table class="table table-striped " >
	<thead>
	<tr>
		<th>المنتج</th>
		<th>السعر</th>
		<th>{{trans('main.amount')}}</th>
		<th>اللون</th>
        <th>الحجم</th>
		<th>{{trans('main.created_at')}}</th>
		<th>{{trans('main.created_at_time')}}</th>
	</tr>
</thead>
<tbody>
	@foreach ($orderItems as $orderItem)
	<?php
        // $product = \App\Model\Product::find($orderItem->product_id);
        $size = \App\Model\Size::find($orderItem->size_id);
        $color = \App\Model\Color::find($orderItem->color_id);
    ?>
	<tr>
		<th>{{$orderItem->Product->name}}</th>
		<th>{{$orderItem->Product->price}}</th>
		<td>{{$orderItem->amount}}</td>
        <td>
            <span class="dot" style="background-color: {{$color->code}}"></span>
        </td>
        <td>{{$size->name}}</td>
		<td>{{$orderItem->created_at->format('d/m/Y')}}</td>
		<td>{{$orderItem->created_at->format('H:i:s')}}</td>
	</tr>
		
	@endforeach
	</tbody>
</table>


{{$orderItems->appends(request()->query())}}
</div>
	@endif
                </div>
            </div>
        </div>

@endsection