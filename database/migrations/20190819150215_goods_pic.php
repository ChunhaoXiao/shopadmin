<?php

use think\migration\Migrator;
use think\migration\db\Column;

class GoodsPic extends Migrator
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
        $table = $this->table('goods_picture', ['comment' => '商品图片表']);
        $table->addColumn('path', 'string', ['comment' => '图片路径'])
        ->addColumn('goods_id', 'integer', ['comment' => '商品id'])
        ->addColumn('is_cover', 'boolean', ['default' => 0, 'comment' => '是否是封面。0：否， 1：是'])
        ->addColumn('create_time', 'datetime')
        ->addColumn('update_time', 'datetime')
        ->create();
    }
}
