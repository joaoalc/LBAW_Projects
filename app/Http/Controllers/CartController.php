<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);
        if(is_null($user))
        {
            abort(404);
        }
        $categories = Category::all()->sortBy("category_id");
        
        return view('pages.cart')->with("user", $user)->with("categories", $categories);
    }

    public function addToCart(Request $request) {
        $data = $request->all();
        $id = $data["product_id"];
        $quantity = $data["quantity"];

        if(Auth::user() == null) {
            return response()->json("Unauthenticated", 406);
        }

        return DB::transaction(function() use ($id, $quantity) {

            $item = Item::find($id);
            

            if($item["stock"] > 0) {
                DB::select('call add_to_cart(?,?,?)', array(Auth::user()["user_id"], $id, $quantity));
                return response()->json("Item added to cart successfuly.", 200);
            } else {
                return response()->json("Item does not have enough stock", 406);
            }
        });
    }

    public function removeFromCart($id) {
        $user = Auth::user();

        if($user == null) {
            return response()->json("Unauthenticated", 401);
        }
        
        // $deleted = DB::delete('delete cart where user_id=? AND item_id=?', array($user["user_id"], $id));
        $deleted = DB::table('cart')->where('user_id', $user["user_id"])->where('item_id', $id)->delete();

        if($deleted <= 0) {
            return response()->json("Product not in the user's cart", 406);
        } else {
            return response()->json("Product removed from cart successfuly", 200);
        }
    }
}
