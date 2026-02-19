     @extends('layout.header')
     @section('title','التواصل')

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1 class="page-title">تواصل معنا</h1>
            <p class="page-subtitle">نحن هنا للإجابة على استفساراتك ومساعدتك في تحقيق أهدافك</p>
        </div>
        <div class="header-shapes">
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
        </div>
    </section>
    <!-- Contact Form -->
    <section class="contact-form-section">
        <div class="container">
            <div class="contact-wrapper">
                <div class="form-side" data-aos="fade-right">
                    <h2 class="form-title">أرسل لنا رسالة</h2>
                    <p class="form-subtitle">املأ النموذج وسنتواصل معك في أقرب وقت ممكن</p>
                    
                    <form class="contact-form" id="contactForm">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="name">الاسم الكامل *</label>
                                <input type="text" id="name" name="name" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="email">البريد الإلكتروني *</label>
                                <input type="email" id="email" name="email" required>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="phone">رقم الهاتف *</label>
                                <input type="tel" id="phone" name="phone" required>
                            </div>
                            
                        </div>
                        
                        <div class="form-group">
                            <label for="subject">الموضوع *</label>
                            <input type="text" id="subject" name="subject" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="message">الرسالة *</label>
                            <textarea id="message" name="message" rows="6" required></textarea>
                        </div>
                        
                        <button type="submit" class="submit-btn">
                            <span>إرسال الرسالة</span>
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </form>
                </div>
                
                <div class="map-side" data-aos="fade-left">
                    <div class="map-placeholder">
                        <i class="fas fa-map-marked-alt"></i>
                        <p>خريطة الموقع</p>
                    </div>
                    
                    <div class="social-connect">
                        <h3>تابعنا على</h3>
                        <div class="social-links">
                            <a href="#" class="social-btn facebook">
                                <i class="fab fa-facebook-f"></i>
                                <span>Facebook</span>
                            </a>
                            <a href="#" class="social-btn twitter">
                                <i class="fab fa-twitter"></i>
                                <span>Twitter</span>
                            </a>
                            <a href="#" class="social-btn linkedin">
                                <i class="fab fa-linkedin-in"></i>
                                <span>LinkedIn</span>
                            </a>
                            <a href="#" class="social-btn instagram">
                                <i class="fab fa-instagram"></i>
                                <span>Instagram</span>
                            </a>
                            <a href="#" class="social-btn whatsapp">
                                <i class="fab fa-whatsapp"></i>
                                <span>WhatsApp</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">الأسئلة الشائعة</h2>
                <p class="section-subtitle">إجابات على أكثر الأسئلة شيوعاً</p>
            </div>
            
            <div class="faq-container">
                <div class="faq-item" data-aos="fade-up" data-aos-delay="100">
                    <div class="faq-question">
                        <h3>كم تستغرق مدة تطوير موقع إلكتروني؟</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>تعتمد المدة على حجم وتعقيد المشروع، لكن عادةً تتراوح بين 2-6 أسابيع للمواقع المتوسطة.</p>
                    </div>
                </div>
                
                <div class="faq-item" data-aos="fade-up" data-aos-delay="200">
                    <div class="faq-question">
                        <h3>هل تقدمون خدمة الصيانة والدعم الفني؟</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>نعم، نقدم خدمة صيانة ودعم فني مستمر لجميع مشاريعنا على مدار الساعة.</p>
                    </div>
                </div>
                
                <div class="faq-item" data-aos="fade-up" data-aos-delay="300">
                    <div class="faq-question">
                        <h3>ما هي تكلفة تطوير تطبيق موبايل؟</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>تختلف التكلفة حسب المميزات والتعقيد، نقدم عروض أسعار مخصصة بعد دراسة متطلبات المشروع.</p>
                    </div>
                </div>
                
                <div class="faq-item" data-aos="fade-up" data-aos-delay="400">
                    <div class="faq-question">
                        <h3>هل يمكنني طلب تعديلات بعد التسليم؟</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>بالتأكيد، نقدم فترة ضمان مع إمكانية إجراء التعديلات المطلوبة حسب الاتفاق.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
   @extends('layout.footer')
    <script src="{{ asset('script.js') }}"></script>
</body>
</html>