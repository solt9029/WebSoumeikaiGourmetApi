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
        $area = $request->input('area');
        $query = Shop::query();

        if ($area !== null && $area !== '全ての地域') {
            $query->where('area', $area);
        }

        $columns = ['category', 'name', 'phone_number', 'address', 'owner_name', 'owner_club', 'owner_graduated_at', 'owner_group'];


        $query->where(function ($query) use ($columns, $keyword) {
           foreach ($columns as $column) {
               $query->orWhere($column, 'like', "%{$keyword}%");
           }
       });

        $shops = $query->get();

        // avoid encoding problem
        // （http://repenguin.hateblo.jp/entry/2016/11/29/211347）
        return response()->json($shops, 200, [], JSON_UNESCAPED_UNICODE);
    }
}
