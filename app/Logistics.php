<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * 物流信息模型
 */
class Logistics extends Model
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
