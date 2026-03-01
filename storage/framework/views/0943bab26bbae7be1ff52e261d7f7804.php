
     <?php $__env->startSection('title','المنتجات'); ?>

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1 class="page-title">معرض أعمالنا</h1>
            <p class="page-subtitle"><?php echo e($subtitle); ?></p>
        </div>
        <div class="header-shapes">
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
        </div>
    </section>

    <!-- Filter Tabs -->
    <section class="products-filter">
        <div class="container">
            <div class="filter-tabs">
                <button class="filter-tab active" data-filter="all">الكل</button>
                <button class="filter-tab" data-filter="websites">مواقع إلكترونية</button>
                <button class="filter-tab" data-filter="apps">تطبيقات</button>
                <button class="filter-tab" data-filter="marketing">تسويق إلكتروني</button>
            </div>
        </div>
    </section>

    <!-- Products Grid -->
    <section class="products-section">
        <div class="container">
            <div class="products-grid">
                <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="product-card" data-category="<?php echo e($product->service_type == 'website' ? 'websites' : ($product->service_type == 'app' ? 'apps' : 'marketing')); ?>">
                        <div class="product-image">
                            <?php if($product->product_image): ?>
                                <img src="<?php echo e(asset($product->product_image)); ?>" alt="<?php echo e($product->product_name); ?>" style="width: 100%; height: 100%; object-fit: cover;">
                            <?php else: ?>
                                <?php if($product->service_type == 'website'): ?>
                                    <i class="fas fa-globe"></i>
                                <?php elseif($product->service_type == 'app'): ?>
                                    <i class="fas fa-mobile-alt"></i>
                                <?php else: ?>
                                    <i class="fas fa-bullhorn"></i>
                                <?php endif; ?>
                            <?php endif; ?>
                            <div class="product-overlay">
                                <button class="view-btn"><i class="fas fa-eye"></i></button>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="product-category">
                                <?php if($product->service_type == 'website'): ?>
                                    موقع إلكتروني
                                <?php elseif($product->service_type == 'app'): ?>
                                    تطبيق موبايل
                                <?php else: ?>
                                    تسويق إلكتروني
                                <?php endif; ?>
                            </span>
                            <h3 class="product-title"><?php echo e($product->product_name); ?></h3>
                            <p class="product-description"><?php echo e(Str::limit($product->product_description, 80)); ?></p>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div style="text-align: center; padding: 60px 20px; grid-column: 1 / -1;">
                        <i class="fas fa-box-open" style="font-size: 4rem; color: #cbd5e1; margin-bottom: 20px;"></i>
                        <h3 style="color: #64748b; font-size: 1.5rem; margin-bottom: 10px;">لا توجد منتجات متاحة حالياً</h3>
                        <p style="color: #94a3b8;">سيتم إضافة المنتجات قريباً</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

  
      
   
    <script src="<?php echo e(asset('script.js')); ?>"></script>
</body>
</html>
<?php echo $__env->make('layout.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php echo $__env->make('layout.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Aseel Online\example-app\resources\views/products.blade.php ENDPATH**/ ?>