<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CartController extends Controller
{
    public function viewCart() {
        $cartitems = Cart::where('user_id',Auth::id())->get();
        return view('cart.viewCart',compact('cartitems'));
    }



    public function update11Cart(Request $request) {
        $prod_id = $request->input('prod_id');
        $prod_qty = $request->input('prod_qty');
        //$product_id = $request->input('product_id');
              echo $prod_id;
              echo $prod_qty;
    }

    public function updateCart(Request $request) {
        $prod_id = $request->input('prod_id');
        $prod_qty = $request->input('prod_qty');
        //$product_id = $request->input('product_id');
              echo $prod_id;
              echo $prod_qty;
              alert($prod_id);

              if(Auth::check())
              {
                  $cart_check = Cart::where('prod_id',$prod_id) -> where('user_id',Auth::id()) ->  exists();
                  if($cart_check )
                      {
                          $cartItem = Cart::where('prod_id',$prod_id) -> where('user_id',Auth::id()) ->  first();
                          $cartItem -> prod_qty = $prod_qty;
                          $cartItem-> update();
                          return response()->json([
                              "status"=> $prod_check->name . "Cart Item Updated"
                          ]);


                      }
                      else
                      {
                          return response()->json([
                              "status"=>  "Cart item not found"
                          ]);
                      }
              }
              else
              {
                  return response()->json([
                      "status"=>  "Login To continue"
                  ]);
              }

    }

    public function delete5CartItem (Request $request) {
        $prod_id = $request->input('prod_id');
          echo $prod_id;
        }

    public function deleteCartItem (Request $request) {
       // if($request->ajax())             { return "True request!";   }

     $product_id = $request->input('product_id');
     //$prod_id = $product_id;
       echo $product_id;
        if(Auth::check())
        {
            $cart_check = Cart::where('product_id',$product_id) -> where('user_id',Auth::id()) ->  exists();
            if($cart_check )
                {
                    $cartItem = Cart::where('product_id',$product_id) -> where('user_id',Auth::id()) ->  first();
                    $cartItem-> delete();
                    return response()->json([
                        "status"=> $prod_check->name . "Cart Item Deleted"
                    ]);


                }
                else
                {
                    return response()->json([
                        "status"=>  "Cart item not found"
                    ]);
                }
        }
        else
        {
            return response()->json([
                "status"=>  "Login To continue"
            ]);
        }

    }

    public function deleteCart (Request $request) {
        // if($request->ajax())             { return "True request!";   }

        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');

       // alert($product_id);

        if(Auth::check())
        {
            $prod_check=Product::where('id',$product_id)->exists();
            if($prod_check)
            {
                $cart_check = Cart::where('prod_id',$product_id) -> where('user_id',Auth::id()) -> exists();
                if($cart_check)
                {
                   // $cartItem = new Cart();
                   //$id = $request -> id;
                   //$category = Category::find($id);
                   $cartItem = Cart::where('prod_id',$product_id) -> where('user_id',Auth::id()) ->  first();
                   // $cartItem = Cart::find('prod_id',$product_id);
                   // $cartItem-> prod_id  = $product_id;
                  //  $cartItem-> user_id = Auth::id();
                  //$cartItem = Cart::where('prod_id',$product_id) ->  first();
                   $cartItem-> delete();
                    return response()->json([
                        "status"=>  "item deleted"
                    ]);

                }
                else
                {
                    return response()->json([
                        "status"=>  "Cart item not found"
                    ]);
                }

            }
            else
            {
                return response()->json([
                    "status"=>  "Login To continue"
                ]);
            }
        }

     }

    public function addToCart(Request $request) {
        //return view('category.addCategory');
        //return redirect('home')-> with ('status',"category added successfully");
        //return '123456';
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');
       // alert($product_id);
        //alert($product_qty);
        if(Auth::check())
        {
            $prod_check=Product::where('id',$product_id)->exists();
            if($prod_check)
            {
                $cart_check = Cart::where('prod_id',$product_id) -> where('user_id',Auth::id()) -> exists();
                if($cart_check)
                {
                    return response()->json([
                        "status"=>  "Already Added"
                    ]);

                }
                else
                {
                    $cartItem = new Cart();
                    $cartItem-> prod_id  = $product_id;
                    $cartItem-> prod_qty = $product_qty;
                    $cartItem-> user_id = Auth::id();
                    $cartItem-> save();
                    return response()->json([
                        "status"=> $prod_check->name . "Added To Cart"
                    ]);
                }

            }
            else
            {
                return response()->json([
                    "status"=>  "Login To continue"
                ]);
            }
        }
     }
}
