@extends('layouts.app')

@section('content')
        @include('partials.breadcrumbs', ['method' =>['name'=>trans('main.categories'),
        'url'=>url('category')], 'action' =>trans('main.create')])
        @include('partials.errors')

            {!! Form::open(['url' => 'category','files' => true, 'class'=>'form-horizontal']) !!}
                @include('categories.partials.form',['btn' =>trans('main.create'), 'form' =>'adding'])
            {!! Form::close() !!}

@endsection
    





