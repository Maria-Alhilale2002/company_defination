<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تعديل الصفحة - لوحة التحكم</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('style.css')); ?>">
</head>
<body>
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

    <!-- Edit Content -->
    <div class="admin-simple-container">
        <!-- Page Header -->
        <div class="edit-page-header">
            <div class="header-left">
                <h1>تعديل  صفحة الخدمات   </h1>
            </div>
        </div>

        <!-- عرض رسائل النجاح والخطأ -->
        <?php if(session('success')): ?>
            <div style="background: #d4edda; color: #155724; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <?php if($errors->any()): ?>
            <div style="background: #f8d7da; color: #721c24; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <!-- Edit Form -->
        <div class="edit-form-container">
            <form class="edit-form" method="POST" action="<?php echo e(route('services.update', $service->id ?? 1)); ?>">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                
                <div class="form-group">
                    <label for="service_description_web">
                        <i class="fas fa-tag"></i>
                          وصف المواقع الإلكترونية
                    </label>
                    <textarea 
                        type="text" 
                        id="service_description_web" 
                        name="service_description_web" 
                        rows="4"
                        placeholder="أدخل  وصف خدمة المواقع الإلكترونية "
                        
                    ><?php echo e(old('service_description_web', $service->service_description_web ?? '')); ?></textarea>
                </div>

                <div class="form-group">
                    <label for="service_description_app">
                        <i class="fas fa-eye"></i>
                        وصف التطبيقات 
                    </label>
                    <textarea 
                        id="service_description_app" 
                        name="service_description_app" 
                        rows="4"
                        placeholder="أدخل وصف خدمة التطبيقات "
                    ><?php echo e(old('service_description_app', $service->service_description_app ?? '')); ?></textarea>
                </div>


                <div class="form-group">
                    <label for="service_description_marketing">
                        <i class="fas fa-bullseye"></i>
                        وصف التسويق الإلكتروني
                    </label>
                    <textarea 
                        id="service_description_marketing" 
                        name="service_description_marketing" 
                        rows="4"
                        placeholder="أدخل وصف خدمة التسويق الإلكتروني"
                        
                    ><?php echo e(old('service_description_marketing', $service->service_description_marketing ?? '')); ?></textarea>
                </div>
                <!-- Submit Button -->
                <div class="form-actions">
                    <button type="submit" class="btn-save">
                        <i class="fas fa-save"></i>
                        حفظ التغييرات
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html><?php /**PATH C:\Users\Aseel Online\example-app\resources\views/edit_services.blade.php ENDPATH**/ ?>