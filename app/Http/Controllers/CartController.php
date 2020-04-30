<?php

namespace App\Http\Controllers;

use App\CartProduct;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addProduct(Request $request)
    {
        $productId = $request->get('product-id');
        $cartId = $request->get('cart-id');
        $cartProduct = CartProduct::where(
            'cart_id', $request->get('cart_id')
        )->where('product_id', $productId)
            ->orderBy('updated_at')->firstOrCreate([
                'product_id' => $productId,
                'cart_id' => $cartId,
                'amount' => 0
            ]);

        $cartProduct->amount += 1;

        return response()->json([
           'status' => $cartProduct->save() ? 'success' : 'error'
        ]);
    }
}
