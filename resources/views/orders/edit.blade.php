@extends('layouts.app')

@section('content')
  @include('partials.breadcrumbs', ['method'=>['name'=>trans('main.sellers'),
  'url'=>url('customers')], 'action' =>trans('main.edit')])


  @include('partials.errors')
      
        {!! Form::model($seller,['method'=>'PATCH','class'=>'form-horizontal','files' => true,'action'=>['SellersController@update',$seller->id]]) !!}
       @include('customers.partials.form',['btn' =>trans('main.edit'), 'form' =>'editing'])
     {!! Form::close() !!}

@endsection


