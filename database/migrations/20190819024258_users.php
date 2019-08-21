<?php

use think\migration\Migrator;
use think\migration\db\Column;

class Users extends Migrator
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
        $table = $this->table('users', ['comment' => '用户表']);
        $table->addColumn('username', 'string', ['limit' => 16,'comment' => '用户昵称'])
        ->addColumn('avatar', 'string', ['null' => true,'comment' => '用户头像'])
        ->addColumn('is_vip', 'boolean', ['default' => 0, 'comment' => '是否是vip会员。0：否 1:是'])
        ->addColumn('vip_expired_at', 'datetime', ['null' => true, 'comment' => 'VIP会员到期时间'])
        ->addColumn('phone', 'string', ['null' => true, 'comment' =>'电话号码'])
        ->addColumn('email', 'string', ['null' =>true,'comment' => '邮件地址'])
        ->addColumn('openid', 'string',['null' => true,'comment' => '用户在微信小程序对应的 openid'])
        ->addColumn('wx_nickname', 'string', ['null' => true,'comment' => '微信昵称'])
        ->addColumn('wx_avatar', 'string', ['null' => true, 'comment' => '微信头像'])
        ->addColumn('create_time', 'datetime')
        ->addColumn('update_time', 'datetime')
        ->create();
    }
}
