<div class="row">


    <div class="col-xl-3 col-lg-6 col-md-12 mb-1">
        <fieldset class="form-group">
            {!! Form::label('name',trans('main.name'), ['class' => '  '.trans('main.style.pull').' control-label']) !!}
            {!!  Form::text('name',Request::get('name'), ['id'=>"name",'class'=>"form-control"]) !!}
        </fieldset>
    </div>



    <div class="col-xl-3 col-lg-6 col-md-12 mb-1">
        <fieldset class="form-group">
            {!! Form::label('email',trans('main.email'), ['class' => '  '.trans('main.style.pull').' control-label']) !!}
            {!!  Form::text('email',Request::get('email'), ['id'=>"email",'class'=>"form-control"]) !!}
        </fieldset>
    </div>


  <div class="col-xl-3 col-lg-6 col-md-12 mb-1">
        <fieldset class="form-group">
            {!! Form::label('mobile',trans('main.mobile'), ['class' => '  '.trans('main.style.pull').' control-label']) !!}
            {!!  Form::text('mobile',Request::get('mobile'), ['id'=>"mobile",'class'=>"form-control"]) !!}
        </fieldset>
    </div>

    <div class="col-xl-3 col-lg-6 col-md-12 mb-1">
        <fieldset class="form-group">
            {!! Form::label('username',trans('main.username'), ['class' => '  '.trans('main.style.pull').' control-label']) !!}
            {!!  Form::text('username',Request::get('username'), ['id'=>"username",'class'=>"form-control"]) !!}
        </fieldset>
    </div>


	<div class="col-xl-3 col-lg-6 col-md-12 mb-1">
        <fieldset class="form-group">
            {!! Form::label('region_id',trans('main.region'), ['class' => '  '.trans('main.style.pull').' control-label']) !!}
            {!! Form::select('region_id',$regions,Request::get('region_id'),['class'=>'form-control','id'=>'region_id']) !!}
        </fieldset>
	</div>


  <div class="col-xl-3 col-lg-6 col-md-12 mb-1">
        <fieldset class="form-group">
            {!! Form::label('seller_name',trans('main.seller_name'), ['class' => '  '.trans('main.style.pull').' control-label']) !!}
            {!!  Form::text('seller_name',Request::get('seller_name'), ['id'=>"seller_name",'class'=>"form-control"]) !!}
        </fieldset>
    </div>

     <div class="col-xl-3 col-lg-6 col-md-12 mb-1">
        <fieldset class="form-group">
            {!! Form::label('seller_mobile',trans('main.seller_mobile'), ['class' => '  '.trans('main.style.pull').' control-label']) !!}
            {!!  Form::text('seller_mobile',Request::get('seller_mobile'), ['id'=>"seller_mobile",'class'=>"form-control"]) !!}
        </fieldset>
    </div>

    <div class="col-xl-3 col-lg-6 col-md-12 mb-1">
        <fieldset class="form-group">
            {!! Form::label('seller_email',trans('main.seller_email'), ['class' => '  '.trans('main.style.pull').' control-label']) !!}
            {!!  Form::text('seller_email',Request::get('seller_email'), ['id'=>"seller_email",'class'=>"form-control"]) !!}
        </fieldset>
    </div>









</div>