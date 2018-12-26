<?php

namespace App\HttpController\Admin;

use App\Utils\Code;
use ezswoole\Db;

class Member extends Admin
{
	public function login()
	{
		$this->send( Code::success, [
			'access_token' => 'JKGJADASD&W^&^W^E*&',
			'expires_in'   => 1000000,
			'create_time'  => time(),
		] );
	}

	public function self()
	{
		$this->send( Code::success, [
			'info' => [
				'nickname' => '管理员某某',
			],
		] );
	}
}
