<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjwanController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\ViewByCategoryController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// --------------------------------- Ajwan route ---------------------------------------

Route::get('/', [AjwanController::class, 'Index'])->name('ajwan');

//contact route 
Route::get('/contact', [AjwanController::class, 'Contact'])->name('contact');

// product details
Route::get('/product/{category}/{id}', [AjwanController::class, 'ProductDetails']);

// =================== cart route ====================
Route::get('/add-to-cart/{product_id}', [CartController::class, 'AddToCart']);
Route::get('/Cart', [CartController::class, 'Cart'])->name('cart');
Route::get('/cart/destroy/{id}', [CartController::class, 'DestroyCart']);
Route::get('/get-cart-count', [CartController::class, 'getCartCount'])->name('cart.count');

// =========================== checkout route ====================

Route::get('/Checkout', [CheckoutController::class, 'Chekout'])->name('checkout');
Route::post('/proccess-checkout',[CheckoutController::class,'ProccessCheckout'])->name('proccess-checkout');


// ================================ view by category route ========================

Route::get('/category/{category_name}', [ViewByCategoryController::class, 'index'])->name('view-by-category');















// ------------------------ admin route ==============================


Route::get('/admin/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard',function(){
    return redirect('/admin/dashboard');
});

// =========================== categroy upload==========================
Route::middleware('auth')->group(function () {
    Route::get('/admin/category',[AdminCategoryController::class,'index'])->name('admin.category');
    Route::post('/admin/category/add',[AdminCategoryController::class,'Add'])->name('admin.category.add');
    Route::get('/admin/category/delete/{id}',[AdminCategoryController::class,'Delete']);


    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// =========================== Product  upload==========================
Route::middleware('auth')->group(function () {
    Route::get('/admin/products',[AdminProductController::class,'index'])->name('admin.product.index');
    Route::get('/admin/product/add',[AdminProductController::class,'AddProduct'])->name('admin.product.add');
    Route::post('/admin/product/store',[AdminProductController::class,'StoreProduct'])->name('admin.product.store');
    Route::get('/admin/product/delete/{id}',[AdminProductController::class,'DeleteProduct'])->name('admin.product.delete');
    Route::get('/admin/product/edit/{id}',[AdminProductController::class,'EditProduct'])->name('admin.product.edit');
    Route::post('/admin/product/store-update/{id}',[AdminProductController::class,'StoreUpdatedProduct'])->name('admin.product.store-update');


});

// =========================== order management ==========================

Route::middleware('auth')->group(function () {
    Route::get('/admin/order/all',[AdminOrderController::class,'AllOrder'])->name('admin.order.index');
    Route::get('/admin/order/delete/{id}',[AdminOrderController::class,'DeleteOrder'])->name('admin.order.delete');
    Route::get('/admin/order/view-details/{id}',[AdminOrderController::class,'ViewDetails'])->name('admin.order.details');
    Route::get('/admin/order/invoice/{id}',[AdminOrderController::class,'OderInvoice'])->name('admin.order.invoice');
    Route::get('/admin/order/invoice/pdf/{id}',[AdminOrderController::class,'GenerateInvoice']);
    Route::post('/admin/order/order_status/update/{id}',[AdminOrderController::class,'UpdateOrderStatus']);
    Route::post('/admin/order/filter',[AdminOrderController::class,'FilterOrder'])->name('admin.order.filter');




    


});



require __DIR__.'/auth.php';
