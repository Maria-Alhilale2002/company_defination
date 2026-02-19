    @extends('layout.header')
    @section('title','من نحن')

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1 class="page-title">من نحن</h1>
            <p class="page-subtitle">نحن فريق من المحترفين المتخصصين في تقديم الحلول التقنية المبتكرة</p>
        </div>
        <div class="header-shapes">
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
        </div>
    </section>

    <!-- About Story -->
    <section class="about-story">
        <div class="container">
            <div class="story-content">
                <div class="story-text" data-aos="fade-right">
                    <h2 class="section-title">قصتنا</h2>
                    <p>
                        بدأت رحلتنا في عام 2019 بحلم بسيط: تقديم حلول تقنية مبتكرة تساعد الشركات على النمو والتطور في العالم الرقمي. 
                        منذ ذلك الحين، نمت تك سوليوشنز لتصبح واحدة من الشركات الرائدة في مجال تطوير البرمجيات والتسويق الرقمي.
                    </p>
                    <p>
                        نؤمن بأن التكنولوجيا يجب أن تكون في خدمة الإنسان، ولذلك نسعى دائماً لتقديم حلول سهلة الاستخدام وفعالة 
                        تلبي احتياجات عملائنا وتتجاوز توقعاتهم.
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
                        أن نكون الشريك التقني الأول للشركات في المنطقة، ونساهم في تحويلها الرقمي من خلال حلول مبتكرة ومتطورة
                    </p>
                </div>
                
                <div class="mv-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="mv-icon">
                        <i class="fas fa-flag"></i>
                    </div>
                    <h3 class="mv-title">رسالتنا</h3>
                    <p class="mv-description">
                        تقديم حلول تقنية عالية الجودة تساعد عملاءنا على تحقيق أهدافهم وتعزيز تواجدهم الرقمي بطريقة فعالة ومستدامة
                    </p>
                </div>
                
                <div class="mv-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="mv-icon">
                        <i class="fas fa-gem"></i>
                    </div>
                    <h3 class="mv-title">قيمنا</h3>
                    <p class="mv-description">
                        الجودة، الابتكار، الشفافية، والالتزام بمواعيد التسليم هي القيم الأساسية التي نعمل بها ونلتزم بها مع جميع عملائنا
                    </p>
                </div>
            </div>
        </div>
    </section>    
    
   @extends('layout.footer')
    <script src="{{ asset('script.js') }}"></script>

    
</body>
</html>