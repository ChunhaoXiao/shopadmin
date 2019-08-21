<?php
namespace app\common\utils;
use app\common\model\Goods;

class GoodsService
{
	public function save($data, $id = null)
	{
		if(!empty($data['pictures']))
		{
			$upload = new Upload;
			$res = $upload->store($data['pictures']);
			if(!is_array($res))
			{
				return [
					'status' => 0,
					'error' => $res,
				];
			}

			foreach ($res as $key => $value) {
				$pictures[]['path'] = $value;
			}
		}

		if(!$id)
		{
			$goods = Goods::create($data);
			if(!empty($pictures))
			{
				$goods->pictures()->saveAll($pictures);
			}
			return ['status' => 1, 'data' => $goods];
		}
		$goods = Goods::get($id);
		foreach($goods->pictures as $picture)
		{
		    $picture->delete();
		}

		$new_pictures = $pictures??[];
		$old_picture = $data['old_picture']??[];
		$allPics = array_merge($pictures, $old_picture);
		$goods->allowField(true)->save($data, ['id' => $id]);
		dump($allPics);
		if(!empty($allPics))
		{
			$goods->pictures()->saveAll($allPics);
		}
		return [
			'status' => 1,
			'data' => $goods,
		];
	}
}