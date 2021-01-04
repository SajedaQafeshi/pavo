@extends('layouts.app')

@section('content')
@include('partials.breadcrumbs', ['method' =>['name'=>trans('main.categories'),
'url'=>url('category')], 'action' =>$category->translate('ar')->name])

<div class="card">
	<div class="card-content collapse show">
		<div class="card-body">
			<h1>{{$category->translate('ar')->name}}</h1>
			<p class="card-text">
				<div>
					<a href="{{url('product',$category->id)}}" class="btn btn-primary">@lang('main.create')</a>
				</div>
			</p>
	
		</div>
		<div class="table-responsive">
			@if (count($products))

<table class="table table-striped " >
	<thead>
	<tr>
		<th>{{trans('main.id')}}</th>
		<th>{{trans('main.image')}}</th>
		<th>{{trans('main.ename')}}</th>
		<th>{{trans('main.aname')}}</th>
		<th>{{trans('main.visible')}}</th>
		<th>{{trans('main.amount')}}</th>
		<th>{{trans('main.price')}}</th>
		<th>عدد النقرات</th>
		<th>{{trans('main.created_at')}}</th>
		<th>{{trans('main.created_at_time')}}</th>
		<th class="text-center">عمليات على المنتجات</th>
		<th >عرض الصور والألوان</th>
	</tr>
</thead>
<tbody>
	@foreach ($products as $product)
	@if($product->translate('en')->is_archived == 0)
	<tr>
		<th scope="row">{{$product->id}}</th>
		<td>
			<a href="#">
				<img class="img-responsive" style="width:50; height: 50px; object-fit: contain"
        		src="{{'/storage/product/'. $product->translate('ar')->image}}">
			</a>
		</td>
		<td>{{$product->translate('en')->name}}</td>
		<td>{{$product->translate('ar')->name}}</td>
		@if($product->translate('ar')->visible == 1)
			<td>{{trans('main.visible')}}</td>
		@else 
			<td>{{trans('main.nonvisible')}}</td>
		@endif
		<td>{{$product->translate('ar')->amount}}</td>
		<td>{{$product->translate('ar')->price}}</td>
		<td>{{$product->point_counter}}</td>
		<td>{{$product->created_at->format('d/m/Y')}}</td>
		<td>{{$product->created_at->format('H:i:s')}}</td>
		<td class="text-center">
			<a href="{{url('product',$product->id)}}/edit"><i class="fas fa-edit"></i></a>
			<a href="{{url('product/archive',$product->id)}}">
				<i class="fas fa-trash-alt delete-item"></i>
			</a>
			<a data-toggle="modal" data-target="#myModal{{$product->id}}">
			<i class="fa fa-percent" ></i>
			</a>
		</td>

		<td><a href="{{url('product/image',$product->id)}}">{{trans('main.show')}}</a></td>
	</tr>
	<div id="myModal{{$product->id}}" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				</br>
				<center>
					<h4 class="modal-title"> اضافة خصم </h4>
					<h5>{{$product->translate('ar')->name}}</h5>
					</br>
					<a href="{{url('product', $product->id)}}/edit">
						<img src="{{'\img\discount.png'}}" alt="">
					</a> 
					<div class="modal-body">

						<form class="form-horizontal" role="form" id="form-direction" 
						method="post" action="{{action('ProductController@addDiscount')}}">
							{{csrf_field()}}
							<input type="text" name="product_id" value="{{$product->id}}"  hidden>
							<div class="form-group">
								<div class="col-sm-10">
									<input type="number" class="form-control" name="discount" 
									placeholder="نسبة الخصم"/>
								</div>
							</div>

							<button type="submit" class="btn btn-primary lead" 
							id="mysaveButton">حفظ</button>
						</form>
					</div>
					</br>
				</center>
			</div>

		</div>
	</div>
		@endif	

	@endforeach
	</tbody>
</table>


{{$products->appends(request()->query())}}
</div>
	@endif
                </div>
            </div>
        </div>

@endsection