@extends('layouts.page')

@section('content')
    <div class="container-fluid">

        <div id="img-zoomer-box">

            <img src="{{ '/storage/product/' . $products->translate('ar')->image }}" id="main">
            <div id="img2"
                style="background: url('{{ '/storage/product/' . $products->translate('ar')->image }}') no-repeat #fff ">
            </div>

            <!-- <div id="myresult" class="img-zoom-result "></div> -->
        </div>
        <div id="thumbnails">
            @foreach ($collection as $key => $data)

                <img src="{{ '/storage/product/' . $data->slug }}">
            @endforeach
        </div>

        <div class="container">
            <form method="POST" class="d-flex flex-column justify-content-around" action="{{ url('orderItems') }}">
                @csrf
                <input type="hidden" name="product_id" value="{{ $products->translate('en')->id }}">
                @if (app()->isLocale('en'))
                    <div class="row eng-font" dir="ltr">
                        <div class=" col-md-6 d-flex align-items-center justify-content-between">
                            <h2>{{ __('main.productName') }} </h2>
                            <h4>{{ $products->translate('en')->name }}</h4>
                            <h2>{{ __('product.price') }} </h2>
                            @if ($products->translate('ar')->discount > 0)
                                <h4><del>{{ $products->translate('ar')->price }}</del>
                                    &nbsp;&nbsp;{{ $products->translate('ar')->price - $products->translate('ar')->price * ($products->translate('ar')->discount / 100) }}
                                    &#8362;
                                </h4>
                            @else
                                <h4>{{ $products->translate('ar')->price }} &#8362;</h4>
                            @endif
                        </div>
                        <div class=" col-md-12 d-flex align-items-center justify-content-start flex-nowrap">
                            <h2>{{ __('main.productColor') }} </h2>
                            @foreach ($colors as $color)
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline{{ $color->code }}" name="color_id"
                                        class="custom-control-input" value="{{ $color->id }}" required>
                                    <label class="custom-control-label tab dot" style="background-color: {{ $color->code }}"
                                        for="customRadioInline{{ $color->code }}"></label>
                                    <div class="invalid-feedback">Example invalid feedback text</div>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-md-6 d-flex align-items-center justify-content-between flex-nowrap">
                            <h2>
                                {{ __('main.productSizes') }}
                            </h2>
                            @foreach ($sizes as $size)
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline{{ $size->name }}" name="size_id"
                                        class="custom-control-input" value="{{ $size->id }}" required>
                                    <label class="custom-control-label" for="customRadioInline{{ $size->name }}">
                                        {{ $size->name }}</label>
                                    <div class="invalid-feedback">Example invalid feedback text</div>
                                </div>
                                {{-- <h4>{{ $size->name }}</h4>
                                --}}
                            @endforeach
                        </div>
                        <div class="col-md-12 d-flex align-items-center flex-nowrap">
                            <h2>{{ __('main.productAmounts') }}</h2>
                            <div class="input-group group">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-default btn-number" disabled="disabled"
                                        data-type="minus" data-field="amount">
                                        <span class="glyphicon glyphicon-minus">-</span>
                                    </button>
                                </span>
                                <input type="number" name="amount" class="form-control input-number" value="1" min="1"
                                    max="{{ $products->translate('en')->amount }}">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-default btn-number" data-type="plus"
                                        data-field="amount">
                                        <span class="glyphicon glyphicon-plus">+</span>
                                    </button>
                                </span>
                            </div>
                        </div>
                        <div class=" col-md-12 d-flex align-items-center justify-content-center flex-nowrap">
                            <div class="confirm-btn">
                                <div class="button_cont"><button class="example_b" type="submit"
                                        rel="nofollow noopener">{{ __('main.addToOrder') }}</button></div>
                            </div>
                        </div>
                    </div>
                @else @if (app()->isLocale('ar'))
                        <div class="row" dir="rtl">
                            <div class=" col-md-6 d-flex align-items-center justify-content-between">
                                <h2>{{ __('main.productName') }} </h2>
                                <h4>{{ $products->translate('ar')->name }}</h4>
                                <h2>{{ __('product.price') }} </h2>
                                @if ($products->translate('ar')->discount > 0)
                                    <h4><del>{{ $products->translate('ar')->price }}</del>
                                        &nbsp;&nbsp;{{ $products->translate('ar')->price - $products->translate('ar')->price * ($products->translate('ar')->discount / 100) }}
                                        &#8362;
                                    </h4>
                                @else
                                    <h4>{{ $products->translate('ar')->price }} &#8362;</h4>
                                @endif
                            </div>
                            <div class=" col-md-12 d-flex align-items-center justify-content-start flex-nowrap">
                                <h2>{{ __('main.productColor') }} </h2>
                                @foreach ($colors as $color)
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadioInline{{ $color->code }}" name="color_id"
                                            class="custom-control-input" value="{{ $color->id }}" required>
                                        <label class="custom-control-label tab dot"
                                            style="background-color: {{ $color->code }}"
                                            for="customRadioInline{{ $color->code }}"></label>
                                        <div class="invalid-feedback">Example invalid feedback text</div>
                                    </div>
                                @endforeach
                            </div>
                            <div class=" col-md-6 d-flex align-items-center justify-content-between flex-nowrap">
                                <h2>
                                    {{ __('main.productSizes') }}
                                </h2>
                                @foreach ($sizes as $size)
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadioInline{{ $size->name }}" name="size_id"
                                            class="custom-control-input" value="{{ $size->id }}" required>
                                        <label class="custom-control-label" for="customRadioInline{{ $size->name }}">
                                            {{ $size->name }}</label>
                                        <div class="invalid-feedback">Example invalid feedback text</div>
                                    </div>
                                @endforeach
                            </div>
                            <div class=" col-md-12 d-flex align-items-center justify-content-between flex-nowrap">
                                <h2>{{ __('main.productAmounts') }}</h2>
                                <div class="input-group group">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-default btn-number" disabled="disabled"
                                            data-type="minus" data-field="amount">
                                            <span class="glyphicon glyphicon-minus">-</span>
                                        </button>
                                    </span>
                                    <input type="number" name="amount" class="form-control input-number" value="1" min="1"
                                        max="{{ $products->translate('en')->amount }}">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-default btn-number" data-type="plus"
                                            data-field="amount">
                                            <span class="glyphicon glyphicon-plus">+</span>
                                        </button>
                                    </span>
                                </div>
                                {{-- <h3>{{ $products->translate('en')->amount }}</h3>
                                --}}
                            </div>
                            <div class=" col-md-12 d-flex align-items-center justify-content-center flex-nowrap">
                                <div class="confirm-btn">
                                    <div class="button_cont"><button class="example_b" type="submit"
                                            rel="nofollow noopener">{{ __('main.addToOrder') }}</button></div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endif
            </form>
        </div>
        <div class="container-fluid">
            <h1 class="text-center mb-3">{{ __('main.similarProduct') }}</h1>
            <div class="row">
                @foreach ($similierProducts as $similierProduct)
                    <div class="col-md-3 col-md">
                        <div class="card mb-3 box-shadow ribbon">
                            @if ($similierProduct->translate('ar')->discount > 0)
                                <span>{{ $similierProduct->translate('ar')->discount }}%</span>
                            @endif
                            <div class="card-body">

                                <a href="{{ url('products', $similierProduct->id) }}" role="button">
                                    <img src="{{ '/storage/product/' . $similierProduct->translate('ar')->image }}"
                                        class="card-img-top" alt="">
                                    <div class="d-flex align-items-center justify-content-center flex-column">
                                        @if (app()->isLocale('en'))
                                            <h2>{{ $similierProduct->translate('en')->name }}</h2>
                                        @else @if (app()->isLocale('ar'))
                                                <h2>{{ $similierProduct->translate('ar')->name }}</h2>
                                            @endif
                                        @endif
                                        <h4>{{ $similierProduct->translate('ar')->price }} &#8362;</h4>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        var thumbnails = document.getElementById("thumbnails")
        var imgs = thumbnails.getElementsByTagName("img")
        var main = document.getElementById("main")
        var img2 = document.getElementById("img2")
        var counter = 0;

        for (let i = 0; i < imgs.length; i++) {
            let img = imgs[i]


            img.addEventListener("click", function() {
                main.src = this.src
                img2.style.background = "url('" + this.src + "')  no-repeat #fff ";
            })

        }
        $(document).ready(function() {
            $(document).ready(function() {


                $('.btn-number').click(function(e) {
                    e.preventDefault();

                    fieldName = $(this).attr('data-field');
                    type = $(this).attr('data-type');
                    var input = $("input[name='" + fieldName + "']");
                    var currentVal = parseInt(input.val());
                    if (!isNaN(currentVal)) {
                        if (type == 'minus') {

                            if (currentVal > input.attr('min')) {
                                input.val(currentVal - 1).change();
                            }
                            if (parseInt(input.val()) == input.attr('min')) {
                                $(this).attr('disabled', true);
                            }

                        } else if (type == 'plus') {

                            if (currentVal < input.attr('max')) {
                                input.val(currentVal + 1).change();
                            }
                            if (parseInt(input.val()) == input.attr('max')) {
                                $(this).attr('disabled', true);
                            }

                        }
                    } else {
                        input.val(0);
                    }
                });
                $('.input-number').focusin(function() {
                    $(this).data('oldValue', $(this).val());
                });
                $('.input-number').change(function() {

                    minValue = parseInt($(this).attr('min'));
                    maxValue = parseInt($(this).attr('max'));
                    valueCurrent = parseInt($(this).val());

                    name = $(this).attr('name');
                    if (valueCurrent >= minValue) {
                        $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr(
                            'disabled')
                    } else {
                        alert('Sorry, the minimum value was reached');
                        $(this).val($(this).data('oldValue'));
                    }
                    if (valueCurrent <= maxValue) {
                        $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr(
                            'disabled')
                    } else {
                        alert('Sorry, the maximum value was reached');
                        $(this).val($(this).data('oldValue'));
                    }

                });
            });
        });

    </script>
@endsection
