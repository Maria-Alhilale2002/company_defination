@extends('layout.header')
     @section('title','المنتجات')

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1 class="page-title">معرض أعمالنا</h1>
            <p class="page-subtitle">{{ $subtitle }}</p>
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
                @forelse($products as $product)
                    <div class="product-card" data-category="{{ $product->service_type == 'website' ? 'websites' : ($product->service_type == 'app' ? 'apps' : 'marketing') }}">
                        <div class="product-image">
                            @if($product->product_image)
                                <img src="{{ asset($product->product_image) }}" alt="{{ $product->product_name }}" style="width: 100%; height: 100%; object-fit: cover;">
                            @else
                                @if($product->service_type == 'website')
                                    <i class="fas fa-globe"></i>
                                @elseif($product->service_type == 'app')
                                    <i class="fas fa-mobile-alt"></i>
                                @else
                                    <i class="fas fa-bullhorn"></i>
                                @endif
                            @endif
                            <div class="product-overlay">
                                <button class="view-btn"><i class="fas fa-eye"></i></button>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="product-category">
                                @if($product->service_type == 'website')
                                    موقع إلكتروني
                                @elseif($product->service_type == 'app')
                                    تطبيق موبايل
                                @else
                                    تسويق إلكتروني
                                @endif
                            </span>
                            <h3 class="product-title">{{ $product->product_name }}</h3>
                            <p class="product-description">{{ Str::limit($product->product_description, 80) }}</p>
                        </div>
                    </div>
                @empty
                    <div style="text-align: center; padding: 60px 20px; grid-column: 1 / -1;">
                        <i class="fas fa-box-open" style="font-size: 4rem; color: #cbd5e1; margin-bottom: 20px;"></i>
                        <h3 style="color: #64748b; font-size: 1.5rem; margin-bottom: 10px;">لا توجد منتجات متاحة حالياً</h3>
                        <p style="color: #94a3b8;">سيتم إضافة المنتجات قريباً</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

  
      
   @extends('layout.footer')
    <script src="{{ asset('script.js') }}"></script>
</body>
</html>