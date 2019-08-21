<?php

use think\migration\Migrator;
use think\migration\db\Column;

class Goods extends Migrator
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $table = $this->table('goods', ['comment' => '商品表']);
        $table->addColumn('name', 'string', ['comment' => '商品名称'])
        ->addColumn('category_id', 'integer', ['default' => 0, 'comment' => '商品所属分类'])
        ->addColumn('shop_id', 'integer', ['comment' => '商品所属店铺'])
        ->addColumn('price', 'float', ['comment' => '市场价', 'null' => true])
        ->addColumn('shop_price', 'float', ['comment' => '本店价', 'null' => true])
        ->addColumn('member_price', 'float', ['comment' => '会员价', 'null' => true])
        ->addColumn('group_buy_price', 'float', ['comment' => '团购价格', 'null' => true])

        ->addColumn('group_buy_time','integer', ['comment' => '团购周期：小时', 'null' => true])
        ->addColumn('type', 'integer', ['comment' => '类型：1:拼团,2砍价', 'null' => true])
        ->addColumn('bargain_time','integer', ['comment' => '砍价周期：小时', 'null' => true])
        ->addColumn('stock', 'integer', ['comment' => '库存'])
        ->addColumn('on_sale','boolean', ['default' => 1, 'comment' => '是否上架 0：下架， 1：上架'])
        ->addColumn('sold_count', 'integer', ['null' => true, 'comment' => '销量'])
        ->addColumn('description', 'text', ['null' => true,'comment' => '商品描述'])
        ->addColumn('create_time', 'datetime')
        ->addColumn('update_time', 'datetime')
        ->create();
    }
}
