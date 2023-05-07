<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderModel;
use Illuminate\Support\Facades\Auth;
use App\Models\Order; 
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    public function orderProductPost(Request $request)
    {
    $image = $request->input('image');
    $product_name = $request->input('product_name');
    $unit_price = $request->input('unit_price');
    $size = $request->input('size');
    $quantity = $request->input('quantity');
    $user_id = $request->input('user_id');
    $product_id = $request->input('product_id');

    $existingOrder = OrderModel::where('user_id', $user_id)
                    ->where('product_name', $product_name)
                    ->where('unit_price', $unit_price)
                    ->where('size', $size)
                    ->first();

    if($existingOrder){
        $existingOrder->quantity += $quantity;
        $existingOrder->save();
    } else {
        OrderModel::create([
            "image" => $image,
            "product_name" => $product_name,
            "unit_price" => $unit_price,
            "size" => $size,
            "quantity" => $quantity,
            "user_id" => $user_id,
            "product_id" => $product_id,
    
        ]);
    }


    // Redirect the user to the cart page or wherever you want to send them
    return redirect()->route('see_order', ['id' => auth()->user()->id]);


    }

    public function showOrder ($id)
    {
        $user = Auth::user();

        // Get the add_to_cart items for the authenticated user with the given ID
        $added_to_carts = OrderModel::where('user_id', $user->id)
            ->where('user_id', $user->id)
            ->orderByDesc('created_at')
            ->get();
    
        return view('user_panel.see_order', [
            'added_to_carts' => $added_to_carts,
        ]);    
    }
    
    public function storeSelections(Request $request)
    {
        $selectedItems = $request->input('selectedItems', []);
    
        $selectedItemsData = [];
    
        foreach ($selectedItems as $itemId) {
            $product = OrderModel::find($itemId);

            
            if ($product) {
                $itemTotal = $product->unit_price * $product->quantity;
                $selectedItemsData[] = [
                    'image' => $product->image,
                    'product_name' => $product->product_name,
                    'unit_price' => $product->unit_price,
                    'quantity' => $product->quantity,
                    'item_total' => $itemTotal,
                    'product_id' => $product->id,
                ];
            }
        }
    
        session()->put('checked_items', $selectedItemsData);
    
        return redirect()->route('checkout')->with('success', 'Selected items stored in session.');
    }
    





}
