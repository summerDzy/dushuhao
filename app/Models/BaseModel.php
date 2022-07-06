<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class BaseModel extends Model implements AuthenticatableContract
{
    use Authenticatable;

    public $timestamps = false;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 获取审核库链接
     */
    public function getDb()
    {
        return app(static::class)->setConnection('dushuhao');
    }

 
}
