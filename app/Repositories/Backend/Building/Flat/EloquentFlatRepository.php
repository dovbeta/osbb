<?php

namespace App\Repositories\Backend\Building\Flat;

use App\Models\Access\User\User;
use App\Models\Building\Flat\Flat;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Events\Backend\Access\User\UserCreated;
use App\Events\Backend\Access\User\UserUpdated;
use App\Events\Backend\Access\User\UserDeleted;
use App\Events\Backend\Access\User\UserRestored;
use App\Events\Backend\Access\User\UserDeactivated;
use App\Events\Backend\Access\User\UserReactivated;
use App\Events\Backend\Access\User\UserPasswordChanged;
use App\Events\Backend\Access\User\UserPermanentlyDeleted;
use App\Exceptions\Backend\Access\User\UserNeedsRolesException;
use App\Repositories\Backend\Access\Role\RoleRepositoryContract;
use App\Repositories\Frontend\Access\User\UserRepositoryContract as FrontendUserRepositoryContract;

/**
 * Class EloquentFlatRepository
 * @package App\Repositories\Flat
 */
class EloquentFlatRepository implements FlatRepositoryContract
{
    /**
     */
    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getForDataTable()
    {
        return Flat::select(['id', 'number', 'entrance', 'floor', 'area', 'rooms_number'])
            ->get();
    }

    /**
     * @param  $input
     * @throws GeneralException
     * @return bool
     */
    public function create($input)
    {
        $flat = $this->createFlatStub($input);

		DB::transaction(function() use ($flat) {
			if ($flat->save()) {
				return true;
			}

        	throw new GeneralException(trans('exceptions.backend.building.flats.create_error'));
		});
    }

    /**
     * @param Flat $flat
     * @param $input
     * @return bool
     * @throws GeneralException
     */
    public function update(Flat $flat, $input)
    {
		DB::transaction(function() use ($flat, $input) {
			if ($flat->update($input)) {
				$flat->save();

				return true;
			}

        	throw new GeneralException(trans('exceptions.backend.building.flats.update_error'));
		});
    }

    /**
     * @param  $input
     * @return mixed
     */
    private function createFlatStub($input)
    {
        $flat                   = new Flat;
        $flat->number           = $input['number'];
        $flat->entrance         = $input['entrance'];
        $flat->floor            = $input['floor'];
        $flat->area             = $input['area'];
        $flat->rooms_number     = $input['rooms_number'];
        return $flat;
    }
}
