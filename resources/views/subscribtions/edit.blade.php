@extends('layouts.app')

@section('content')
    @include('partials.breadcrumbs', ['method' =>['name'=>'الاشتراكات',
  'url'=>url('subscribe')], 'action' =>$subscribe->title])


  @include('partials.errors')

  {!! Form::model($subscribe,['method'=>'PATCH','class'=>'form-horizontal','files' => true,'action'=>['SubscribeController@update',$subscribe->id]]) !!}
       @include('subscribtions.partials.form',['btn' =>trans('main.edit'), 'form' =>'editing'])
     {!! Form::close() !!}

@endsection


@section('js')
  @include('js.csrf')
@endsection



