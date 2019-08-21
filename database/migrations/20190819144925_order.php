<?php

use think\migration\Migrator;
use think\migration\db\Column;

class Order extends Migrator
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
        $table = $this->table('order', ['comment' => '订单表']);
        $table->addColumn('order_number', 'string', ['null' => true, 'comment' => '订单号'])
        ->addColumn('user_id', 'integer', ['null' => true, 'comment' => '订单所属用户id'])
        ->addColumn('shop_id', 'integer', ['null' => true, 'comment' => '店铺id'])
        ->addColumn('order_statue', 'integer', ['default' => 0, 'comment' => '订单状态，0：未付款,1已付款，2：已退款'])
        ->addColumn('product_total_amount', 'float', ['null' => true, 'comment' => '商品总价'])
        ->addColumn('order_total_amount', 'float', ['null' => true, 'comment' => '实际付款金额'])
        ->addColumn('pay_method', 'string', ['null' => true, 'comment' => '支付方式'])
        ->addColumn('out_trade_number', 'string', ['null' => true, 'comment' => '第三方支付流水号'])
        ->addColumn('paid_at', 'datetime', ['null' => true,'comment' => '支付时间'])
        ->addColumn('refund_at', 'datetime',['null' => true, 'comment' => '退款时间'])
        ->addColumn('create_time', 'datetime')
        ->addColumn('update_time', 'datetime')
        ->create();
    }
}
