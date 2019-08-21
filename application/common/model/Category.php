<?php

namespace app\common\model;

use think\Model;

class Category extends Model
{
    public function goods()
    {
    	return $this->hasMany(Goods::class);
    }

    public function scopeTop($query)
    {
    	return $query->where('fid', 0);
    }
}
