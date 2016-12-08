<?php

namespace App\Models\Building\Flat\Traits\Relationship;

/**
 * Class FlatRelationship
 * @package App\Models\Building\Flat\Traits\Relationship
 */
trait FlatRelationship
{
    public  function users()
    {
        return $this->belongsToMany('App\Models\Access\User\User')->withTimeStamps();
    }
}