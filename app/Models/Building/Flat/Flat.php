<?php

namespace App\Models\Building\Flat;

use App\Models\Building\Flat\Traits\Attribute\FlatAttribute;
use App\Models\Building\Flat\Traits\Relationship\FlatRelationship;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Flat
 * @package App\Models\Building\Flat
 */
class Flat extends Model
{

    use FlatAttribute, FlatRelationship;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['number', 'entrance', 'floor', 'area', 'rooms_number'];
}
