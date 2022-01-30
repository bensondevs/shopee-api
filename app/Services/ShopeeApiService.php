<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Shopee\Client as ShopeeClient;

class ShopeeApiService
{
	/**
	 * Shopee Client Class container
	 * 
	 * @var Shopee\Client|null
	 */
	private $shopee;

	/**
	 * Create New Shopee Service Instance
	 * 
	 * @return void
	 */
	public function __construct()
	{
		$this->shopee = new Client([
			'secret' => config('shopeeapi.secret'),
    		'partner_id' => config('shopeeapi.partner_id'),
    		'shopid' => config('shopeeapi.shopid'),
		]);
	}
}
