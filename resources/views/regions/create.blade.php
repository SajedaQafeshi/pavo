@extends('layouts.app')

@section('content')
        @include('partials.breadcrumbs', ['method' =>['name'=>trans('main.regions'),'url'=>url('region')], 'action' =>trans('main.create')])
        @include('partials.errors')

            {!! Form::open(['url' => 'region','class'=>'form-horizontal']) !!}
                @include('regions.partials.form',['btn' =>trans('main.create'), 'form' =>'adding'])
            {!! Form::close() !!}

@endsection
    





