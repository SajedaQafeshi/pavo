@extends('layouts.app')

@section('content')
  @include('partials.breadcrumbs', ['method' =>['name'=>trans('main.cities'),
  'url'=>url('city')], 'action' =>$city->translate('ar')->name])


  @include('partials.errors')

        {!! Form::model($city,['method'=>'PATCH','class'=>'form-horizontal','files' => true,'action'=>['CityController@update',$city->id]]) !!}
       @include('cities.partials.form',['btn' =>trans('main.edit'), 'form' =>'editing'])
     {!! Form::close() !!}

@endsection


@section('js')
  @include('js.csrf')
@endsection



