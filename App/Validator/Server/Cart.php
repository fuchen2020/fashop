<?php
/**
 * 购物车验证
 *
 *
 *
 *
 * @copyright  Copyright (c) 2019 MoJiKeJi Inc. (http://www.fashop.cn)
 * @license    http://www.fashop.cn
 * @link       http://www.fashop.cn
 * @since      File available since Release v1.1
 */

namespace App\Validator\Server;

use ezswoole\Validator;

class Cart extends Validator
{

	protected $rule
		= [
			'goods_sku_id' => 'require|integer|gt:0',
			'quantity'     => 'require|integer|gt:0',
			'exist'        => 'require|integer|gt:0',
			'is_check'     => 'require|checkState',
		];

	protected $message
		= [];
	protected $scene
		= [
			'add'   => [
				'goods_sku_id',
				'quantity',
			],
			'edit'  => [
				'goods_sku_id',
				'quantity',
			],
			'exist' => [
				'goods_sku_id',
			],
			'del'   => [
				'goods_sku_ids',
			],

			'del'   => [
				'goods_sku_ids',
			],
			'check' => [
				'goods_sku_ids',
				'is_check',
			],
		];

	/**
	 * @access protected
	 * @param mixed $value 字段值
	 * @param mixed $rule  验证规则
	 * @return bool
	 */
	protected function checkState( $value, $rule, $data )
	{
		if( in_array(intval($value),array(0,1)) ){
			return true;
		} else{
			return '选中状态错误';
		}
	}
}