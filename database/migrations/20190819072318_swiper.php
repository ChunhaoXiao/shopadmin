<?php

use think\migration\Migrator;
use think\migration\db\Column;

class Swiper extends Migrator
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
        $table = $this->table('swiper', ['comment' => '轮播图表']);
        $table->addColumn('picture', 'string')
        ->addColumn('shop_id', 'integer', ['null' => true, 'comment' =>'店铺id'])
        ->addColumn('order', 'integer', ['default' => 0, 'comment' => '显示排序'])
        ->addColumn('is_show', 'boolean', ['default' => 1, 'comment' => '是否显示，1：显示，0：不显示'])
        ->addColumn('create_time', 'datetime')
        ->addColumn('update_time', 'datetime')
        ->create();
    }
}
