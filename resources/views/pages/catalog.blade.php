@extends('layouts.page')

@section('content')

    <div class="container-fluid ">
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">
                    @if (app()->isLocale('en'))
                        <div class="row">
                            <div class="col-md-12 blog-main" dir="ltr">
                                <div class="marketing">
                                    <div class="row">
                                        @foreach ($products as $product)
                                            <div class="col-md-3 col-md">
                                                <div class="card mb-3 box-shadow ribbon">
                                                    @if ($product->translate('ar')->discount > 0)
                                                    <span>{{ $product->translate('ar')->discount }}%</span>
                                                @endif
                                                    <a href="{{ url('products', $product->id) }}" role="button">
                                                        <img src="{{ '/storage/product/' . $product->translate('en')->image }}"
                                                            class="card-img-top" alt="">
                                                        <div class="card-body">
                                                            <div
                                                                class="d-flex align-items-center justify-content-center flex-column">
                                                                <h1 class="product-name">
                                                                    {{ $product->translate('en')->name }}
                                                                </h1>
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
                                    <div class="row">
                                        @foreach ($products as $product)
                                            <div class="col-md-3 col-md">
                                                <div class="card mb-3 box-shadow ribbon">
                                                    @if ($product->translate('ar')->discount > 0)
                                                    <span>{{ $product->translate('ar')->discount }}%</span>
                                                @endif
                                                    <a href="{{ url('products', $product->id) }}" role="button">
                                                        <img src="{{ '/storage/product/' . $product->translate('ar')->image }}"
                                                            class="card-img-top" alt="">
                                                        <div class="card-body">
                                                            <div
                                                                class="d-flex align-items-center justify-content-center flex-column">
                                                                <h1 class="product-name">
                                                                    {{ $product->translate('ar')->name }}
                                                                </h1>
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
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
