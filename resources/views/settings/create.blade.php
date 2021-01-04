@extends('layouts.app')

@section('content')
        @include('partials.breadcrumbs',
         ['method' =>['name'=>trans('main.settings'),'url'=>url('setting')], 'action' =>trans('main.create')])
        @include('partials.errors')

            {!! Form::open(['url' => 'setting','class'=>'form-horizontal']) !!}
                @include('settings.partials.form',['btn' =>trans('main.create'), 'form' =>'adding'])
            {!! Form::close() !!}

@endsection
    





