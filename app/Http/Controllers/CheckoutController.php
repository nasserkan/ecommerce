<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CheckoutController extends Controller
{
    public function viewCheckout() {
       $cartitems = Cart::where('user_id',Auth::id())->get();
         return view('cart.viewCheckout',compact('cartitems'));
    }

    public function viewOrder() {
        $orders = Order::where('user_id',Auth::id())->get();
          return view('cart.viewOrder',compact('orders'));
     }

     public function viewOrderDetails($id) {
        $orders = Order::where('id',$id)-> where('user_id',Auth::id())->first();
          return view('cart.viewOrderDetails',compact('orders'));
     }

    public function placeOrder(Request $request) {
    $order = new Order();
    $order->user_id = Auth::id();
    $order->fname = $request-> input('fname');
    $order->lname = $request-> input('lname');
    $order->email = $request-> input('email');
    $order->phone = $request-> input('phone');
    $order->address = $request-> input('address');
    $order->city = $request-> input('city');
    $order->state = $request-> input('state');
    $order->country = $request-> input('country');
    $order->pincode = $request-> input('pincode');
    $order->tracking_no = 'nasser'.rand(1111,9999);
    $order->message = 'nasser';

    $total = 0;
    $cartitems_total = Cart::where('user_id',Auth::id())->get();
    foreach ($cartitems_total as $cnt)
    {
        $total += $cnt->product->selling_price;
    }
    $order->total_price = $total;
    $order->save();

    $cartitems = Cart::where('user_id',Auth::id())->get();
    foreach ($cartitems as $item)
    {
        OrderItem::create([
            'order_id' => $order-> id,
            'prod_id'  => $item-> prod_id,
            'qty' => $item->prod_qty,
            'price' => $item->product->selling_price,
        ]);

        $prod = Product::where('id', $item->prod_id)->first();
        $prod->qty = $prod->qty - $item->prod_qty;
        $prod->update();

    }


   if (Auth::user()->address == NULL)
   {
    $user = User::where('id',Auth::id())->first();
    $user->name = $request-> input('fname');
    $user->lname = $request-> input('lname');
    $user->phone = $request-> input('phone');
    $user->address = $request-> input('address');
    $user->city = $request-> input('city');
    $user->state = $request-> input('state');
    $user->country = $request-> input('country');
    $user->pincode = $request-> input('pincode');
    $user->update();
   }

   // $cartClear= Cart::where('user_id',Auth::id())->get();
   // Cart::destroy($cartClear);
  // foreach ($cartClear as $clear)
  //  {
  //      $clear->delete();
  //  }
  //$cartClear->user_id = Auth::id();
 // $cartClear->delete();

   return redirect('viewCheckout')-> with ('status',"Order Placed Successfully");
}
}
