<?php

namespace App\Http\Controllers\Backend\Building\Flat;

use App\Http\Requests\Backend\Building\Flat\ImportFlatsRequest;
use App\Http\Requests\Backend\Building\Flat\ManageFlatRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Building\Flat\UpdateFlatRequest;
use App\Models\Building\Flat\Flat;
use App\Repositories\Backend\Access\User\UserRepositoryContract;
use App\Repositories\Backend\Building\Flat\FlatRepositoryContract;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\Datatables\Facades\Datatables;

/**
 * Class FlatController
 */
class FlatController extends Controller
{
    /**
     * @var FlatRepositoryContract
     */
    protected $flats;

    /**
     * @var UserRepositoryContract
     */
    protected $users;

    /**
     * @param FlatRepositoryContract $flats
     * @param UserRepositoryContract $users
     */
    public function __construct(FlatRepositoryContract $flats, UserRepositoryContract $users)
    {
        $this->flats = $flats;
        $this->users = $users;
    }

	/**
     * @param ManageFlatRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageFlatRequest $request)
    {
        return view('backend.building.flat.index');
    }

	/**
     * @param ManageFlatRequest $request
     * @return mixed
     */
    public function get(ManageFlatRequest $request) {
        return Datatables::of($this->flats->getForDataTable())
            ->addColumn('actions', function($flat) {
                return $flat->action_buttons;
            })
            ->make(true);
    }

    /**
     * @param ManageFlatRequest $request
     */
    public function export(ManageFlatRequest $request)
    {
        return Excel::create(config('app.name') . ' - ' . trans('labels.backend.building.flats.title'), function($excel) {
            $excel->sheet(trans('labels.backend.building.flats.title'), function($sheet) {
                $sheet->fromModel($this->flats->getForDataTable());
            });
        })->export('xls');
    }

    /**
     * @param ManageFlatRequest $request
     *
     * @return string
     */
    public function import(ManageFlatRequest $request)
    {
        return view('backend.building.flat.import');
    }

    /**
     * @param ImportFlatsRequest $request
     */
    public function postImport(ImportFlatsRequest $request)
    {
        Excel::load($request->file('excel')->getPathname(), function($reader) {
            $reader->each(function($sheet) {
                $sheet->each(function($row) {
                    $this->flats->create($row);
                });
            });
        });
        return redirect()->route('admin.building.flat.index')->withFlashSuccess(trans('alerts.backend.flats.imported'));
    }

    public function view(Flat $flat) {
        return view('backend.building.flat.view')->withFlat($flat);
    }

    /**
     * @param Flat $flat
     * @param ManageFlatRequest $request
     * @return mixed
     */
    public function edit(Flat $flat, ManageFlatRequest $request)
    {
        return view('backend.building.flat.edit')
            ->withFlat($flat);
    }

    /**
     * @param Flat $flat
     * @param UpdateFlatRequest $request
     * @return mixed
     */
    public function update(Flat $flat, UpdateFlatRequest $request)
    {
        $this->flats->update($flat, $request->all());
        return redirect()->route('admin.building.flat.view', $flat)->withFlashSuccess(trans('alerts.backend.flats.updated'));
    }
}