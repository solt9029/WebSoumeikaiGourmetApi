<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop;
use DB;

class ShopsController extends Controller
{   
    /**
     * keyword検索でshopsを返す
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) 
    {
        $keyword = $request->input('keyword');
        $query = Shop::query();

        // get all column names from shops table
        // （https://qiita.com/shin1x1/items/34e87bfe70c315d5ce47）
        $columns = DB::connection()->getSchemaBuilder()->getColumnListing((new Shop)->getTable()); 
        
        // keyword search applying to all columns
        // （https://qiita.com/zaburo/items/fe1947ebcf530e8f3773）
        foreach($columns as $column) {
            $query->orWhere($column, 'like', "%{$keyword}%");
        }

        $shops = $query->get();

        // avoid encoding problem
        // （http://repenguin.hateblo.jp/entry/2016/11/29/211347）
        return response()->json($shops, 200, [], JSON_UNESCAPED_UNICODE);
    }
}
