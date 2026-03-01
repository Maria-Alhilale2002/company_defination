<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

// الصفحات العامة (متاحة للجميع)
Route::get('/', [PageController::class, 'index'])->name('index')->middleware('redirect.admin');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/products', [PageController::class, 'products'])->name('products');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/send', [ContactController::class, 'store'])->name('send');
Route::get('/client_view', [PageController::class, 'client_view'])->name('client_view');

// مسارات المصادقة (مع التعامل الذكي للمستخدمين المسجلين)
Route::middleware('redirect.auth:client')->group(function () {
    Route::get('/register_client', [RegisterController::class, 'showRegisterForm'])->name('client.register.page');
    Route::get('/login_client', [LoginController::class, 'showLoginForm'])->name('client.login.page');
});

// مسارات التسجيل (للضيوف فقط)
Route::middleware('guest:client')->group(function () {
    Route::post('/register_client', [RegisterController::class, 'register'])->name('client.register');
    Route::post('/login_client', [LoginController::class, 'login'])->name('client.login');
});

// مسارات للمستخدمين المسجلين
Route::middleware('client.auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('client.logout');
    Route::get('/profile', [ClientController::class, 'profile'])->name('client.profile');

    // للأدمن فقط: إنشاء حسابات جديدة
    Route::middleware('client.admin')->group(function () {
        Route::get('/admin/create-user', [RegisterController::class, 'showAdminCreateForm'])->name('admin.create.user');
        Route::post('/admin/create-user', [RegisterController::class, 'adminCreateUser'])->name('admin.create.user.store');
    });
});

// مسارات الأدمن (تتطلب تسجيل دخول + صلاحية أدمن)
Route::middleware(['client.auth', 'client.admin'])->group(function () {
    Route::get('/admin', [ClientController::class, 'adminDashboard'])->name('admin');
    Route::get('/admin/clients', [ClientController::class, 'viewClients'])->name('admin.clients');
    Route::delete('/admin/clients/{id}', [ClientController::class, 'deleteClient'])->name('admin.clients.delete');
    Route::post('/admin/clients/{id}/toggle-featured', [ClientController::class, 'toggleFeatured'])->name('admin.clients.toggle-featured');

    // مسارات إدارة المنتجات
    Route::get('/admin/products', [ProductController::class, 'adminIndex'])->name('admin.products.index');
    Route::get('/admin/products/create', [ProductController::class, 'adminCreate'])->name('admin.products.create');
    Route::post('/admin/products', [ProductController::class, 'adminStore'])->name('admin.products.store');
    Route::get('/admin/products/{id}/edit', [ProductController::class, 'adminEdit'])->name('admin.products.edit');
    Route::put('/admin/products/{id}', [ProductController::class, 'adminUpdate'])->name('admin.products.update');
    Route::delete('/admin/products/{id}', [ProductController::class, 'adminDestroy'])->name('admin.products.delete');

    // صفحات التحرير
    Route::get('/edit_home', function () {
        return view('edit_home');
    });
    Route::put('/home/{id}', [HomeController::class, 'update'])->name('home.update');

    Route::get('/edit_services', function () {
        return view('edit_services');
    });
    Route::put('/services/{id}', [ServiceController::class, 'update'])->name('services.update');

    Route::get('/edit_about', function () {
        return view('edit_about');
    });
    Route::put('/about/{id}', [AboutController::class, 'update'])->name('about.update');

    // Routes للتفريغ (وليس الحذف)
    Route::post('/home/clear/{id}', [HomeController::class, 'clear'])->name('home.clear');
    Route::post('/services/clear/{id}', [ServiceController::class, 'clear'])->name('services.clear');
    Route::post('/products/clear/{id}', [ProductController::class, 'clear'])->name('products.clear');
    Route::post('/about/clear/{id}', [AboutController::class, 'clear'])->name('about.clear');
});

// مسار للتوافق مع الكود القديم (إعادة توجيه)
Route::get('/register', function () {
    return redirect()->route('client.register.page');
})->name('register');
