<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\common\model\Roles;
use think\Validate;
use app\common\model\Permissions;
class Role extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        return view('index');
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        $permissions = Permissions::all();
        return view('create', ['permissions' => $permissions]);
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        $rule = [
            'name' => 'require'
        ];
        
        $msg = [
            'name.require' => '角色名字不能为空'
        ];

        $validator = Validate::make($rule, $msg);
        if(!$validator->check($request->post()))
        {
            $this->error($validator->getError());
        }
        $role = Roles::create($request->post());
        $permissions = array_filter($request->post('permissions'));
        if($permissions)
        {
            $role->attachPermissions($permissions);
        }
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
