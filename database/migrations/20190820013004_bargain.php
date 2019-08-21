<?php

use think\migration\Migrator;
use think\migration\db\Column;

class Bargain extends Migrator
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
        $table = $this->table('bargain', ['comment' => '砍价表，用户发起砍价']);
        $table->addColumn('goods_id', 'integer', ['comment' => '商品id'])
        ->addColumn('user_id', 'integer', ['comment' => '发起砍价的用户id'])
        ->addColumn('price', 'float', ['null' => true, 'comment' => '商品价格，这个字段好像没什么用'])
        ->addColumn('create_time', 'datetime')
        ->addColumn('update_time', 'datetime')
        ->create();
    }
}
