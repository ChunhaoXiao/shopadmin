<?php

namespace app\common\model;

use think\Model;
use Jackchow\Rbac\Traits\RbacUser;

class Admins extends Model
{
    use RbacUser;
    protected $hidden=['password','created_at','updated_at'];

}
