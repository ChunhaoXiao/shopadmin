<?php

namespace app\common\model;

use think\Model;
use Jackchow\Rbac\RbacRole;

class Roles extends RbacRole
{
    protected $createTime = 'created_at';
    protected $updateTime = 'updated_at';
}
