@extends ('backend.layouts.master')

@section ('title', trans('labels.backend.building.flats.management') . ' | ' . trans('labels.backend.building.flats.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.building.flats.management') }}
        <small>{{ trans('labels.backend.building.flats.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($flat, ['route' => ['admin.building.flat.update', $flat], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH']) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.building.flats.edit') }}</h3>

                <div class="box-tools pull-right">
                </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->

            <div class="box-body">
                <div class="form-group">
                    {{ Form::label('number', trans('validation.attributes.backend.building.flats.number'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('number', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.building.flats.number')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('entrance', trans('validation.attributes.backend.building.flats.entrance'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('entrance', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.building.flats.entrance')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('floor', trans('validation.attributes.backend.building.flats.floor'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('floor', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.building.flats.floor')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('area', trans('validation.attributes.backend.building.flats.area'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('area', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.building.flats.area')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('rooms_number', trans('validation.attributes.backend.building.flats.rooms_number'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('rooms_number', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.building.flats.rooms_number')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
            </div><!-- /.box-body -->
        </div><!--box-->

        <div class="box box-success">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.access.user.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
                </div><!--pull-left-->

                <div class="pull-right">
                    {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-success btn-xs']) }}
                </div><!--pull-right-->

                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->


    {{ Form::close() }}
@stop

@section('after-scripts-end')
    {{ Html::script('js/backend/access/users/script.js') }}
@stop
