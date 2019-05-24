<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class perfectName extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'perfect_names';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title'];

    
}
