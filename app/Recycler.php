<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * 回收商模型
 */
class Recycler extends Model
{
    public $timestamps = false;

    /**
     * 关联回收分类
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
