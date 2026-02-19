@extends('layout.header')
@section('title', 'من نحن')

<!-- Page Header -->
<section class="page-header">
    <div class="container">
        <h1 class="page-title">من نحن</h1>
        <p class="page-subtitle">{{ $subtitle }}</p>
    </div>
    <div class="header-shapes">
        <div class="shape shape-1"></div>
        @if(isset($about->about_image))
            <div class="shape shape-2" style="background-image: url('{{ $about->about_image }}');"></div>
        @else
            <div class="shape shape-2"></div>
        @endif
    </div>
</section>

<!-- About Story -->
<section class="about-story">
    <div class="container">
        <div class="story-content">
            <div class="story-text" data-aos="fade-right">
                <h2 class="section-title">قصتنا</h2>
                <p>
                    {{ $about->story_text ?? 'قصتنا...' }}
                </p>
                <p>
                    {{ $about->about_text ?? 'عن الشركة...' }}
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
                    {{ $about->vision_text ?? 'رؤيتنا...' }}
                </p>
            </div>

            <div class="mv-card" data-aos="fade-up" data-aos-delay="200">
                <div class="mv-icon">
                    <i class="fas fa-flag"></i>
                </div>
                <h3 class="mv-title">رسالتنا</h3>
                <p class="mv-description">
                    {{ $about->message_text ?? 'رسالتنا...' }}
                </p>
            </div>

            <div class="mv-card" data-aos="fade-up" data-aos-delay="300">
                <div class="mv-icon">
                    <i class="fas fa-gem"></i>
                </div>
                <h3 class="mv-title">قيمنا</h3>
                <p class="mv-description">
                    {{ $about->principle_text ?? 'قيمنا...' }}
                </p>
            </div>
        </div>
    </div>
</section>

@extends('layout.footer')
<script src="{{ asset('script.js') }}"></script>


</body>

</html>