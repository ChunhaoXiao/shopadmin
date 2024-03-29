<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\common\utils\Upload;
use app\admin\validate\Swiper as swiperValidator;
use app\common\model\Swiper as swiperModel;
class Swiper extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $datas = swiperModel::order('xh')->all();
        //dump($datas);
        return view('index', ['datas' => $datas]);
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request, Upload $upload)
    {
        $datas = $request->post() + $request->file();
        $res = $this->validate($datas, swiperValidator::class);
        if($res !== true)
        {
            $this->error($res);
        }
        $path = $upload->store($datas['picture']);
        if(!is_array($path))
        {
            $this->error($path);
        }
        $datas['picture'] = $path[0];
        swiperModel::create($datas);
        $this->success('添加成功', 'swiper/index',1);
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {

    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        
        $data = swiperModel::getOrFail($id);
        return view('create', ['data' => $data]);
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, Upload $upload,$id)
    {
        $swiper = swiperModel::getOrFail($id);
        if($request->isAjax() && $request->action == 'is_show')
        {
            $swiper->is_show = $swiper->is_show == 1 ?0 : 1;
            $swiper->save();
            return json(['status' => 1, 'data' => $swiper->is_show]);
        }

        $datas = $_FILES['picture']['error'] > 0 ? $request->post() : $request->post() + $request->file();
        $res = $this->validate($datas, 'app\admin\validate\Swiper.update');
        if($res !== true)
        {
            $this->error($res);
        }
        if(!empty($datas['picture']))
        {
            $path = $upload->store($datas['picture']);
            $datas['picture'] = $path[0];
        }
        $swiper->save($datas, ['id' => $id]);
        $this->success('修改成功', 'swiper/index');
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        swiperModel::destroy($id);
        return json(['status' => 1]);
    }
}
