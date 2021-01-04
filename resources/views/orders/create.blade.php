@extends('layouts.app')

@section('content')
        @include('partials.breadcrumbs', ['method' =>['name'=>'الزبائن',
        'url'=>url('customers')], 'action' =>trans('main.create')])
        @include('partials.errors')

        {!! Form::open(['url' => 'customers','class'=>'form-horizontal']) !!}
            @include('customers.partials.form',['btn' =>trans('main.create'), 'form' =>'adding'])
        {!! Form::close() !!}

@endsection
    




