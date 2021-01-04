@extends('layouts.app')

@section('content')
  @include('partials.breadcrumbs', ['method' =>['name'=>'الاعلانات',
  'url'=>url('advertisnment')], 'action' =>$advertisnment->translate('ar')->title])


  @include('partials.errors')

        {!! Form::model($advertisnment,['method'=>'PATCH','class'=>'form-horizontal','files' => true,
        'action'=>['AdvertisnmentController@update',$advertisnment->id]]) !!}
       @include('advertisnments.partials.form',['btn' =>trans('main.edit'), 'form' =>'editing'])
     {!! Form::close() !!}

@endsection


@section('js')
  @include('js.csrf')
@endsection



