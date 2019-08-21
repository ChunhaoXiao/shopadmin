<?php

namespace app\admin\validate;

use think\Validate;

class Goods extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
        'name' => 'require',
        'price' => 'require|float',
        'shop_price' => 'require|float',
        'member_price' => 'require|float',
        'group_buy_price' => 'float',
        'group_buy_time' => 'number',
        'bargin_time' => 'number',
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [];
}
