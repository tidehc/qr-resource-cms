<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\Traits\EntrustUserTrait;

/**
 * 管理员模型
 */
class Admin extends Model
{
    use EntrustUserTrait;

    public $timestamps = false;
}
