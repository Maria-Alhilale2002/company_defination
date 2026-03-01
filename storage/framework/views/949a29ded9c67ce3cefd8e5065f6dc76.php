<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>لوحة تحكم الأدمن - تك رووت</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('style.css')); ?>">
    <style>
        /* إضافات للزر وال modal */
        .btn-clear {
            background: #ff9800;
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
        
        .btn-clear:hover {
            background: #f57c00;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 152, 0, 0.3);
        }
        
        .btn-confirm-clear {
            background: #ff9800;
            color: white;
            border: none;
            padding: 10px 30px;
            border-radius: 6px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .btn-confirm-clear:hover {
            background: #f57c00;
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
            color: #ff9800;
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

        /* تحسين مظهر الأزرار في header */
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
    <!-- عرض رسائل النجاح -->
    <?php if(session('success')): ?>
        <div class="alert-success">
            <i class="fas fa-check-circle"></i>
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

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
            <h1>إدارة صفحات الموقع</h1>
            <div style="display: flex; gap: 1rem; align-items: center;">
                <a href="<?php echo e(route('index')); ?>" style="display: inline-flex; align-items: center; gap: 8px; padding: 10px 20px; background: linear-gradient(135deg, var(--primary-color), var(--accent-color)); color: white; text-decoration: none; border-radius: 10px; font-weight: 600; transition: all 0.3s ease;">
                    <i class="fas fa-home"></i>
                    الصفحة الرئيسية
                </a>
                <a href="<?php echo e(route('admin.create.user')); ?>" style="display: inline-flex; align-items: center; gap: 8px; padding: 10px 20px; background: var(--gray-100); color: var(--text-dark); text-decoration: none; border-radius: 10px; font-weight: 600; transition: all 0.3s ease;">
                    <i class="fas fa-user-plus"></i>
                    إنشاء مستخدم
                </a>
                <a href="<?php echo e(route('admin.clients')); ?>" style="display: inline-flex; align-items: center; gap: 8px; padding: 10px 20px; background: var(--gray-100); color: var(--text-dark); text-decoration: none; border-radius: 10px; font-weight: 600; transition: all 0.3s ease;">
                    <i class="fas fa-users"></i>
                    إدارة المستخدمين
                </a>
                <a href="<?php echo e(route('client.profile')); ?>" style="display: inline-flex; align-items: center; gap: 8px; padding: 10px 20px; background: var(--gray-100); color: var(--text-dark); text-decoration: none; border-radius: 10px; font-weight: 600; transition: all 0.3s ease;">
                    <i class="fas fa-user"></i>
                    الملف الشخصي
                </a>
            </div>
        </div>

        <!-- Pages Table -->
        <div class="admin-table-container">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>اسم الصفحة</th>
                        <th>الرابط</th>
                        <th>الحالة</th>
                        <th>آخر تحديث</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- الصفحة الرئيسية -->
                    <tr>
                        <td>1</td>
                        <td>
                            <div class="page-name">
                                <i class="fas fa-home"></i>
                                الصفحة الرئيسية
                            </div>
                        </td>
                        <td><span class="page-link">home</span></td>
                        <td><span class="status-badge active">نشط</span></td>
                        <td>2024-01-15</td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-edit" onclick="window.location.href='/edit_home'" title="تعديل">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn-clear" onclick="clearPage('home', 1)" title="تفريغ المحتوى">
                                    <i class="fas fa-eraser"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- الخدمات -->
                    <tr>
                        <td>2</td>
                        <td>
                            <div class="page-name">
                                <i class="fas fa-concierge-bell"></i>
                                الخدمات
                            </div>
                        </td>
                        <td><span class="page-link">services</span></td>
                        <td><span class="status-badge active">نشط</span></td>
                        <td>2024-01-15</td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-edit" onclick="window.location.href='/edit_services'" title="تعديل">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn-clear" onclick="clearPage('services', 1)" title="تفريغ المحتوى">
                                    <i class="fas fa-eraser"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- المنتجات -->
                    <tr>
                        <td>3</td>
                        <td>
                            <div class="page-name">
                                <i class="fas fa-box"></i>
                                المنتجات
                            </div>
                        </td>
                        <td><span class="page-link">products</span></td>
                        <td><span class="status-badge active">نشط</span></td>
                        <td>2024-01-15</td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-view" onclick="event.stopPropagation(); window.location.href='<?php echo e(route('admin.products.index')); ?>'" title="عرض">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn-clear" onclick="event.stopPropagation(); clearPage('products', 1)" title="تفريغ المحتوى">
                                    <i class="fas fa-eraser"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- من نحن -->
                    <tr>
                        <td>4</td>
                        <td>
                            <div class="page-name">
                                <i class="fas fa-info-circle"></i>
                                من نحن
                            </div>
                        </td>
                        <td><span class="page-link">about</span></td>
                        <td><span class="status-badge active">نشط</span></td>
                        <td>2024-01-15</td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-edit" onclick="window.location.href='/edit_about'" title="تعديل">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn-clear" onclick="clearPage('about', 1)" title="تفريغ المحتوى">
                                    <i class="fas fa-eraser"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Clear Confirmation Modal (للتفريغ) -->
    <div id="clearModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>تأكيد تفريغ المحتوى</h2>
                <button class="modal-close" onclick="closeClearModal()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="warning-icon">
                    <i class="fas fa-eraser"></i>
                </div>
                <p>هل أنت متأكد من تفريغ محتوى هذه الصفحة؟</p>
                <p class="warning-text">سيتم حذف جميع النصوص والبيانات، ولكن سيبقى السجل فارغاً للتعديل لاحقاً</p>
            </div>
            <div class="modal-footer">
                <button class="btn-cancel" onclick="closeClearModal()">إلغاء</button>
                <button class="btn-confirm-clear" onclick="confirmClear()">تفريغ المحتوى</button>
            </div>
        </div>
    </div>

    <script>
// متغيرات للتفريغ
let currentClearType = '';
let currentClearId = '';

// دالة تفريغ المحتوى
function clearPage(pageType, id) {
    currentClearType = pageType;
    currentClearId = id;
    document.getElementById('clearModal').style.display = 'flex';
}

// إغلاق نافذة التفريغ
function closeClearModal() {
    document.getElementById('clearModal').style.display = 'none';
}

// تأكيد التفريغ
function confirmClear() {
    let url = '';
    switch(currentClearType) {
        case 'home':
            url = `/home/clear/${currentClearId}`;
            break;
        case 'services':
            url = `/services/clear/${currentClearId}`;
            break;
        case 'products':
            url = `/products/clear/${currentClearId}`;
            break;
        case 'about':
            url = `/about/clear/${currentClearId}`;
            break;
        default:
            alert('نوع الصفحة غير معروف');
            return;
    }
    
    // الحصول على CSRF token من meta tag
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
    // إنشاء نموذج وإرساله
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = url;
    form.style.display = 'none';
    
    // إضافة CSRF token
    const csrf = document.createElement('input');
    csrf.name = '_token';
    csrf.value = token;
    csrf.type = 'hidden';
    form.appendChild(csrf);
    
    document.body.appendChild(form);
    closeClearModal();
    form.submit();
}

// إغلاق النافذة عند الضغط خارجها
window.onclick = function(event) {
    const modal = document.getElementById('clearModal');
    if (event.target == modal) {
        closeClearModal();
    }
}
</script>
</body>
</html><?php /**PATH C:\Users\Aseel Online\example-app\resources\views/admin.blade.php ENDPATH**/ ?>