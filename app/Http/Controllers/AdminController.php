<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Artwork;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    public function index()
    {
        $artworks = Artwork::with('purchases')->get();

        return view('admin.index', ['artworks' => $artworks]);
    }
     public function create()
    {
        $artworks = Artwork::with('purchases')->get();;
        return view('admin.create', ['artworks'=> $artworks]);
    }

    public function store()
    {
         request()->validate([
        'title' => 'required',
        'image' => 'required|image'
    ]);
        $data = request()->all();
        $title = request()->title;
        $description = request()->description;
        $price = request()->price;
        $quantity = request()->quantity;
        $image = request()->image;
       
        $imageName =$image->getClientOriginalName();
        request()->image->move(public_path('pic'), $imageName);



        Artwork::create([
            'title'=> $title,
            'description'=> $description,
            'price'=> $price,
            'quantity'=> $quantity,
            'image' => 'pic/' . $imageName 
        ]);
        return to_route('admin.index')->with('success','Artwork added successfully');
    }
     public function edit(Artwork $artwork)
    {
        $artworks = Artwork::all();
        return view('admin.edit', ['artworks'=> $artworks,'artwork'=> $artwork]);
    }

    public function update($artworkId)
{
    $title = request()->title;
    $description = request()->description;
    $price = request()->price;
    $quantity = request()->quantity;

    $singleArtFromDB = Artwork::findOrFail($artworkId);

    
    $data = [
        'title' => $title,
        'description' => $description,
        'price' => $price,
        'quantity' => $quantity,
    ];

    if(request()->hasFile('image')) {
        $image = request()->file('image');
        $imageName =$image->getClientOriginalName();
        request()->image->move(public_path('pic'), $imageName);

        $data['image'] = 'pic/' . $imageName; 
    }

    $singleArtFromDB->update($data);
    return to_route('admin.index')->with('success','Artwork modified successfully');
}
    public function destroy($artworkId)
    {
        
        $artwork = Artwork::find($artworkId);
        $artwork->delete();
        return to_route('admin.index');
    }
    public function viewPurchases(){
    $orders = Order::all();

   
    return view('admin.purchases',compact('orders'));
}


}