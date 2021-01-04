@extends('layouts.app')

@section('content')
    <div>



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
                                    <th>{{ trans('main.visibility') }}</th>
                                    <th>{{ trans('main.created_at') }}</th>
                                    <th>{{ trans('main.created_at_time') }}</th>
                                    <th class="text-center">{{ trans('main.options') }}</th>

                                    @can('show_makes')
                                        <th>{{ trans('main.show') }}</th>
                                    @endcan

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <th scope="row">{{ $category->id }}</th>
                                        <td>
                                            <a href="#">
                                                <img class="img-responsive"
                                                    style="width:50; height: 50px; object-fit: contain"
                                                    src="{{ '/storage/category/' . $category->image }}">
                                            </a>
                                        </td>
                                        <td>{{ $category->name_english }}</td>
                                        <td>{{ $category->name_arabic }}</td>
                                        @if ($category->visible == 1)
                                            <td>{{ trans('main.visible') }}</td>
                                        @else <td>{{ trans('main.nonvisible') }}</td>
                                        @endif
                                        <td>{{ $category->created_at->format('d/m/Y') }}</td>
                                        <td>{{ $category->created_at->format('H:i:s') }}</td>
                                        <td class="text-center">

                                            <a href="{{ url('categories', $category->id) }}/edit"><i
                                                    class="fas fa-edit"></i></a>
                                            <a href="{{ url('category/archive', $category->id) }}">
                                                <i class="fas fa-trash-alt delete-item"></i>
                                            </a>

                                        </td>
                                        <td><a href="{{ url('categories', $category->id) }}">{{ trans('main.show') }}</a>
                                        </td>
                                    </tr>

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
