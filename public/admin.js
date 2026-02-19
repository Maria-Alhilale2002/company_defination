// Admin Panel JavaScript

// Global variable to store the page to be deleted
let pageToDelete = null;

// View Page Function
function viewPage(pageUrl) {
    window.open(pageUrl, '_blank');
}

// Edit Page Function
function editPage(pageName) {
    alert(`سيتم فتح صفحة تعديل: ${pageName}\n\nهذه الميزة ستكون متاحة قريباً في النظام الديناميكي`);
    
    // في المستقبل، يمكن توجيه المستخدم لصفحة تعديل
    // window.location.href = `edit.html?page=${pageName}`;
}

// Delete Page Function
function deletePage(pageName) {
    pageToDelete = pageName;
    showDeleteModal();
}

// Show Delete Modal
function showDeleteModal() {
    const modal = document.getElementById('deleteModal');
    modal.classList.add('show');
}

// Close Delete Modal
function closeDeleteModal() {
    const modal = document.getElementById('deleteModal');
    modal.classList.remove('show');
    pageToDelete = null;
}

// Confirm Delete
function confirmDelete() {
    if (pageToDelete) {
        // في النظام الديناميكي، سيتم إرسال طلب للخادم لحذف الصفحة
        alert(`تم حذف صفحة: ${pageToDelete}\n\nملاحظة: في النظام الديناميكي، سيتم حذف البيانات من قاعدة البيانات`);
        
        // إغلاق النافذة المنبثقة
        closeDeleteModal();
        
        // في النظام الحقيقي، يمكن إزالة الصف من الجدول
        // removeTableRow(pageToDelete);
    }
}

// Show Add Modal (للمستقبل)
function showAddModal() {
    alert('سيتم فتح نموذج إضافة صفحة جديدة\n\nهذه الميزة ستكون متاحة في النظام الديناميكي');
    
    // في المستقبل
    // window.location.href = 'add-page.html';
}

// Close modal when clicking outside
window.onclick = function(event) {
    const modal = document.getElementById('deleteModal');
    if (event.target === modal) {
        closeDeleteModal();
    }
}

// Close modal with Escape key
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        closeDeleteModal();
    }
});

// Logout Function
document.querySelector('.logout-btn')?.addEventListener('click', function() {
    if (confirm('هل أنت متأكد من تسجيل الخروج؟')) {
        alert('تم تسجيل الخروج بنجاح');
        // في النظام الحقيقي، سيتم توجيه المستخدم لصفحة تسجيل الدخول
        // window.location.href = 'login.html';
    }
});

// Active Menu Item
document.querySelectorAll('.admin-menu-item').forEach(item => {
    item.addEventListener('click', function(e) {
        // Don't prevent default for external links
        if (!this.hasAttribute('target')) {
            e.preventDefault();
            
            // Remove active class from all items
            document.querySelectorAll('.admin-menu-item').forEach(i => {
                i.classList.remove('active');
            });
            
            // Add active class to clicked item
            this.classList.add('active');
        }
    });
});

// Table Row Hover Effect
document.querySelectorAll('.admin-table tbody tr').forEach(row => {
    row.addEventListener('mouseenter', function() {
        this.style.transform = 'scale(1.01)';
    });
    
    row.addEventListener('mouseleave', function() {
        this.style.transform = 'scale(1)';
    });
});

// Animation on page load
window.addEventListener('load', function() {
    // Animate stats cards
    const statCards = document.querySelectorAll('.stat-card');
    statCards.forEach((card, index) => {
        setTimeout(() => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = 'all 0.5s ease';
            
            setTimeout(() => {
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, 50);
        }, index * 100);
    });
    
    // Animate table rows
    const tableRows = document.querySelectorAll('.admin-table tbody tr');
    tableRows.forEach((row, index) => {
        setTimeout(() => {
            row.style.opacity = '0';
            row.style.transform = 'translateX(20px)';
            row.style.transition = 'all 0.5s ease';
            
            setTimeout(() => {
                row.style.opacity = '1';
                row.style.transform = 'translateX(0)';
            }, 50);
        }, 200 + (index * 50));
    });
});

// Console message
console.log('%c🔐 لوحة تحكم الأدمن - تك سوليوشنز', 'color: #5b21b6; font-size: 20px; font-weight: bold;');
console.log('%cتم تحميل لوحة التحكم بنجاح ✓', 'color: #10b981; font-size: 14px;');
