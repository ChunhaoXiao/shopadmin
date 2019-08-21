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
        $datas = swiperModel::order('order')->all();
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
            exit;//多余？
        }
        $datas['picture'] = $path[0];
        swiperModel::create($datas);
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
