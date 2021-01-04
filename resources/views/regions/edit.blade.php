@extends('layouts.app')

@section('content')
  @include('partials.breadcrumbs', ['method' =>['name'=>trans('main.regions'),'url'=>url('region')], 'action' =>$region->translate('ar')->name])


  @include('partials.errors')

        {!! Form::model($region,['method'=>'PATCH','class'=>'form-horizontal','files' => true,'action'=>['RegionController@update',$region->id]]) !!}
       @include('regions.partials.form',['btn' =>trans('main.edit'), 'form' =>'editing'])
     {!! Form::close() !!}

@endsection


@section('js')
  @include('js.csrf')
@endsection



