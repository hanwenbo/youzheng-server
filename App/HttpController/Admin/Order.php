<?php

namespace App\HttpController\Admin;

use App\Utils\Code;
use ezswoole\Db;

class Order extends Admin
{
	public function detail()
	{
		$field = [
			'order.*',
			'user.nickname as lanshou_name',
			'user.avatar as lanshou_avatar',
			'department.name as department_name',
		];
		$db           = Db::name( 'order' );
		$info         = $db->alias('order')
			->where(['order.id'=>$this->get['id']])
			->field($field)
			->join('user','order.lanshou_user_id = user.id','LEFT')
			->join('department','department.id = order.department_id','LEFT')
			->find();
		$this->send( Code::success, ['info' => $info] );
	}

	public function list()
	{
		$field = [
			'order.*',
			'user.nickname as lanshou_name',
			'user.avatar as lanshou_avatar',
			'department.name as department_name',
		];
		$db           = Db::name( 'order' );
		$list         = $db->alias('order')
			->field($field)
			->join('user','order.lanshou_user_id = user.id','LEFT')
			->join('department','department.id = order.department_id','LEFT')
			->select();
		$total_number = $db->count();
		$this->send( Code::success, [
			'list'         => $list,
			'total_number' => $total_number,
		] );
	}
	public function add(){
		$db           = Db::name( 'order' );
		$db->add([
			'sn'=>rand(1,1323233),
		]);
	}
}
