<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class Admin extends Model
{
    use EntrustUserTrait;

    public $timestamps = false;
}
