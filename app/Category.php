<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * 资源分类模型
 */
class Category extends Model
{

    protected $table = 'categorys';
    
    public $timestamps = false;
}
