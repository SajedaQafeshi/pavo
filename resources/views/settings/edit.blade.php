@extends('layouts.app')

@section('content')
  @include('partials.breadcrumbs', ['method' =>['name'=>trans('main.settings'),'url'=>url('setting')], 'action' =>$setting->name])


  @include('partials.errors')

        {!! Form::model($setting,['method'=>'PATCH','class'=>'form-horizontal','files' => true,'action'=>['SettingController@update',$setting->id]]) !!}
       @include('settings.partials.form',['btn' =>trans('main.edit'), 'form' =>'editing'])
     {!! Form::close() !!}

@endsection


@section('js')
  @include('js.csrf')
@endsection



