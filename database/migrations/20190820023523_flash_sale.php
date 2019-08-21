<?php

use think\migration\Migrator;
use think\migration\db\Column;

class FlashSale extends Migrator
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
        $table = $this->table('flash_sale', ['comment' => '秒杀表']);
        $table->addColumn('goods_id', 'integer', ['comment' => '商品id'])
        ->addColumn('start_time', 'datetime',['comment' => '秒杀开始时间'])
        ->addColumn('end_time', 'datetime', ['comment' => '秒杀结束时间'])
        ->addColumn('create_time', 'datetime')
        ->addColumn('update_time','datetime')
        ->create();
    }
}
