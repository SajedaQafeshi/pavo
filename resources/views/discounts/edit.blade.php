@extends('layouts.app')

@section('content')
  @include('partials.breadcrumbs', ['method'=>['name'=>'أكواد الخصم',
  'url'=>url('discount')], 'action' =>trans('main.edit')])


  @include('partials.errors')
      
        {!! Form::model($discount,['method'=>'PATCH','class'=>'form-horizontal','files' => true,'action'=>['DiscountController@update',$discount->id]]) !!}
       @include('discounts.partials.form',['btn' =>trans('main.edit'), 'form' =>'editing'])
     {!! Form::close() !!}

@endsection


