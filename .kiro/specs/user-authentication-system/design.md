# مستند التصميم - إصلاح نظام المصادقة والتسجيل

## نظرة عامة

هذا التصميم يهدف إلى إصلاح المشاكل الموجودة في نظام المصادقة والتسجيل الحالي في تطبيق Laravel. النظام الحالي يستخدم جدول `clients` مع حقول مخصصة، ولكن يعاني من مشاكل في التنفيذ تمنع عمليات التسجيل وتسجيل الدخول من العمل بشكل صحيح.

### المشاكل الحالية المحددة:
1. ملف `ClientController.php` يحتوي على كود نموذج بدلاً من controller
2. مشاكل في إعدادات المصادقة والتوجيه
3. مسارات مكررة وغير منظمة في `routes/web.php`
4. مشاكل في استخدام Laravel Guards مع الحقول المخصصة

## البنية المعمارية

### مكونات النظام الحالية:
- **نموذج Client**: `app/Models/Client.php` - يعمل بشكل صحيح
- **جدول clients**: يحتوي على الحقول المطلوبة
- **إعدادات المصادقة**: `config/auth.php` - مكونة بشكل صحيح
- **Controllers**: تحتاج إصلاح
- **المسارات**: تحتاج تنظيم وإصلاح

### تدفق المصادقة المطلوب:
```
عميل جديد → نموذج التسجيل → RegisterController → إنشاء حساب → تسجيل دخول تلقائي → توجيه حسب الدور
عميل موجود → نموذج الدخول → LoginController → مصادقة → توجيه حسب الدور
```

## المكونات والواجهات

### 1. نموذج Client (موجود - يحتاج تحسينات طفيفة)

```php
// app/Models/Client.php
class Client extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'clients';
    protected $primaryKey = 'client_id';
    
    protected $fillable = [
        'client_name', 'client_email', 'client_password', 
        'role', 'is_active', 'client_logo', 'client_feature',
        'client_name_en', 'client_feature_en'
    ];

    protected $hidden = ['client_password', 'remember_token'];

    // مطلوب لـ Laravel Auth
    public function getAuthIdentifierName(): string
    public function getAuthPassword(): string
    
    // دوال مساعدة
    public function isAdmin(): bool
    public function isActive(): bool
}
```

### 2. ClientController (يحتاج إعادة كتابة كاملة)

```php
// app/Http/Controllers/ClientController.php
class ClientController extends Controller
{
    public function index(): JsonResponse
    public function store(StoreClientRequest $request): JsonResponse
    public function show(int $clientId): JsonResponse
    public function update(UpdateClientRequest $request, int $clientId): JsonResponse
    public function destroy(int $clientId): JsonResponse
}
```

### 3. RegisterController (يحتاج إصلاحات)

```php
// app/Http/Controllers/RegisterController.php
class RegisterController extends Controller
{
    public function __construct()
    public function showRegisterForm(): View
    public function register(RegisterRequest $request): RedirectResponse
}
```

### 4. LoginController (يحتاج إصلاحات)

```php
// app/Http/Controllers/LoginController.php
class LoginController extends Controller
{
    public function showLoginForm(): View
    public function login(LoginRequest $request): RedirectResponse
    public function logout(Request $request): RedirectResponse
}
```

### 5. Form Requests (جديدة)

```php
// app/Http/Requests/RegisterRequest.php
class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    public function rules(): array
    public function messages(): array
}

// app/Http/Requests/LoginRequest.php
class LoginRequest extends FormRequest
{
    public function authorize(): bool
    public function rules(): array
    public function messages(): array
}
```

## نماذج البيانات

### جدول clients (موجود)
```sql
clients:
- client_id (primary key)
- client_name (string)
- client_email (string, unique)
- client_password (string, hashed)
- role (enum: 'admin', 'client')
- is_active (boolean)
- client_logo (string, nullable)
- client_feature (text, nullable)
- client_name_en (string, nullable)
- client_feature_en (text, nullable)
- created_at, updated_at
```

### بيانات التسجيل
```php
RegisterData:
- client_name: string (3-255 chars)
- client_email: string (valid email, unique)
- client_password: string (min 6 chars)
- client_password_confirmation: string (must match)
```

### بيانات تسجيل الدخول
```php
LoginData:
- client_email: string (valid email)
- client_password: string
- remember: boolean (optional)
```

## إصلاح المسارات

### مسارات الضيوف (Guest Routes)
```php
Route::middleware('guest:client')->group(function () {
    Route::get('/register_client', [RegisterController::class, 'showRegisterForm'])
         ->name('client.register.page');
    Route::post('/register_client', [RegisterController::class, 'register'])
         ->name('client.register');
    
    Route::get('/login_client', [LoginController::class, 'showLoginForm'])
         ->name('client.login.page');
    Route::post('/login_client', [LoginController::class, 'login'])
         ->name('client.login');
});
```

### مسارات المصادقة (Authenticated Routes)
```php
Route::middleware('auth:client')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])
         ->name('client.logout');
    
    // مسارات الإدارة (للمديرين فقط)
    Route::middleware('role:admin')->group(function () {
        Route::get('/admin', function () {
            return view('admin');
        })->name('admin');
        
        // مسارات التحرير الإدارية
        Route::get('/edit_home', fn() => view('edit_home'));
        Route::get('/edit_services', fn() => view('edit_services'));
        Route::get('/edit_about', fn() => view('edit_about'));
        
        // مسارات التحديث
        Route::put('/home/{id}', [HomeController::class, 'update'])->name('home.update');
        Route::put('/services/{id}', [ServiceController::class, 'update'])->name('services.update');
        Route::put('/about/{id}', [AboutController::class, 'update'])->name('about.update');
        
        // مسارات التفريغ
        Route::post('/home/clear/{id}', [HomeController::class, 'clear'])->name('home.clear');
        Route::post('/services/clear/{id}', [ServiceController::class, 'clear'])->name('services.clear');
        Route::post('/products/clear/{id}', [ProductController::class, 'clear'])->name('products.clear');
        Route::post('/about/clear/{id}', [AboutController::class, 'clear'])->name('about.clear');
    });
});
```

### Middleware مخصص للأدوار
```php
// app/Http/Middleware/CheckRole.php
class CheckRole
{
    public function handle(Request $request, Closure $next, string $role): Response
}
```

## معالجة الأخطاء

### أنواع الأخطاء المتوقعة:
1. **أخطاء التحقق من صحة البيانات**: بريد إلكتروني غير صحيح، كلمة مرور ضعيفة
2. **أخطاء المصادقة**: بيانات دخول خاطئة، حساب غير نشط
3. **أخطاء التوجيه**: محاولة الوصول لصفحات غير مصرح بها
4. **أخطاء النظام**: مشاكل قاعدة البيانات، أخطاء الخادم

### استراتيجية معالجة الأخطاء:
- استخدام Form Requests للتحقق من صحة البيانات
- رسائل خطأ واضحة ومفيدة باللغة العربية
- الاحتفاظ بالبيانات المدخلة عند حدوث أخطاء (عدا كلمات المرور)
- تسجيل الأخطاء الحرجة في logs
- إرجاع رسائل نجاح عند إتمام العمليات

## استراتيجية الاختبار

### اختبارات الوحدة (Unit Tests)
- اختبار دوال نموذج Client (isAdmin, isActive)
- اختبار Form Requests validation rules
- اختبار Middleware functionality

### اختبارات الميزات (Feature Tests)
- اختبار تدفق التسجيل الكامل
- اختبار تدفق تسجيل الدخول
- اختبار التوجيه حسب الدور
- اختبار تسجيل الخروج
- اختبار حماية المسارات

### اختبارات التكامل
- اختبار التكامل مع Laravel Guards
- اختبار التكامل مع قاعدة البيانات
- اختبار التكامل مع الجلسات

## خصائص الصحة

*الخاصية هي سمة أو سلوك يجب أن يكون صحيحاً عبر جميع عمليات التنفيذ الصالحة للنظام - في الأساس، بيان رسمي حول ما يجب أن يفعله النظام. تعمل الخصائص كجسر بين المواصفات المقروءة بواسطة الإنسان وضمانات الصحة القابلة للتحقق آلياً.*

### الخاصية 1: إنشاء حساب جديد
*لأي* بيانات تسجيل صحيحة (اسم صحيح، بريد إلكتروني فريد، كلمة مرور قوية)، يجب على النظام إنشاء سجل جديد في جدول clients مع تشفير كلمة المرور
**يتحقق من: المتطلبات 1.1, 1.2**

### الخاصية 2: تسجيل دخول تلقائي بعد التسجيل
*لأي* عملية تسجيل ناجحة، يجب على النظام تسجيل دخول العميل تلقائياً باستخدام Auth::guard('client')
**يتحقق من: المتطلبات 1.3**

### الخاصية 3: التوجيه حسب الدور
*لأي* عميل مصادق، يجب على النظام توجيهه إلى الصفحة الصحيحة حسب دوره (admin → route('admin'), client → route('index'))
**يتحقق من: المتطلبات 1.5, 2.4**

### الخاصية 4: مصادقة بيانات الدخول الصحيحة
*لأي* بيانات دخول صحيحة (بريد إلكتروني موجود، كلمة مرور صحيحة)، يجب على النظام نجاح المصادقة باستخدام Auth::guard('client')->attempt
**يتحقق من: المتطلبات 2.1**

### الخاصية 5: رفض المستخدمين غير النشطين
*لأي* عميل له حالة is_active = false، يجب على النظام رفض تسجيل الدخول حتى لو كانت بيانات الدخول صحيحة
**يتحقق من: المتطلبات 2.3**

### الخاصية 6: حماية الصفحات المحمية
*لأي* محاولة وصول من عميل غير مصادق إلى صفحة محمية، يجب على النظام توجيهه إلى صفحة تسجيل الدخول
**يتحقق من: المتطلبات 3.3**

### الخاصية 7: توجيه المستخدمين المصادقين بعيداً عن صفحات المصادقة
*لأي* عميل مصادق يحاول الوصول إلى صفحات التسجيل أو تسجيل الدخول، يجب على النظام توجيهه إلى صفحته الرئيسية
**يتحقق من: المتطلبات 3.4**

### الخاصية 8: تطبيق Middleware الصحيح
*لأي* مسار محمي، يجب على النظام تطبيق middleware('auth:client') أو middleware('guest:client') المناسب
**يتحقق من: المتطلبات 5.4**

### الخاصية 9: معالجة الأخطاء بشكل مناسب
*لأي* خطأ في عمليات المصادقة، يجب على النظام إرجاع رسالة خطأ واضحة ومفيدة مع الاحتفاظ بالبيانات المدخلة الصحيحة
**يتحقق من: المتطلبات 6.4**

### الخاصية 10: تشفير كلمات المرور
*لأي* كلمة مرور يتم حفظها في قاعدة البيانات، يجب أن تكون مشفرة وليست نص خام
**يتحقق من: المتطلبات 1.2**