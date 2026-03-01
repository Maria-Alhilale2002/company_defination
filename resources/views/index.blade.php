    @extends('layout.header')
    @section('title','الرئيسية')
    
    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="hero-container">
            <div class="hero-content">
                <h1 class="hero-title">
                    <span class="title-line">{{ $home->main_text ?? 'نحول أفكارك إلى'}}</span>
                    <span class="title-highlight">{{ $home->next_text ?? 'حلول رقمية متكاملة' }}</span>
                </h1>
                <p class="hero-description">
                    {{ $home->description_text ?? 'شركة رائدة في مجال البرمجيات والتطوير، نقدم خدمات متميزة في برمجة المواقع والتطبيقات والتسويق الرقمي' }}
                </p>
                <div class="hero-buttons">
                    <button class="btn-primary" onclick="window.open('https://wa.me/967778274221', '_blank')">ابدأ مشروعك</button>
                    <button class="btn-secondary" onclick="window.location.href='/products'">
                        <i class="fas fa-play" ></i>
                        شاهد أعمالنا
                    </button>
                </div>
            </div>
            <div class="hero-visual">
                <div class="floating-elements">
                    <div class="floating-card card-1">
                        <i class="fas fa-laptop-code"></i>
                    </div>
                    <div class="floating-card card-2">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <div class="floating-card card-3">
                        <i class="fas fa-chart-line"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-bg-shapes">
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
            <div class="shape shape-3"></div>
        </div>
    </section>

    <!-- Clients Section -->
    <section id="clients" class="clients">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">عملاؤنا المميزون</h2>
                <p class="section-subtitle">نفخر بثقة عملائنا وشراكتنا الناجحة معهم</p>
            </div>
            
            <div class="clients-grid">
                <div class="client-card">
                    <div class="client-avatar">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <div class="client-info">
                        <h3 class="client-name">أحمد محمد</h3>
                        <p class="client-company">شركة التجارة الذكية</p>
                        <p class="client-service">تطوير موقع إلكتروني متكامل</p>
                        <p class="client-testimonial">
                            "خدمة ممتازة وتصميم رائع، الموقع ساعدنا في زيادة المبيعات بنسبة 150%"
                        </p>
                    </div>
                </div>
                
                <div class="client-card">
                    <div class="client-avatar">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                    <div class="client-info">
                        <h3 class="client-name">سارة أحمد</h3>
                        <p class="client-company">أكاديمية التعلم الحديث</p>
                        <p class="client-service">تطبيق تعليمي للهواتف الذكية</p>
                        <p class="client-testimonial">
                            "تطبيق رائع وسهل الاستخدام، طلابنا يحبونه ونسبة التفاعل عالية جداً"
                        </p>
                    </div>
                </div>
                
                <div class="client-card">
                    <div class="client-avatar">
                        <i class="fas fa-user-md"></i>
                    </div>
                    <div class="client-info">
                        <h3 class="client-name">د. محمد علي</h3>
                        <p class="client-company">عيادة الصحة المتقدمة</p>
                        <p class="client-service">نظام إدارة المرضى وحملة تسويقية</p>
                        <p class="client-testimonial">
                            "نظام متطور وحملة تسويقية ناجحة، زاد عدد المرضى بشكل ملحوظ"
                        </p>
                    </div>
                </div>
                
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-item" data-aos="fade-up" data-aos-delay="100">
                    <div class="stat-icon">
                        <i class="fas fa-trophy"></i>
                    </div>
                    <div class="stat-number" data-count="150">0</div>
                    <div class="stat-label">مشروع مكتمل</div>
                </div>
                <div class="stat-item" data-aos="fade-up" data-aos-delay="200">
                    <div class="stat-icon">
                        <i class="fas fa-smile"></i>
                    </div>
                    <div class="stat-number" data-count="120">0</div>
                    <div class="stat-label">عميل راضي</div>
                </div>
                <div class="stat-item" data-aos="fade-up" data-aos-delay="300">
                    <div class="stat-icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <div class="stat-number" data-count="5">0</div>
                    <div class="stat-label">سنوات خبرة</div>
                </div>
                <div class="stat-item" data-aos="fade-up" data-aos-delay="400">
                    <div class="stat-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <div class="stat-number" data-count="24">0</div>
                    <div class="stat-label">ساعة دعم</div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta">
        <div class="container">
            <div class="cta-content">
                <h2 class="cta-title">هل أنت مستعد لبدء مشروعك؟</h2>
                <p class="cta-description">
                    انضم إلى عملائنا الراضين واحصل على حلول تقنية متقدمة تساعدك على تحقيق أهدافك
                </p>
                <div class="cta-buttons">
                    <button class="btn-primary" onclick="window.open('https://wa.me/967778274221', '_blank')" >ابدأ الآن</button>
                    <button class="btn-outline" onclick="window.location.href='/contact'" >تواصل معنا</button>
                </div>
            </div>
        </div>
        <div class="cta-bg-shapes">
            <div class="cta-shape cta-shape-1"></div>
            <div class="cta-shape cta-shape-2"></div>
        </div>
    </section>

   @extends('layout.footer')
    <script src="{{ asset('script.js') }}"></script>
</body>
</html>