<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إنشاء مستخدم جديد</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #5b21b6;
            --secondary-color: #6d28d9;
            --dark-purple: #4c1d95;
            --light-purple: #a78bfa;
            --accent-color: #7c3aed;
            --text-dark: #1e1b4b;
            --text-light: #64748b;
            --white: #ffffff;
            --gray-50: #f8fafc;
            --gray-100: #f1f5f9;
            --shadow: 0 10px 25px rgba(91, 33, 182, 0.15);
            --shadow-lg: 0 20px 40px rgba(91, 33, 182, 0.2);
        }

        body {
            font-family: 'Cairo', sans-serif;
            margin: 0;
            padding: 20px;
            background: linear-gradient(135deg, var(--gray-50) 0%, #e2e8f0 100%);
            min-height: 100vh;
            color: var(--text-dark);
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background: var(--white);
            padding: 3rem;
            border-radius: 25px;
            box-shadow: var(--shadow-lg);
            position: relative;
        }

        .page-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .header-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            color: var(--white);
            margin: 0 auto 1.5rem;
            box-shadow: var(--shadow);
        }

        .page-header h1 {
            font-size: 2rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 0.5rem;
        }

        .page-header p {
            color: var(--text-light);
            font-size: 1.1rem;
        }

        .success-message {
            background: #d1fae5;
            color: #065f46;
            border: 2px solid #10b981;
            padding: 1rem 1.5rem;
            border-radius: 12px;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .success-message i {
            font-size: 1.2rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 0.8rem;
            font-size: 1rem;
        }

        .form-group label i {
            color: var(--primary-color);
            font-size: 1.1rem;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 15px 18px;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-family: 'Cairo', sans-serif;
            font-size: 1rem;
            transition: all 0.3s ease;
            box-sizing: border-box;
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(91, 33, 182, 0.1);
        }

        .error-message {
            color: #dc2626;
            font-size: 0.9rem;
            margin-top: 0.5rem;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .error-message i {
            font-size: 0.8rem;
        }

        .form-actions {
            display: flex;
            gap: 1rem;
            justify-content: center;
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid var(--gray-100);
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 15px 30px;
            border-radius: 12px;
            font-family: 'Cairo', sans-serif;
            font-weight: 600;
            font-size: 1rem;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            min-width: 140px;
            justify-content: center;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            color: var(--white);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-lg);
        }

        .btn-secondary {
            background: var(--gray-100);
            color: var(--text-dark);
        }

        .btn-secondary:hover {
            background: var(--primary-color);
            color: var(--white);
            transform: translateY(-3px);
        }

        .btn-outline {
            background: transparent;
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
        }

        .btn-outline:hover {
            background: var(--primary-color);
            color: var(--white);
            transform: translateY(-3px);
        }

        .quick-actions {
            display: flex;
            gap: 1rem;
            justify-content: center;
            margin-bottom: 2rem;
            flex-wrap: wrap;
        }

        .quick-action {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            background: var(--gray-50);
            border-radius: 20px;
            color: var(--text-dark);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .quick-action:hover {
            background: var(--primary-color);
            color: var(--white);
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .container {
                margin: 0 1rem;
                padding: 2rem;
            }

            .form-actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }

            .quick-actions {
                flex-direction: column;
            }

            .quick-action {
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="page-header">
            <div class="header-icon">
                <i class="fas fa-user-plus"></i>
            </div>
            <h1>إنشاء مستخدم جديد</h1>
            <p>إضافة مستخدم جديد إلى النظام</p>
        </div>

        <div class="quick-actions">
            <a href="{{ route('admin') }}" class="quick-action">
                <i class="fas fa-tachometer-alt"></i>
                لوحة الإدارة
            </a>
            <a href="{{ route('index') }}" class="quick-action">
                <i class="fas fa-home"></i>
                الصفحة الرئيسية
            </a>
            <a href="{{ route('client.profile') }}" class="quick-action">
                <i class="fas fa-user"></i>
                الملف الشخصي
            </a>
        </div>

        @if(session('success'))
            <div class="success-message">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.create.user.store') }}">
            @csrf

            <div class="form-group">
                <label for="client_name">
                    <i class="fas fa-user"></i>
                    الاسم الكامل
                </label>
                <input type="text" id="client_name" name="client_name" value="{{ old('client_name') }}" required placeholder="أدخل الاسم الكامل">
                @error('client_name')
                    <div class="error-message">
                        <i class="fas fa-exclamation-circle"></i>
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="client_email">
                    <i class="fas fa-envelope"></i>
                    البريد الإلكتروني
                </label>
                <input type="email" id="client_email" name="client_email" value="{{ old('client_email') }}" required placeholder="أدخل البريد الإلكتروني">
                @error('client_email')
                    <div class="error-message">
                        <i class="fas fa-exclamation-circle"></i>
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="client_password">
                    <i class="fas fa-lock"></i>
                    كلمة المرور
                </label>
                <input type="password" id="client_password" name="client_password" required placeholder="أدخل كلمة المرور">
                @error('client_password')
                    <div class="error-message">
                        <i class="fas fa-exclamation-circle"></i>
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="client_password_confirmation">
                    <i class="fas fa-lock"></i>
                    تأكيد كلمة المرور
                </label>
                <input type="password" id="client_password_confirmation" name="client_password_confirmation" required placeholder="أعد إدخال كلمة المرور">
            </div>

            <div class="form-group">
                <label for="role">
                    <i class="fas fa-shield-alt"></i>
                    نوع الحساب
                </label>
                <select id="role" name="role">
                    <option value="client" {{ old('role') == 'client' ? 'selected' : '' }}>مستخدم عادي</option>
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>مدير النظام</option>
                </select>
                @error('role')
                    <div class="error-message">
                        <i class="fas fa-exclamation-circle"></i>
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i>
                    إنشاء المستخدم
                </button>
                <a href="{{ route('admin') }}" class="btn btn-outline">
                    <i class="fas fa-times"></i>
                    إلغاء
                </a>
            </div>
        </form>
    </div>
</body>
</html>