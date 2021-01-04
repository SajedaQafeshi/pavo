@extends('layouts.app')

@section('content')
@include('partials.breadcrumbs', ['method' =>['name'=>trans('main.categories'),
  'url'=>url('category')], 'action' =>$category->translate('ar')->name])


  @include('partials.errors')

  {!! Form::model($category,['method'=>'PATCH','class'=>'form-horizontal','files' => true,'action'=>['CategoryController@update',$category->id]]) !!}
       @include('categories.partials.form',['btn' =>trans('main.edit'), 'form' =>'editing'])
     {!! Form::close() !!}

@endsection


@section('js')
  @include('js.csrf')
@endsection



