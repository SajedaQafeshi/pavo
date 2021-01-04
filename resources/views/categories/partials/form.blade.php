
 {!! Form::hidden('form', $form) !!}

<section class="basic-elements">
   <div class="row">
       <div class="col-md-12">
           <div class="card">
               <div class="card-header">
                   <h4 class="card-title">@lang('main.categories')</h4>
               </div>
               <div class="card-content">
                   <div class="card-body">
                       <div class="row">

                        @if($form == 'adding')
                            <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                               <fieldset class="form-group">
                                   {!! Form::label('aname',trans('main.aname'), ['class' => 'col-xl-6  '.trans('main.style.pull').' control-label']) !!}
                                   {!!  Form::text('name_arabic',old('name_arabic'),['required','id'=>"name_arabic",'class'=>"form-control"]) !!}
                               </fieldset>
                           </div>
                           <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                               <fieldset class="form-group">
                                   {!! Form::label('ename',trans('main.ename'), ['class' => 'col-xl-8  '.trans('main.style.pull').' control-label']) !!}
                                   {!!  Form::text('name_english',old('name_english'),['required','id'=>"name_english",'class'=>"form-control"]) !!}
                               </fieldset>
                           </div>

                           <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                               <fieldset class="form-group">
                                   {!! Form::label('visible',trans('main.visibility'), ['class' => 'col-md-4  '.trans('main.style.pull').' control-label']) !!}
                                   {!! Form::select('visible',trans('main.yes_no'),null,['class'=>'form-control select2l']) !!}
                               </fieldset>
                           </div>

                           <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    {!! Form::label('image',trans('main.categoryImage'), ['class' => 'col-md-4  '.trans('main.style.pull').' control-label']) !!}
                                    {!! Form::file('image',old('image'),['id'=>"image",'class'=>"form-control"]) !!}
                                </fieldset>
                            </div>

                        @else  @if($form == 'editing')

                            <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                               <fieldset class="form-group">
                                   {!! Form::label('aname',trans('main.aname'), ['class' => 'col-xl-6  '.trans('main.style.pull').' control-label']) !!}
                                   {!!  Form::text('name_arabic',value($category->translate('ar')->name),['required','id'=>"name_arabic",'class'=>"form-control"]) !!}
                               </fieldset>
                           </div>
                           <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                               <fieldset class="form-group">
                                   {!! Form::label('ename',trans('main.ename'), ['class' => 'col-xl-8  '.trans('main.style.pull').' control-label']) !!}
                                   {!!  Form::text('name_english',value($category->translate('en')->name),['required','id'=>"name_english",'class'=>"form-control"]) !!}
                               </fieldset>
                           </div>

                            @if($category->translate('en')->visible == 1)
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
                            <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    {!! Form::label('image',trans('main.categoryImage'), ['class' => 'col-md-4  '.
                                    trans('main.style.pull').' control-label']) !!}
                                    <img src="{{'/storage/category/'. $category->translate('ar')->image}}"
                                        class="img-responsive" style="width:50%; height:80px; object-fit: contain">
                                    
                                </fieldset>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    {!! Form::label('image',trans('main.categoryImageNew'), ['class' => 'col-md-4  '.trans('main.style.pull').' control-label']) !!}
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



