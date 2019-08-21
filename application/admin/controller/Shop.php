<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\validate\Shop as shopValidator;
use app\common\utils\Upload;
use app\common\model\Shop as shopModel;
class Shop extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $shops = shopModel::order('id desc')->paginate(20);
        return view('index', ['datas' => $shops]);
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
        $datas = $request->post();
        if($_FILES['pic']['error'] == 0)
        {
            $files = $request->file('pic');
            $paths = $upload->store($files);
            if(!empty($paths))
            {
                $datas['cover'] = $paths[0];
            }
        }
        $res = $this->validate($datas,shopValidator::class);
        if($res !== true)
        {
            $this->error($res);
        }
        shopModel::create($datas);
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
