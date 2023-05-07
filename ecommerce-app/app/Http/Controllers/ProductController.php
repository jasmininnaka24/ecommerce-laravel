<?php

namespace App\Http\Controllers;

use App\Models\OrderModel;
use Illuminate\Http\Request;
use App\Models\ProductModel;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{



    //******************** VIEW ***************************//
    public function viewProduct (){
        $products = ProductModel::orderByDesc('created_at')->get();

        return view('admin_panel.products', [
            'products' => $products,
        ]);        
    }

    
    public function viewCoffee (){
        $expressos = ProductModel::where('product_subcategory', 'like', '%Expresso%')->get();
        $lattes = ProductModel::where('product_subcategory', 'like', '%Latte%')->get();
        $cappuccinos = ProductModel::where('product_subcategory', 'like', '%Cappuccino%')->get();
        $americanos = ProductModel::where('product_subcategory', 'like', '%Americano%')->get();
        $breweds = ProductModel::where('product_subcategory', 'like', '%Brewed%')->get();

        return view('admin_panel.coffee._coffee', [
            'expressos' => $expressos,
            'lattes' => $lattes,
            'cappuccinos' => $cappuccinos,
            'americanos' => $americanos,
            'breweds' => $breweds,
        ]);
    }


    public function viewDrinks (){
        $milkshakes = ProductModel::where('product_subcategory', 'like', '%Milkshake%')->get();
        $fresh_juices = ProductModel::where('product_subcategory', 'like', '%Fresh Juice%')->get();
        $smoothies = ProductModel::where('product_subcategory', 'like', '%Smoothies%')->get();
        $mocktails = ProductModel::where('product_subcategory', 'like', '%Mocktail%')->get();

        return view('admin_panel.drinks._drinks', [
            'milkshakes' => $milkshakes,
            'fresh_juices' => $fresh_juices,
            'smoothies' => $smoothies,
            'mocktails' => $mocktails,
        ]);
    }


    public function viewPastry (){
        $danishes = ProductModel::where('product_subcategory', 'like', '%Danish%')->get();
        $crossaints = ProductModel::where('product_subcategory', 'like', '%Crossaint%')->get();
        $macaroons = ProductModel::where('product_subcategory', 'like', '%Macaroons%')->get();
        $canolies = ProductModel::where('product_subcategory', 'like', '%Canoli%')->get();

        return view('admin_panel.pastry._pastry', [
            'danishes' => $danishes,
            'crossaints' => $crossaints,
            'macaroons' => $macaroons,
            'canolies' => $canolies,
        ]);
    }


    public function viewPizza (){
        $pizzas = ProductModel::where('product_category', 'like', '%Pizza%')->get();

        return view('admin_panel.pizza._pizza', [
            'pizzas' => $pizzas,
        ]);
    }








    
    //******************* */ ADD ***************************//
    public function addProduct(Request $request)
    {
        $product_img = $request->file('product_img')->store('product_images','public');
        $product_category = $request->product_category;
        $product_subcategory = $request->product_subcategory;
        $product_name = $request->product_name;
        $product_small = $request->product_small;
        $product_medium = $request->product_medium;
        $product_large = $request->product_large;
    
        ProductModel::create([
            "product_img" => $product_img,
            "product_category" => $product_category,
            "product_subcategory" => $product_subcategory,
            "product_name" => $product_name,
            "product_small" => $product_small,
            "product_medium" => $product_medium,
            "product_large" => $product_large,
        ]);
    
        return redirect()->route('products');
    }
    

    public function addCoffee(Request $request)
    {
        $product_img = $request->file('product_img')->store('product_images','public');
        $product_category = $request->product_category;
        $product_subcategory = $request->product_subcategory;
        $product_name = $request->product_name;
        $product_small = $request->product_small;
        $product_medium = $request->product_medium;
        $product_large = $request->product_large;
        
        ProductModel::create([
            "product_img" => $product_img,
            "product_category" => $product_category,
            "product_subcategory" => $product_subcategory,
            "product_name" => $product_name,
            "product_small" => $product_small,
            "product_medium" => $product_medium,
            "product_large" => $product_large,
        ]);
        
        return redirect()->route('coffee');
    }
    

    public function addDrinks(Request $request)
    {
        $product_img = $request->file('product_img')->store('product_images','public');
        $product_category = $request->product_category;
        $product_subcategory = $request->product_subcategory;
        $product_name = $request->product_name;
        $product_small = $request->product_small;
        $product_medium = $request->product_medium;
        $product_large = $request->product_large;
        
        ProductModel::create([
            "product_img" => $product_img,
            "product_category" => $product_category,
            "product_subcategory" => $product_subcategory,
            "product_name" => $product_name,
            "product_small" => $product_small,
            "product_medium" => $product_medium,
            "product_large" => $product_large,
        ]);
        
        return redirect()->route('drinks');
    }
    

    public function addPastry(Request $request)
    {
        $product_img = $request->file('product_img')->store('product_images','public');
        $product_category = $request->product_category;
        $product_subcategory = $request->product_subcategory;
        $product_name = $request->product_name;
        $product_small = $request->product_small;
        $product_medium = $request->product_medium;
        $product_large = $request->product_large;
        
        ProductModel::create([
            "product_img" => $product_img,
            "product_category" => $product_category,
            "product_subcategory" => $product_subcategory,
            "product_name" => $product_name,
            "product_small" => $product_small,
            "product_medium" => $product_medium,
            "product_large" => $product_large,
        ]);
        
        return redirect()->route('pastry');
    }
    
    

    public function addPizza(Request $request)
    {
        $product_img = $request->file('product_img')->store('product_images','public');
        $product_category = $request->product_category;
        $product_subcategory = $request->product_subcategory;
        $product_name = $request->product_name;
        $product_small = $request->product_small;
        $product_medium = $request->product_medium;
        $product_large = $request->product_large;
        
        ProductModel::create([
            "product_img" => $product_img,
            "product_category" => $product_category,
            "product_subcategory" => $product_subcategory,
            "product_name" => $product_name,
            "product_small" => $product_small,
            "product_medium" => $product_medium,
            "product_large" => $product_large,
        ]);
        
        return redirect()->route('pizza');
    }
    
    

    
    
    
    









    //******************* */ UPDATE GET ***************************//
    public function updateProductGet ($id){
        $product = ProductModel::findOrFail($id);

        return view('admin_panel.edit_product', ['product' => $product]);
    }
    
    public function updateCoffeeGet ($id){
        $product = ProductModel::findOrFail($id);
        
        return view('admin_panel.coffee.coffee_update', ['product' => $product]);
    }
    
    
    public function updateDrinksGet ($id){
        $product = ProductModel::findOrFail($id);
        
        return view('admin_panel.drinks.drinks_update', ['product' => $product]);
    }
    
    
    public function updatePastryGet ($id){
        $product = ProductModel::findOrFail($id);
        
        return view('admin_panel.pastry.pastry_update', ['product' => $product]);
    }
    
    
    public function updatePizzaGet ($id){
        $product = ProductModel::findOrFail($id);
        
        return view('admin_panel.pizza.pizza_update', ['product' => $product]);
    }
    
    
    
    
    
    
    
    
    //******************* */ UPDATE GET ***************************//
    public function updateProductPost (Request $request, $id) {
        $product_category = $request->product_category;
        $product_subcategory = $request->product_subcategory;
        $product_name = $request->product_name;
        $product_small = $request->product_small;
        $product_medium = $request->product_medium;
        $product_large = $request->product_large;

        if ($request->hasFile('product_img')) {
            $product_img = $request->file('product_img')->store('product_images','public');
            $data = [
                "product_img" => $product_img,
                "product_category" => $product_category,
                "product_subcategory" => $product_subcategory,
                "product_name" => $product_name,
                "product_small" => $product_small,
                "product_medium" => $product_medium,
                "product_large" => $product_large,

            ];
        } else {
            $data = [
                "product_category" => $product_category,
                "product_subcategory" => $product_subcategory,
                "product_name" => $product_name,

            ];
        }
        
        
        $product = ProductModel::find($id);
        $product->update($data);
        
        return redirect()->route('products', ['id' => $product->id]);
        ;
        
    }


    public function updateCoffeePost(Request $request, $id) {
        $product = ProductModel::findOrFail($id);
    
        $product_name = $request->product_name;
        $product_small = $request->product_small;
        $product_medium = $request->product_medium;
        $product_large = $request->product_large;
    
        $data = [
            "product_name" => $product_name,
            "product_small" => $product_small,
            "product_medium" => $product_medium,
            "product_large" => $product_large,
        ];
    
        $product->update($data);
    
        // Update corresponding orders in the order table
        $orders = OrderModel::where('product_id', $id)->get();
        foreach ($orders as $order) {
            if ($order->size === 'small' && $product_small) {
                $order->update([
                    'product_name' => $product_name,
                    'unit_price' => $product_small
                ]);
            } elseif ($order->size === 'medium' && $product_medium) {
                $order->update([
                    'product_name' => $product_name,
                    'unit_price' => $product_medium
                ]);
            } elseif ($order->size === 'large' && $product_large) {
                $order->update([
                    'product_name' => $product_name,
                    'unit_price' => $product_large
                ]);
            }
        }
    
        return redirect()->route('coffee', ['id' => $product->id]);
    }
    
     
    

    public function updateDrinksPost (Request $request, $id) {
        $product = ProductModel::findOrFail($id);
    
        $product_name = $request->product_name;
        $product_small = $request->product_small;
        $product_medium = $request->product_medium;
        $product_large = $request->product_large;
    
        $data = [
            "product_name" => $product_name,
            "product_small" => $product_small,
            "product_medium" => $product_medium,
            "product_large" => $product_large,
        ];
    
        $product->update($data);
    
        // Update corresponding orders in the order table
        $orders = OrderModel::where('product_id', $id)->get();
        foreach ($orders as $order) {
            if ($order->size === 'small' && $product_small) {
                $order->update([
                    'product_name' => $product_name,
                    'unit_price' => $product_small
                ]);
            } elseif ($order->size === 'medium' && $product_medium) {
                $order->update([
                    'product_name' => $product_name,
                    'unit_price' => $product_medium
                ]);
            } elseif ($order->size === 'large' && $product_large) {
                $order->update([
                    'product_name' => $product_name,
                    'unit_price' => $product_large
                ]);
            }
        }
        
        return redirect()->route('drinks', ['id' => $product->id]);
    
    }




    public function updatePastryPost (Request $request, $id) {
        $product = ProductModel::findOrFail($id);
    
        $product_name = $request->product_name;
        $product_small = $request->product_small;
        $product_medium = $request->product_medium;
        $product_large = $request->product_large;
    
        $data = [
            "product_name" => $product_name,
            "product_small" => $product_small,
            "product_medium" => $product_medium,
            "product_large" => $product_large,
        ];
    
        $product->update($data);
    
        // Update corresponding orders in the order table
        $orders = OrderModel::where('product_id', $id)->get();
        foreach ($orders as $order) {
            if ($order->size === 'small' && $product_small) {
                $order->update([
                    'product_name' => $product_name,
                    'unit_price' => $product_small
                ]);
            } elseif ($order->size === 'medium' && $product_medium) {
                $order->update([
                    'product_name' => $product_name,
                    'unit_price' => $product_medium
                ]);
            } elseif ($order->size === 'large' && $product_large) {
                $order->update([
                    'product_name' => $product_name,
                    'unit_price' => $product_large
                ]);
            }
        }
        
        return redirect()->route('pastry', ['id' => $product->id]);
    
    }




    public function updatePizzaPost (Request $request, $id) {
        $product = ProductModel::findOrFail($id);
    
        $product_name = $request->product_name;
        $product_small = $request->product_small;
        $product_medium = $request->product_medium;
        $product_large = $request->product_large;
    
        $data = [
            "product_name" => $product_name,
            "product_small" => $product_small,
            "product_medium" => $product_medium,
            "product_large" => $product_large,
        ];
    
        $product->update($data);
    
        // Update corresponding orders in the order table
        $orders = OrderModel::where('product_id', $id)->get();
        foreach ($orders as $order) {
            if ($order->size === 'small' && $product_small) {
                $order->update([
                    'product_name' => $product_name,
                    'unit_price' => $product_small
                ]);
            } elseif ($order->size === 'medium' && $product_medium) {
                $order->update([
                    'product_name' => $product_name,
                    'unit_price' => $product_medium
                ]);
            } elseif ($order->size === 'large' && $product_large) {
                $order->update([
                    'product_name' => $product_name,
                    'unit_price' => $product_large
                ]);
            }
        }
        
        return redirect()->route('pizza', ['id' => $product->id]);
    
    }




















    //******************* */ DELETE ***************************//

    public function delete_product ($id) {
        $product = ProductModel::findOrFail($id);
    
        // unlink image from storage
        $imagePath = $product->product_img;
        if(Storage::disk('public')->exists($imagePath)) {
            Storage::disk('public')->delete($imagePath);
        }
    
        $product->delete();
    
        return redirect()->route('products')->with('success', 'Product record deleted successfully!');
    }
    

    public function delete_coffee ($id) {
        $student = ProductModel::findOrFail($id);

        // unlink image from storage
        $imagePath = $student->product_img;
        if(Storage::disk('public')->exists($imagePath)) {
            Storage::disk('public')->delete($imagePath);
        }

        $student->delete();
        OrderModel::where('product_id', $id)->delete();


        return redirect()->route('coffee')->with('success', 'Product record deleted successfully!');
    }

    public function delete_drinks ($id) {
        $student = ProductModel::findOrFail($id);

        // unlink image from storage
        $imagePath = $student->product_img;
        if(Storage::disk('public')->exists($imagePath)) {
            Storage::disk('public')->delete($imagePath);
        }

        $student->delete();
        OrderModel::where('product_id', $id)->delete();


        return redirect()->route('drinks')->with('success', 'Product record deleted successfully!');
    }

    public function delete_pastry ($id) {
        $student = ProductModel::findOrFail($id);

        // unlink image from storage
        $imagePath = $student->product_img;
        if(Storage::disk('public')->exists($imagePath)) {
            Storage::disk('public')->delete($imagePath);
        }

        $student->delete();
        OrderModel::where('product_id', $id)->delete();


        return redirect()->route('pastry')->with('success', 'Product record deleted successfully!');
    }

    public function delete_pizza ($id) {
        $student = ProductModel::findOrFail($id);

        // unlink image from storage
        $imagePath = $student->product_img;
        if(Storage::disk('public')->exists($imagePath)) {
            Storage::disk('public')->delete($imagePath);
        }

        $student->delete();
        OrderModel::where('product_id', $id)->delete();


        return redirect()->route('pizza')->with('success', 'Product record deleted successfully!');
    }






    // ******************* SHOW IN USER SIDE ************************* //

    public function menuProducts ($category) {
        // $categories = ProductModel::select('product_subcategory')->distinct()->get();

        $categoryVal = $category;
        switch (true) {
            case $category === 'Coffee':
                $category = ProductModel::where('product_category', 'like', '%Coffee%')->get();
                break;
            case $category === 'Pastry':
                $category = ProductModel::where('product_category', 'like', '%Pastry%')->get();
                break;
            case $category === 'Drinks':
                $category = ProductModel::where('product_category', 'like', '%Drinks%')->get();
                break;
            case $category === 'Pizza':
                $category = ProductModel::where('product_category', 'like', '%Pizza%')->get();
                break;
        }

        $subcategories = ProductModel::whereIn('product_category', $category->pluck('product_category'))->get();

        // dd($subcategories);
        $distinct = ProductModel::whereIn('product_category', $category->pluck('product_category'))
                             ->select('product_subcategory')
                             ->distinct()
                             ->get();

        return view('user_panel.menu_products', [
            'subcategories' => $subcategories,
            'category' => $categoryVal,
            'distinct' => $distinct,
        ]); 
    }

    public function subProducts ($category, $subcategory) {
        // $categories = ProductModel::select('product_subcategory')->distinct()->get();

        $categoryVal = $category;
        switch (true) {
            case $category === 'Coffee':
                $category = ProductModel::where('product_category', 'like', '%Coffee%')->get();
                break;
            case $category === 'Pastry':
                $category = ProductModel::where('product_category', 'like', '%Pastry%')->get();
                break;
            case $category === 'Drinks':
                $category = ProductModel::where('product_category', 'like', '%Drinks%')->get();
                break;
            case $category === 'Pizza':
                $category = ProductModel::where('product_category', 'like', '%Pizza%')->get();
                break;
        }

        $subcategories = ProductModel::where('product_subcategory', 'like', "%$subcategory%")->get();

    
        // dd($subcategories);
        $distinct = ProductModel::whereIn('product_category', $category->pluck('product_category'))
                             ->select('product_subcategory')
                             ->distinct()
                             ->get();

        return view('user_panel.sub_products', [
            'subcategoryVal' => $subcategory,
            'subcategories' => $subcategories,
            'categories' => $category,
            'category' => $categoryVal,
            'distinct' => $distinct,
        ]); 
    }

    public function orderProduct($id) {
        $product = ProductModel::findOrFail($id);
        $ids = [$id];
        $smalls = ProductModel::whereIn('id', $ids)
            ->select('product_small')
            ->distinct()
            ->get();
        $mediums = ProductModel::whereIn('id', $ids)
            ->select('product_medium')
            ->distinct()
            ->get();
        $larges = ProductModel::whereIn('id', $ids)
            ->select('product_large')
            ->distinct()
            ->get();
    
        return view('user_panel.order_product', [
            'product' => $product,
            'smalls' => $smalls,
            'mediums' => $mediums,
            'larges' => $larges,
        ]);
    }
    
}
