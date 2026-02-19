@extends('layout.header')
     @section('title','المنتجات')

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1 class="page-title">معرض أعمالنا</h1>
            <p class="page-subtitle">مشاريع ناجحة نفخر بإنجازها لعملائنا</p>
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
                <!-- Website Products -->
                <div class="product-card" data-category="websites">
                    <div class="product-image">
                        <i class="fas fa-shopping-cart"></i>
                        <div class="product-overlay">
                            <button class="view-btn"><i class="fas fa-eye"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <span class="product-category">موقع إلكتروني</span>
                        <h3 class="product-title">متجر إلكتروني متكامل</h3>
                        <p class="product-description">منصة تجارة إلكترونية بنظام دفع آمن وإدارة متقدمة</p>
                    </div>
                </div>

                <div class="product-card" data-category="websites">
                    <div class="product-image">
                        <i class="fas fa-hospital"></i>
                        <div class="product-overlay">
                            <button class="view-btn"><i class="fas fa-eye"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <span class="product-category">موقع إلكتروني</span>
                        <h3 class="product-title">موقع مستشفى طبي</h3>
                        <p class="product-description">نظام حجز مواعيد وإدارة المرضى الإلكتروني</p>
                    </div>
                </div>

                <div class="product-card" data-category="websites">
                    <div class="product-image">
                        <i class="fas fa-graduation-cap"></i>
                        <div class="product-overlay">
                            <button class="view-btn"><i class="fas fa-eye"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <span class="product-category">موقع إلكتروني</span>
                        <h3 class="product-title">منصة تعليمية</h3>
                        <p class="product-description">نظام إدارة تعليمي متكامل مع فصول افتراضية</p>
                    </div>
                </div>

                <div class="product-card" data-category="websites">
                    <div class="product-image">
                        <i class="fas fa-utensils"></i>
                        <div class="product-overlay">
                            <button class="view-btn"><i class="fas fa-eye"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <span class="product-category">موقع إلكتروني</span>
                        <h3 class="product-title">موقع مطعم</h3>
                        <p class="product-description">موقع عرض قائمة الطعام مع نظام طلبات أونلاين</p>
                    </div>
                </div>

                <div class="product-card" data-category="websites">
                    <div class="product-image">
                        <i class="fas fa-building"></i>
                        <div class="product-overlay">
                            <button class="view-btn"><i class="fas fa-eye"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <span class="product-category">موقع إلكتروني</span>
                        <h3 class="product-title">موقع شركة عقارية</h3>
                        <p class="product-description">عرض العقارات مع نظام بحث وفلترة متقدم</p>
                    </div>
                </div>

                <div class="product-card" data-category="websites">
                    <div class="product-image">
                        <i class="fas fa-briefcase"></i>
                        <div class="product-overlay">
                            <button class="view-btn"><i class="fas fa-eye"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <span class="product-category">موقع إلكتروني</span>
                        <h3 class="product-title">موقع شركة استشارات</h3>
                        <p class="product-description">موقع تعريفي احترافي مع نظام حجز استشارات</p>
                    </div>
                </div>

                <!-- Mobile Apps -->
                <div class="product-card" data-category="apps">
                    <div class="product-image">
                        <i class="fas fa-mobile-screen-button"></i>
                        <div class="product-overlay">
                            <button class="view-btn"><i class="fas fa-eye"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <span class="product-category">تطبيق موبايل</span>
                        <h3 class="product-title">تطبيق توصيل طلبات</h3>
                        <p class="product-description">تطبيق توصيل مع تتبع الطلبات والدفع الإلكتروني</p>
                    </div>
                </div>

                <div class="product-card" data-category="apps">
                    <div class="product-image">
                        <i class="fas fa-dumbbell"></i>
                        <div class="product-overlay">
                            <button class="view-btn"><i class="fas fa-eye"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <span class="product-category">تطبيق موبايل</span>
                        <h3 class="product-title">تطبيق لياقة بدنية</h3>
                        <p class="product-description">تطبيق تمارين رياضية مع متابعة التقدم</p>
                    </div>
                </div>

                <div class="product-card" data-category="apps">
                    <div class="product-image">
                        <i class="fas fa-book-open"></i>
                        <div class="product-overlay">
                            <button class="view-btn"><i class="fas fa-eye"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <span class="product-category">تطبيق موبايل</span>
                        <h3 class="product-title">تطبيق قراءة كتب</h3>
                        <p class="product-description">مكتبة رقمية مع قارئ كتب إلكترونية متقدم</p>
                    </div>
                </div>

                <div class="product-card" data-category="apps">
                    <div class="product-image">
                        <i class="fas fa-calendar-check"></i>
                        <div class="product-overlay">
                            <button class="view-btn"><i class="fas fa-eye"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <span class="product-category">تطبيق موبايل</span>
                        <h3 class="product-title">تطبيق إدارة المهام</h3>
                        <p class="product-description">تطبيق تنظيم المهام والمشاريع الشخصية</p>
                    </div>
                </div>

                <div class="product-card" data-category="apps">
                    <div class="product-image">
                        <i class="fas fa-comments"></i>
                        <div class="product-overlay">
                            <button class="view-btn"><i class="fas fa-eye"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <span class="product-category">تطبيق موبايل</span>
                        <h3 class="product-title">تطبيق محادثات</h3>
                        <p class="product-description">تطبيق مراسلة فورية مع مكالمات صوتية</p>
                    </div>
                </div>

                <div class="product-card" data-category="apps">
                    <div class="product-image">
                        <i class="fas fa-wallet"></i>
                        <div class="product-overlay">
                            <button class="view-btn"><i class="fas fa-eye"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <span class="product-category">تطبيق موبايل</span>
                        <h3 class="product-title">تطبيق محفظة إلكترونية</h3>
                        <p class="product-description">تطبيق دفع وتحويل أموال آمن</p>
                    </div>
                </div>

                <!-- Marketing Projects -->
                <div class="product-card" data-category="marketing">
                    <div class="product-image">
                        <i class="fas fa-bullhorn"></i>
                        <div class="product-overlay">
                            <button class="view-btn"><i class="fas fa-eye"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <span class="product-category">تسويق إلكتروني</span>
                        <h3 class="product-title">حملة إعلانية متكاملة</h3>
                        <p class="product-description">حملة تسويقية على منصات التواصل الاجتماعي</p>
                    </div>
                </div>

                <div class="product-card" data-category="marketing">
                    <div class="product-image">
                        <i class="fas fa-search"></i>
                        <div class="product-overlay">
                            <button class="view-btn"><i class="fas fa-eye"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <span class="product-category">تسويق إلكتروني</span>
                        <h3 class="product-title">تحسين محركات البحث SEO</h3>
                        <p class="product-description">تحسين ظهور الموقع في نتائج البحث</p>
                    </div>
                </div>

                <div class="product-card" data-category="marketing">
                    <div class="product-image">
                        <i class="fas fa-envelope"></i>
                        <div class="product-overlay">
                            <button class="view-btn"><i class="fas fa-eye"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <span class="product-category">تسويق إلكتروني</span>
                        <h3 class="product-title">حملة بريد إلكتروني</h3>
                        <p class="product-description">حملة تسويقية عبر البريد الإلكتروني</p>
                    </div>
                </div>

                <div class="product-card" data-category="marketing">
                    <div class="product-image">
                        <i class="fas fa-chart-bar"></i>
                        <div class="product-overlay">
                            <button class="view-btn"><i class="fas fa-eye"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <span class="product-category">تسويق إلكتروني</span>
                        <h3 class="product-title">تحليل وتقارير تسويقية</h3>
                        <p class="product-description">تحليل شامل للحملات التسويقية والأداء</p>
                    </div>
                </div>

                <div class="product-card" data-category="marketing">
                    <div class="product-image">
                        <i class="fas fa-video"></i>
                        <div class="product-overlay">
                            <button class="view-btn"><i class="fas fa-eye"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <span class="product-category">تسويق إلكتروني</span>
                        <h3 class="product-title">محتوى فيديو تسويقي</h3>
                        <p class="product-description">إنتاج محتوى فيديو احترافي للتسويق</p>
                    </div>
                </div>

                <div class="product-card" data-category="marketing">
                    <div class="product-image">
                        <i class="fas fa-users"></i>
                        <div class="product-overlay">
                            <button class="view-btn"><i class="fas fa-eye"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <span class="product-category">تسويق إلكتروني</span>
                        <h3 class="product-title">إدارة حسابات التواصل</h3>
                        <p class="product-description">إدارة شاملة لحسابات التواصل الاجتماعي</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

  
      
   @extends('layout.footer')
    <script src="{{ asset('script.js') }}"></script>
</body>
</html>