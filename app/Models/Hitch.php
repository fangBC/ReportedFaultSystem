<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hitch extends Model
{

    /*
     * 表名
     * */
    protected $table = 'hitch';

    /*
     * 允许操作的字段
     * */
    protected $fillable = ['user','room','type', 'type2', 'description', 'time', 'person', 'status', 'finish', 'is_cancel', 'user_cancel', 'finish_time', 'img'];
}
