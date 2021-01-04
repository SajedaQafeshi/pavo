@extends('layouts.app')

@section('content')
    @include('partials.breadcrumbs', ['method' =>['name'=>'الاشتراكات',
    'url'=>url('subscribe')], 'action' =>trans('main.create')])
    @include('partials.errors')

    {!! Form::open(['url' => '/subscribe/add','enctype'=> 'multipart/form-data','files' => true,'class'=>'form-horizontal']) !!}
        @include('subscribtions.partials.form',['btn' =>trans('main.create'), 'form' =>'adding'])
    {!! Form::close() !!}

@endsection
    





