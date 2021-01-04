@extends('layouts.app')

@section('content')
        @include('partials.breadcrumbs', ['method' =>['name'=>trans('main.cities'),
        'url'=>url('city')], 'action' =>trans('main.create')])
        @include('partials.errors')

            {!! Form::open(['url' => 'city','class'=>'form-horizontal']) !!}
                @include('cities.partials.form',['btn' =>trans('main.create'), 'form' =>'adding'])
            {!! Form::close() !!}

@endsection
    





