
 {!! Form::hidden('form', $form) !!}

 <section class="basic-elements">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">@lang('main.regions')</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="row">
                            
                            @if($form == 'adding')
                            <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    {!! Form::label('aname',trans('main.aname'), ['class' => 'col-xl-6  '.trans('main.style.pull').' control-label']) !!}
                                    {!!  Form::text('name_arabic',old('name_arabic'),
                                    ['required', 'id'=>"name_arabic",'class'=>"form-control"]) !!}
                                </fieldset>
                            </div>

                            <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    {!! Form::label('ename',trans('main.ename'), ['class' => 'col-xl-8  '.trans('main.style.pull').' control-label']) !!}
                                    {!!  Form::text('name_english',old('name_english'),
                                    ['required', 'id'=>"name_english",'class'=>"form-control"]) !!}
                                </fieldset>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    {!! Form::label('price',trans('main.deliveryPrice'), ['class' => 'col-md-6  '.trans('main.style.pull').' control-label']) !!}
                                    {!!  Form::number('price',old('order'),['required', 'id'=>"order",'class'=>"form-control"]) !!}
                                </fieldset>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    {!! Form::label('visible',trans('main.visibility'), ['class' => 'col-md-4  '.trans('main.style.pull').' control-label']) !!}
                                    {!! Form::select('visible',trans('main.yes_no'),null,['class'=>'form-control select2l']) !!}
                                </fieldset>
                            </div>
                            @else @if($form == 'editing')
                            <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    {!! Form::label('aname',trans('main.aname'), ['class' => 'col-xl-6  '.trans('main.style.pull').' control-label']) !!}
                                    {!!  Form::text('name_arabic',value($region->translate('ar')->name),
                                    ['required', 'id'=>"name_arabic",'class'=>"form-control"]) !!}
                                </fieldset>
                            </div>
                            
                            <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    {!! Form::label('ename',trans('main.ename'), ['class' => 'col-xl-8  '.trans('main.style.pull').' control-label']) !!}
                                    {!!  Form::text('name_english',value($region->translate('en')->name),
                                    ['required', 'id'=>"name_english",'class'=>"form-control"]) !!}
                                </fieldset>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    {!! Form::label('price',trans('main.deliveryPrice'), ['class' => 'col-md-6  '.trans('main.style.pull').' control-label']) !!}
                                    {!!  Form::number('price',value($region->translate('en')->price),
                                    ['required', 'id'=>"order",'class'=>"form-control"]) !!}
                                </fieldset>
                            </div>

                                @if($region->translate('en')->visible == 1)
                                <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                    <fieldset class="form-group">
                                        {!! Form::label('visible',trans('main.visibility'), ['class' => 'col-md-4  '.trans('main.style.pull').' control-label']) !!}
                                        {!! Form::select('visible',trans('main.yes'),null,['class'=>'form-control select2l']) !!}
                                    </fieldset>
                                </div>
                                
                                @else 
                                <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                    <fieldset class="form-group">
                                        {!! Form::label('visible',trans('main.visibility'), ['class' => 'col-md-4  '.trans('main.style.pull').' control-label']) !!}
                                        {!! Form::select('visible',trans('main.no'),null,['class'=>'form-control select2l']) !!}
                                    </fieldset>
                                </div>
                                
                                @endif

                            @endif
                            @endif
                           
                            
                        </div>
                        <div class="form-group overflow-hidden">
                            <div class="col-12">
                                <button data-repeater-create="" class="btn btn-primary btn-lg">
                                    <i class="icon-plus4"></i>  {{$btn}}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



