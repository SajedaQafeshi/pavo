@extends('layouts.app')

@section('content')
        @include('partials.breadcrumbs', ['method' =>['name'=>trans('الاعلانات'),
        'url'=>url('advertisnment')], 'action' =>trans('main.create')])
        @include('partials.errors')

            {!! Form::open(['url' => 'advertisnment', 'enctype'=> 'multipart/form-data','files' => true,'class'=>'form-horizontal']) !!}
                @include('advertisnments.partials.form',['btn' =>trans('main.create'), 
                'form' =>'adding'])
            {!! Form::close() !!}

@endsection
    





