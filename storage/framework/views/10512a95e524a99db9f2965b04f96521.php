<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>إدارة المنتجات - تك رووت</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('style.css')); ?>">
    <style>
        .btn-edit {
            background: #ffc107;
            color: #333;
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
            text-decoration: none;
        }
        
        .btn-edit:hover {
            background: #ffb300;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 193, 7, 0.3);
        }

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

        .service-type {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .type-website {
            background: #e3f2fd;
            color: #1976d2;
        }

        .type-app {
            background: #f3e5f5;
            color: #7b1fa2;
        }

        .type-digital_marketing {
            background: #e8f5e8;
            color: #388e3c;
        }

        .product-image {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
            border: 2px solid #eee;
        }

        .no-image {
            width: 60px;
            height: 60px;
            background: #f5f5f5;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #999;
            font-size: 1.5rem;
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
    <?php if(session('success')): ?>
        <div class="alert-success">
            <i class="fas fa-check-circle"></i>
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <?php if(session('error')): ?>
        <div class="alert-error">
            <i class="fas fa-exclamation-circle"></i>
            <?php echo e(session('error')); ?>

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
            <h1>إدارة المنتجات</h1>
            <div style="display: flex; gap: 1rem; align-items: center;">
                <a href="<?php echo e(route('admin')); ?>" style="display: inline-flex; align-items: center; gap: 8px; padding: 10px 20px; background: linear-gradient(135deg, var(--primary-color), var(--accent-color)); color: white; text-decoration: none; border-radius: 10px; font-weight: 600; transition: all 0.3s ease;">
                    <i class="fas fa-arrow-right"></i>
                    العودة للوحة التحكم
                </a>
                <a href="<?php echo e(route('admin.products.create')); ?>" style="display: inline-flex; align-items: center; gap: 8px; padding: 10px 20px; background: #28a745; color: white; text-decoration: none; border-radius: 10px; font-weight: 600; transition: all 0.3s ease;">
                    <i class="fas fa-plus"></i>
                    إضافة منتج جديد
                </a>
            </div>
        </div>

        <!-- Products Table -->
        <div class="admin-table-container">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>الصورة</th>
                        <th>اسم المنتج</th>
                        <th>نوع الخدمة</th>
                        <th>الوصف</th>
                        <th>تاريخ الإضافة</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($index + 1); ?></td>
                            <td>
                                <?php if($product->product_image): ?>
                                    <img src="<?php echo e(asset($product->product_image)); ?>" alt="<?php echo e($product->product_name); ?>" class="product-image">
                                <?php else: ?>
                                    <div class="no-image">
                                        <i class="fas fa-image"></i>
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="page-name">
                                    <i class="fas fa-box"></i>
                                    <?php echo e($product->product_name); ?>

                                </div>
                            </td>
                            <td>
                                <span class="service-type type-<?php echo e($product->service_type); ?>">
                                    <?php if($product->service_type == 'website'): ?>
                                        <i class="fas fa-globe"></i> موقع إلكتروني
                                    <?php elseif($product->service_type == 'app'): ?>
                                        <i class="fas fa-mobile-alt"></i> تطبيق
                                    <?php else: ?>
                                        <i class="fas fa-bullhorn"></i> تسويق إلكتروني
                                    <?php endif; ?>
                                </span>
                            </td>
                            <td>
                                <span style="max-width: 200px; display: inline-block; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                    <?php echo e($product->product_description); ?>

                                </span>
                            </td>
                            <td><?php echo e($product->created_at->format('Y-m-d')); ?></td>
                            <td>
                                <div class="action-buttons">
                                    <a href="<?php echo e(route('admin.products.edit', $product->product_id)); ?>" class="btn-edit" title="تعديل">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button class="btn-delete" onclick="deleteProduct(<?php echo e($product->product_id); ?>, '<?php echo e($product->product_name); ?>')" title="حذف">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="7" style="text-align: center; padding: 40px; color: #999;">
                                <i class="fas fa-box-open" style="font-size: 3rem; margin-bottom: 15px; display: block;"></i>
                                لا توجد منتجات مضافة
                                <br>
                                <a href="<?php echo e(route('admin.products.create')); ?>" style="color: var(--primary-color); text-decoration: none; margin-top: 10px; display: inline-block;">
                                    <i class="fas fa-plus"></i> إضافة منتج جديد
                                </a>
                            </td>
                        </tr>
                    <?php endif; ?>
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
                <p>هل أنت متأكد من حذف المنتج: <strong id="productName"></strong>؟</p>
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
        let productToDelete = null;

        // دالة حذف المنتج
        function deleteProduct(productId, productName) {
            productToDelete = productId;
            document.getElementById('productName').textContent = productName;
            document.getElementById('deleteModal').classList.add('show');
        }

        // إغلاق نافذة الحذف
        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.remove('show');
            productToDelete = null;
        }

        // تأكيد الحذف
        function confirmDelete() {
            if (productToDelete) {
                // الحصول على CSRF token من meta tag
                const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                
                // إنشاء نموذج وإرساله
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `/admin/products/${productToDelete}`;
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
</html><?php /**PATH C:\Users\Aseel Online\example-app\resources\views/admin/products/index.blade.php ENDPATH**/ ?>