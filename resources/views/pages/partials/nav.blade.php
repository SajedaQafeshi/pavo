<header class="blog-header py-3 container">
    <div class="row  justify-content-between align-items-center">
        <div class="col-4 d-flex justify-content-center align-items-center">
            <div class="btn-group" role="group" aria-label="Basic example">
                <a href="{{ url('locale/ar') }}" type="button" id="ar" class="btn btn-secondary translate">عربي</a>
                <a href="{{ url('locale/en') }}" type="button" id="eng" class="btn btn-secondary translate">English</a>
            </div>
        </div>
        <div class="col-4 text-center">
            <a class="logo-side" href="{{ url('/') }}"><img src="/img/logo.png"></a>
        </div>
        <div class="col-4 d-flex justify-content-center align-items-center">

            @auth('customer')
                @if (app()->isLocale('en'))
                    <div class="dropdown show" dir="ltr">

                    @elseif (app()->isLocale('ar'))
                        <div class="dropdown show" dir="rtl">

                @endif
                <a class="btn btn-outline-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ $user->name }}
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" data-toggle="modal" href="#pointModal">{{ __('product.customerPoint') }}</a>
                    <a class="dropdown-item" href="{{ url('/logout') }}">{{ __('product.logout') }}</a>
                </div>
            </div>
        @endauth
        @guest('customer')
            <a class="text-muted" href="{{ url('/login/customer') }}">
                <img src="{{ '/img/user.png' }}" alt=""></a>
        @endguest
        <a href="#exampleModalLong" role="button" class="btn btn-default" data-toggle="modal">
            <img src="{{ '/img/shopping-bag.png' }}" alt="">
            @isset($orderItems)
                <span class="badge badge-light">{{ $orderItems->count() }}</span>
            @endisset
            @empty($orderItems)
                <span class="badge badge-light">0</span>
            @endempty
        </a>
    </div>
    </div>
</header>
@if (Session::has('message'))
    <div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog"
        aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="background-image: url(/img/giphy.gif)">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="d-flex flex-column justify-content-center align-items-center ">
                    <h2 style="text-align: center">{{ __('product.orderMessage') }}</h2>
                    <h1>{{ __('product.orderThanx') }}</h1>
                    <div class="row justify-content-center align-items-center">
                        <img src="/img/thanx.png" width="30%" alt="">
                        <img src="/img/logo2.png" width="30%" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@isset($orderItems)
    <div class="modal fade bd-example-modal-lg" id="exampleModalLong" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            @if (app()->isLocale('en'))
                <div class="modal-content nav-order-side" dir="ltr">

                @elseif (app()->isLocale('ar'))
                    <div class="modal-content nav-order-side" dir="rtl">

            @endif
            <div class="modal-header" dir="ltr">
                <h5 class="modal-title" id="exampleModalLongTitle">{{ __('product.currentOrder') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orderItems as $index => $item)
                            <tr>
                                <th scope="row">{{ $index + 1 }}</th>
                                <td>{{ $item->Product->name }}</td>
                                <td><img src="{{ '/storage/product/' . $item->Product->image }}" width="70"></td>
                                <td><label class="tab dot" style="background-color: {{ $item->color->code }}"></label>
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
                            <td>{{ $order->total_price }} &#8362;</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer justify-content-around align-items-center">
                <div class="button_cont">
                    <a class="example_c" href="{{ url('/orders') }}"
                        rel="nofollow noopener">{{ __('product.showOrder') }}</a>
                </div>
            </div>
        </div>
    </div>
    </div>
@endisset
@empty($orderItems)
    <div class="modal fade bd-example-modal-lg" id="exampleModalLong" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content order-empty-side">
                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="d-flex flex-column justify-content-center align-items-center ">
                    <h1>{{ __('product.emptyOrder') }}</h1>
                    <img src="/img/order-empty.png" alt="" srcset="">
                </div>
            </div>
        </div>
    </div>
@endempty
@auth('customer')
    <div class="modal fade bd-example-modal-lg" id="pointModal" tabindex="-1" role="dialog"
        aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="d-flex flex-column justify-content-center align-items-center ">
                    <h1>{{ $user->total_point }} {{ __('product.point') }}</h1>
                    @if ($user->total_point > 0)
                        <img src="/img/happy-order.PNG" width="90%" alt="" srcset="">
                    @endif
                </div>
            </div>
        </div>
    </div>
@endauth
