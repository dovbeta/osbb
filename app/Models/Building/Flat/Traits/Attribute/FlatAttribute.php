<?php

namespace App\Models\Building\Flat\Traits\Attribute;

/**
 * Class FlatAttribute
 * @package App\Models\Building\Flat\Traits\Attribute
 */
trait FlatAttribute
{
    /**
     * @return string
     */
    public function getShowButtonAttribute()
    {
        return '<a href="' . route('admin.building.flat.view', $this) . '" class="btn btn-xs btn-primary"><i class="fa fa-home" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.view') . '"></i></a> ';
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return
            $this->getShowButtonAttribute();
    }
}
