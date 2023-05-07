<?php

namespace App\Http\Controllers;

use App\Models\OrderModel;
use App\Models\ProductModel;
use App\Models\TransactionModel;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(){
        $customers = UserModel::where('id', '!=', 1)
                    ->orderByDesc('created_at')
                    ->get();

        return view('admin_panel.customers', [
            'customers' => $customers,
        ]);
    }

    public function showOrderDetails($id){
        $customer = UserModel::findOrFail($id);
        $orders = TransactionModel::where('user_id', $id)
                ->orderByDesc('created_at')
                ->get();

        return view('admin_panel.orders_details', [
            'customer' => $customer,
            'orders' => $orders,
        ]);
    }

    public function showOrders(){
        $orders = TransactionModel::where('id', '!=', 1)
                ->where('status', '!=', 'DELIVERED')
                ->orderByDesc('created_at')
                ->get();

        foreach ($orders as $order) {
            $user = UserModel::find($order->user_id);
            $order->name = $user ? $user->name : 'Deleted user';
        }

        return view('admin_panel.orders', [
            'orders' => $orders,
        ]);
    }

    public function showOrderedItems($id){
        $orders = TransactionModel::where('user_id', '!=', 1)
                ->where('id', '=', $id)
                ->get();

                
        foreach ($orders as $order) {
            $user = UserModel::find($order->user_id);
            $order->name = $user ? $user->name : 'Deleted user';
            $order->email = $user ? $user->email : 'Deleted user';
            $order->phone_num = $user ? $user->phone_num : 'Deleted user';
            $order->address = $user ? $user->address : 'Deleted user';
        }

        return view('admin_panel.ordered_items', [
            'orders' => $orders,
        ]);
    }

    public function adminDash(){

        $orders = TransactionModel::where('user_id', '!=', 1)
                ->orderByDesc('created_at')
                ->limit(10)
                ->get();
        $users = UserModel::where('id', '!=', 1)
                ->orderByDesc('created_at')
                ->limit(4)
                ->get();
        $product = ProductModel::all();
        $userCount = UserModel::where('id', '!=', 1)->count();
        $productCount = ProductModel::count();


        foreach ($orders as $order) {
            $user = UserModel::find($order->user_id);
            $order->name = $user ? $user->name : 'Deleted user';
        }

        return view('admin_panel.dashboard', [
            'orders' => $orders,
            'product' => $product,
            'users' => $users,
            'userCount' => $userCount,
            'productCount' => $productCount,
        ]);
    }






    public function delete_user ($id) {
        $user = UserModel::findOrFail($id);

        $user->delete();
        OrderModel::where('user_id', $id)->delete();

        // Redirect back to the welcome page with a success message
        return redirect()->route('customers')->with('success', 'User record deleted successfully!');
    }

    public function updateUserProfile(Request $request, $id)
    {
        $user = UserModel::findOrFail($id);
        
        $name = $request->name;
        $email = $request->email;
        $phone_num = $request->phone_num;
        $address = $request->address;
        
        if ($request->hasFile('image')) {
            // Delete old image file if it exists
            if ($user->image && Storage::disk('public')->exists($user->image)) {
                Storage::disk('public')->delete($user->image);
            }
    
            $image = $request->file('image')->store('product_images', 'public');
        } else {
            $image = $user->image;
        }
    
        $data = [
            "image" => $image,
            "name" => $name,
            "email" => $email,
            "phone_num" => $phone_num,
            "address" => $address,
        ];
        
        $user->update($data);
        OrderModel::where('user_id', $id)->delete();

        return redirect()->route('user_profile');
    }


    public function deleteItem($id)
    {
        $cart_product = OrderModel::findOrFail($id);
        $cart_product->delete();
    
        // Redirect back to the welcome page with a success message
        return redirect()->route('see_order', ['id' => $cart_product->id])->with('success', 'Item record deleted successfully!');
    }


    

}
