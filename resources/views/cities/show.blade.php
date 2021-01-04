@extends('layouts.app')

@section('content')

@include('partials.breadcrumbs', ['method' =>['name'=>trans('main.cities'),'url'=>url('city')], 'action' =>$city->name])

<h1>{{$city->name}}</h1>


   {!! Form::open(['url' => 'city/add_review/'.$city->id,'method'=>'post','class'=>'form-horizontal']) !!}


 <section class="basic-elements">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">@lang('main.city')</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">


                            @if(!is_null($city->review))
                            <div class="row">

                            <div class="col-xl-6">
                            	<div>
                            		<iframe width="100%" height="415" src="https://www.youtube.com/embed/{{$city->review}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            	</div>
                            	<div class="text-center"><button class="btn btn-danger">@lang('main.delete')</button></div>
                            </div>
                        	</div>
                            @endif


                    </div>
                </div>
            </div>
        </div>
    </div>
</section>





   {!! Form::close() !!}

@endsection