<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الملف الشخصي - تك رووت</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <style>
        body {
            font-family: 'Cairo', sans-serif;
            margin: 0;
            padding: 20px;
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            min-height: 100vh;
        }

        .profile-container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(91, 33, 182, 0.1);
        }

        .profile-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .profile-avatar {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2.5rem;
            margin-bottom: 20px;
            box-shadow: 0 8px 20px rgba(91, 33, 182, 0.2);
        }

        .profile-header h2 {
            color: var(--primary-color);
            font-size: 1.8rem;
            margin-bottom: 10px;
        }

        .profile-role {
            display: inline-block;
            padding: 8px 20px;
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            color: white;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .profile-info {
            margin-bottom: 40px;
        }

        .info-item {
            padding: 20px;
            background: #f8fafc;
            border-radius: 12px;
            margin-bottom: 15px;
            border-left: 4px solid var(--primary-color);
            transition: all 0.3s ease;
        }

        .info-item:hover {
            transform: translateX(-5px);
            box-shadow: 0 5px 15px rgba(91, 33, 182, 0.1);
        }

        .info-item strong {
            color: var(--primary-color);
            font-weight: 600;
        }

        .action-buttons {
            text-align: center;
            padding-top: 30px;
            border-top: 2px solid #f1f5f9;
        }

        .btn {
            display: inline-block;
            padding: 12px 25px;
            margin: 8px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            font-family: 'Cairo', sans-serif;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            color: white;
        }

        .btn-secondary {
            background: #6c757d;
            color: white;
        }

        .btn-danger {
            background: #dc3545;
            color: white;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }

        .status-active {
            color: #28a745;
            font-weight: 600;
        }

        .status-inactive {
            color: #dc3545;
            font-weight: 600;
        }

        @media (max-width: 768px) {
            .profile-container {
                margin: 0 10px;
                padding: 30px 20px;
            }
            
            .btn {
                display: block;
                width: 100%;
                margin: 10px 0;
            }
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <div class="profile-header">
            <div class="profile-avatar">
                <i class="fas fa-user"></i>
            </div>
            <h2>{{ $client->client_name }}</h2>
            <div class="profile-role">
                @if($client->isAdmin())
                    <i class="fas fa-crown"></i> مدير النظام
                @else
                    <i class="fas fa-user"></i> مستخدم
                @endif
            </div>
        </div>

        <div class="profile-info">
            <div class="info-item">
                <strong>البريد الإلكتروني:</strong> {{ $client->client_email }}
            </div>
            <div class="info-item">
                <strong>نوع الحساب:</strong> {{ $client->role == 'admin' ? 'مدير النظام' : 'مستخدم عادي' }}
            </div>
            <div class="info-item">
                <strong>حالة الحساب:</strong> 
                <span class="{{ $client->is_active ? 'status-active' : 'status-inactive' }}">
                    {{ $client->is_active ? 'نشط' : 'غير نشط' }}
                </span>
            </div>
        </div>

        <div class="action-buttons">
            @if($client->isAdmin())
                <a href="{{ route('admin') }}" class="btn btn-primary">
                    <i class="fas fa-tachometer-alt"></i> لوحة الإدارة
                </a>
                <a href="{{ route('admin.create.user') }}" class="btn btn-secondary">
                    <i class="fas fa-user-plus"></i> إنشاء مستخدم
                </a>
            @endif
            
            <a href="{{ route('index') }}" class="btn btn-secondary">
                <i class="fas fa-home"></i> الصفحة الرئيسية
            </a>
            
            <form method="POST" action="{{ route('client.logout') }}" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-danger">
                    <i class="fas fa-sign-out-alt"></i> تسجيل الخروج
                </button>
            </form>
        </div>
    </div>
</body>
</html>