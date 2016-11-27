@extends ('backend.layouts.master')

@section ('title', trans('labels.backend.building.flats.import.title'))

@section('after-styles-end')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>
        {{ trans('labels.backend.building.flats.import.title') }}
        <small>{{ trans('labels.backend.building.flats.import.description') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.building.flats.import', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'files'=>true]) }}

    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.building.flats.import.title') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.building.includes.partials.header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="form-group">
                <div class="col-lg-10">
                    {!! Form::file('excel') !!}
                </div><!--col-lg-10-->
            </div><!--form control-->


        </div><!-- /.box-body -->
    </div><!--box-->

    <div class="box box-info">
        <div class="box-body">
            <div class="pull-right">
                {{ Form::submit(trans('buttons.general.import'), ['class' => 'btn btn-success btn-xs']) }}
            </div><!--pull-right-->

            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->

    {{ Form::close() }}
@stop