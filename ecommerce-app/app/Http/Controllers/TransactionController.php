<?php

namespace App\Http\Controllers;

use App\Models\OrderModel;
use App\Models\TransactionModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class TransactionController extends Controller
{
    public function saveCheckout(Request $request)
    {
        // Retrieve the selected items from the session
        $selectedItems = session('checked_items', []);

        foreach ($selectedItems as $item) {
            // Retrieve the necessary data from the item
            $image = $item['image'];
            $product_name = $item['product_name'];
            $unit_price = $item['unit_price'];
            $quantity = $item['quantity'];
            $user_id = auth()->user()->id;
            $product_id = $item['product_id']; 
            $total_amount = $request->input('total_amount');

            $min = 1000000000;
            $max = 9999999999;
            $reference_number = random_int($min, $max);

            // Save the item using the OrderModel
            TransactionModel::create([
                "image" => $image,
                "product_name" => $product_name,
                "unit_price" => $unit_price,
                "quantity" => $quantity,
                "user_id" => $user_id,
                "product_id" => $product_id,
                "total_amount" => $total_amount,
                "reference_number" => $reference_number,
            ]);
            $student = OrderModel::findOrFail($product_id);
    
            $student->delete();
        }


        return redirect()->route('order_transactions')->with('message', 'Checkout successful!');
    }


    public function showTransaction ()
    {
        $user = Auth::user();

        // Get the add_to_cart items for the authenticated user with the given ID
        $transactions = TransactionModel::where('user_id', $user->id)
            ->where('user_id', $user->id)
            ->orderByDesc('created_at')
            ->get();
    
        return view('user_panel.order_transactions', [
            'transactions' => $transactions,
        ]);    
    }

    public function statusUpdate ($id) {
        $transaction = TransactionModel::where('id', $id);

        $data = [
            "status" => 'SHIPPING',
        ];
        
        $transaction->update($data);
        OrderModel::where('user_id', $id)->delete();

        return redirect()->route('orders');
    }

    public function statusDelivered ($id) {
        $transaction = TransactionModel::where('id', $id);

        $data = [
            "status" => 'DELIVERED',
        ];
        
        $transaction->update($data);
        OrderModel::where('user_id', $id)->delete();

        return redirect()->route('orders');
    }
}
