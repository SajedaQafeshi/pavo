      

<div class="card">
        @include('partials.card_header', ['title' =>$name])
         <div class="card-content collapse show">
            <div class="card-body">
                    <p class="card-text">
               {!! Form::open(['method' =>'GET','class'=>'','url'=>$url,'autocomplete'=>'off','id'=>@$form_id]) !!}
                    
                    	@include($blade)

                     

                   <div >
                     <a href="{{url($url)}}">
                     	{!! Form::label('#',trans('main.new_filter'),['class'=>'btn btn-default']) !!}
                     </a> 
                           
                    {!! Form::submit(trans('main.export'),['class'=>'btn btn-primary']) !!}
                     
                     @if(@$extra_button) 
                     <a href="#">{!! Form::label('#',trans('main.period_total'),['class'=>'btn btn-primary','id'=>@$extra_button]) !!}</a> 
                     @endif 

                     @if(@$extra_buttons) 
                      @foreach($extra_buttons as $extra_button) 
                       <a href="#">
                        {!! Form::label('#',$extra_button['title'] ,['class'=>'btn btn-primary','id'=>@$extra_button['id'] ]) !!}
                       </a> 
                      @endforeach
                     @endif  

                  </div>
    	              {!! Form::close() !!}
          			</p>
      		</div>
      	</div>
 </div>


