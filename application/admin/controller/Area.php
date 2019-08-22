<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\common\model\Area as model;
class Area extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        ini_set("max_execution_time", "120");
        $str = file_get_contents('area.txt');
        $datas = json_decode($str, true);
        //dump($datas);
        foreach($datas as $v)
        {
            //$v province\
            //$row = [];
            foreach ($v['cities'] as $key => $v2) {
                $row['pid'] = 0;
                $row['name'] = $v2['name'];
                $re = model::create($row);
                foreach($v2['counties'] as $v3)
                {
                    
                   $r['name'] = $v3['name'];
                   $r['pid'] = $re['id'];
                   $a = model::create($r);
                   foreach($v3['circles'] as $v4)
                   {
                     $c['name'] = $v4['name'];
                     $c['pid'] = $a['id'];
                     model::create($c);
                   }
                }
            }
        }
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
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
