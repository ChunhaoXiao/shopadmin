<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\common\model\Category as categoryModel;
use think\Validate;
use app\common\utils\Upload;

class Category extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $datas = categoryModel::with('cate')->order('xh')->all();
        
        return view('index', ['datas' => $datas]);
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        $categories = categoryModel::top()->all();
        return view('create', ['categories' => $categories]);
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request, Upload $upload)
    {
        $validator = Validate::make(['name' => 'require'], ['name.require' => '分类名称不能为空']);
        $post = $request->post();
        $res = $validator->check($post);
        
        if(!$res)
        {
            $this->error($validator->getError());
        }

        if($_FILES['icon']['error'] == 0)
        {
            $path = $upload->store($request->file('icon'));
            if(is_array($path))
            {
                $post['icon'] = $path[0];
            }
        }
        categoryModel::create($post);
        $this->success('添加成功', 'category/index');
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
        $categories = categoryModel::top()->all();
        $data = categoryModel::getOrFail($id);
        return view('create', ['data' => $data, 'categories' => $categories]);
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
        $cate = categoryModel::getOrFail($id);
        $validator = Validate::make(['name' => 'require'], ['name.require' => '分类名称不能为空']);
        $post = $request->post();
        $res = $validator->check($post);
        if(!$res)
        {
            $this->error($validator->getError());
        }
        if($_FILES['icon']['error'] == 0)
        {
            $path = $upload->store($request->file('icon'));
            if(is_array($path))
            {
                $post['icon'] = $path[0];
            }
        }
        $cate->save($post, ['id' => $id]);
        $this->success('修改成功', 'category/index');
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        categoryModel::destroy($id);
        return json(['status' => 1]);
    }
}
