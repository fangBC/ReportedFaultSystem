<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HitchDetailed extends Model
{
    protected $table = "hitch_detailed";

    protected $fillable = ['uid','type'];
}
