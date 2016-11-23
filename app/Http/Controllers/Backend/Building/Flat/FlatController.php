<?php

namespace App\Http\Controllers\Backend\Building\Flat;

use App\Http\Requests\Backend\Building\Flat\ManageFlatRequest;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Building\Flat\FlatRepositoryContract;
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
     * @param FlatRepositoryContract $flats
     */
    public function __construct(FlatRepositoryContract $flats)
    {
        $this->flats = $flats;
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


}