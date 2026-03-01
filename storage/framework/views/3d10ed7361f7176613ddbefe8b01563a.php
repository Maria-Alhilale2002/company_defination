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
                <h1>تعديل صفحة من نحن</h1>
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
            <form class="edit-form" method="POST" action="<?php echo e(route('about.update', $about->id ?? 1)); ?>">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                
                <!-- about_text - هذا يقابل about_text في قاعدة البيانات -->
                <div class="form-group">
                    <label for="about_text">
                        <i class="fas fa-tag"></i>
                        من نحن
                    </label>
                    <textarea 
                        type="text" 
                        id="about_text" 
                        name="about_text" 
                        rows="4"
                        placeholder="أدخل نص من نحن"
                        required
                    ><?php echo e(old('about_text', $about->about_text ?? '')); ?></textarea>
                </div>

                <!-- vision_text - هذا يقابل vision_text في قاعدة البيانات -->
                <div class="form-group">
                    <label for="vision_text">
                        <i class="fas fa-eye"></i>
                        الرؤية
                    </label>
                    <textarea 
                        id="vision_text" 
                        name="vision_text" 
                        rows="4"
                        placeholder="أدخل نص الرؤية"
                    ><?php echo e(old('vision_text', $about->vision_text ?? '')); ?></textarea>
                </div>

                <!-- message_text - هذا يقابل message_text في قاعدة البيانات -->
                <div class="form-group">
                    <label for="message_text">
                        <i class="fas fa-bullseye"></i>
                        الرسالة
                    </label>
                    <textarea 
                        id="message_text" 
                        name="message_text" 
                        rows="4"
                        placeholder="أدخل نص الرسالة"
                        
                    ><?php echo e(old('message_text', $about->message_text ?? '')); ?></textarea>
                </div>

                <!-- story_text - هذا يقابل story_text في قاعدة البيانات -->
                <div class="form-group">
                    <label for="story_text">
                        <i class="fas fa-book"></i>
                        القصة
                    </label>
                    <textarea 
                        id="story_text" 
                        name="story_text" 
                        rows="6"
                        placeholder="أدخل نص القصة"
                        
                    ><?php echo e(old('story_text', $about->story_text ?? '')); ?></textarea>
                </div>

                <!-- principle_text - هذا يقابل principle_text في قاعدة البيانات -->
                <div class="form-group">
                    <label for="principle_text">
                        <i class="fas fa-list"></i>
                        المبادئ
                    </label>
                    <textarea 
                        id="principle_text" 
                        name="principle_text" 
                        rows="5"
                        placeholder="أدخل نص المبادئ"
                        
                    ><?php echo e(old('principle_text', $about->principle_text ?? '')); ?></textarea>
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
</html><?php /**PATH C:\Users\Aseel Online\example-app\resources\views/edit_about.blade.php ENDPATH**/ ?>