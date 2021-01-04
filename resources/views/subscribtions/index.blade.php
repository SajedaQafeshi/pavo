@extends('layouts.app')
@section('content')


	@include('partials.breadcrumbs', ['method' =>
	['name'=>trans('الاشتراكات'),'url'=>url('subscribe')], 'action' =>trans('main.view')])
    @if($success)
        <b><span class="text-success" id="success-message">{{ $success }}</span><b>
    @endif
    
	<div class="card">
		@include('partials.card_header', ['title' =>'الاشتراكات'])
		<div class="card-content collapse show">
			<div class="card-body">
				<a href="{{url('subscribe','create')}}" class="btn btn-primary">
				@lang('main.create')</a>
			</div>
			<div class="table-responsive">
				@if (count($subscribtions))

				<table class="table table-striped " >
					<thead>
						<tr>
							<th>{{trans('main.id')}}</th>
							<th>العنوان</th>
							<th>نسبة الخصم</th>
							<th>{{trans('main.created_at')}}</th>
							<th class="text-center">{{trans('main.options')}}</th>
                            <th class="text-center">ارسال الى المشتركين</th>
						</tr>
					</thead>
					<tbody>
					@foreach ($subscribtions as $subscribtion)
						<tr>
							<th scope="row">{{$subscribtion->id}}</th>
							<td>{{ $subscribtion->title }}</td>
							<td>{{$subscribtion->discount}} %</td>
							<td>{{$subscribtion->created_at->format('d/m/Y')}}</td>
							<td class="text-center">
								<a href="{{url('subscribe',$subscribtion->id)}}/edit"><i class="fas fa-edit"></i></a>
								<a href="{{url('subscribe/archive',$subscribtion->id)}}">
									<i class="fas fa-trash-alt delete-item"></i>
								</a>
							</td>
                            <td class="text-center">
								<a data-toggle="modal" data-target="#myModal{{$subscribtion->id}}">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                </a>
								
							</td>
						</tr>

                        <!-- Modal -->
                        <div class="modal fade" id="myModal{{$subscribtion->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">الايميل المُرسل للمشتركين </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    </br>
                                    <center>
                                        <h2>{{$subscribtion->title}}</h2>
                                        <img class="brand-logo" alt="logo" 
                                        src="{{url('opa_logo1.png')}}" style="height: 85px;">
                                        </br>
                                        </br>
                                        <h4>خصم بنسبة 
                                            <span style="font-size:17px; color:red">
                                            {{$subscribtion->discount}} %
                                            </span>
                                        </h4>
                                    </center>
                                    <div class="col-xl-12 col-lg-6 col-sm-12 m-auto">
                                        <p> {{$subscribtion->body}}</p>
                                        <center>
                                            <img class="img-responsive" style="width:100%; height: 100%; object-fit: contain"
                                            src="{{'/storage/subscribtions/'. $subscribtion->image}}">
                                        </center>
                                        <br/>
                                        <br/>
                                        <p> شكرا لتواصلكم معنا</p>
                                        <p>فريق 
                                            <span style="font-size:13px;">
                                            Pavo Cristatus Fashion
                                            </span>
                                        </p>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="{{url('subscribe', $subscribtion->id)}}"
                                        type="button" class="btn btn-primary">
                                    ارسال الى جميع المشتركين </a>
                                </div>
                                </div>
                            </div>
                        </div>

					@endforeach
					</tbody>
				</table>

				{{$subscribtions->appends(request()->query())}}
			</div>
			@endif
		</div>
	</div>
</div>
@endsection