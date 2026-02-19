<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة تحكم الأدمن - تك رووت</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
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

    <!-- Admin Content -->
    <div class="admin-simple-container">
        <!-- Page Title -->
        <div class="admin-page-header">
            <h1>إدارة صفحات الموقع</h1>
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
                    <tr>
                        <td>1</td>
                        <td>
                            <div class="page-name">
                                <i class="fas fa-home"></i>
                                الصفحة الرئيسية
                            </div>
                        </td>
                        <td><span class="page-link">index.html</span></td>
                        <td><span class="status-badge active">نشط</span></td>
                        <td>2024-01-15</td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-view" onclick="viewPage('/index')" title="عرض">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn-edit" onclick="editPage('/index')" title="تعديل">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn-delete" onclick="deletePage('/index')" title="حذف">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>2</td>
                        <td>
                            <div class="page-name">
                                <i class="fas fa-concierge-bell"></i>
                                الخدمات
                            </div>
                        </td>
                        <td><span class="page-link">services.html</span></td>
                        <td><span class="status-badge active">نشط</span></td>
                        <td>2024-01-15</td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-view" onclick="viewPage('/services')" title="عرض">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn-edit" onclick="editPage('/services')" title="تعديل">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn-delete" onclick="deletePage('/services')" title="حذف">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>3</td>
                        <td>
                            <div class="page-name">
                                <i class="fas fa-box"></i>
                                المنتجات
                            </div>
                        </td>
                        <td><span class="page-link">products.html</span></td>
                        <td><span class="status-badge active">نشط</span></td>
                        <td>2024-01-15</td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-view" onclick="viewPage('/products')" title="عرض">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn-edit" onclick="editPage('/products')" title="تعديل">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn-delete" onclick="deletePage('/products')" title="حذف">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>4</td>
                        <td>
                            <div class="page-name">
                                <i class="fas fa-info-circle"></i>
                                من نحن
                            </div>
                        </td>
                        <td><span class="page-link">about.html</span></td>
                        <td><span class="status-badge active">نشط</span></td>
                        <td>2024-01-15</td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-view" onclick="viewPage('/about')" title="عرض">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn-edit" onclick="editPage('/about')" title="تعديل">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn-delete" onclick="deletePage('/about')" title="حذف">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>5</td>
                        <td>
                            <div class="page-name">
                                <i class="fas fa-envelope"></i>
                                التواصل
                            </div>
                        </td>
                        <td><span class="page-link">contact.html</span></td>
                        <td><span class="status-badge active">نشط</span></td>
                        <td>2024-01-15</td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-view" onclick="viewPage('/contact')" title="عرض">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn-edit" onclick="editPage('/contact')" title="تعديل">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn-delete" onclick="deletePage('/contact')" title="حذف">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
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
                <p>هل أنت متأكد من حذف هذه الصفحة؟</p>
                <p class="warning-text">لا يمكن التراجع عن هذا الإجراء</p>
            </div>
            <div class="modal-footer">
                <button class="btn-cancel" onclick="closeDeleteModal()">إلغاء</button>
                <button class="btn-confirm-delete" onclick="confirmDelete()">حذف</button>
            </div>
        </div>
    </div>

    <script src="{{ asset('admin.js') }}"></script>
</body>
</html>
