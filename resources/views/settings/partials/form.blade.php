
 {!! Form::hidden('form', $form) !!}

 <section class="basic-elements">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">@lang('main.settings')</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="row">
                            @if($form == 'adding')
                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                   {!! Form::label('about_us',trans('main.about_us'), ['class' => 'col-xl-8  '.trans('main.style.pull').' control-label']) !!}
                                   {!! Form::textarea('about_us',
                                   old('about_us')
                                   ,['rows'=>3, 'required', 'id'=>"about_us",'class'=>"form-control"]) !!}
                              
                               </fieldset>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                   {!! Form::label('about_us_english',trans('main.about_us_english'), ['class' => 'col-xl-8  '.trans('main.style.pull').' control-label']) !!}
                                   {!! Form::textarea('about_us_english',
                                   old('about_us_english')
                                   ,['required', 'rows'=>3, 'id'=>"about_us_english",'class'=>"form-control"]) !!}
                              
                               </fieldset>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                   {!! Form::label('delivery',trans('main.delivery'), ['class' => 'col-xl-8  '.trans('main.style.pull').' control-label']) !!}
                                   {!! Form::textarea('delivery',
                                   old('delivery')
                                   ,['required', 'rows'=>3, 'id'=>"delivery",'class'=>"form-control"]) !!}
                              
                               </fieldset>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                   {!! Form::label('delivery_english',trans('main.delivery_english'), ['class' => 'col-xl-8  '.trans('main.style.pull').' control-label']) !!}
                                   {!! Form::textarea('delivery_english',
                                   old('delivery_english')
                                   ,['required', 'rows'=>3, 'id'=>"delivery_english",'class'=>"form-control"]) !!}
                              
                               </fieldset>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                   {!! Form::label('about_products',trans('main.about_products'), ['class' => 'col-xl-8  '.trans('main.style.pull').' control-label']) !!}
                                   {!! Form::textarea('about_products',
                                   old('about_products')
                                   ,['required', 'rows'=>3, 'id'=>"about_products",'class'=>"form-control"]) !!}
                              
                               </fieldset>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                   {!! Form::label('about_products_english',trans('main.about_products_english'), ['class' => 'col-xl-8  '.trans('main.style.pull').' control-label']) !!}
                                   {!! Form::textarea('about_products_english',
                                   old('about_products_english')
                                   ,['required', 'rows'=>3, 'id'=>"about_products_english",'class'=>"form-control"]) !!}
                              
                               </fieldset>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                   {!! Form::label('support',trans('main.support'), ['class' => 'col-xl-8  '.trans('main.style.pull').' control-label']) !!}
                                   {!! Form::textarea('support',
                                   old('support')
                                   ,['required', 'rows'=>3, 'id'=>"support",'class'=>"form-control"]) !!}
                              
                               </fieldset>
                            </div>
                             <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                   {!! Form::label('support_english',trans('main.support_english'), ['class' => 'col-xl-8  '.trans('main.style.pull').' control-label']) !!}
                                   {!! Form::textarea('support_english',
                                   old('support_english')
                                   ,['required', 'rows'=>3, 'id'=>"support_english",'class'=>"form-control"]) !!}
                              
                               </fieldset>
                            </div>

                            @else  @if($form == 'editing')
                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                   {!! Form::label('about_us',trans('main.about_us'), ['class' => 'col-xl-8  '.trans('main.style.pull').' control-label']) !!}
                                   {!! Form::textarea('about_us',value($setting->translate('ar')->about_us)
                                   ,['required', 'rows'=>3, 'id'=>"about_us",'class'=>"form-control"]) !!}
                              
                               </fieldset>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                   {!! Form::label('about_us_english',trans('main.about_us_english'), ['class' => 'col-xl-8  '.trans('main.style.pull').' control-label']) !!}
                                   {!! Form::textarea('about_us_english',value($setting->translate('en')->about_us)
                                   ,['required', 'rows'=>3, 'id'=>"about_us_english",'class'=>"form-control"]) !!}
                              
                               </fieldset>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                   {!! Form::label('delivery',trans('main.delivery'), ['class' => 'col-xl-8  '.trans('main.style.pull').' control-label']) !!}
                                   {!! Form::textarea('delivery',
                                    value($setting->translate('ar')->delivery)
                                   ,['required', 'rows'=>3, 'id'=>"delivery",'class'=>"form-control"]) !!}
                              
                               </fieldset>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                   {!! Form::label('delivery_english',trans('main.delivery_english'), ['class' => 'col-xl-8  '.trans('main.style.pull').' control-label']) !!}
                                   {!! Form::textarea('delivery_english',
                                    value($setting->translate('en')->delivery)
                                   ,['required', 'rows'=>3, 'id'=>"delivery_english",'class'=>"form-control"]) !!}
                              
                               </fieldset>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                   {!! Form::label('about_products',trans('main.about_products'), ['class' => 'col-xl-8  '.trans('main.style.pull').' control-label']) !!}
                                   {!! Form::textarea('about_products',
                                    value($setting->translate('ar')->about_products)
                                   ,['required', 'rows'=>3, 'id'=>"about_products",'class'=>"form-control"]) !!}
                              
                               </fieldset>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                   {!! Form::label('about_products_english',trans('main.about_products_english'), ['class' => 'col-xl-8  '.trans('main.style.pull').' control-label']) !!}
                                   {!! Form::textarea('about_products_english',
                                    value($setting->translate('en')->about_products)
                                   ,['required', 'rows'=>3, 'id'=>"about_products_english",'class'=>"form-control"]) !!}
                              
                               </fieldset>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                   {!! Form::label('support',trans('main.support'), ['class' => 'col-xl-8  '.trans('main.style.pull').' control-label']) !!}
                                   {!! Form::textarea('support',
                                    value($setting->translate('ar')->support)
                                   ,['required', 'rows'=>3, 'id'=>"support",'class'=>"form-control"]) !!}
                              
                               </fieldset>
                            </div>
                             <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                   {!! Form::label('support_english',trans('main.support_english'), ['class' => 'col-xl-8  '.trans('main.style.pull').' control-label']) !!}
                                   {!! Form::textarea('support_english',
                                    value($setting->translate('en')->support)
                                   ,['required', 'rows'=>3, 'id'=>"support_english",'class'=>"form-control"]) !!}
                              
                               </fieldset>
                            </div>

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



