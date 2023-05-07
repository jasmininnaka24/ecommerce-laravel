<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Models\User;
use App\Models\UserModel;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware(['web'])->group(function () {

Route::get('/', function () {
    return view('index');
})->name('index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// TEMPORARY

Route::get('/about_us', function () {
    return view('about_us');
})->name('about_us');





Route::get('/profile', function () {
    return view('user_panel.profile');
})->name('user_profile');







// ADMIN


Route::get('/customers', [UserController::class, 'index'])->name('customers');

Route::get('/orders_details/{id}', [UserController::class, 'showOrderDetails'])->name('orders_details');
Route::get('/orders', [UserController::class, 'showOrders'])->name('orders');
Route::get('/ordered_items/{id}', [UserController::class, 'showOrderedItems'])->name('ordered_items');
Route::get('/admin', [UserController::class, 'adminDash'])->name('admin_dashboard');







Route::get('/products_profile', function () {
    return view('admin_panel.products_profile');
})->name('products_profile');


Route::get('/edit_profile', function () {
    return view('user_panel.edit_profile');
})->name('edit_profile');


Route::get('/checkout', function () {
    return view('user_panel.checkout');
})->name('checkout');













// ADMIN - USER
Route::get('/users', [UserController::class, 'index'])->name('users');
Route::delete('/delete_user/{id}', [UserController::class, 'delete_user'])->name('users.delete_user');

// CATEGORIES ROUTE
Route::get('/products', [ProductController::class, 'viewProduct'])->name('products');


// ADMIN - GENERAL PRODUCTS
// SHOW
Route::prefix('')->group(function () {
    Route::get('/products', [ProductController::class, 'viewProduct'])->name('products');
    // ADD
    Route::post('/addProduct', [ProductController::class, 'addProduct'])->name('addProduct');
    // UPDATE
    Route::get('/updateProduct/{id}', [ProductController::class, 'updateProductGet'])->name('product.update_product');
    Route::put('/updateProduct/{id}', [ProductController::class, 'updateProductPost'])->name('updateProduct');
    // DELETE
    Route::delete('/delete_product/{id}', [ProductController::class, 'delete_product'])->name('product.delete_product');
    
    
    
    
    // COFFEE
    Route::get('/coffee', [ProductController::class, 'viewCoffee'])->name('coffee');
    Route::get('/coffee_profile', function(){
        return view('admin_panel.coffee.coffee_profile');
    })->name('coffee_profile');
    Route::post('/addCoffee', [ProductController::class, 'addCoffee'])->name('addCoffee');
    Route::get('/updateCoffee/{id}', [ProductController::class, 'updateCoffeeGet'])->name('update_coffee');
    Route::put('/updateCoffee/{id}', [ProductController::class, 'updateCoffeePost'])->name('updateCoffee');
    Route::delete('/delete_coffee/{id}', [ProductController::class, 'delete_coffee'])->name('delete_coffee');
    
    
    // DRINKS
    Route::get('/drinks', [ProductController::class, 'viewDrinks'])->name('drinks');
    Route::get('/drinks_profile', function(){
        return view('admin_panel.drinks.drinks_profile');
    })->name('drinks_profile');
    Route::post('/addDrinks', [ProductController::class, 'addDrinks'])->name('addDrinks');
    Route::get('/updateDrinks/{id}', [ProductController::class, 'updateDrinksGet'])->name('update_drinks');
    Route::put('/updateDrinks/{id}', [ProductController::class, 'updateDrinksPost'])->name('updateDrinks');
    Route::delete('/delete_drinks/{id}', [ProductController::class, 'delete_drinks'])->name('delete_drinks');
    
    
    // PASTRY
    Route::get('/pastry', [ProductController::class, 'viewPastry'])->name('pastry');
    Route::get('/pastry_profile', function(){
        return view('admin_panel.pastry.pastry_profile');
    })->name('pastry_profile');
    Route::post('/addPastry', [ProductController::class, 'addPastry'])->name('addPastry');
    Route::get('/updatePastry/{id}', [ProductController::class, 'updatePastryGet'])->name('update_pastry');
    Route::put('/updatePastry/{id}', [ProductController::class, 'updatePastryPost'])->name('updatePastry');
    Route::delete('/delete_pastry/{id}', [ProductController::class, 'delete_pastry'])->name('delete_pastry');
    
    
    // PIZZA
    Route::get('/pizza', [ProductController::class, 'viewPizza'])->name('pizza');
    Route::get('/pizza_profile', function(){
        return view('admin_panel.pizza.pizza_profile');
    })->name('pizza_profile');
    Route::post('/addPizza', [ProductController::class, 'addPizza'])->name('addPizza');
    Route::get('/updatePizza/{id}', [ProductController::class, 'updatePizzaGet'])->name('update_pizza');
    Route::put('/updatePizza/{id}', [ProductController::class, 'updatePizzaPost'])->name('updatePizza');
    Route::delete('/delete_pizza/{id}', [ProductController::class, 'delete_pizza'])->name('delete_pizza');



    // SHOW IN USER SIDE THE MENU
    Route::get('/showMenu', function(){
        return view('user_panel.available_menu');
    })->name('showMenu');
    Route::get('/menuProducts/{category}', [ProductController::class, 'menuProducts'])->name('menuProducts');
    Route::get('/subProducts/{category}/{subcategory}', [ProductController::class, 'subProducts'])->name('subProducts');



    // ORDER PRODUCT
    Route::get('/order_product/{id}', [ProductController::class, 'orderProduct'])->name('order_product');

});

Route::prefix('')->group(function () {

    Route::post('/orderProduct/{id}', [OrderController::class, 'orderProductPost'])->name('orderProduct');
    Route::get('/see_order/{id}', [OrderController::class, 'showOrder'])->name('see_order');

    Route::post('/store-selections', [OrderController::class, 'storeSelections'])->name('storeSelections');

});


Route::prefix('')->group(function () {

    Route::post('/checkout', [TransactionController::class, 'saveCheckout'])->name('save_checkout');
    Route::get('/order_transactions', [TransactionController::class, 'showTransaction'])->name('order_transactions');
    Route::post('/statusUpdate/{id}', [TransactionController::class, 'statusUpdate'])->name('statusUpdate');
    Route::post('/statusDelivered/{id}', [TransactionController::class, 'statusDelivered'])->name('statusDelivered');

    });

Route::prefix('')->group(function () {

    Route::put('/updateUserProfile/{id}', [UserController::class, 'updateUserProfile'])->name('updateUserProfile');
    Route::get('/deleteItem/{id}', [UserController::class, 'deleteItem'])->name('deleteItem');
});
});











Route::middleware(['auth'])->group(function () {
    Route::get('/admin_dash', 'DashboardController@index')->name('admin_dash');
    Route::get('/user_home', 'UserHomeController@index')->name('user_home');
});

// Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
// Route::post('/login', 'Auth\LoginController@login');

