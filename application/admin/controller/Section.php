<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\common\utils\Upload;
use app\admin\validate\Section as validator;
use app\common\model\Section as sectionModel;

class Section extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $datas = sectionModel::order('order')->all();
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
        $data = $_FILES['icon']['error'] > 0 ? $request->post() : $request->post() + $request->file();

        $res = $this->validate($data, validator::class);
        if($res !== true)
        {
            $this->error($res);
        }  
        if(!empty($data['icon']))
        {
            $path = $upload->store($data['icon']);
            $data['icon'] = $path[0];
        }
        sectionModel::create($data);
        $this->success('添加成功', 'section/index');
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
        $data = sectionModel::getOrFail($id);
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
        $section = sectionModel::getOrFail($id);
        $data = $_FILES['icon']['error'] > 0 ? $request->post() : $request->post() + $request->file();
        $res = $this->validate($data, validator::class);
        if($res !== true)
        {
            $this->error($res);
        }  
        if(!empty($data['icon']))
        {
            $path = $upload->store($data['icon']);
            $data['icon'] = $path[0];
        }
       
        $section->save($data, ['id' => $id]);
        $this->success('修改成功', 'section/index');
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        $data = sectionModel::getOrFail($id);
        $data->delete();
        return json(['status' => 1]);
    }
}
