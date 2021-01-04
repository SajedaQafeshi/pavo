@extends('layouts.page')

@section('content')
    <main role="main" class="container">
        @if (app()->isLocale('en'))
            <ol dir="ltr" class="breadcrumb" style="background-color: white">
                <li class="breadcrumb-item "><a href="{{ url('home') }}">{{ __('main.home') }}</li></a>
                <li class="breadcrumb-item active">{{ $categories->translate('en')->name }}
            </ol>
        @else @if (app()->isLocale('ar'))
                <ol dir="rtl" class="breadcrumb" style="background-color: white">
                    <li class="breadcrumb-item "><a href="{{ url('home') }}">{{ __('main.home') }}</li></a>
                    <li class="breadcrumb-item active">{{ $categories->translate('ar')->name }}
                </ol>
            @endif
        @endif
        <div class="row">
            <div class="col-md-12 blog-main ">
                <div class="marketing">
                    <div class="row">
                        @foreach ($similiarCategories as $category)
                            <div class="col-lg-3 category">
                                <img class="border border-light rounded-circle"
                                    src="{{ '/storage/category/' . $category->translate('ar')->image }}"
                                    alt="Generic placeholder image" width="140" height="140">
                                @if (app()->isLocale('en'))
                                    <a href="{{ url('categories', $category->id) }}">
                                        <h2>{{ $category->translate('en')->name }}</h2>
                                    </a>

                                @else @if (app()->isLocale('ar'))
                                        <a href="{{ url('categories', $category->id) }}">
                                            <h2>{{ $category->translate('ar')->name }}</h2>
                                        </a>
                                    @endif
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <hr>
        @if (app()->isLocale('en'))
            <div class="row">
                <div class="col-md-12 blog-main" dir="ltr">
                    <div class="marketing">
                        <h1 class="text-center mb-3">{{ __('main.products2021') }}</h1>
                        <div class="row">
                            @foreach ($products as $product)
                                <div class="col-md-3 col-md">
                                    <div class="card mb-3 box-shadow">
                                        <a href="{{ url('products', $product->id) }}" role="button">
                                            <img src="{{ '/storage/product/' . $product->translate('en')->image }}"
                                                class="card-img-top" alt="">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center justify-content-center flex-column">
                                                    <h1 class="product-name">{{ $product->translate('en')->name }}</h1>
                                                    <h4>{{ $product->translate('en')->price }} &#8362;</h4>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @elseif (app()->isLocale('ar'))
            <div class="row">
                <div class="col-md-12 blog-main" dir="rtl">
                    <div class="marketing">
                        <h1 class="text-center mb-3">{{ __('main.products2021') }}</h1>
                        <div class="row">
                            @foreach ($products as $product)
                                <div class="col-md-3 col-md">
                                    <div class="card mb-3 box-shadow">
                                        <a href="{{ url('products', $product->id) }}" role="button">
                                            <img src="{{ '/storage/product/' . $product->translate('ar')->image }}"
                                                class="card-img-top" alt="">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center justify-content-center flex-column">
                                                    <h1 class="product-name">{{ $product->translate('ar')->name }}</h1>
                                                    <h4>{{ $product->translate('ar')->price }} &#8362;</h4>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </main>
@endsection
