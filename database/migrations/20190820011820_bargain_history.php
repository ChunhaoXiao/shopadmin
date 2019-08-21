<?php

use think\migration\Migrator;
use think\migration\db\Column;

class BargainHistory extends Migrator
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
        $table = $this->table('bargain_history', ['comment' => '砍价记录']);
        $table->addColumn('goods_id', 'integer', ['comment' => '商品id'])
        ->addColumn('bargain_id', 'integer', ['comment' => '砍价表id'])
        ->addColumn('user_id', 'integer', ['comment' => '请求砍价的用户id'])
        ->addColumn('bargain_user_id','integer', ['comment' => '砍价用户id'])
        ->addColumn('price', 'float', ['comment' => '砍价金额'])
        ->addColumn('create_time', 'datetime')
        ->addColumn('update_time', 'datetime')
        ->create();
    }
}
