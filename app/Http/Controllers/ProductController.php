<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Exception;

class ProductController extends Controller
{
    public function fetchProducts(Request $request) {
        try {
            $products = Product::select('id', 'name', 'description', 'price', 'slug')->with(['discount:product_id,type,discount', 'images:product_id,path'])->get();
            
            if (count($products) == 0) {
                return response()->json(['status' => 'fail', 'message' => 'records not found'], 404);
            } else {
                $responseArr = [];
                $i = 0;
                foreach ($products as $key => $value) {
                    if ($value->discount == null || $value->images == null) {
                        return response()->json(['status' => 'fail', 'message' => 'records not found'], 404);    
                    }
                    $responseArr[$i]['id'] = $value->id;
                    $responseArr[$i]['name'] = $value->name;
                    $responseArr[$i]['description'] = $value->description;
                    $responseArr[$i]['slug'] = $value->slug;
                    if ($value->discount->type == 'percent') {
                        $discountPrice = round(($value->price - ($value->price * ($value->discount->discount/100))));
                    } else {
                        $discountPrice = round($value->price - $value->discount->discount);
                    }
                    $responseArr[$i]['price'] = ['full' => $value->price, 'discounted' => $discountPrice];
                    $responseArr[$i]['discount'] = ['type' => $value->discount->type, 'amount' => $value->discount->discount];
                    $responseArr[$i]['images'] = array_column($value->images->toArray(), 'path');
                    $i++;
                }

                return response()->json($responseArr, 200);
            }

        } catch (Exception $ex) {
            return response()->json(['status' => 'fail', 'message' => $ex->getMessage()], 500);

        }
    }
}
