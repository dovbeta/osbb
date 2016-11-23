<?php

namespace App\Repositories\Backend\Building\Flat;

use App\Models\Building\Flat\Flat;

/**
 * Interface FlatRepositoryContract
 * @package App\Repositories\Flat
 */
interface FlatRepositoryContract
{

	/**
     * @return mixed
     */
    public function getForDataTable();

    /**
     * @param $input
     * @return mixed
     */
    public function create($input);

    /**
     * @param Flat $flat
     * @param $input
     * @return mixed
     */
    public function update(Flat $flat, $input);
}