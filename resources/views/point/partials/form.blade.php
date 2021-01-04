{!! Form::hidden('form', $form) !!}

<section class="basic-elements">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">@lang('main.point')</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="row">

                            @if ($form == 'editing')
                                @csrf

                                @method('PUT')
                                <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                    <fieldset class="form-group">
                                        {!! Form::label('point', trans('main.point'), ['class' => 'col-xl-6 ' .
                                        trans('main.style.pull') . ' control-label']) !!}
                                        {!! Form::text('max_point', value($point->max_point), ['id' => 'max_point',
                                        'class' => 'form-control']) !!}
                                    </fieldset>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                    <fieldset class="form-group">
                                        {!! Form::label('pointDiscount', trans('main.pointDiscount'), ['class' =>
                                        'col-xl-8 ' . trans('main.style.pull') . ' control-label']) !!}
                                        {!! Form::text('value', value($point->value), ['id' => 'value', 'class'
                                        => 'form-control']) !!}
                                    </fieldset>
                                </div>



                            @endif


                        </div>
                        <div class="form-group overflow-hidden">
                            <div class="col-12">
                                <button data-repeater-create="" class="btn btn-primary btn-lg">
                                    <i class="icon-plus4"></i> {{ $btn }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
