@extends('layouts.app')

@section('title')
    Store Homepage
@endsection

@prepend('prepend-style')
    <style>
        button {
            padding: 12.5px 30px;
            border: 0;
            border-radius: 100px;
            background-color: #1ade79;
            color: #ffffff;
            font-weight: Bold;
            transition: all 0.5s;
            -webkit-transition: all 0.5s;
        }

        button:hover {
            background-color: #0ba25e;
            box-shadow: 0 0 20px #6fc5ff50;
            transform: scale(1.1);
        }

        button:active {
            background-color: #30dda9;
            transition: all 0.25s;
            -webkit-transition: all 0.25s;
            box-shadow: none;
            transform: scale(0.98);
        }
    </style>
@endprepend

@section('content')
    <div class="page-content page-home">
        <section class="store-carousel">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12" data-aos="zoom-in">
                        <div id="storeCarousel" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#storeCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#storeCarousel" data-slide-to="1"></li>
                                <li data-target="#storeCarousel" data-slide-to="2"></li>
                                <li data-target="#storeCarousel" data-slide-to="3"></li>
                                <li data-target="#storeCarousel" data-slide-to="4"></li>
                                <li data-target="#storeCarousel" data-slide-to="5"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="/images/rawalo-1.png" class="d-block w-100" alt="Carousel1" />
                                </div>
                                <div class="carousel-item">
                                    <img src="/images/rawalo-2.png" class="d-block w-100" alt="Carousel2" />
                                </div>
                                <div class="carousel-item">
                                    <img src="/images/rawalo-3.png" class="d-block w-100" alt="Carousel3" />
                                </div>
                                <div class="carousel-item">
                                    <img src="/images/rawalo-4.png" class="d-block w-100" alt="Carousel4" />
                                </div>
                                <div class="carousel-item">
                                    <img src="/images/rawalo-5.png" class="d-block w-100" alt="Carousel5" />
                                </div>
                                <div class="carousel-item">
                                    <img src="/images/rawalo-6.png" class="d-block w-100" alt="Carousel6" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Categories -->
        <section class="store-trend-categories mt-4">
            <div class="container">
                <div class="row">
                    <div class="col-12" data-aos="fade-up">
                        <h5>Trend Categories</h5>
                    </div>
                </div>
                <div class="row">
                    @php
                        $incrementCategory = 0
                    @endphp
                    @forelse ($categories as $category)
                        <div class="col-6 col-md-3 col-lg-2"
                            data-aos="fade-up"
                            data-aos-delay="{{ $incrementCategory += 100}}">
                            <a class="component-categories d-block" href="{{ route('categories-detail', $category->slug) }}">
                                <div class="categories-image">
                                    <img src="{{ Storage::url($category->photo) }}" alt="" class="w-100" />
                                </div>
                                <p class="categories-text">
                                    {{ $category->name }}
                                </p>
                            </a>
                    </div>
                    @empty
                        <div class="col-12 text-center py-5"
                            data-aos="fade-up"
                            data-aos-delay="100">
                            Belum ada kategori ditemukan
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
        <section class="store-new-products">
            <div class="container">
                <div class="row">
                    <div class="col-12" data-aos="fade-up">
                        <h5>New Products</h5>
                    </div>
                </div>
                <div class="row">
                    @php
                        $incrementProduct = 0
                    @endphp
                    @forelse ($products as $product)
                        <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="{{ $incrementProduct += 100}}">
                            <a class="component-products d-block" href="{{ route('detail', $product->slug) }}">
                                <div class="products-thumbnail">
                                    <div class="products-image"
                                        style="
                                            @if($product->galleries)
                                                background-image: url('{{ Storage::url($product->galleries->first()->photos) }}')
                                            @else
                                                background-color: #eee
                                            @endif
                                        ">
                                    </div>
                                </div>
                                <div class="products-text">
                                    {{ $product->name }}
                                </div>
                                <div class="products-price">
                                    Rp {{ $product->price }}
                                </div>
                            </a>
                        </div>
                    @empty
                        <div class="col-12 text-center py-5"
                            data-aos="fade-up"
                            data-aos-delay="100">
                            Belum ada Produk Ditemukan
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
    </div>
@endsection

@push('prepend-script')
    <script>
        // Menambahkan kelas `scrolled` saat di-scroll
        window.addEventListener("scroll", function() {
            var navbar = document.querySelector(".navbar");
            if (window.scrollY > 1) { // Sesuaikan angka 50 ini sesuai kebutuhan
                navbar.classList.add("scrolled");
            } else {
                navbar.classList.remove("scrolled");
            }
        });
        window.addEventListener("scroll", function() {
            const title = document.getElementById("title");
            if (window.scrollY > 1) {
                title.style.color = "white"; // Change color to white after scrolling 10px
            } else {
                title.style.color = "black"; // Revert to black when scroll is less than 10px
            }
        });
    </script>
@endpush
