<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>إدارة المستخدمين - تك رووت</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <style>
        .btn-delete {
            background: #dc3545;
            color: white;
            border: none;
            border-radius: 6px;
            width: 36px;
            height: 36px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            margin: 0 3px;
        }
        
        .btn-delete:hover {
            background: #c82333;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(220, 53, 69, 0.3);
        }
        
        .btn-confirm-delete {
            background: #dc3545;
            color: white;
            border: none;
            padding: 10px 30px;
            border-radius: 6px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .btn-confirm-delete:hover {
            background: #c82333;
            transform: translateY(-2px);
        }
        
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }
        
        .modal.show {
            display: flex;
        }
        
        .modal-content {
            background: white;
            border-radius: 15px;
            width: 90%;
            max-width: 400px;
            animation: modalSlideIn 0.3s ease;
        }
        
        @keyframes modalSlideIn {
            from {
                transform: translateY(-50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
        
        .modal-header {
            padding: 20px;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .modal-header h2 {
            font-size: 1.5rem;
            color: #333;
        }
        
        .modal-close {
            background: none;
            border: none;
            font-size: 1.2rem;
            cursor: pointer;
            color: #999;
        }
        
        .modal-body {
            padding: 30px 20px;
            text-align: center;
        }
        
        .warning-icon {
            font-size: 4rem;
            color: #dc3545;
            margin-bottom: 20px;
        }
        
        .modal-body p {
            font-size: 1.1rem;
            color: #333;
            margin-bottom: 10px;
        }
        
        .warning-text {
            color: #999;
            font-size: 0.9rem;
        }
        
        .modal-footer {
            padding: 20px;
            border-top: 1px solid #eee;
            display: flex;
            justify-content: center;
            gap: 15px;
        }
        
        .btn-cancel {
            background: #e0e0e0;
            color: #666;
            border: none;
            padding: 10px 30px;
            border-radius: 6px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .btn-cancel:hover {
            background: #d0d0d0;
        }
        
        .alert-success {
            background: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 8px;
            margin: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .alert-error {
            background: #f8d7da;
            color: #721c24;
            padding: 15px;
            border-radius: 8px;
            margin: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-role {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .role-admin {
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            color: white;
        }

        .role-client {
            background: #e3f2fd;
            color: #1976d2;
        }

        .admin-page-header {
            flex-wrap: wrap;
            gap: 1rem;
        }

        .admin-page-header a:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(91, 33, 182, 0.3);
        }

        .admin-page-header a[style*="var(--gray-100)"]:hover {
            background: var(--primary-color) !important;
            color: white !important;
        }

        @media (max-width: 768px) {
            .admin-page-header {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .admin-page-header > div {
                width: 100%;
                flex-direction: column;
            }
            
            .admin-page-header a {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <!-- عرض رسائل النجاح والخطأ -->
    @if(session('success'))
        <div class="alert-success">
            <i class="fas fa-check-circle"></i>
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert-error">
            <i class="fas fa-exclamation-circle"></i>
            {{ session('error') }}
        </div>
    @endif

    <!-- Admin Header -->
    <header class="admin-header">
        <div class="admin-nav-container">
            <div class="admin-logo">
                <div class="logo-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <span class="logo-text">لوحة التحكم - تك رووت</span>
            </div>
            
            <div class="admin-user">
                <i class="fas fa-user-circle"></i>
                <span>مرحباً، الأدمن</span>
            </div>
        </div>
    </header>

    <!-- Admin Content -->
    <div class="admin-simple-container">
        <!-- Page Title -->
        <div class="admin-page-header">
            <h1>إدارة المستخدمين</h1>
            <div style="display: flex; gap: 1rem; align-items: center;">
                <a href="{{ route('admin') }}" style="display: inline-flex; align-items: center; gap: 8px; padding: 10px 20px; background: linear-gradient(135deg, var(--primary-color), var(--accent-color)); color: white; text-decoration: none; border-radius: 10px; font-weight: 600; transition: all 0.3s ease;">
                    <i class="fas fa-arrow-right"></i>
                    العودة للوحة التحكم
                </a>
                <a href="{{ route('admin.create.user') }}" style="display: inline-flex; align-items: center; gap: 8px; padding: 10px 20px; background: var(--gray-100); color: var(--text-dark); text-decoration: none; border-radius: 10px; font-weight: 600; transition: all 0.3s ease;">
                    <i class="fas fa-user-plus"></i>
                    إضافة مستخدم جديد
                </a>
            </div>
        </div>

        <!-- Users Table -->
        <div class="admin-table-container">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>الاسم</th>
                        <th>البريد الإلكتروني</th>
                        <th>النوع</th>
                        <th>الحالة</th>
                        <th>تاريخ التسجيل</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($clients as $index => $client)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                <div class="page-name">
                                    <i class="fas fa-user"></i>
                                    {{ $client->client_name }}
                                </div>
                            </td>
                            <td><span class="page-link">{{ $client->client_email }}</span></td>
                            <td>
                                <span class="user-role {{ $client->role == 'admin' ? 'role-admin' : 'role-client' }}">
                                    @if($client->role == 'admin')
                                        <i class="fas fa-crown"></i> مدير
                                    @else
                                        <i class="fas fa-user"></i> مستخدم
                                    @endif
                                </span>
                            </td>
                            <td>
                                <span class="status-badge {{ $client->is_active ? 'active' : 'inactive' }}">
                                    {{ $client->is_active ? 'نشط' : 'غير نشط' }}
                                </span>
                            </td>
                            <td>{{ $client->created_at->format('Y-m-d') }}</td>
                            <td>
                                <div class="action-buttons">
                                    @if($client->client_id !== auth('client')->id())
                                        <button class="btn-delete" onclick="deleteUser({{ $client->client_id }}, '{{ $client->client_name }}')" title="حذف">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    @else
                                        <span style="color: #999; font-size: 0.8rem;">الحساب الحالي</span>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" style="text-align: center; padding: 40px; color: #999;">
                                <i class="fas fa-users" style="font-size: 3rem; margin-bottom: 15px; display: block;"></i>
                                لا توجد مستخدمين مسجلين
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>تأكيد الحذف</h2>
                <button class="modal-close" onclick="closeDeleteModal()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="warning-icon">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <p>هل أنت متأكد من حذف المستخدم: <strong id="userName"></strong>؟</p>
                <p class="warning-text">لا يمكن التراجع عن هذا الإجراء</p>
            </div>
            <div class="modal-footer">
                <button class="btn-cancel" onclick="closeDeleteModal()">إلغاء</button>
                <button class="btn-confirm-delete" onclick="confirmDelete()">حذف</button>
            </div>
        </div>
    </div>

    <script>
        // متغيرات للحذف
        let userToDelete = null;

        // دالة حذف المستخدم
        function deleteUser(userId, userName) {
            userToDelete = userId;
            document.getElementById('userName').textContent = userName;
            document.getElementById('deleteModal').classList.add('show');
        }

        // إغلاق نافذة الحذف
        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.remove('show');
            userToDelete = null;
        }

        // تأكيد الحذف
        function confirmDelete() {
            if (userToDelete) {
                // الحصول على CSRF token من meta tag
                const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                
                // إنشاء نموذج وإرساله
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `/admin/clients/${userToDelete}`;
                form.style.display = 'none';
                
                // إضافة CSRF token
                const csrf = document.createElement('input');
                csrf.name = '_token';
                csrf.value = token;
                csrf.type = 'hidden';
                form.appendChild(csrf);
                
                // إضافة method DELETE
                const method = document.createElement('input');
                method.name = '_method';
                method.value = 'DELETE';
                method.type = 'hidden';
                form.appendChild(method);
                
                document.body.appendChild(form);
                closeDeleteModal();
                form.submit();
            }
        }

        // إغلاق النافذة عند الضغط خارجها
        window.onclick = function(event) {
            const modal = document.getElementById('deleteModal');
            if (event.target == modal) {
                closeDeleteModal();
            }
        }

        // إغلاق النافذة بمفتاح Escape
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeDeleteModal();
            }
        });
    </script>
</body>
</html>