<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إضافة منتج جديد - تك رووت</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('style.css')); ?>">
    <style>
        body {
            font-family: 'Cairo', sans-serif;
            margin: 0;
            padding: 20px;
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            min-height: 100vh;
        }

        .form-container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(91, 33, 182, 0.1);
        }

        .form-header {
            text-align: center;
            margin-bottom: 40px;
            padding-bottom: 20px;
            border-bottom: 2px solid #f1f5f9;
        }

        .form-header h1 {
            color: var(--primary-color);
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .form-header p {
            color: #64748b;
            font-size: 1.1rem;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--primary-color);
            font-size: 1rem;
        }

        .form-group label .required {
            color: #dc3545;
            margin-right: 5px;
        }

        .form-control {
            width: 100%;
            padding: 15px;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-size: 1rem;
            font-family: 'Cairo', sans-serif;
            transition: all 0.3s ease;
            background: #f8fafc;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-color);
            background: white;
            box-shadow: 0 0 0 3px rgba(91, 33, 182, 0.1);
        }

        .form-control.is-invalid {
            border-color: #dc3545;
            background: #fff5f5;
        }

        .invalid-feedback {
            color: #dc3545;
            font-size: 0.9rem;
            margin-top: 5px;
            display: block;
        }

        select.form-control {
            cursor: pointer;
        }

        textarea.form-control {
            resize: vertical;
            min-height: 120px;
        }

        .file-input-wrapper {
            position: relative;
            display: inline-block;
            width: 100%;
        }

        .file-input {
            position: absolute;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }

        .file-input-display {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
            border: 2px dashed #cbd5e1;
            border-radius: 12px;
            background: #f8fafc;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .file-input-display:hover {
            border-color: var(--primary-color);
            background: #f0f4ff;
        }

        .file-input-display.has-file {
            border-color: #22c55e;
            background: #f0fdf4;
        }

        .file-input-icon {
            font-size: 3rem;
            color: #94a3b8;
            margin-bottom: 15px;
        }

        .file-input-text {
            text-align: center;
        }

        .file-input-text h4 {
            margin: 0 0 5px 0;
            color: #475569;
            font-size: 1.1rem;
        }

        .file-input-text p {
            margin: 0;
            color: #94a3b8;
            font-size: 0.9rem;
        }

        .image-preview {
            margin-top: 15px;
            text-align: center;
        }

        .image-preview img {
            max-width: 200px;
            max-height: 200px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .btn-group {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin-top: 40px;
            padding-top: 30px;
            border-top: 2px solid #f1f5f9;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 15px 30px;
            border-radius: 12px;
            font-family: 'Cairo', sans-serif;
            font-weight: 600;
            font-size: 1rem;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            min-width: 150px;
            justify-content: center;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(91, 33, 182, 0.3);
        }

        .btn-secondary {
            background: #6c757d;
            color: white;
        }

        .btn-secondary:hover {
            background: #5a6268;
            transform: translateY(-3px);
        }

        .service-type-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-top: 10px;
        }

        .service-type-option {
            position: relative;
        }

        .service-type-option input[type="radio"] {
            position: absolute;
            opacity: 0;
        }

        .service-type-label {
            display: block;
            padding: 20px;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            background: #f8fafc;
        }

        .service-type-label:hover {
            border-color: var(--primary-color);
            background: #f0f4ff;
        }

        .service-type-option input[type="radio"]:checked + .service-type-label {
            border-color: var(--primary-color);
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            color: white;
        }

        .service-type-icon {
            font-size: 2rem;
            margin-bottom: 10px;
            display: block;
        }

        .service-type-name {
            font-weight: 600;
            font-size: 1rem;
        }

        @media (max-width: 768px) {
            .form-container {
                margin: 0 10px;
                padding: 30px 20px;
            }
            
            .btn-group {
                flex-direction: column;
            }
            
            .btn {
                width: 100%;
            }

            .service-type-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <div class="form-header">
            <h1><i class="fas fa-plus-circle"></i> إضافة منتج جديد</h1>
            <p>أضف منتجاً جديداً إلى معرض أعمالك</p>
        </div>

        <form action="<?php echo e(route('admin.products.store')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            
            <!-- نوع الخدمة -->
            <div class="form-group">
                <label for="service_type">
                    <i class="fas fa-tags"></i> نوع الخدمة <span class="required">*</span>
                </label>
                <div class="service-type-grid">
                    <div class="service-type-option">
                        <input type="radio" id="website" name="service_type" value="website" <?php echo e(old('service_type') == 'website' ? 'checked' : ''); ?>>
                        <label for="website" class="service-type-label">
                            <i class="fas fa-globe service-type-icon"></i>
                            <span class="service-type-name">موقع إلكتروني</span>
                        </label>
                    </div>
                    <div class="service-type-option">
                        <input type="radio" id="app" name="service_type" value="app" <?php echo e(old('service_type') == 'app' ? 'checked' : ''); ?>>
                        <label for="app" class="service-type-label">
                            <i class="fas fa-mobile-alt service-type-icon"></i>
                            <span class="service-type-name">تطبيق</span>
                        </label>
                    </div>
                    <div class="service-type-option">
                        <input type="radio" id="digital_marketing" name="service_type" value="digital_marketing" <?php echo e(old('service_type') == 'digital_marketing' ? 'checked' : ''); ?>>
                        <label for="digital_marketing" class="service-type-label">
                            <i class="fas fa-bullhorn service-type-icon"></i>
                            <span class="service-type-name">تسويق إلكتروني</span>
                        </label>
                    </div>
                </div>
                <?php $__errorArgs = ['service_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- اسم المنتج -->
            <div class="form-group">
                <label for="product_name">
                    <i class="fas fa-signature"></i> اسم الفرد أو المؤسسة <span class="required">*</span>
                </label>
                <input type="text" 
                       id="product_name" 
                       name="product_name" 
                       class="form-control <?php $__errorArgs = ['product_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                       value="<?php echo e(old('product_name')); ?>" 
                       placeholder="مثال: شركة التقنية المتقدمة أو أحمد محمد">
                <?php $__errorArgs = ['product_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- وصف المنتج -->
            <div class="form-group">
                <label for="product_description">
                    <i class="fas fa-align-left"></i> وصف المنتج <span class="required">*</span>
                </label>
                <textarea id="product_description" 
                          name="product_description" 
                          class="form-control <?php $__errorArgs = ['product_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                          placeholder="اكتب وصفاً مفصلاً عن المنتج والخدمات المقدمة..."><?php echo e(old('product_description')); ?></textarea>
                <?php $__errorArgs = ['product_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- صورة المنتج -->
            <div class="form-group">
                <label for="product_image">
                    <i class="fas fa-image"></i> صورة المنتج
                </label>
                <div class="file-input-wrapper">
                    <input type="file" 
                           id="product_image" 
                           name="product_image" 
                           class="file-input <?php $__errorArgs = ['product_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                           accept="image/*"
                           onchange="previewImage(this)">
                    <div class="file-input-display" id="fileDisplay">
                        <div>
                            <i class="fas fa-cloud-upload-alt file-input-icon"></i>
                            <div class="file-input-text">
                                <h4>اختر صورة المنتج</h4>
                                <p>PNG, JPG, GIF حتى 2MB</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="image-preview" id="imagePreview" style="display: none;">
                    <img id="previewImg" src="" alt="معاينة الصورة">
                </div>
                <?php $__errorArgs = ['product_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- أزرار التحكم -->
            <div class="btn-group">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i>
                    حفظ المنتج
                </button>
                <a href="<?php echo e(route('admin.products.index')); ?>" class="btn btn-secondary">
                    <i class="fas fa-times"></i>
                    إلغاء
                </a>
            </div>
        </form>
    </div>

    <script>
        function previewImage(input) {
            const fileDisplay = document.getElementById('fileDisplay');
            const imagePreview = document.getElementById('imagePreview');
            const previewImg = document.getElementById('previewImg');
            
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    imagePreview.style.display = 'block';
                    fileDisplay.classList.add('has-file');
                    
                    // تحديث نص العرض
                    const fileText = fileDisplay.querySelector('.file-input-text h4');
                    fileText.textContent = 'تم اختيار الصورة بنجاح';
                }
                
                reader.readAsDataURL(input.files[0]);
            } else {
                imagePreview.style.display = 'none';
                fileDisplay.classList.remove('has-file');
                const fileText = fileDisplay.querySelector('.file-input-text h4');
                fileText.textContent = 'اختر صورة المنتج';
            }
        }

        // تحسين تجربة المستخدم مع drag & drop
        const fileDisplay = document.getElementById('fileDisplay');
        const fileInput = document.getElementById('product_image');

        fileDisplay.addEventListener('dragover', function(e) {
            e.preventDefault();
            fileDisplay.style.borderColor = 'var(--primary-color)';
            fileDisplay.style.background = '#f0f4ff';
        });

        fileDisplay.addEventListener('dragleave', function(e) {
            e.preventDefault();
            fileDisplay.style.borderColor = '#cbd5e1';
            fileDisplay.style.background = '#f8fafc';
        });

        fileDisplay.addEventListener('drop', function(e) {
            e.preventDefault();
            fileDisplay.style.borderColor = '#cbd5e1';
            fileDisplay.style.background = '#f8fafc';
            
            const files = e.dataTransfer.files;
            if (files.length > 0) {
                fileInput.files = files;
                previewImage(fileInput);
            }
        });
    </script>
</body>
</html><?php /**PATH C:\Users\Aseel Online\example-app\resources\views/admin/products/create.blade.php ENDPATH**/ ?>