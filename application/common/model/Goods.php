<?php

namespace app\common\model;

use think\Model;

class Goods extends Model
{
    public function category()
    {
    	return $this->belongsTo(Category::class, 'category_id');
    }

    public function shop()
    {
    	return $this->belongsTo(Shop::class, 'shop_id');
    }

    public function scopeFilter($query, $data)
    {
    	return $query;
    }

    public function pictures()
    {
        return $this->hasMany(GoodsPicture::class, 'goods_id');
    }

    public function saveGoods($datas)
    {

    }
}
