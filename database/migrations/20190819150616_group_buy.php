<?php

use think\migration\Migrator;
use think\migration\db\Column;

class GroupBuy extends Migrator
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
        $table = $this->table('group_buy', ['comment' => '拼团表']);
        $table->addColumn('goods_id', 'integer')
        ->addColumn('title', 'string', ['comment' => '团购名称'])
        ->addColumn('logo', 'string', ['null' => true ,'comment' => '团购logo'])
        ->addColumn('start_time', 'datetime', ['comment' => '开始时间'])
        ->addColumn('end_time', 'datetime', ['comment' => '结束时间'])
        ->addColumn('numbers', 'string', ['comment' => '团购最低人数'])
        ->addColumn('price', 'float', ['comment' => '团购价格'])
        ->addColumn('status', 'integer', ['comment' => '状态'])
        ->addColumn('user_id', 'integer', ['comment' => '创建人'])
        ->addColumn('create_time', 'datetime')
        ->addColumn('update_time', 'datetime')
        ->create();
    }
}
