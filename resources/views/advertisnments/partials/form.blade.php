
 {!! Form::hidden('form', $form) !!}

 <section class="basic-elements">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">@lang('الاعلانات')</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="row">
                            
                            @if($form == 'adding')
                            <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    {!! Form::label('title_arabic',trans('main.titleArabic'), ['class' => 'col-xl-6  '.trans('main.style.pull').' control-label']) !!}
                                    {!!  Form::text('title_arabic',old('title_arabic'),['required','id'=>"title_arabic",'class'=>"form-control"]) !!}
                                </fieldset>
                            </div>

                            <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    {!! Form::label('title_english',trans('main.titleEnglish'), ['class' => 'col-xl-8  '.trans('main.style.pull').' control-label']) !!}
                                    {!!  Form::text('title_english',old('title_english'),
                                    ['required','id'=>"title_english",'class'=>"form-control"]) !!}
                                </fieldset>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    {!! Form::label('type',trans('main.advertType'), ['class' => 'col-md-4  '.trans('main.style.pull').' control-label']) !!}
                                    {!! Form::select('type',trans('main.main_major'),null,['class'=>'form-control select2l']) !!}
                                </fieldset>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    {!! Form::label('description_arabic',trans('main.descriptionArabic'), ['class' => 'col-xl-6  '.trans('main.style.pull').' control-label']) !!}
                                    {!! Form::textarea('description_arabic',old('description_arabic'),
                                    ['required','rows'=>3,'id'=>"description_arabic",'class'=>"form-control"]) !!}
                                </fieldset>
                            </div>

                            <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    {!! Form::label('description_english',trans('main.descriptionEnglish'), ['class' => 'col-xl-8  '.trans('main.style.pull').' control-label']) !!}
                                    {!! Form::textarea('description_english',
                                    old('description_english'),['required','rows'=>3,'id'=>"description_english",
                                    'class'=>"form-control"]) !!}
                                </fieldset>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    {!! Form::label('visible',trans('main.visibility'), ['class' => 'col-md-4  '.trans('main.style.pull').' control-label']) !!}
                                    {!! Form::select('visible',trans('main.yes_no'),null,['class'=>'form-control select2l']) !!}
                                </fieldset>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    {!! Form::label('image',trans('main.advertImage'), ['class' => 'col-md-4  '.trans('main.style.pull').' control-label']) !!}
                                    {!! Form::file('image',old('image'),['id'=>"image",'class'=>"form-control"]) !!}
                                </fieldset>
                            </div>

                            @else @if($form == 'editing')
                            <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    {!! Form::label('title_arabic',trans('main.titleArabic'), ['class' => 'col-xl-6  '.trans('main.style.pull').' control-label']) !!}
                                    {!!  Form::text('title_arabic',value($advertisnment->translate('ar')->title),
                                    ['required','id'=>"title_arabic",'class'=>"form-control"]) !!}
                                </fieldset>
                            </div>
                            
                            <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    {!! Form::label('title_english',trans('main.titleEnglish'), ['class' => 'col-xl-8  '.trans('main.style.pull').' control-label']) !!}
                                    {!!  Form::text('title_english',
                                    value($advertisnment->translate('en')->title),
                                    ['required','id'=>"title_english",'class'=>"form-control"]) !!}
                                </fieldset>
                            </div>
                                @if($advertisnment->translate('en')->type == "main")
                                <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                    <fieldset class="form-group">
                                        {!! Form::label('type',trans('main.advertType'), ['class' => 'col-md-4  '.trans('main.style.pull').' control-label']) !!}
                                        {!! Form::select('type',trans('main.main'),null,['class'=>'form-control select2l']) !!}
                                    </fieldset>
                                </div>
                                
                                @else 
                                <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                    <fieldset class="form-group">
                                        {!! Form::label('type',trans('main.advertType'), ['class' => 'col-md-4  '.trans('main.style.pull').' control-label']) !!}
                                        {!! Form::select('type',trans('main.major'),null,['class'=>'form-control select2l']) !!}
                                    </fieldset>
                                </div>
                                
                                @endif


                            <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    {!! Form::label('description_arabic',trans('main.descriptionArabic'), ['class' => 'col-xl-6  '.trans('main.style.pull').' control-label']) !!}
                                    {!! Form::textarea('description_arabic',
                                    value($advertisnment->translate('ar')->description),
                                    ['required','rows'=>3,'id'=>"description_arabic",'class'=>"form-control"]) !!}
                                </fieldset>
                            </div>

                            <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    {!! Form::label('description_english',trans('main.descriptionEnglish'), ['class' => 'col-xl-8  '.trans('main.style.pull').' control-label']) !!}
                                    {!! Form::textarea('description_english',
                                    value($advertisnment->translate('en')->description),['required','rows'=>3,'id'=>"description_english",
                                    'class'=>"form-control"]) !!}
                                </fieldset>
                            </div>
                            

                                @if($advertisnment->translate('en')->visible == 1)
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

                                <div class="col-xl-12 col-lg-6 col-md-12 mb-1">
                                    <fieldset class="form-group">
                                        {!! Form::label('image','صورة الاعلان', ['class' => 'col-md-4  '.
                                        trans('main.style.pull').' control-label']) !!}
                                        <img src="{{'/storage/advertisnment/'. $advertisnment->translate('ar')->image}}"
                                            class="img-responsive" style="width:60%; height:560%; ">
                                        
                                    </fieldset>
                                </div>
                                
                                    <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                    <fieldset class="form-group">
                                        {!! Form::label('image','تغيير صورة الاعلان', ['class' => 'col-md-4  '.trans('main.style.pull').' control-label']) !!}
                                        {!! Form::file('image',old('image'),['id'=>"image",'class'=>"form-control"]) !!}
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



