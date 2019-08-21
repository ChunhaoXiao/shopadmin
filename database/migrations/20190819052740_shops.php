<?php

use think\migration\Migrator;
use think\migration\db\Column;

class Shops extends Migrator
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
        $table = $this->table('shops', ['comment' => '店铺表']);
        $table->addColumn('name', 'string',['limit' => 30, 'comment' => '店铺名称'])
        ->addColumn('cover', 'string', ['null' => true, 'comment' => '店铺封面图'])
        ->addColumn('address', 'string', ['comment' => '店铺地址'])
        ->addColumn('description', 'text', ['null' => true, 'comment' => '店铺描述'])
        ->addColumn('phone', 'string', ['null' => true, 'comment' => '店铺电话'])
        ->addColumn('is_recommend', 'boolean', ['default' => 0, 'comment' => '是否推荐'])
        ->addColumn('user_id', 'integer', ['null' => true, 'comment' => '店主在用户表的id'])
        ->addColumn('latitude', 'string', ['null' => true,'comment' => '店铺维度'])
        ->addColumn('longitude', 'string', ['null' => true, 'comment' => '店铺经度'])
        ->addColumn('create_time', 'datetime')
        ->addColumn('update_time', 'datetime')
        ->create();
    }
}
