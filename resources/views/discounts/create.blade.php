@extends('layouts.app')

@section('content')
        @include('partials.breadcrumbs', ['method' =>['name'=>'أكواد الخصم',
        'url'=>url('discount')], 'action' =>trans('main.create')])
        @include('partials.errors')

        {!! Form::open(['url' => 'discount','class'=>'form-horizontal']) !!}
            @include('discounts.partials.form',['btn' =>trans('main.create'), 'form' =>'adding'])
        {!! Form::close() !!}

@endsection
    




