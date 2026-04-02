<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Artwork;
use Illuminate\Support\Facades\Hash;
use App\Models\Purchase;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\Order_item;
class UserController extends Controller
{
    public function showArtwork(Request $request)
    {
        $search = $request->search;

        $artworks = Artwork::when($search, function ($query) use ($search) {
            $query->where('title', 'like', "%$search%");
        })->get();

        
        return view('user.show', compact('artworks'));
    }

   
    public function show($id)
    {
        $artwork = Artwork::findOrFail($id);

        return view('user.details', compact('artwork'));
    }

   public function buyNow($artworkId){
    $artwork = Artwork::findOrFail($artworkId);

    $item = Purchase::where('user_id', auth()->id())
    ->where('artwork_id', $artworkId)
    ->first();

    // تحقق من الكمية
    if ($artwork->quantity < 1) {
        return back()->with('error', 'This artwork is sold out.');
    }
    elseif($item){
        $item->quantity +=1;
        $item->save();
    }
    else{
       // إنشاء عملية شراء
    Purchase::create([
        'user_id' => Auth::id(),
        'artwork_id' => $artwork->id,
        'quantity' => 1,
        'total_price' => $artwork->price,
        'date' => Carbon::now()
    ]); 
    }
    

    // خصم الكمية
    $artwork->decrement('quantity', 1);

    return redirect()->back()->with('success', 'Item added to cart successfully');
}

public function remove($id)
{
    $purchase = Purchase::findOrFail($id);
    if($purchase->quantity >1){
        $purchase->decrement('quantity', 1);
    }
    else{
       $purchase->delete(); 
    }
    

    return back();
}

public function checkout()
{
   $purchases = Purchase::where('user_id', Auth::id())->get();

    return view('user.checkout',compact('purchases'));
}

public function shopping(){
    $purchases = Purchase::where('user_id', Auth::id())->get();

    return view('user.shoppingCart', compact('purchases'));
}

public function showUserOrder(){
    $orders = Order::where('user_id', Auth::id())->get();

   
    return view('user.User_Oreder',compact('orders'))->with('success','You ordered successfully');
}
public function store_order(){
    $total_price = request()->order_total;
    $shipping_address = 
    request()->country . ', ' .
    request()->city . ', ' .
    request()->street . ', Apt: ' .
    request()->apartment;
    $phone = request()->phone;
    $payment_method	= request()->payment;
    $order =Order::create([
            'user_id' => auth()->id(),
            'total_price'=> $total_price,
            'status'=> 'completed',
            'shipping_address'=> $shipping_address,
            'phone'=> $phone,
            'payment_method' => $payment_method ,
            'payment_status'=> 'paid'
        ]);
    $cartItems = Purchase::where('user_id', auth()->id())->get(); 
    foreach ($cartItems as $item) {
        Order_item::create([
            'order_id' => $order->id,
            'artwork_id' => $item->artwork_id,
            'quantity' => $item->quantity,
            'price' => $item->total_price
        ]);
        $item->delete();
    }
        
        return to_route('user.User_Oreder');

}


}