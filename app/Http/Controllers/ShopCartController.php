<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ShopCart;
use App\Models\Product;
use App\Models\ProductImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShopCartController extends Controller {
    public function showShopCart(Request $request) {

        if (Auth::check()) {
            $user = Auth::user();
            //$this->authorize('edit', $user);
            $products = ShopCart::where('idusers', $user->id)
                    ->join('product', function ($join) {
                        $join->on('shopcart.idproduct', '=', 'product.id');
                    })
                    ->join('productimages', 'shopcart.idproduct', 'productimages.idproduct')
                    ->distinct('productimages.idproduct')
                    ->get();
        }

        return view('pages.shopcart', ['products' => $products]);
    }

    public function addShopCartProduct(Request $request)
    {   
        $product = Product::findOrFail($request->id);
        if ($product != NULL) {

            if (Auth::check()) {
                $user = Auth::user();
                if($user->shopcart()->where('idproduct', $request->id)->count() > 0){
                    return response(json_encode("You already have this product in your Shopcart"), 401);
                }
                Auth::user()->shopcart()->attach($product, array('quantity' => 1));
                return response(json_encode("Product added to Shopcart"), 200);

            } else {
                return response(json_encode("You need to Login first"), 401);
            }
        }
    }

    public function removeShopCartProduct(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $product = $user->shopcart()->where('idproduct', $request->id)->first();
        }
        if($product != null){
            $user->shopcart()->detach([$product->id]);
            return response(200);
        }
        return response(401);
    }

    public function showCheckout(Request $request) {

        if (Auth::check()) {
            $user = Auth::user();
            //$this->authorize('edit', $user);
            $products = $user->shopcart()->get();
        }

        error_log($products);

        return view('pages.checkout', ['products' => $products]);
    }
}
