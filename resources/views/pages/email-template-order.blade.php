<!doctype html>
<html lang="ar">
  <head>
    <title>Pavo Cristatus Fashion</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="container"> 
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-sm-12 m-auto">
                <center>
                  <h2>Pavo Cristatus Fashion</h2>
                  <img class="brand-logo" alt="logo" style="height: 85px;"
                    src="{{ $message->embed(public_path() . '/opa_logo1.png') }}">
                  </br>
                  </br>
                </center>

                @isset($orderItems)
                <div class="container order-side">
                    @if (app()->isLocale('en'))
                    <div class="row " dir="ltr">
                    @elseif (app()->isLocale('ar'))
                        <div class="row " dir="rtl">
                    @endif

                    <h1>{{ __('product.shoppingBasket') }}</h1>

                    <div class="card col-md-12 ms-auto ">
                        <div class=" col-md-12 ms-auto ">
                            <div class="table-responsive-xl table-bordered">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">{{ __('product.productName') }}</th>
                                            <th scope="col">{{ __('product.imageProduct') }}</th>
                                            <th scope="col">{{ __('product.colorProduct') }}</th>
                                            <th scope="col">{{ __('product.sizeProduct') }}</th>
                                            <th scope="col">{{ __('product.amountProduct') }}</th>
                                            <th scope="col">{{ __('product.priceProduct') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orderItems as $index => $item)
                                            <tr>
                                                <td>{{ $item->Product->name }}</td>
                                                <td><img src="{{$message->embed(public_path() . '/storage/product/'. $item->Product->image)}}"
                                                 width="70" alt=""
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
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="6">{{ __('product.totalPrice') }}</td>
                                            <td>
                                                <p><b id="total-price">{{ $order->total_price }}</b> &#8362;</p>
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
                                                    <div id="total-price-code">{{ $order->total_point }}</div>
                                                </td>
                                            </tr>
                                        @endauth
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                @endisset

                <div class="col-xl-12 col-lg-6 col-sm-12 m-auto">
                </br></br>
                    <center>
                        @if (app()->isLocale('en'))
                            <p>Thanks for contacting us!</p>
                        @elseif (app()->isLocale('ar'))
                            <p> شكرا لتواصلكم معنا</p>
                        @endif

                        
                        <p> 
                            <span style="font-size:13px;">
                            Pavo Cristatus Fashion
                            </span>
                        </p>
                    </center>
              </div>
            </div>
        </div>
    </div>
  </body>
</html>