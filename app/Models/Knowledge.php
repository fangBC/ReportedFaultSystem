<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Knowledge extends Model
{
    protected $fillable = ['founder', 'editor', 'type','title', 'content'];
}
