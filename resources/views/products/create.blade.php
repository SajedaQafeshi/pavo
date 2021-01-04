@extends('layouts.app')

@section('content')
        @include('partials.breadcrumbs', ['method' =>['name'=>trans('main.products'),
        'url'=>url('category')], 'action' =>trans('main.create')])
        @include('partials.errors')

            {!! Form::open(['url' => 'product', 'enctype'=> 'multipart/form-data','files' => true, 'class'=>'form-horizontal']) !!}
                @include('products.partials.form',['btn' =>trans('main.create'), 'form' =>'adding'])
            {!! Form::close() !!}

@endsection
    





