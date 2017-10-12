<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cancel extends Model
{
    //
    protected $table = 'cancel';

    protected $fillable = ['uid', 'type', 'content'];

    public static function checkItem($id)
    {
        $a = self::where('uid', $id)->get()->toArray();
        if (count($a) == 0) {
            return false;
        } else {
            return true;
        }
    }
}
