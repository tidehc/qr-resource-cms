<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * 回收资源模型
 */
class Resource extends Model
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
