     @extends('layout.header')
     @section('title','الخدمات')
        
    <section class="page-header">
        <div class="container">
            <h1 class="page-title">خدماتنا</h1>
            <p class="page-subtitle">{{$subtitle}}</p>
        </div>
        <div class="header-shapes">
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services">
        <div class="container">
            <div class="services-grid">
                <!-- Service 1 -->
                <div class="service-card" data-aos="fade-up">
                    <div class="service-icon">
                        <i class="fas fa-globe"></i>
                    </div>
                    <h3 class="service-title"> تصميم مواقع الكترونية </h3>
                    <p class="service-description">
                         {{ $service->service_description_web ?? 'websites...'}}                    </p>
                    <ul class="service-features">
                        <li><i class="fas fa-check"></i> تصميم متجاوب</li>
                        <li><i class="fas fa-check"></i> سرعة عالية</li>
                        <li><i class="fas fa-check"></i> تحسين SEO</li>
                    </ul>
                    <button class="btn-primary">اطلب الخدمة</button>
                </div>

                <!-- Service 2 -->
                <div class="service-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-icon">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h3 class="service-title">برمجة التطبيقات</h3>
                    <p class="service-description">
                         {{ $service->service_description_app ?? 'application...'}}                    </p>
                    </p>
                    <ul class="service-features">
                        <li><i class="fas fa-check"></i> iOS & Android</li>
                        <li><i class="fas fa-check"></i> واجهات جذابة</li>
                        <li><i class="fas fa-check"></i> أداء سريع</li>
                    </ul>
                    <button class="btn-primary">اطلب الخدمة</button>
                </div>

                <!-- Service 3 -->
                <div class="service-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3 class="service-title">التسويق الإلكتروني</h3>
                    <p class="service-description">
                         {{ $service->service_description_marketing ?? 'marketing...'}}                    </p>
                    </p>
                    <ul class="service-features">
                        <li><i class="fas fa-check"></i> إدارة حسابات</li>
                        <li><i class="fas fa-check"></i> حملات إعلانية</li>
                        <li><i class="fas fa-check"></i> تحليل النتائج</li>
                    </ul>
                    <button class="btn-primary">اطلب الخدمة</button>
                </div>
            </div>
        </div>
    </section>

    @extends('layout.footer')
    <script src="{{ asset('script.js') }}"></script>
</body>
</html>