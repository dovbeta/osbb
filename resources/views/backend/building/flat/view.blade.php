@extends ('backend.layouts.master')

@section ('title', trans('labels.backend.building.flats.management') . ' | ' . trans('labels.backend.building.flats.view'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.building.flats.management') }}
        <small>{{ trans('labels.backend.building.flats.number',['number'=>$flat->number]) }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.building.flats.number',['number'=>$flat->number]) }}</h3>

            <div class="box-tools pull-right">
                <a href="{{ route('admin.building.flat.users', $flat) }}" class="btn btn-xs btn-primary"><i class="fa fa-user" data-toggle="tooltip" data-placement="top" title="{{ trans('buttons.flat.users') }}"></i></a>
                <a href="{{ route('admin.building.flat.edit', $flat) }}" class="btn btn-xs btn-primary"><i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="{{ trans('buttons.general.crud.edit') }}"></i></a>

            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">
            <ul>
                <li>
                    {{ trans('labels.backend.building.flats.table.number') }}: {{$flat->number}}
                </li>
                <li>
                    {{ trans('labels.backend.building.flats.table.entrance') }}: {{$flat->entrance}}
                </li>
                <li>
                    {{ trans('labels.backend.building.flats.table.floor') }}: {{$flat->floor}}
                </li>
                <li>
                    {{ trans('labels.backend.building.flats.table.area') }}: {{$flat->area}}
                </li>
                <li>
                    {{ trans('labels.backend.building.flats.table.rooms_number') }}: {{$flat->rooms_number}}
                </li>
            </ul>

            <h4>{{ trans('labels.backend.building.flats.users') }}</h4>

            @if ($flat->users()->count() > 0)
                <ul>
                @foreach($flat->users()->get() as $user)
                    <li>
                        <a href="{{ route('admin.access.user.edit', $user) }}" class="">
                        {{ $user->name }}
                        </a>
                    </li>
                @endforeach
                </ul>
            @else
                {{ trans('labels.backend.access.users.no_roles') }}
            @endif
        </div>
    </div>
@stop

