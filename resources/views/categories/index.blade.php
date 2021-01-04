@extends('layouts.app')

@section('content')




    @include('partials.breadcrumbs', ['method' =>['name'=>trans('main.categories'),'url'=>url('category')], 'action'
    =>trans('main.view')])


    <div class="card">
        @include('partials.card_header', ['title' =>trans('main.categories')])
        <div class="card-content collapse show">
            <div class="card-body">
                <p class="card-text">
                <div>
                    <a href="{{ url('category', 'create') }}" class="btn btn-primary">@lang('main.create')</a>
                </div>
                </p>

            </div>
            <div class="table-responsive">
                @if (count($categories))

                    <table class="table table-striped ">
                        <thead>
                            <tr>
                                <th>{{ trans('main.id') }}</th>
                                <th>{{ trans('main.logo') }}</th>
                                <th>{{ trans('main.ename') }}</th>
                                <th>{{ trans('main.aname') }}</th>
                                <th>{{ trans('main.categoryCounter') }}</th>
                                <th>{{ trans('main.visibility') }}</th>
                                <th>{{ trans('main.created_at') }}</th>
                                <th>{{ trans('main.created_at_time') }}</th>
                                <th class="text-center">{{ trans('main.options') }}</th>
                                <th>{{ trans('main.show') }}</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                @if ($category->translate('en')->is_archived == 0)
                                    <tr>
                                        <th scope="row">{{ $category->id }}</th>
                                        <td>
                                            <a href="#">
                                                <img class="img-responsive"
                                                    style="width:50; height: 50px; object-fit: contain"
                                                    src="{{ '/storage/category/' . $category->translate('ar')->image }}">
                                            </a>
                                        </td>
                                        <td>{{ $category->translate('en')->name }}</td>
                                        <td>{{ $category->translate('ar')->name }}</td>
                                        <td>{{ $category->translate('en')->point_counter }}</td>
                                        @if ($category->translate('ar')->visible == 1)
                                            <td>{{ trans('main.visible') }}</td>
                                        @else <td>{{ trans('main.nonvisible') }}</td>
                                        @endif
                                        <td>{{ $category->created_at->format('d/m/Y') }}</td>
                                        <td>{{ $category->created_at->format('H:i:s') }}</td>
                                        <td class="text-center">

                                            <a href="{{ url('category', $category->id) }}/edit"><i
                                                    class="fas fa-edit"></i></a>
                                            <a href="{{ url('category/archive', $category->id) }}">
                                                <i class="fas fa-trash-alt delete-item"></i>
                                            </a>

                                        </td>
                                        <td><a href="{{ url('category', $category->id) }}">{{ trans('main.show') }}</a></td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>

                    {{ $categories->appends(request()->query()) }}
            </div>
            @endif
        </div>
    </div>
    </div>

@endsection
