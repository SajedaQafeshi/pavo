@extends('layouts.app')

@section('content')

    @include('partials.breadcrumbs', ['method' =>['name'=>'الطلبيات',
    'url'=>url('orders')], 'action' =>trans('main.view')])

    <div class="card">
        @include('partials.card_header', ['title' =>'الطلبيات'])
        <div class="card-content collapse show">

            @if (count($orders))
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>{{ trans('main.id') }}</th>
                                <th>اسم الزبون</th>
                                <th>المنطقة</th>
                                <th>نقاط الزبون</th>
                                <th>السعر الكلي</th>
                                <th>تاريخ الانشاء</th>
                                <th>الطلبية مؤكدة</th>
                                <th class="text-center">تأكيد الطلبية</th>
                                <th>عرض المنتجات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <th scope="row">{{ $order->id }}</th>
                                    <?php
                                    $customer = \App\Model\Customer::find($order->cutomer_id);
                                    $region = \App\Model\RegionTranslation::find($order->region_id);
                                    ?>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $region->name }}</td>
                                    <td>{{ $order->cutomer_points ?? '0' }}</td>
                                    <td>{{ $order->total_price }}</td>
                                    <td>{{ $order->created_at->format('d/m/Y') }}</td>
                                    @if ($order->is_delivery == 0)
                                        <td style="color: red">لا</td>
                                    @else <td style="color: green">نعم</td>
                                    @endif
                                    <td class="text-center">
                                        <a data-toggle="modal" data-target="#myModal{{ $order->id }}">
                                            <i class="fas fa-clipboard-check"></i>
                                        </a>
                                    </td>
                                    <td><a href="{{ url('order', $order->id) }}">@lang('main.show')</a></td>
                                </tr>

                                <div id="myModal{{ $order->id }}" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            </br>
                                            <center>
                                                <h4 class="modal-title">تأكيد طلبية {{ $customer->name }}</h4>
                                                </br>
                                                <a href="{{ url('order', $order->id) }}/edit">
                                                    <img src="{{ 'img\checkOrder.png' }}" alt="">
                                                </a>
                                                </br>
                                            </center>
                                        </div>

                                    </div>
                                </div>

                            @endforeach
                        </tbody>
                    </table>

                    {{ $orders->appends(request()->query()) }}
                </div>
            @endif
        </div>
    </div>
    </div>
@endsection
