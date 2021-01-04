@extends('layouts.app')

@section('content')

  @include('partials.breadcrumbs', ['method' =>['name'=>trans('main.sellers'),'url'=>url('sellers')], 'action' =>$seller->name])

	<h1>{{$seller->name}}</h1>

<div class="row">
	<div class="col-lg-8">
		          <div class="card">
                <div class="card-header">
                    <h4 class="card-title">@lang('main.show')</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">

                    	<table class="table">
                    		<tr>
                    			<td>@lang('main.id')</td><td>{{$seller->id}}</td>
                    		</tr>
                    		<tr>
                    			<td>@lang('main.user')</td><td>{{$seller->name}}</td>
                    		</tr>
                    		<tr>
                    			<td>@lang('main.region')</td><td>{{$seller->region->name}}</td>
                    		</tr>
               
                    		<tr>
                    			<td>@lang('main.created_at')</td><td>{{$seller->created_at}}</td>
                    		</tr>
                    	</table>


                      {!! Form::open(['url' => 'sellers/change_password','class'=>'form-horizontal']) !!}
               
                        {!! Form::hidden('user_id',$seller->id) !!}


 <section class="basic-elements">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">@lang('main.change_password')</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">

        @include('partials.errors')


                        <div class="row">
                          
                        <div class="col-xl-3 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    {!! Form::label('password',trans('main.password'), ['class' => '  '.trans('main.style.pull').' control-label']) !!}
                                    {!!  Form::password('password', ['id'=>"password",'class'=>"form-control"]) !!}
                                </fieldset>
                        </div>


                        <div class="col-xl-3 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    {!! Form::label('password_confirmation',trans('main.password_confirmation'), ['class' => ' '.trans('main.style.pull').' control-label']) !!}
                                    {!!  Form::password('password_confirmation', ['id'=>"password_confirmation",'class'=>"form-control"]) !!}
                                </fieldset>
                        </div>

                        </div>
                        <div class="form-group overflow-hidden">
                                <div class="col-12">
                                    <button data-repeater-create="" class="btn btn-primary btn-lg">
                                        <i class="icon-plus4"></i>  @lang('main.change_password')
                                    </button>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




            {!! Form::close() !!}

                    

                    </div>
                </div>  
                </div>  

	</div>
	<div class="col-lg-4">
		    <div class="card">
                <div class="card-header">
                    <h4 class="card-title " style="float: right;">@lang('main.photos')</h4>
                    <a class="btn btn-primary add_photos_for_seller " seller_id="{{$seller->id}}" style="float: left;"><i class="fas fa-plus"></i></a>
                    <div class="clearfix"></div>
                </div>
                <div class="card-content">
                    <div class="card-body">
                    	<hr>
                    	<div class="text-center">
                    		<div>@lang('main.cover')</div>
                    	<img  class="img-thumbnail rounded" style="max-width: 80%;" src="{{url('public/storage/'.@$seller->cover->disk_name,@$seller->cover->file_name)}}">
                    	</div>
                    	<hr>
                    	<div class="text-center">
                    		<div>@lang('main.photos')</div>
                    		<div class="form-row">
                    		@foreach($seller->photos as $photo)
                    		<div class="col-md-4" style="position: relative;">
                    			<span style="position: absolute;bottom: 10px;left: 5px;color: red;background: white;border:1px solid #666;padding: 1px;" class="remove_photo" media_id="{{$photo->id}}"><i class="far fa-trash-alt"></i></span>
                    			<img  class="img-thumbnail rounded" style="width: 100%; margin: 5px;height: 120px;" src="{{url('public/storage/'.@$photo->disk_name,@$photo->file_name)}}">
                    		</div>
                    		@endforeach
                    		</div>
                    	</div>
                    </div>
                </div>  
                </div> 
	</div>
</div>

	@endsection


@section('js')
@include('sellers.js.show.remove_photo')
@include('sellers.js.show.add_photos_for_seller')

@endsection
