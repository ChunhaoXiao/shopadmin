<?php

use think\migration\Migrator;
use think\migration\db\Column;

class GroupBuyUsers extends Migrator
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
        $table = $this->table('group_buy_user', ['comment' =>'拼团记录(详情)表']);
        $table->addColumn('group_id', 'integer', ['comment' => '团购(group_buy)表的id'])
        ->addColumn('user_id', 'integer', ['comment' => '团购发起者（用户）id'])
        ->addColumn('order_id', 'integer', ['comment' => '订单id'])
        ->addColumn('count', 'integer', ['comment' => '购买数量'])
        ->addColumn('price', 'float', ['comment' => '团购价格'])
        //->addColumn('status','integer', )
        ->addColumn('create_time', 'datetime')
        ->addColumn('update_time', 'datetime')
        ->create();

    }
}
