<?php

namespace app\common\model;

use think\Model;

class Shop extends Model
{
    protected $table = 'shops';

    public function goods()
    {
    	return $this->hasMany(Goods::class, 'shop_id');
    }
}
