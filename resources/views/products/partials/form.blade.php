
 {!! Form::hidden('form', $form) !!}

<section class="basic-elements">
   <div class="row">
       <div class="col-md-12">
           <div class="card">
               <div class="card-header">
                   <h4 class="card-title">@lang('main.products')</h4>
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
                          
                           {!!  Form::text('category_id',value($category->id),
                                   ['hidden'=>"true",]) !!}
                           
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
                                    {!! Form::label('price',trans('main.price'), ['class' => 'col-md-6  '.trans('main.style.pull').' control-label']) !!}
                                    {!!  Form::number('price',old('price'),['required','id'=>"price",'class'=>"form-control"]) !!}
                                </fieldset>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    {!! Form::label('wholesale',trans('main.wholesale'), ['class' => 'col-md-6  '.trans('main.style.pull').' control-label']) !!}
                                    {!!  Form::number('wholesale',old('wholesale'),['required','id'=>"wholesale",'class'=>"form-control"]) !!}
                                </fieldset>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    {!! Form::label('disposal',trans('main.disposal'), ['class' => 'col-md-6  '.trans('main.style.pull').' control-label']) !!}
                                    {!!  Form::number('disposal',old('disposal'),['required','id'=>"disposal",'class'=>"form-control"]) !!}
                                </fieldset>
                            </div>
                           
                           <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    {!! Form::label('amount',trans('main.amount'), ['class' => 'col-md-6  '.trans('main.style.pull').' control-label']) !!}
                                    {!!  Form::number('amount',old('amount'),['required','id'=>"amount",'class'=>"form-control"]) !!}
                                </fieldset>
                            </div>
                            
                            <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    {!! Form::label('point_counter','نقاط المنتج', ['class' => 'col-md-6  '.trans('main.style.pull').' control-label']) !!}
                                    {!!  Form::number('point_counter',old('point_counter'),['required','id'=>"point_counter",'class'=>"form-control"]) !!}
                                </fieldset>
                            </div>

                           <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                               <fieldset class="form-group">
                                   {!! Form::label('image',trans('main.categoryImage'), 
                                   ['class' => 'col-md-8  '.trans('main.style.pull').' control-label']) !!}
                                   {!! Form::file('image',old('image'),['required','id'=>"image",'class'=>"form-control"]) !!}
                               </fieldset>
                           </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                               <fieldset class="form-group">
                                   {!! Form::label('description_arabic',trans('main.arabicDescription'), ['class' => 'col-xl-8  '.trans('main.style.pull').' control-label']) !!}
                                   {!! Form::textarea('description_arabic',old('description_arabic'),['required','rows'=>3,'id'=>"description_arabic",'class'=>"form-control"]) !!}
                               </fieldset>
                           </div>
                           <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                               <fieldset class="form-group">
                                   {!! Form::label('description_english',trans('main.englishDescription'), ['class' => 'col-xl-8  '.trans('main.style.pull').' control-label']) !!}
                                   {!! Form::textarea('description_english',
                                   old('description_english')
                                   ,['required','rows'=>3, 'id'=>"description_arabic",'class'=>"form-control"]) !!}
                              
                               </fieldset>
                           </div>
                           
                           <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                {!! Form::label('photos[]',trans('main.productsImages'), 
                                ['class' => 'col-xl-8  '.trans('main.style.pull').' control-label']) !!}
                                   {!! Form::file('photos[]',
                                   ['multiple'=>'multiple', 'class'=>"form-control"]) !!}
                            
                                </fieldset>
                            </div> 
                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                <fieldset >
                                    <div class="col-md-12">
                                        <div >
                                            الأحجام 
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row">
                                        
                                        <div class="p-1">
                                            <div class="form-group">
                                                <input class="radiochoosen" id="name1" 
                                                type="checkbox" name="name[]" value="S" >
                                                <label for="name1" class="choice-button-text">S</label>
                                            </div> 
                                        </div>
                                        <div class="p-1">
                                            <div class="form-group">
                                                <input class="radiochoosen" id="name2" type="checkbox" 
                                                name="name[]" value="L">
                                                <label for="name2" class="choice-button-text">L</label>
                                            </div> 
                                        </div>
                                        <div class="p-1">
                                            <div class="form-group">
                                                <input class="radiochoosen" id="name3" type="checkbox"
                                                name="name[]" value="M" >
                                                <label for="name3" class="choice-button-text">M</label>
                                            </div> 
                                        </div>
                                        <div class="p-1">
                                            <div class="form-group">
                                                <input class="radiochoosen" id="name4" type="checkbox" 
                                                name="name[]" value="XL" >
                                                <label for="name4" class="choice-button-text">XL</label>
                                            </div> 
                                        </div>
                                        <div class="p-1">
                                            <div class="form-group">
                                                <input class="radiochoosen" id="name5" type="checkbox" 
                                                name="name[]" value="XXL">
                                                <label for="name5" class="choice-button-text">XXL</label>
                                            </div> 
                                        </div>
                                        <div class="p-1">
                                            <div class="form-group">
                                                <input class="radiochoosen" id="name6" type="checkbox" 
                                                name="name[]" value="XXXL">
                                                <label for="name6" class="choice-button-text">XXXL</label>
                                            </div> 
                                        </div>
                                        <div class="p-1">
                                            <div class="form-group">
                                                <input class="radiochoosen" id="name7" type="checkbox" 
                                                name="name[]" value="one-size">
                                                <label for="name7" class="choice-button-text">One Size</label>
                                            </div> 
                                        </div>
                                    </div>
                                    
                                </fieldset>
                            </div>
                            
                            <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                    <fieldset class="form-group">
                                        {!! Form::label('color[]','الألوان', ['class' => 'col-xl-6  '.
                                        trans('main.style.pull').' control-label']) !!}

                                            <input type="color" name="colors[]" id="colors" 
                                            class="form-control-color" required>
                                            <input type="text" name="attachments[]" id="attachments" hidden>
                                    </fieldset>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-12 mb-1" id="colorsChosen">
                                    <fieldset class="form-group">
                                    </fieldset>
                                </div>
                            </div>
                            @else  @if($form == 'editing')
                            <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                               <fieldset class="form-group">
                                   {!! Form::label('aname',trans('main.aname'), ['class' => 'col-xl-6  '.trans('main.style.pull').' control-label']) !!}
                                   {!!  Form::text('name_arabic',value($product->translate('ar')->name),['required','id'=>"name_arabic",'class'=>"form-control"]) !!}
                               </fieldset>
                           </div>
                           <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                               <fieldset class="form-group">
                                   {!! Form::label('ename',trans('main.ename'), ['class' => 'col-xl-8  '.trans('main.style.pull').' control-label']) !!}
                                   {!!  Form::text('name_english',value($product->translate('en')->name),['required','id'=>"name_english",'class'=>"form-control"]) !!}
                               </fieldset>
                           </div>

                            @if($product->translate('en')->visible == 1)
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
                                    {!! Form::label('price',trans('main.price'), ['class' => 'col-md-6  '.trans('main.style.pull').' control-label']) !!}
                                    {!!  Form::number('price',value($product->translate('ar')->price),['required','id'=>"price",'class'=>"form-control"]) !!}
                                </fieldset>
                            </div>

                            <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    {!! Form::label('wholesale',trans('main.wholesale'), ['class' => 'col-md-6  '.trans('main.style.pull').' control-label']) !!}
                                    {!!  Form::number('wholesale',value($product->translate('ar')->wholesale),['required','id'=>"wholesale",'class'=>"form-control"]) !!}
                                </fieldset>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    {!! Form::label('disposal',trans('main.disposal'), ['class' => 'col-md-6  '.trans('main.style.pull').' control-label']) !!}
                                    {!!  Form::number('disposal',value($product->translate('ar')->disposal),['required','id'=>"disposal",'class'=>"form-control"]) !!}
                                </fieldset>
                            </div>

                            <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    {!! Form::label('amount',trans('main.amount'), ['class' => 'col-md-6  '.trans('main.style.pull').' control-label']) !!}
                                    {!!  Form::number('amount',value($product->translate('ar')->amount),['required','id'=>"amount",'class'=>"form-control"]) !!}
                                </fieldset>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    {!! Form::label('point_counter','نقاط المنتج', ['class' => 'col-md-6  '.trans('main.style.pull').' control-label']) !!}
                                    {!!  Form::number('point_counter',value($product->translate('ar')->point_counter),['required','id'=>"point_counter",'class'=>"form-control"]) !!}
                                </fieldset>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    {!! Form::label('image',trans('main.categoryImage'), ['class' => 'col-md-4  '.
                                    trans('main.style.pull').' control-label']) !!}
                                    <img src="{{'/storage/product/'. $product->translate('ar')->image}}"
                                        class="img-responsive" style="width:50%; height:80px; object-fit: contain">
                                    
                                </fieldset>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    {!! Form::label('image',trans('main.categoryImageNew'), ['class' => 'col-md-4  '.trans('main.style.pull').' control-label']) !!}
                                    {!! Form::file('image',old('image'),['id'=>"image",'class'=>"form-control"]) !!}
                                </fieldset>
                            </div>
                            
                            
                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                               <fieldset class="form-group">
                                   {!! Form::label('description_arabic',trans('main.arabicDescription'), ['class' => 'col-xl-8  '.trans('main.style.pull').' control-label']) !!}
                                   {!! Form::textarea('description_arabic',value($product->translate('ar')->description),['required','rows'=>3,'id'=>"description_arabic",'class'=>"form-control"]) !!}
                               </fieldset>
                           </div>
                           <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                               <fieldset class="form-group">
                                   {!! Form::label('description_english',trans('main.englishDescription'), ['class' => 'col-xl-8  '.trans('main.style.pull').' control-label']) !!}
                                   {!! Form::textarea('description_english',
                                    value($product->translate('en')->description)
                                   ,['rows'=>3, 'required','id'=>"description_arabic",'class'=>"form-control"]) !!}
                              
                               </fieldset>
                           </div>
                           <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                {!! Form::label('photos[]',trans('main.productsImages'), ['class' => 'col-xl-8  '.trans('main.style.pull').' control-label']) !!}
                                {!! Form::file('photos[]',
                                ['multiple'=>'multiple', 'class'=>"form-control"]) !!}
                            
                                </fieldset>
                            </div>
                           <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                <fieldset >
                                    <div class="col-md-12">
                                        <div >
                                            الأحجام 
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row">
                                        @if (strlen(strpos($sizes, 'S')))
                                        <div class="p-1">
                                            <div class="form-group">
                                                <input class="radiochoosen" id="name1" 
                                                type="checkbox" name="name[]" value="S" checked>
                                                <label for="name1" class="choice-button-text">S</label>
                                            </div> 
                                        </div>
                                        @else
                                        <div class="p-1">
                                            <div class="form-group">
                                                <input class="radiochoosen" id="name1" 
                                                type="checkbox" name="name[]" value="S">
                                                <label for="name1" class="choice-button-text">S</label>
                                            </div> 
                                        </div>
                                        @endif

                                        @if (strlen(strpos($sizes, 'L')))
                                        <div class="p-1">
                                            <div class="form-group">
                                                <input class="radiochoosen" id="name2" type="checkbox" 
                                                name="name[]" value="L" checked>
                                                <label for="name2" class="choice-button-text">L</label>
                                            </div> 
                                        </div>
                                        @else
                                        <div class="p-1">
                                            <div class="form-group">
                                                <input class="radiochoosen" id="name2" type="checkbox" 
                                                name="name[]" value="L">
                                                <label for="name2" class="choice-button-text">L</label>
                                            </div> 
                                        </div>
                                        @endif

                                        @if (strlen(strpos($sizes, 'M')))
                                        <div class="p-1">
                                            <div class="form-group">
                                                <input class="radiochoosen" id="name3" type="checkbox"
                                                name="name[]" value="M" checked>
                                                <label for="name3" class="choice-button-text">M</label>
                                            </div> 
                                        </div>
                                        @else 
                                        <div class="p-1">
                                            <div class="form-group">
                                                <input class="radiochoosen" id="name3" type="checkbox"
                                                name="name[]" value="M">
                                                <label for="name3" class="choice-button-text">M</label>
                                            </div> 
                                        </div>
                                        @endif

                                        @if (strlen(strpos($sizes, 'XL')))
                                        <div class="p-1">
                                            <div class="form-group">
                                                <input class="radiochoosen" id="name4" type="checkbox" 
                                                name="name[]" value="XL" checked>
                                                <label for="name4" class="choice-button-text">XL</label>
                                            </div> 
                                        </div>
                                        @else 
                                        <div class="p-1">
                                            <div class="form-group">
                                                <input class="radiochoosen" id="name4" type="checkbox" 
                                                name="name[]" value="XL">
                                                <label for="name4" class="choice-button-text">XL</label>
                                            </div> 
                                        </div>
                                        @endif

                                        @if (strlen(strpos($sizes, 'XXL')))
                                        <div class="p-1">
                                            <div class="form-group">
                                                <input class="radiochoosen" id="name5" type="checkbox" 
                                                name="name[]" value="XXL"checked>
                                                <label for="name5" class="choice-button-text">XXL</label>
                                            </div> 
                                        </div>
                                        @else
                                        <div class="p-1">
                                            <div class="form-group">
                                                <input class="radiochoosen" id="name5" type="checkbox" 
                                                name="name[]" value="XXL">
                                                <label for="name5" class="choice-button-text">XXL</label>
                                            </div> 
                                        </div>
                                        @endif
                                        @if (strlen(strpos($sizes, 'XXXL')))
                                        <div class="p-1">
                                            <div class="form-group">
                                                <input class="radiochoosen" id="name6" type="checkbox" 
                                                name="name[]" value="XXXL"checked>
                                                <label for="name6" class="choice-button-text">XXXL</label>
                                            </div> 
                                        </div>
                                        @else
                                        <div class="p-1">
                                            <div class="form-group">
                                                <input class="radiochoosen" id="name6" type="checkbox" 
                                                name="name[]" value="XXXL">
                                                <label for="name6" class="choice-button-text">XXXL</label>
                                            </div> 
                                        </div>

                                        @endif
                                        @if (strlen(strpos($sizes, 'one-size')))
                                        <div class="p-1">
                                            <div class="form-group">
                                                <input class="radiochoosen" id="name7" type="checkbox" 
                                                name="name[]" value="one-size"checked>
                                                <label for="name7" class="choice-button-text">One Size</label>
                                            </div> 
                                        </div>
                                        @else
                                        <div class="p-1">
                                            <div class="form-group">
                                                <input class="radiochoosen" id="name7" type="checkbox" 
                                                name="name[]" value="one-size">
                                                <label for="name7" class="choice-button-text">One Size</label>
                                            </div> 
                                        </div>
                                        @endif
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                    <fieldset class="form-group">
                                        {!! Form::label('color[]','الألوان', ['class' => 'col-xl-6  '.
                                        trans('main.style.pull').' control-label']) !!}

                                            <input type="color" name="colors[]" id="colors" class="form-control-color">
                                            <input type="text" name="attachments[]" id="attachments" hidden>
                                    </fieldset>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-12 mb-1" id="colorsChosen">
                                    <fieldset class="form-group">
                                    </fieldset>
                                </div>
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

