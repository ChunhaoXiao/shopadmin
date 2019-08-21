<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\common\model\Shop;
use app\common\model\Category;
use app\admin\validate\Goods as goodsValidator;
use app\common\utils\Upload;
use app\common\utils\GoodsService;
use app\common\model\Goods as goodsModel;
use think\facade\View;

class Goods extends Controller
{
   
    protected function initialize()
    {
        $categories = Category::all();
        $shop_id = request()->shop_id;
        View::share(['shop_id' => $shop_id, 'categories' => $categories]);
    }

     /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index(Request $request)
    {
        $shop_id = $request->shop_id;
        $shop = Shop::findOrFail($shop_id);
        $goods = $shop->goods()->with('pictures')->filter($request->param())->paginate(20);
        return view('index', ['datas' => $goods]);
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create(Request $request)
    {
        return view('create', ['shop_id' => $request->shop_id]);
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */

    public function save(Request $request, GoodsService $service)
    {
        $datas = $request->post() + $request->file();
        $res = $this->validate($request->post(), goodsValidator::class);
        if($res !== true)
        {
            $this->error($res);
        }
        $service->save($datas);
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
        $goods = goodsModel::with(['pictures', 'category'])->get($id);
        return view('create', ['goods' => $goods]);
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, GoodsService $service, $id)
    {
       
        if($request->isAjax()){
            $goods = goodsModel::getOrFail($id);
            $goods->on_sale = $goods->on_sale?0 :1;
            $goods->save();
            return json(['status' => 1, 'data' => $goods->on_sale]);
        }

        $datas = $_FILES['pictures']['error'][0] == 0 ? $request->post() + $request->file() : $request->post();
        $res = $this->validate($request->post(), goodsValidator::class);
        if($res !== true)
        {
            $this->error($res);
        }
        $service->save($datas, $id);
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        $goods = goodsModel::getOrFail($id);
        $goods->delete();
        foreach($goods->pictures as $pic)
        {
            $pic->delete();
        }
        return json([
            'status' => 1
        ]);

    }
}
