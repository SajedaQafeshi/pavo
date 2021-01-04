@extends('layouts.page')

@section('content')
    @isset($orderItems)
        <div class="container order-side">
            <form action="{{ url('/orders') }}" method="POST">
                @csrf
                <h1>{{ __('product.shoppingBasket') }}</h1>
                @if (app()->isLocale('en'))
                    <div class="row " dir="ltr">
                    @elseif (app()->isLocale('ar'))
                        <div class="row " dir="rtl">
                @endif
                @auth('customer')
                    <div class=" col-md-12 ms-auto ">

                    @endauth
                    @guest('customer')
                        <div class=" col-md-7 ms-auto ">

                        @endguest
                        <div class="table-responsive-xl ">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">{{ __('product.productName') }}</th>
                                        <th scope="col">{{ __('product.imageProduct') }}</th>
                                        <th scope="col">{{ __('product.colorProduct') }}</th>
                                        <th scope="col">{{ __('product.sizeProduct') }}</th>
                                        <th scope="col">{{ __('product.amountProduct') }}</th>
                                        <th scope="col">{{ __('product.priceProduct') }}</th>
                                        <th scope="col">{{ __('product.deleteProduct') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orderItems as $index => $item)
                                        <tr>
                                            <th scope="row">{{ $index + 1 }}</th>
                                            <td>{{ $item->Product->name }}</td>
                                            <td><img src="{{ '/storage/product/' . $item->Product->image }}" width="70" alt=""
                                                    srcset=""></td>
                                            <td><label class="tab dot"
                                                    style="background-color: {{ $item->color->code }}"></label>
                                            </td>
                                            <td>{{ $item->size->name }}</td>
                                            <td>{{ $item->amount }}</td>
                                            @if ($item->Product->discount > 0)
                                                <td>
                                                    {{ $item->amount * ($item->Product->price - $item->Product->price * ($item->Product->discount / 100)) }}
                                                    &#8362;
                                                </td>

                                            @else
                                                <td>{{ $item->amount * $item->Product->price }} &#8362;</td>
                                            @endif
                                            <td>
                                                <a href="{{ url("orderItems/$item->id") }}">
                                                    <img src="img/delete.png" alt="" srcset="">
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="6">{{ __('product.totalPrice') }}</td>
                                        <td>
                                            @isset($pointDiscount)
                                                <p><b
                                                        id="total-price">{{ $order->total_price - $order->total_price * ($pointDiscount / 100) }}</b>
                                                    &#8362;</p>

                                            @endisset
                                            @empty($pointDiscount)
                                                <p><b id="total-price">{{ $order->total_price }}</b> &#8362;</p>
                                            @endempty

                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">{{ __('product.totalPriceWithCode') }}</td>
                                        <td>
                                            <div id="total-price-code">0</div>
                                        </td>
                                    </tr>
                                    @auth('customer')
                                        <tr>
                                            <td colspan="6">{{ __('product.orderPoint') }}</td>
                                            <td>
                                                <div id="total-price-code">{{ $order->total_point }} &#9733;</div>
                                            </td>
                                        </tr>
                                        @isset($pointDiscount)
                                            <tr>
                                                <td colspan="6">{{ __('product.pointDiscount') }}</td>
                                                <td>
                                                    <div id="total-price-code">{{ $pointDiscount }} %</div>
                                                </td>
                                            </tr>
                                        @endisset
                                    @endauth
                                </tbody>
                            </table>
                            @auth('customer')
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group row align-items-center">
                                            <label for="inputPassword"
                                                class="col-sm-4 col-form-label">{{ __('product.customerCity') }}</label>
                                            <div class="col-sm-7">
                                                <input type="text" name="address" required class="form-control" id="inputPassword"
                                                    placeholder="{{ __('product.customerCity') }}">
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <label for="inputPassword"
                                                class="col-sm-4 col-form-label">{{ __('product.customerLocation') }}</label>
                                            <div class="col-sm-7">
                                                <select class="form-control" name="location" id="exampleFormControlSelect1">
                                                    <option disabled selected>{{ __('product.customerLocationOption') }}</option>
                                                    @foreach ($regions as $region)
                                                        @if (app()->isLocale('en'))
                                                            <option value="{{ $region->translate('en')->id }}">
                                                                {{ $region->translate('en')->name }}
                                                            </option>
                                                        @else @if (app()->isLocale('ar'))
                                                                <option value="{{ $region->translate('ar')->id }}">
                                                                    {{ $region->translate('ar')->name }}
                                                                </option>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jumbotron row align-items-center">
                                        <h3 class="display-4">{{ __('product.deliveryDetails') }}</h3>
                                        <ul class="list-group list-group-flush">
                                            @foreach ($regions as $region)
                                                @if (app()->isLocale('en'))
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        {{ $region->translate('en')->name }}
                                                        <span
                                                            class="badge badge-primary badge-pill">{{ $region->translate('en')->price }}
                                                            &#8362;</span>
                                                    </li>
                                                @else @if (app()->isLocale('ar'))
                                                        <li
                                                            class="list-group-item d-flex justify-content-between align-items-center">
                                                            {{ $region->translate('ar')->name }}
                                                            <span
                                                                class="badge badge-primary badge-pill">{{ $region->translate('ar')->price }}
                                                                &#8362;</span>
                                                        </li>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endauth
                        </div>
                    </div>
                    @guest('customer')
                        <div class="col-md-5 ms-auto">
                            <h5> &#9733; {{ __('product.orderNote') }}</h5>
                            <h2>{{ __('product.customerInfo') }}</h2>
                            <div class="form-group row align-items-center">
                                <label for="inputPassword" class="col-sm-4 col-form-label">{{ __('product.customerName') }}</label>
                                <div class="col-sm-7">
                                    <input type="text" name="userName" class="form-control" required id="inputPassword"
                                        placeholder="{{ __('product.customerName') }}">
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label for="inputPassword" class="col-sm-4 col-form-label">{{ __('product.customerPhone') }}</label>
                                <div class="col-sm-7">
                                    <input type="tel" name="phoneNum" pattern="^\d{3}\d{3}\d{4}$" required class="form-control"
                                        id="inputPassword" placeholder="{{ __('product.customerPhone') }}">
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label for="inputPassword" class="col-sm-4 col-form-label">{{ __('product.customerCity') }}</label>
                                <div class="col-sm-7">
                                    <input type="text" name="address" required class="form-control" id="inputPassword"
                                        placeholder="{{ __('product.customerCity') }}">
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label for="inputPassword"
                                    class="col-sm-4 col-form-label">{{ __('product.customerLocation') }}</label>
                                <div class="col-sm-7">
                                    <select class="form-control" name="location" id="exampleFormControlSelect1">
                                        <option disabled selected>{{ __('product.customerLocationOption') }}</option>
                                        @foreach ($regions as $region)
                                            @if (app()->isLocale('en'))
                                                <option value="{{ $region->translate('en')->id }}">
                                                    {{ $region->translate('en')->name }}
                                                </option>
                                            @else @if (app()->isLocale('ar'))
                                                    <option value="{{ $region->translate('ar')->id }}">
                                                        {{ $region->translate('ar')->name }}
                                                    </option>
                                                @endif
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label for="inputPassword" class="col-sm-4 col-form-label">{{ __('product.customerEmail') }}</label>
                                <div class="col-sm-7">
                                    <input type="email" name="email" class="form-control" required id="inputPassword"
                                        placeholder="{{ __('product.customerEmail') }}">
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label for="inputPassword"
                                    class="col-sm-4 col-form-label">{{ __('product.customerBirthDate') }}</label>
                                <div class="col-sm-7">
                                    <input type="date" name="BirthDate" class="form-control" required id="inputPassword"
                                        placeholder="{{ __('product.customerBirthDate') }}">
                                </div>
                            </div>
                            <div class="jumbotron">
                                <h3 class="display-4">{{ __('product.deliveryDetails') }}</h3>
                                <ul class="list-group list-group-flush">
                                    @foreach ($regions as $region)
                                        @if (app()->isLocale('en'))
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                {{ $region->translate('en')->name }}
                                                <span class="badge badge-primary badge-pill">{{ $region->translate('en')->price }}
                                                    &#8362;</span>
                                            </li>
                                        @else @if (app()->isLocale('ar'))
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    {{ $region->translate('ar')->name }}
                                                    <span
                                                        class="badge badge-primary badge-pill">{{ $region->translate('ar')->price }}
                                                        &#8362;</span>
                                                </li>
                                            @endif
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endguest
                </div>
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="form-group row code-side">
                        <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Code</label>
                        <div class="col-sm-10 input-group">
                            <input type="text" class="form-control" id="code" name="coded" aria-describedby="emailHelp"
                                placeholder="{{ __('product.codeP') }}">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" onclick="checkCode()"
                                    type="button">{{ __('product.check') }}</button>
                                <input type="hidden" type="number" name="code" value="" id="code-value">
                                <input type="hidden" type="number" name="codeDiscount" value="" id="code-discount">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-around bottom-side" dir="rtl">
                    <div class="confirm-btn col-sm d-flex justify-content-center align-items-center">
                        <div class="button_cont">
                            <button class="example_b" type="submit"
                                rel="nofollow noopener">{{ __('product.confirmbtn') }}</button>
                        </div>
                    </div>
                    <div class="continue-btn col-sm d-flex justify-content-center align-items-center">
                        <div class="button_cont">
                            <a class="example_a" href="{{ url('/') }}"
                                rel="nofollow noopener">{{ __('product.continuebtn') }}</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    @endisset
@endsection
