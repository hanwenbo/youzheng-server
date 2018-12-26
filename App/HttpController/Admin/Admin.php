<?php
namespace App\HttpController\Admin;

use ezswoole\Request;
use App\Utils\Code;
use App\HttpController\AccessTokenAbstract;

abstract class Admin extends AccessTokenAbstract
{
	/**
	 * 当访问
	 * @param $actionName
	 */
	protected function onRequest( $actionName ) : ?bool
	{
		parent::onRequest( $actionName );
		$this->request = Request::getInstance();
		if( $this->request->method() === 'OPTIONS' ){
			$this->send( Code::success );
			$this->response()->end();
			return false;
		} else{
			$this->_initialize();
			return true;
		}

	}

	/**
	 * @param \Throwable $throwable
	 * @param            $actionName
	 * @throws \Throwable
	 * @author 韩文博
	 */
	protected function onException( \Throwable $throwable, $actionName ) : void
	{
		$this->send( Code::server_error, [], $throwable->getFile()." - ".$throwable->getLine()." - ".$throwable->getMessage() );
		$this->response()->end();
	}

	protected function _initialize()
	{

	}
}
