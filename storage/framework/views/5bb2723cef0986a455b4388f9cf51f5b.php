<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول - لوحة التحكم</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('style.css')); ?>">
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <div class="login-header">
                <div class="login-logo">
                    <div class="logo-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                </div>
                <h1>تسجيل الدخول</h1>
                <p>تك رووت</p>
            </div>

            
            <?php if($errors->any()): ?>
                <div class="alert alert-danger" style="background-color: #fee; color: #c00; padding: 10px; border-radius: 5px; margin-bottom: 20px;">
                    <ul style="margin: 0; list-style: none; padding: 0;">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><i class="fas fa-exclamation-circle"></i> <?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            
            <?php if(session('success')): ?>
                <div class="alert alert-success" style="background-color: #e8f5e9; color: #2e7d32; padding: 10px; border-radius: 5px; margin-bottom: 20px; text-align: center;">
                    <i class="fas fa-check-circle"></i> <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            
            <form class="login-form" method="POST" action="<?php echo e(route('client.login')); ?>">
                
                <?php echo csrf_field(); ?> 
                
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
                        value="<?php echo e(old('client_email')); ?>" 
                        required
                        class="<?php $__errorArgs = ['client_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                    >
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
                        class="<?php $__errorArgs = ['client_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                    >
                </div>

                <div class="form-group" style="display: flex; justify-content: space-between; align-items: center;">
                    <label style="display: flex; align-items: center; gap: 5px;">
                        <input type="checkbox" name="remember"> 
                        <span>تذكرني</span>
                    </label>
                    <a href="#" style="color: #667eea; text-decoration: none; font-size: 14px;">نسيت كلمة المرور؟</a>
                </div>

                <button type="submit" class="login-btn">
                    <span>تسجيل الدخول</span>
                    <i class="fas fa-arrow-left"></i>
                </button>

                <div class="auth-link">
                   <p>ليس لدي حساب؟ <a href="<?php echo e(route('client.register.page')); ?>">إنشاء حساب</a></p>
                </div>
            </form>

            <div class="login-footer">
                <a href="<?php echo e(route('index')); ?>">
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
</html><?php /**PATH C:\Users\Aseel Online\example-app\resources\views/client_login.blade.php ENDPATH**/ ?>