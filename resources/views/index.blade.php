@extends('layouts.page')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1"></div>
            <div id="carouselMainAdvertisnment" class="carousel slide carousel-fade col-md-10" data-ride="carousel">
                <ol class="carousel-indicators">
                    @foreach ($mainAdvertisnments as $advertisnment)
                        <li data-target="#carouselMainAdvertisnment" data-slide-to="{{ $loop->index }}"
                            class="{{ $loop->first ? 'active' : '' }}"></li>
                    @endforeach
                </ol>
                <div class="carousel-inner">
                    @foreach ($mainAdvertisnments as $advertisnment)
                        <div class="carousel-item item {{ $loop->first ? ' active' : '' }}">
                            <img class="d-block w-100" src="{{ '/storage/advertisnment/' . $advertisnment->image }}">
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselMainAdvertisnment" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselMainAdvertisnment" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

            <div class="col-md-1"></div>
        </div>

        <main role="main" class="container-fluid">
            <div class="row">
                <div class="col-md-10 blog-main ">
                    <div class="marketing">
                        <div class="row">
                            @foreach ($categories as $category)
                                <div class="col-lg-3 category">
                                    <img class="rounded-circle"
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

                    <!--Carousel Wrapper-->
                    <div class="container-fluid multi-carousel">
                        <h1 class="text-center mb-3">{{ __('main.bestSeller') }}</h1>
                        <div id="myCarousel-multi" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner row w-100 mx-auto">
                                @foreach ($products as $product)
                                    <div class="carousel-item col-md-3 {{ $loop->first ? 'active' : '' }}">
                                        <div class="card ribbon">
                                            @if ($product->translate('ar')->discount > 0)
                                            <span>{{ $product->translate('ar')->discount }}%</span>
                                        @endif
                                            <a href="{{ url('products', $product->id) }}" role="button">
                                                <img src="{{ '/storage/product/' . $product->translate('ar')->image }}"
                                                    class="card-img-top" alt="">
                                                <div class="card-body">
                                                    <div
                                                        class="d-flex align-items-center justify-content-center flex-column">
                                                        @if (app()->isLocale('en'))
                                                            <h2 class="product-name">{{ $product->translate('en')->name }}
                                                            </h2>
                                                        @else @if (app()->isLocale('ar'))
                                                                <h2 class="product-name">
                                                                    {{ $product->translate('ar')->name }}
                                                                </h2>
                                                            @endif
                                                        @endif
                                                        <h4>{{ $product->translate('ar')->price }} &#8362;</h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#myCarousel-multi" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#myCarousel-multi" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                    <!--/.Carousel Wrapper-->
                    <div class="album py-5">
                        <div class="container">
                            <h1 class="text-center mb-3">{{ __('main.products2021') }}</h1>
                            <div class="row">
                                @foreach ($products as $product)
                                    <div class="col-md-4 col-md">
                                        <div class="card mb-4 box-shadow ribbon">
                                            @if ($product->translate('ar')->discount > 0)
                                                <span>{{ $product->translate('ar')->discount }}%</span>
                                            @endif
                                            <a href="{{ url('products', $product->id) }}" role="button">
                                                <img src="{{ '/storage/product/' . $product->translate('ar')->image }}"
                                                    class="card-img-top" alt="">
                                                <div class="card-body">
                                                    <div
                                                        class="d-flex align-items-center justify-content-center flex-column">
                                                        @if (app()->isLocale('en'))
                                                            <h1 class="product-name">{{ $product->translate('en')->name }}
                                                            </h1>
                                                        @else @if (app()->isLocale('ar'))
                                                                <h1 class="product-name">
                                                                    {{ $product->translate('ar')->name }}
                                                                </h1>
                                                            @endif
                                                        @endif

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
                </div><!-- /.blog-main -->
                <aside class="col-md-2 blog-sidebar">
                    <div id="carouselExampleFade" class="carousel slide carousel-fade sub-ads" data-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($majorAdvertisnments as $advertisnment)
                                <div class="carousel-item item {{ $loop->first ? ' active' : '' }}">
                                    <img class="d-block w-100"
                                        src="{{ '/storage/advertisnment/' . $advertisnment->image }}">
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </aside><!-- /.blog-sidebar -->
            </div><!-- /.row -->
        </main><!-- /.container -->
    </div>
@endsection
