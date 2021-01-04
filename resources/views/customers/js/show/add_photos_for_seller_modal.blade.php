<!-- Modal -->
<div class="modal fade  " id="add_photos_for_seller_modal" tabindex="-1" role="dialog" aria-labelledby="add_photos_for_seller_modal_label">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="add_photos_for_seller_modal_label">@lang('main.add_seller')</h4>
      </div>
      <div class="modal-body">
         {!! Form::open(['autocomplete'=>'off','class'=>'form-horizontal add_photos_for_seller_form ','url'=>'clients/add_car_for_client_form_insert' ,'files'=>true]) !!}
               
		                    <div class="text-center"><h1>{{$seller->name}}</h1></div>

                        <hr>



                      <div class="form-row">
                        <div class="form-group col">
                            {!! Form::label('name',trans('main.photos')) !!}
                            {!! Form::file('photos[]',['id'=>'fileupload','class'=>'text-center  form-control ','multiple'=>'','data-url'=>'upload']) !!}
                        </div>
                      </div> 

                      <hr>

                      <div class="gallery img-thumbnail text-center m-1">
                          @lang('main.photos') 
                      </div>





                  
                    {!! Form::hidden('seller_id', $seller->id) !!}


                    <div class="form-row">
                      <div class="form-group col text-center">
                     {!! Form::submit('اضافة',['class'=>'add_photos_for_seller_submit_button btn btn-primary ']) !!}
                      </div>
                    </div>


             

              {!! Form::close() !!}
      </div>
      <div ><div class="add_photos_for_seller_errors alert alert-danger d-none m-1" ></div></div>
       <div ><div class="add_photos_for_seller_success alert alert-success text-center" style="display: none;"></div></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-danger" data-dismiss="modal">الغاء</button>
      </div>
    </div>
  </div>
</div>


