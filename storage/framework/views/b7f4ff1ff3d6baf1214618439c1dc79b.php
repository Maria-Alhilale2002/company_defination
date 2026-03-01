<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title','تك رووت'); ?>  </title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('style.css')); ?>">
</head>
<body>
    <!-- Header -->
    <header class="header">
        <nav class="navbar">
            <div class="nav-container">
                <div class="nav-logo">
                    <div class="logo-icon">
                        <i class="fas fa-code"></i>
                    </div>
                    <span class="logo-text">تك رووت</span>
                </div>
                
                <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="<?php echo e(route('index')); ?>" class="nav-link <?php echo e(request()->routeIs('home') ? 'active' : ''); ?>">الرئيسية</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo e(route('services')); ?>" class="nav-link <?php echo e(request()->routeIs('services') ? 'active' : ''); ?>">الخدمات</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo e(route('products')); ?>" class="nav-link <?php echo e(request()->routeIs('products') ? 'active' : ''); ?>">المنتجات</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo e(route('about')); ?>" class="nav-link <?php echo e(request()->routeIs('about') ? 'active' : ''); ?>">من نحن</a>
                    <li class="nav-item">
                        <a href="<?php echo e(route('contact')); ?>" class="nav-link <?php echo e(request()->routeIs('contact') ? 'active' : ''); ?>">التواصل</a>
                </ul>
                
                <div class="nav-actions"> 
<button class="register-btn" onclick="window.location.href='<?php echo e(route('client.register.page')); ?>'">تسجيل</button>                    <div class="hamburger">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </nav>
    </header>
<?php /**PATH C:\Users\Aseel Online\example-app\resources\views/layout/header.blade.php ENDPATH**/ ?>