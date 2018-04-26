<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * 交易记录模型
 */
class TradeRecord extends Model
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
