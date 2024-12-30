<?php
use App\Http\Controllers\Admin\AppointmentsController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\admin\MainteanceController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\user\AppointmentController;
use App\Http\Controllers\user\CartController;
use App\Http\Controllers\User\ContactController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\AdminController;




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
// @if (Route::has('login'))
// <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
//     @auth
//         <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
//     @else
//         <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

//         @if (Route::has('register'))
//             <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
//         @endif
//     @endauth
// </div>
// @endif

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/ap', [AppointmentController::class, 'store'])->name('ap.store');
    Route::get('/prod', [\App\Http\Controllers\user\ProductController::class, 'index'])->name('prod');
    Route::post('/cart', [CartController::class, 'store'])->name('cart.store'); // لإضافة منتج إلى السلة
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index'); // لعرض السلة
    Route::put('/cart/{productId}', [CartController::class, 'update'])->name('cart.update'); // لتحديث الكمية
    Route::get('/cart/remove/{productId}', [CartController::class, 'remove'])->name('cart.remove'); // لإزالة منتج من السلة
    Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout');
    
    
Route::post('/man', [\App\Http\Controllers\user\MainteanceController::class, 'store'])->name('man');

   
});
Route::get('/ap', [AppointmentController::class, 'index'])->name('ap');
Route::get('/ma', [\App\Http\Controllers\user\MainteanceController::class, 'index'])->name('ma');

Route::get('/prod', [\App\Http\Controllers\user\ProductController::class, 'index'])->name('prod');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/con', [ContactController::class, 'store'])->name('con');






Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');


    
    Route::middleware('auth:admin')->group(function () {
        Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
        Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('categories', [CategoryController::class, 'store'])->name('categories.store');
        Route::resource('products', ProductController::class);
        Route::get('admin-show', [AdminController::class,'index'])->name('admin.index');
        Route::get('admin-create1', [AdminController::class, 'create'])->name('admin.create');
        Route::post('admin-create', [AdminController::class, 'store'])->name('admin.store');
        Route::patch('admins/{id}/toggle-status', [AdminController::class, 'toggleStatus'])->name('admin.toggleStatus');
        Route::resource('categories', CategoryController::class);
        Route::get('User', [UserController::class,'index'])->name('user.index');
        Route::delete('User-del/{id}', [UserController::class, 'distroy'])->name('user.delete');
        Route::get('order-show', [OrderController::class,'index'])->name('order.index');
        Route::put('/order-status', [OrderController::class, 'updateOrderStatus'])->name('order.updateStatus');

        Route::get('message-show', [MessageController::class,'index'])->name('message.index');
        Route::get('mainteance_requests-show', [MainteanceController::class,'index'])->name('mainteance_requests.index');
        Route::patch('mainteance_requests/{id}/toggle-status', [MainteanceController::class, 'toggleStatus'])->name('maintance_requests.toggleStatus');
        Route::get('appointment-show', [AppointmentsController::class,'index'])->name('appointments.index');
        Route::patch('appointments/{id}/toggle-status', [AppointmentsController::class, 'toggleStatus'])->name('appointments.toggleStatus');


        Route::get('/orders/{id}', [OrderController::class, 'showOrderItems'])->name('orders.show');
        
    });
     
});





require __DIR__.'/auth.php';
