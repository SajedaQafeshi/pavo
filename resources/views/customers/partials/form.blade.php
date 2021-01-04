
 {!! Form::hidden('form', $form) !!}

<section class="basic-elements">
   <div class="row">
       <div class="col-md-12">
           <div class="card">
               <div class="card-header">
                   <h4 class="card-title">الزبائن</h4>
               </div>
               <div class="card-content">
                   <div class="card-body">
                       <div class="row">
                            <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    {!! Form::label('name',trans('main.name'), ['class' => 'col-xl-6  '.trans('main.style.pull').' control-label']) !!}
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    {!! Form::label('email',trans('main.email'), ['class' => 'col-xl-6  '.trans('main.style.pull').' control-label']) !!}
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    {!! Form::label('mobile',trans('main.mobile'), ['class' => 'col-xl-6  '.trans('main.style.pull').' control-label']) !!}
                                    <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" 
                                        name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    {!! Form::label('birth_date',trans('main.birthDate'), 
                                    ['class' => 'col-xl-6  '.trans('main.style.pull').' control-label']) !!}
                                    <input class="text-center form-control" name="birth_date"
                                        type="date"  >
                                    @error('birth_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    {!! Form::label('password',trans('main.password'), ['class' => 'col-xl-6  '.trans('main.style.pull').' control-label']) !!}
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    {!! Form::label('password-confirm',trans('main.password-confirm'), ['class' => 'col-xl-6  '.trans('main.style.pull').' control-label']) !!}
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
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



