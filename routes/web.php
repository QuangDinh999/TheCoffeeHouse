<?php
use Illuminate\Support\Facades\Route;

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




Route::prefix('CoffeeHouse')->group(function (){
    Route::get('/', [\App\Http\Controllers\CoffeeHouse::class, 'index'])->name('CoffeeHouse');
    Route::get('/drink-list', [\App\Http\Controllers\CoffeeHouse::class, 'drinklist'])->name('drink-list');
    Route::get('/search', [\App\Http\Controllers\CoffeeHouse::class, 'search'])->name('search');
    Route::get('/{id}/category', [\App\Http\Controllers\CoffeeHouse::class, 'category'])->name('category');
    Route::get('/{id}/product-detail', [\App\Http\Controllers\CoffeeHouse::class, 'product_detail'])->name('product-detail');
});
Route::middleware('CustomerMiddleware')->prefix('my-account')->group(function (){
    Route::get('/', [\App\Http\Controllers\CoffeeHouse::class, 'my_account'])->name('my-account');
    Route::get('/{id}/detail', [\App\Http\Controllers\CoffeeHouse::class, 'my_account_detail'])->name('my-account_detail');
    Route::get('/{id}/cancel_invoice', [\App\Http\Controllers\CoffeeHouse::class, 'cancel_invoice'])->name('cancel_invoice');
});

Route::middleware('CustomerMiddleware')->prefix('/CoffeeHouse/cart')->group(function (){
    Route::get('/{id}/add_cart', [\App\Http\Controllers\CoffeeHouse::class, 'add_cart'])->name('add_cart');
    Route::get('/add_cart_product_detail', [\App\Http\Controllers\CoffeeHouse::class, 'add_cart'])->name('add_cart_product_detail');
    Route::get('/your-cart', [\App\Http\Controllers\CoffeeHouse::class, 'cart'])->name('cart');
    Route::get('/{id}/delete_one', [\App\Http\Controllers\CoffeeHouse::class, 'delete_one'])->name('delete_one');
    Route::get('/delete_all', [\App\Http\Controllers\CoffeeHouse::class, 'delete_all'])->name('delete_all');
    Route::get('/update_cart', [\App\Http\Controllers\CoffeeHouse::class, 'update_cart'])->name('update_cart');
    Route::get('/checkout', [\App\Http\Controllers\CoffeeHouse::class, 'checkout'])->name('checkout');
    Route::get('/order', [\App\Http\Controllers\CoffeeHouse::class, 'order'])->name('order');
});

Route::prefix('login-admin')->group(function (){
   Route::get('/', [\App\Http\Controllers\AdminController::class, 'login'])->name('admin.login');
   Route::get('/login_process', [\App\Http\Controllers\AdminController::class, 'login_process'])->name('admin.login_process');
   Route::get('/logout', [\App\Http\Controllers\AdminController::class, 'logout'])->name('admin.logout');
});


Route::prefix('login-customer')->group(function (){
    Route::get('/', [\App\Http\Controllers\CustomerController::class, 'loginCustomer'])->name('customer.login');
    Route::get('/login_process', [\App\Http\Controllers\CustomerController::class, 'loginCustomer_process'])->name('customer.login_process');
    Route::get('/logout', [\App\Http\Controllers\CustomerController::class, 'logout'])->name('customer.logout');
});

Route::prefix('register')->group(function (){
    Route::get('/', [\App\Http\Controllers\CustomerController::class, 'store'])->name('customer.register');
});

Route::middleware('AdminMiddleware')->prefix('/category')->group(function (){
    Route::get('/', [\App\Http\Controllers\CategoryController::class, 'index'])->name('category.index');
    Route::get('/create', [\App\Http\Controllers\CategoryController::class, 'create'])->name('category.create');
    Route::post('/create', [\App\Http\Controllers\CategoryController::class, 'store'])->name('category.store');
    Route::get('/{category}/edit', [\App\Http\Controllers\CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/{category}/edit', [\App\Http\Controllers\CategoryController::class, 'update'])->name('category.update');
    Route::delete('/{category}/destroy', [\App\Http\Controllers\CategoryController::class, 'destroy'])->name('category.destroy');
});

Route::middleware('AdminMiddleware')->prefix('/customer')->group(function (){
    Route::get('/', [\App\Http\Controllers\CustomerController::class, 'index'])->name('customer.index');
    Route::get('/create', [\App\Http\Controllers\CustomerController::class, 'create'])->name('customer.create');
    Route::post('/create', [\App\Http\Controllers\CustomerController::class, 'store'])->name('customer.store');
    Route::get('/{customer}/edit', [\App\Http\Controllers\CustomerController::class, 'edit'])->name('customer.edit');
    Route::put('/{customer}/edit', [\App\Http\Controllers\CustomerController::class, 'update'])->name('customer.update');
    Route::delete('/{customer}/destroy', [\App\Http\Controllers\CustomerController::class, 'destroy'])->name('customer.destroy');
});


Route::middleware('AdminMiddleware')->prefix('/size')->group(function (){
    Route::get('/', [\App\Http\Controllers\SizeController::class, 'index'])->name('size.index');
    Route::get('/create', [\App\Http\Controllers\SizeController::class, 'create'])->name('size.create');
    Route::post('/create', [\App\Http\Controllers\SizeController::class, 'store'])->name('size.store');
    Route::get('/{size}/edit', [\App\Http\Controllers\SizeController::class, 'edit'])->name('size.edit');
    Route::put('/{size}/edit', [\App\Http\Controllers\SizeController::class, 'update'])->name('size.update');
    Route::delete('/{size}/destroy', [\App\Http\Controllers\SizeController::class, 'destroy'])->name('size.destroy');
});

Route::middleware('AdminMiddleware')->prefix('/paymentmethods')->group(function (){
    Route::get('/', [\App\Http\Controllers\PaymentController::class, 'index'])->name('payment.index');
    Route::get('/create', [\App\Http\Controllers\PaymentController::class, 'create'])->name('payment.create');
    Route::post('/create', [\App\Http\Controllers\PaymentController::class, 'store'])->name('payment.store');
    Route::get('/{payment}/edit', [\App\Http\Controllers\PaymentController::class, 'edit'])->name('payment.edit');
    Route::put('/{payment}/edit', [\App\Http\Controllers\PaymentController::class, 'update'])->name('payment.update');
    Route::delete('{payment}/destroy', [\App\Http\Controllers\PaymentController::class, 'destroy'])->name('payment.destroy');
});

Route::middleware('AdminMiddleware')->prefix('/drinks')->group(function (){
    Route::get('/', [\App\Http\Controllers\DrinkController::class, 'index'])->name('drink.index');
    Route::get('/create', [\App\Http\Controllers\DrinkController::class, 'create'])->name('drink.create');
    Route::post('/create', [\App\Http\Controllers\DrinkController::class, 'store'])->name('drink.store');
    Route::get('/{drink}/edit', [\App\Http\Controllers\DrinkController::class, 'edit'])->name('drink.edit');
    Route::put('/{drink}/edit', [\App\Http\Controllers\DrinkController::class, 'update'])->name('drink.update');
    Route::delete('/{drink}/destroy', [\App\Http\Controllers\DrinkController::class, 'destroy'])->name('drink.destroy');
    Route::get('/{id}/size', [\App\Http\Controllers\DrinkController::class, 'size_detail'])->name('drink.size_detail');
});

Route::middleware('AdminMiddleware')->prefix('/admins')->group(function (){
    Route::get('/', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
    Route::get('/create', [\App\Http\Controllers\AdminController::class, 'create'])->name('admin.create');
    Route::post('/create', [\App\Http\Controllers\AdminController::class, 'store'])->name('admin.store');
    Route::get('/{admin}/edit', [\App\Http\Controllers\AdminController::class, 'edit'])->name('admin.edit');
    Route::put('/{admin}/edit', [\App\Http\Controllers\AdminController::class, 'update'])->name('admin.update');
    Route::delete('/{admin}/destroy', [\App\Http\Controllers\AdminController::class, 'destroy'])->name('admin.destroy');
    Route::get('/dashboard', [\App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin.dashboard');
});

Route::middleware('AdminMiddleware')->prefix('/drinksize')->group(function (){
    Route::get('/', [\App\Http\Controllers\DrinkSizeController::class, 'index'])->name('drinksize.index');
    Route::get('/create', [\App\Http\Controllers\DrinkSizeController::class, 'create'])->name('drinksize.create');
    Route::post('/create', [\App\Http\Controllers\DrinkSizeController::class, 'store'])->name('drinksize.store');
    Route::get('/{drinkSize}/edit', [\App\Http\Controllers\DrinkSizeController::class, 'edit'])->name('drinksize.edit');
    Route::put('/{drinkSize}/edit', [\App\Http\Controllers\DrinkSizeController::class, 'update'])->name('drinksize.update');
    Route::delete('/{drinkSize}/destroy', [\App\Http\Controllers\DrinkSizeController::class, 'destroy'])->name('drinksize.destroy');
});


Route::middleware('AdminMiddleware')->prefix('/invoice')->group(function (){
    Route::get('/', [\App\Http\Controllers\InvoiceController::class, 'index'])->name('invoice.index');
    Route::get('/new-order', [\App\Http\Controllers\InvoiceController::class, 'new_invoice'])->name('invoice.new_invoice');
    Route::get('/income-invoice', [\App\Http\Controllers\InvoiceController::class, 'income_invoice'])->name('invoice.income-invoice');
    Route::get('/create', [\App\Http\Controllers\DetailedInvoiceController::class, 'invoice_display'])->name('invoice.create');
//    Route::post('/create', [\App\Http\Controllers\InvoiceController::class, 'store'])->name('invoice.store');
    Route::get('/drink_list', [\App\Http\Controllers\DetailedInvoiceController::class, 'create'])->name('invoice.create_detail');
    Route::get('/{id}/drink_detail', [\App\Http\Controllers\DetailedInvoiceController::class, 'drink_detail'])->name('invoice.drink_detail');
    Route::get('/{id}/add_drink_detail', [\App\Http\Controllers\DetailedInvoiceController::class, 'add_drink_detail'])->name('invoice.add_drink_detail');
    Route::get('/delete_detail', [\App\Http\Controllers\DetailedInvoiceController::class, 'delete_detail'])->name('invoice.delete_detail');
    Route::post('/add_detail_invoice', [\App\Http\Controllers\DetailedInvoiceController::class, 'store'])->name('invoice.add_detail_invoice');
    Route::get('/{id}/detail', [\App\Http\Controllers\DetailedInvoiceController::class, 'index'])->name('invoice.detail');
    Route::put('/{id}/{status}/approval', [\App\Http\Controllers\InvoiceController::class, 'update'])->name('invoice.update');
    Route::put('/{id}/{status}/shipping', [\App\Http\Controllers\InvoiceController::class, 'updateShipping'])->name('invoice.shipping');
});
