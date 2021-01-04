@extends('layouts.app')

@section('content')
@include('partials.breadcrumbs', ['method' =>['name'=>trans('main.products'),
    'url'=>url('category',$product->category_id)],
    'action' =>$product->translate('ar')->name])

  @include('partials.errors')

        {!! Form::model($product,['method'=>'PATCH','class'=>'form-horizontal','files' => true,'action'=>['ProductController@update',$product->id]]) !!}
       @include('products.partials.form',['btn' =>trans('main.edit'), 'form' =>'editing'])
     {!! Form::close() !!}

@endsection


@section('js')
  @include('js.csrf')
@endsection



