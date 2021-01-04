@extends('layouts.app')

@section('content')
@include('partials.breadcrumbs', ['method' =>['name'=>trans('main.point'),
  'url'=>url('point')], 'action' =>$point->name])


  @include('partials.errors')

  {!! Form::model($point,['method'=>'POST','class'=>'form-horizontal','files' => true,'action'=>['PointController@update',$point->id]]) !!}
       @include('point.partials.form',['btn' =>trans('main.edit'), 'form' =>'editing'])
     {!! Form::close() !!}

@endsection


@section('js')
  @include('js.csrf')
@endsection



