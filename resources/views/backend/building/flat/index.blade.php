@extends ('backend.layouts.master')

@section ('title', trans('labels.backend.building.flats.management'))

@section('after-styles-end')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>
        {{ trans('labels.backend.building.flats.management') }}
        <small>{{ trans('labels.backend.building.flats.active') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.building.flats.active') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.building.includes.partials.header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="flats-table" class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>{{ trans('labels.backend.building.flats.table.id') }}</th>
                            <th>{{ trans('labels.backend.building.flats.table.number') }}</th>
                            <th>{{ trans('labels.backend.building.flats.table.entrance') }}</th>
                            <th>{{ trans('labels.backend.building.flats.table.floor') }}</th>
                            <th>{{ trans('labels.backend.building.flats.table.area') }}</th>
                            <th>{{ trans('labels.backend.building.flats.table.rooms_number') }}</th>
                            <th>{{ trans('labels.general.actions') }}</th>
                        </tr>
                    </thead>
                </table>
            </div><!--table-responsive-->
        </div><!-- /.box-body -->
    </div><!--box-->

    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('history.backend.recent_history') }}</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            {!! history()->renderType('User') !!}
        </div><!-- /.box-body -->
    </div><!--box box-success-->
@stop

@section('after-scripts-end')
    {{ Html::script("js/backend/plugin/datatables/jquery.dataTables.min.js") }}
    {{ Html::script("js/backend/plugin/datatables/dataTables.bootstrap.min.js") }}

    <script>
        $(function() {
            $('#flats-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.building.flat.get") }}',
                    type: 'get',
                    data: {status: 1, trashed: false}
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'number', name: 'number'},
                    {data: 'entrance', name: 'entrance'},
                    {data: 'floor', name: 'floor'},
                    {data: 'area', name: 'area'},
                    {data: 'rooms_number', name: 'rooms_number'},
                    {data: 'actions', name: 'actions'}
                ],
                order: [[0, "asc"]],
                searchDelay: 500
            });
        });
    </script>
@stop