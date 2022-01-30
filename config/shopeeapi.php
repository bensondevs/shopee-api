<?php

return [
	
	/*
    |--------------------------------------------------------------------------
    | Shopee Secret Key
    |--------------------------------------------------------------------------
    |
    | Here you may specify the shopee secret key given by api vendor
    |
    */
    'secret' => env('SHOPEE_API_SECRET', 'secret'),

    /*
    |--------------------------------------------------------------------------
    | Shopee Partner ID
    |--------------------------------------------------------------------------
    |
    | Here you may specify the shopee partner ID given by api vendor
    |
    */
    'partner_id' => env('SHOPEE_API_PARTNER_ID', 'partner_id'),

    /*
    |--------------------------------------------------------------------------
    | Shopee Shop ID
    |--------------------------------------------------------------------------
    |
    | Here you may specify the shopee partner ID given by api vendor
    |
    */
    'shopid' => env('SHOPEE_API_SHOP_ID', 'shopid'),
];