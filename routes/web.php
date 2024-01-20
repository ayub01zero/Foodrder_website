<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Users\UserController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\UserInformationController;
use App\Http\Controllers\frontend\FoodsController;
use App\Http\Controllers\frontend\FavoriteController;
use App\Http\Controllers\frontend\SetOrderController;
use App\Http\Controllers\frontend\OrderController;
use App\Http\Controllers\backend\CouponsController;



// Route::get('/', [IndexController::class, 'Index']);
Route::get('/', function () {
    return view('dashboard');
});

//admin routes
Route::middleware(['auth' , 'Role:admin'])->group(function () {

//admin profile  
Route::prefix('/admin')->controller(AdminController::class)->group(function(){
Route::get('/dashboard/All' , 'AdminDashboard')->name('admin.dashboard');
Route::get('/logout' , 'AdminLogout')->name('admin.logout');
Route::get('/profile' , 'AdminProfile')->name('admin.profile');
Route::post('/profile/store' , 'AdminProfileStore')->name('admin.profile.store');
Route::get('/profile/password' , 'AdminPassword')->name('admin.password');
Route::post('/password/update' , 'AdminUpdatePassword')->name('admin.password.update');
Route::get('/order/confirm/{id}' , 'ConfirmToProcess')->name('confirm.order');
});


//category routes
Route::prefix('/Category')->controller(CategoryController::class)->group(function(){
Route::get('/add' , 'AddCategory')->name('add.category');
Route::post('/store' , 'StoreCategory')->name('store.category');
Route::get('/edit/{id}' , 'EditCategory')->name('edit.category');
Route::get('/All/category' , 'AllCategory')->name('all.category');
Route::post('/update/store/{id}' , 'StoreUpdateCategory')->name('store.update');
Route::get('/delete/{id}' , 'DeleteCategory')->name('delete.category');
});

//product routes 
Route::prefix('/product')->controller(ProductController::class)->group(function(){
Route::get('/add' , 'AddProduct')->name('add.products');
Route::post('/store' , 'StoreProducts')->name('store.products');
Route::get('/All/products' , 'AllProduct')->name('all.products');
Route::get('/edit/{id}' , 'EditProduct')->name('edit.products');
Route::post('/store/update/{id}' , 'StoreUpdateProduct')->name('update.product');
Route::get('/delete{id}' , 'ProductDelete')->name('delete.products');
});


//User information routes for admin
Route::prefix('/users')->controller(UserInformationController::class)->group(function(){
Route::get('/information/order' , 'AllUserInformation')->name('user.info');
Route::get('/contact' , 'AllUserContact')->name('contact.info');
Route::get('/delete/{id}' , 'DeleteUser')->name('delete.user');
Route::get('/orders/{id}' , 'AllUserOrders')->name('users.orders');
Route::get('/orders/details/{id}' , 'AllDetails')->name('details.orders.info');


});


//User information routes for admin
Route::prefix('/coupon')->controller(CouponsController::class)->group(function(){
    Route::get('/all' , 'AllCoupon')->name('all.coupons');
    Route::get('/add' , 'AddCoupon')->name('add.coupons');
    Route::post('/store' , 'StoreCoupon')->name('store.coupon');
    Route::get('/edit/{id}' , 'EditCoupon')->name('edit.coupon');
    Route::post('/update/{id}' , 'UpdateCoupon')->name('update.coupon');
    Route::get('/delete/{id}' , 'DeleteCoupon')->name('delete.coupon');
 
    
    
    });

});


///////////////////////   end of admin middleware


// users protector middleware
Route::middleware(['auth' , 'Role:user'])->group(function () {
// all users setting here
Route::prefix('/user')->controller(UserController::class)->group(function(){ 
Route::get('/logout' , 'UserLogout')->name('User.logout');  
Route::get('/profile' , 'UserProfile')->name('account.profile');  
Route::post('/profile/store' , 'userProfileStore')->name('store.profile');
Route::post('/password/store' , 'UserUpdatePassword')->name('store.password'); 
Route::get('/product/search' , 'SearchProduct')->name('product.search');  
});

//favorite routes
Route::prefix('/favorite')->controller(FavoriteController::class)->group(function(){ 
    Route::get('//Page' , 'FavoritePage')->name('favorite.page');  
    Route::get('/Add/{id}' , 'AddFavorite')->name('add.favorite');
    Route::get('/remove/{id}' , 'RemoveFavorite')->name('remove.favorite');
});

//adding order and cart & checkout route
Route::prefix('/order')->controller(SetOrderController::class)->group(function(){ 
    Route::get('/adding/page/{id}' , 'FetchProductOrder')->name('add.order');
    Route::post('/adding/cart/{id}' , 'AddToCartOrder')->name('add.cart');
    Route::get('/get/cart' , 'FetchAllOrders')->name('my.cart');
    Route::get('/delete/cart/{id}' , 'DeleteCart')->name('delete.cart');
    Route::post('/apply/coupon' , 'CouponApply')->name('apply.coupon');
    Route::get('/apply/checkout' , 'checkoutOrders')->name('apply.checkout');
});

//order routes
Route::prefix('/orders')->controller(OrderController::class)->group(function(){ 
    Route::get('/page' , 'OrdersPage')->name('my.orders');
    Route::get('/page/details/{id}' , 'ViewDetailsOrder')->name('details.orders');
    Route::get('/delete/{id}' , 'DeleteOrder')->name('delete.order');
});

});
    

Route::prefix('/foods')->controller(FoodsController::class)->group(function(){ 
    Route::get('/Page' , 'FoodPage')->name('Foods');
    Route::get('/Page/category/{id}' , 'FoodCategory')->name('my.category');
  


});


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
