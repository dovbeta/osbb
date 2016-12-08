@extends ('backend.layouts.master')

@section ('title', trans('labels.backend.building.flats.management') . ' | ' . trans('labels.backend.building.flats.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.building.flats.management') }}
        <small>{{ trans('labels.backend.building.flats.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($flat, ['route' => ['admin.building.flat.link_users', $flat], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH']) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.building.flats.edit') }}</h3>

                <div class="box-tools pull-right">
                </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->

            <div class="box-body">
                <div class="form-group">
                    {{ Form::label('users', trans('validation.attributes.backend.building.flats.users'), ['class' => 'col-lg-2 control-label']) }}
                    <div class="col-lg-10">
                        {{ Form::select('users',\App\Models\Access\User\User::lists('name','id'), $flat->users()->lists('id')->toArray(),array('multiple'=>'multiple','name'=>'users[]'))}}
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
