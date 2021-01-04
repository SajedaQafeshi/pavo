
 {!! Form::hidden('form', $form) !!}

<section class="basic-elements">
   <div class="row">
       <div class="col-md-12">
           <div class="card">
               <div class="card-header">
                   <h4 class="card-title">أكواد الخصم</h4>
               </div>
               <div class="card-content">
                   <div class="card-body">
                       <div class="row">
                            <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                               <fieldset class="form-group">
                                   {!! Form::label('code','كود الخصم', ['class' => 'col-xl-6  '.trans('main.style.pull').' control-label']) !!}
                                   {!!  Form::text('code',old('code'),['required', 'id'=>"code",'class'=>"form-control"]) !!}
                               </fieldset>
                           </div>
                           <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                               <fieldset class="form-group">
                                   {!! Form::label('value','قيمة الخصم', ['class' => 'col-xl-8  '.trans('main.style.pull').' control-label']) !!}
                                   {!!  Form::number('value',old('value'),['required', 'id'=>"value",'class'=>"form-control"]) !!}
                               </fieldset>
                           </div>

                           <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    {!! Form::label('date_from','من تاريخ', 
                                    ['class' => 'col-xl-6  '.trans('main.style.pull').' control-label']) !!}
                                    {!!  Form::date('date_from',old('date_from'),['required', 'id'=>"date_from",'class'=>"text-center form-control"]) !!}

                                </fieldset>
                           </div>

                           <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    {!! Form::label('date_to','الى تاريخ', 
                                    ['class' => 'col-xl-6  '.trans('main.style.pull').' control-label']) !!}
                                    {!!  Form::date('date_to',old('date_to'),['required', 'id'=>"date_to",'class'=>"text-center form-control"]) !!}
                                </fieldset>
                           </div>
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



