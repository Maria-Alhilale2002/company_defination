{{-- resources/views/client/auth/register.blade.php --}}
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إنشاء حساب - تسجيل جديد</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <div class="login-header">
                <div class="login-logo">
                    <div class="logo-icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                </div>
                <h1>إنشاء حساب جديد</h1>
                <p>تك رووت</p>
            </div>

            {{-- عرض الأخطاء إن وجدت --}}
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul style="color: red; list-style: none; padding: 0;">
                        @foreach($errors->all() as $error)
                            <li><i class="fas fa-exclamation-circle"></i> {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- عرض رسالة النجاح إن وجدت --}}
            @if(session('success'))
                <div class="alert alert-success" style="color: green; text-align: center;">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                </div>
            @endif

            {{-- تعديل form لإرسال البيانات لرoute التسجيل --}}
            <form class="login-form" method="POST" action="{{ route('client.register') }}">
                @csrf {{-- حماية CSRF --}}
                
                <div class="form-group">
                    <label for="client_name">
                        <i class="fas fa-user"></i>
                        الاسم
                    </label>
                    <input 
                        type="text" 
                        id="client_name" 
                        name="client_name" 
                        placeholder="أدخل الاسم الكامل"
                        value="{{ old('client_name') }}" {{-- الاحتفاظ بالقيمة القديمة --}}
                        required
                        class="@error('client_name') is-invalid @enderror"
                    >
                    @error('client_name')
                        <small style="color: red; font-size: 12px;">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="client_email">
                        <i class="fas fa-envelope"></i>
                        البريد الإلكتروني
                    </label>
                    <input 
                        type="email" 
                        id="client_email" 
                        name="client_email" 
                        placeholder="أدخل البريد الإلكتروني"
                        value="{{ old('client_email') }}"
                        required
                        class="@error('client_email') is-invalid @enderror"
                    >
                    @error('client_email')
                        <small style="color: red; font-size: 12px;">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="client_password">
                        <i class="fas fa-lock"></i>
                        كلمة المرور
                    </label>
                    <input 
                        type="password" 
                        id="client_password" 
                        name="client_password" 
                        placeholder="أدخل كلمة المرور"
                        required
                        class="@error('client_password') is-invalid @enderror"
                    >
                    @error('client_password')
                        <small style="color: red; font-size: 12px;">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="client_password_confirmation">
                        <i class="fas fa-lock"></i>
                        تأكيد كلمة المرور
                    </label>
                    <input 
                        type="password" 
                        id="client_password_confirmation" 
                        name="client_password_confirmation" 
                        placeholder="أعد إدخال كلمة المرور"
                        required
                    >
                </div>

                <button type="submit" class="login-btn">
                    <span>إنشاء حساب</span>
                    <i class="fas fa-user-plus"></i>
                </button>

                <div class="auth-link">
                   <p>لديك حساب بالفعل؟ <a href="{{ route('client.login.page') }}">تسجيل الدخول</a></p>
                </div>
            </form>

            <div class="login-footer">
                <a href="{{ route('index') }}">
                    <i class="fas fa-home"></i>
                    العودة للموقع
                </a>
            </div>
        </div>

        <div class="login-shapes">
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
            <div class="shape shape-3"></div>
        </div>
    </div>
</body>
</html>