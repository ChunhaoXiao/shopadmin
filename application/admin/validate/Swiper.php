<?php

namespace app\admin\validate;

use think\Validate;

class Swiper extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
        'picture' => 'require',
        'shop_id' => 'require',
    ];
    
    protected $scene = [
        'update'  =>  ['shop_id'],
    ];
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	

    protected $message = [
        'picture.require' => '图片不能为空',
        'shop_id.require' => '链接地址不能为空',
    ];
}
