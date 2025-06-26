<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from pawly-html.wpthemeverse.com/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 17 May 2025 03:36:33 GMT -->

<head>
    <!-- Meta -->
    @include('client.layout.head')
</head>

<body>
    <!-- Header New Start -->
    @include('client.layout.header')
    <!-- Header New End -->
    <!-- Hero Banner Start -->
    @include('client.layout.banner')
    <!-- Hero Banner End -->

    <!-- Product Categories List Section Start -->
    <div class="product-categories-section section">
        <div class="container-fluid px-5">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <!-- Section Title Start -->
                    <div class="sisf-sis-section-title section-title wow fadeInDown mb-0">
                        <h2 class="sisf-m-title mb-0">
                            Best Seller <i class="fa fa-paw"> </i>
                        </h2>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>
            <div class="row">
                <div class="product-list-slider sisf-product-list sisf-layout--standard wow fadeInUp">
                    <div class="swiper d-flex justify-content-center">
                        <div class="swiper-wrapper">
                            @foreach($product as $product)
                            <div class="swiper-slide">
                                <div class="sisf-e-inner">
                                    <div class="product">
                                        <div class="sisf-product-inner sisf-e-inner">
                                            <!-- Product Image Start -->
                                            <div class="sisf-product-image">
                                                <a >
                                                    <img height="300px" width="100px" src="{{ asset($product->image) }}" class="image-fluid" alt="{{ $product->name }}">
                                                </a>
                                                <div class="heart-icon">
                                                    <a href="#" class="add-to-wishlist" data-product-id="{{ $product->id }}">
                                                        <i class="fa-regular fa-heart"></i>
                                                    </a>
                                                </div>
                                                <div class="sisf-m-button cart-icon-button text-center">
                                                    <a href="#" class="product_type_simple btn-default sisf-layout-filled add_to_cart_button" data-product-id="{{ $product->id }}">
                                                        <span><i class="fa-solid fa-cart-shopping me-2"></i> Thêm vào giỏ</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="sisf-e-product-content mb-0">
                                                <div class="sisf-e-ratings sisf-m mt-3">
                                                    <div class="sisf-m-inner">
                                                        <div class="sisf-m-star sisf--initial">
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h5 class="sisf-e-product-title sisf-e-title entry-title mt-3">
                                                    <a class="sisf-e-product-title-link shop-product" href="">
                                                        {{ $product->name }}
                                                    </a>
                                                </h5>
                                                <div class="sisf-product-price price mb-0">
                                                    <span class="product-price-amount">
                                                        {{ number_format($product->price, 0, ',', '.') }}đ
                                                    </span>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 text-center">
                    <div class="sisf-m-button" style="margin-top: 30px;">
                        <a class="btn-default sisf-hover-reveal" style="padding: 10px 30px; font-size: 16px;">Xem thêm</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Categories List Section End -->

    <!-- Shop by Categories Section Start -->
    <div class="shop-categories-section section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Title Start -->
                    <div class="sisf-sis-section-title section-title text-center wow fadeInDown">
                        <h2 class="sisf-m-title text-white">
                            Danh mục <i class="fa fa-paw"> </i>
                        </h2>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>


                <div class="row">
                    <div class="sisf-sis-category-slider">
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                @foreach ($category as $category)
                                <div class="swiper-slide">
                                    <div class="sisf-e-inner">
                                        <div class="sisf-e-content-holder text-center">
                                            <div class="sisf-e-title sisf-item-content">
                                                <h4 class="sisf-e-title">
                                                    <a href="shop.html">{{ $category->name }}</a>
                                                </h4>
                                            </div>
                                            <div class="sisf-category-button sisf-item-content mb-3">
                                                <a class="sisf-sis-button sisf-text-underline sisf-underline--left" href="shop.html">
                                                    <span class="sisf-m-text">Shop Now</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="sisf-e-images-holder">
                                            <div class="sisf-e-main-image text-center">
                                                <a href="shop.html">
                                                    <img src="{{ asset($category->image) }}" alt="{{ $category->name }}">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

        </div>
    </div>
    <!-- Shop by Categories Section End -->

    <!-- Background Video Section Start -->
    <div class="video-section position-relative">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 p-0">
                    <div class="intro-video-box">
                        <video class="bg-video" autoplay loop muted>
                            <source src="https://pawly.wpthemeverse.com/wp-content/uploads/2024/09/video-3.mp4"
                                type="video/mp4">
                        </video>
                        <!-- Section Title Start -->
                        <div class="sisf-sis-section-title section-title content-overlay text-center wow bounce mb-0">
                            <h2 class="sisf-m-title mb-0">
                                Happy Tails Pet Hub <i class="fa fa-paw"> </i>
                            </h2>
                            <div class="sis-m-text">
                                <p class="text-white">Pets are family, we totally get it. They make life so much
                                    better, which<br> is why at PetCulture we celebrate life with pets.</p>
                            </div>
                            <div class="sisf-m-button text-center mt-4">
                                <a href="shop.html" class="btn-default sisf-hover-reveal">Shop Now</a>
                            </div>
                        </div>
                        <!-- Section Title End -->
                        <div class="wave-img-bottom">
                            <figure>
                                <img src="images/pawly-Mask-group-white.png" alt="Pawly">
                            </figure>
                        </div>
                        <div class="wave-img-top">
                            <figure>
                                <img src="images/pawly-Mask-group-white-top.png" alt="Pawly">
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  Background Video Section End -->

    <!-- Footer Start -->
    @include('client.layout.footer')
    <!-- Footer End -->
    @include('client.layout.js')

    @push('scripts')
    <script>
        var swiper = new Swiper('.product-list-slider .swiper', {
            slidesPerView: 4,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                320: {
                    slidesPerView: 1,
                    spaceBetween: 20
                },
                480: {
                    slidesPerView: 2,
                    spaceBetween: 20
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 30
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 30
                }
            }
        });
    </script>
    @endpush
</body>

<!-- Mirrored from pawly-html.wpthemeverse.com/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 17 May 2025 03:36:57 GMT -->

</html>
