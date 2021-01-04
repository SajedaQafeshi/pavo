
 {!! Form::hidden('form', $form) !!}

<section class="basic-elements">
   <div class="row">
       <div class="col-md-12">
           <div class="card">
               <div class="card-header">
                   <h4 class="card-title">الاشتراكات</h4>
               </div>
               <div class="card-content">
                   <div class="card-body">
                       <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                               <fieldset class="form-group">
                                   {!! Form::label('title','عنوان الايميل', ['class' => 'col-xl-6  '.trans('main.style.pull').' control-label']) !!}
                                   {!!  Form::text('title',old('title'),['id'=>"title",'class'=>"form-control"]) !!}
                               </fieldset>
                           </div>
                           <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                               <fieldset class="form-group">
                                   {!! Form::label('discount','الخصم', ['class' => 'col-xl-8  '.trans('main.style.pull').' control-label']) !!}
                                   {!!  Form::number('discount',old('discount'),['id'=>"discount",'class'=>"form-control"]) !!}
                               </fieldset>
                           </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                               <fieldset class="form-group">
                                   {!! Form::label('body','محتوى الايميل', ['class' => 'col-xl-8  '.trans('main.style.pull').' control-label']) !!}
                                   {!! Form::textarea('body',old('body'),['rows'=>3,'id'=>"body",'class'=>"form-control"]) !!}
                               </fieldset>
                           </div>
                        @if($form == 'adding')
                           <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    {!! Form::label('image','صورة', ['class' => 'col-md-4  '.trans('main.style.pull').' control-label']) !!}
                                    {!! Form::file('image',old('image'),['id'=>"image",'class'=>"form-control"]) !!}
                                </fieldset>
                            </div>

                        @else  @if($form == 'editing')
                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    {!! Form::label('image','الصورة المختارة', ['class' => 'col-md-4  '.
                                    trans('main.style.pull').' control-label']) !!}
                                    <img src="{{'/storage/subscribtions/'. $subscribe->image}}"
                                        class="img-responsive" style="width:50%; height:80px; object-fit: contain">
                                    
                                </fieldset>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    {!! Form::label('image','تغيير الصورة', ['class' => 'col-md-4  '.trans('main.style.pull').' control-label']) !!}
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



