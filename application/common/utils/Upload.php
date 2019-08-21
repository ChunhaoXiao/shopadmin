<?php 
namespace app\common\utils;
class Upload
{
	public function store($obj, $rule = [])
	{
		if(!is_array($obj))
		{
			$obj = [$obj];
		}
		if(empty($rule))
		{
			$rule = [
				'size' => 2000000,
				'ext' => 'jpg,png,jpeg',
			];
		}

		$paths = [];
		foreach($obj as $file)
		{
			$info = $file->validate($rule)->move( './static/uploads');
			if(!$info)
			{
				return $file->getError();
			}
			
			$paths[] = $info->getSaveName();
		}
		return $paths;
	}
}