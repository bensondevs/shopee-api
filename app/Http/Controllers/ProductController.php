<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Shopee\ItemService;

class ProductController extends Controller
{
    /**
     * Shopee service class container
     * 
     * @var \App\Services\ShopeeApiService
     */
    private $shopee;

    /**
     * Controller constructor method
     * 
     * @param  \App\Services\ShopeeApiService
     * @return void
     */
    public function __construct(ShopeeApiService $shopee)
    {
        $this->shopee = $shopee;
    }

    /**
     * Get products from shopee API
     * 
     * @return Illuminate\Support\Facades\Response
     */
    public function list()
    {
        $items = $this->shopee->getItemList([
            'pagination_entries_per_page' => 10,
        ]);

        return response()->json(['items' => $items]);
    }

    /**
     * Get product detail from shopee API using item id
     * 
     * @param  Illuminate\Http\Request  $request
     * @return Illuminate\Support\Facades\Response
     */
    public function detail(Request $request)
    {
        $id = $request->id;
        $item = $this->shopee->getItemDetail(['item_id' => $id]);

        return response()->json(['item' => $item]);
    }
}