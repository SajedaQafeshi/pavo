@extends('layouts.app')

@section('content')

@include('partials.breadcrumbs', ['method' =>['name'=>trans('main.products'),
'url'=>url('category',$product->category_id )],
 'action' =>$product->translate('ar')->name])

 <h1>{{$product->translate('ar')->name}}</h1> 

 <div class="row">
		<div class="col-lg-1 col-md-1 col-sm-1">  


		</div>
    <div class="col-lg-10 col-md-10 col-sm-10">
        <div class="row">
            <h3>
            الصور
            </h3>
        </div>
        <div class="row">
            @foreach($collection as $key => $data)
            <div class="col-md-3">
                <div class="">
                    <div class="card-body ">
                        <div>
                            <div class="text-center">
                                <div class="img-hover-zoom allVehicleImages">
                                    <a class="imageFullScreen"  data-id="{{$data->id}}" >
                                        <img class="img-responsive" src="{{'/storage/product/'.$data->slug}}" 
                                        style="width:100%;  height: 140px; object-fit: contain">
									</a>
                                    <div class="col-lg-4 col-sm-4">
                                        <div class="input-group-btn"> </br>
                                            <a class="btn remove-image" 
                                            href="{{url('product/delete',$data->id)}}">
                                                <i class="fa fa-minus-circle" style="color:#0875ba; 
                                                font-size:1.1em;"></i> 
                                                <span>حذف الصورة</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- The Modal -->
            <div class="modal fade" id="imageFullScreenModal" tabindex="-1" role="dialog" aria-labelledby="Delete" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <a class="close" data-dismiss="modal" style="cursor:pointer;">&times;</a>
                        </div>
                        <div class="modal-body">
                            <img class="modal-content" id="fullScreenImage" >
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
		</div>
    </div>
    <div class="col-lg-1 col-md-1 col-sm-1">
    
    </div>
</div>
</br>

<div class="row">
		<div class="col-lg-1 col-md-1 col-sm-1">  


		</div>
    <div class="col-lg-10 col-md-10 col-sm-10">
        <div class="row">
            <h3>
            الألوان
            </h3>
        </div>
        <div class="row">
        @foreach ($colors as $color)
            <div class="col-lg-2 col-sm-2">
                <div class="card" style="width: 8rem; background-color: {{ $color->code }}"> 
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-2">
                <div class="input-group-btn"> </br>
                    <a class="btn remove-image" 
                    href="{{url('product/color/delete',$color->id)}}">
                        <i class="fa fa-minus-circle" style="color:#0875ba; 
                        font-size:1.1em;"></i> 
                        <span>حذف اللون</span>
                    </a>
                </div>
            </div>
        @endforeach
		</div>
    </div>
    <div class="col-lg-1 col-md-1 col-sm-1">
    
    </div>
</div>
@endsection