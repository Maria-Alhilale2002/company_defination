<?php $__env->startSection('title', 'من نحن'); ?>

<!-- Page Header -->
<section class="page-header">
    <div class="container">
        <h1 class="page-title">من نحن</h1>
        <p class="page-subtitle"><?php echo e($subtitle); ?></p>
    </div>
    <div class="header-shapes">
        <div class="shape shape-1"></div>
        <?php if(isset($about->about_image)): ?>
            <div class="shape shape-2" style="background-image: url('<?php echo e($about->about_image); ?>');"></div>
        <?php else: ?>
            <div class="shape shape-2"></div>
        <?php endif; ?>
    </div>
</section>

<!-- About Story -->
<section class="about-story">
    <div class="container">
        <div class="story-content">
            <div class="story-text" data-aos="fade-right">
                <h2 class="section-title">قصتنا</h2>
                <p>
                    <?php echo e($about->story_text ?? 'قصتنا...'); ?>

                </p>
                <p>
                    <?php echo e($about->about_text ?? 'عن الشركة...'); ?>

                </p>
            </div>
            <div class="story-image" data-aos="fade-left">
                <div class="image-placeholder">
                    <i class="fas fa-rocket"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mission & Vision -->
<section class="mission-vision">
    <div class="container">
        <div class="mv-grid">
            <div class="mv-card" data-aos="fade-up" data-aos-delay="100">
                <div class="mv-icon">
                    <i class="fas fa-bullseye"></i>
                </div>
                <h3 class="mv-title">رؤيتنا</h3>
                <p class="mv-description">
                    <?php echo e($about->vision_text ?? 'رؤيتنا...'); ?>

                </p>
            </div>

            <div class="mv-card" data-aos="fade-up" data-aos-delay="200">
                <div class="mv-icon">
                    <i class="fas fa-flag"></i>
                </div>
                <h3 class="mv-title">رسالتنا</h3>
                <p class="mv-description">
                    <?php echo e($about->message_text ?? 'رسالتنا...'); ?>

                </p>
            </div>

            <div class="mv-card" data-aos="fade-up" data-aos-delay="300">
                <div class="mv-icon">
                    <i class="fas fa-gem"></i>
                </div>
                <h3 class="mv-title">قيمنا</h3>
                <p class="mv-description">
                    <?php echo e($about->principle_text ?? 'قيمنا...'); ?>

                </p>
            </div>
        </div>
    </div>
</section>


<script src="<?php echo e(asset('script.js')); ?>"></script>


</body>

</html>
<?php echo $__env->make('layout.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php echo $__env->make('layout.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Aseel Online\example-app\resources\views/about.blade.php ENDPATH**/ ?>