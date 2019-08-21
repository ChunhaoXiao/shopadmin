<?php

namespace app\common\model;

use think\Model;
use Jackchow\Rbac\RbacPermission;
class Permissions extends RbacPermission
{
    protected $createTime = 'created_at';
    protected $updateTime = 'updated_at';
}
