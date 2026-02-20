<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تعديل الصفحة - لوحة التحكم</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('style.css')}}">
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
                <h1>تعديل الصفحة الرئيسية   </h1>
            </div>
        </div>

        <!-- عرض رسائل النجاح والخطأ -->
        @if(session('success'))
            <div style="background: #d4edda; color: #155724; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div style="background: #f8d7da; color: #721c24; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Edit Form -->
        <div class="edit-form-container">
            <form class="edit-form" method="POST" action="{{ route('home.update', $home->id ?? 1) }}">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="main_text">
                        <i class="fas fa-tag"></i>
                         النص الرئيسي
                    </label>
                    <textarea 
                        type="text" 
                        id="main_text" 
                        name="main_text" 
                        rows="4"
                        placeholder="أدخل النص الرئيسي "
                        
                    >{{ old('main_text', $home->main_text ?? '') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="next_text">
                        <i class="fas fa-eye"></i>
                        النص الفرعي
                    </label>
                    <textarea 
                        id="next_text" 
                        name="next_text" 
                        rows="4"
                        placeholder="أدخل النص الفرعي "
                    >{{ old('next_text', $home->next_text ?? '') }}</textarea>
                </div>


                <div class="form-group">
                    <label for="description_text">
                        <i class="fas fa-bullseye"></i>
                        الوصف
                    </label>
                    <textarea 
                        id="description_text" 
                        name="description_text" 
                        rows="4"
                        placeholder="أدخل نص الوصف"
                        
                    >{{ old('description_text', $home->description_text ?? '') }}</textarea>
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
</html>