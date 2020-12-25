@extends('customers.layout.master')
@section('content')
    <div class="content">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100"
                         src="https://thaicong.com/wp-content/uploads/2020/11/Banner-2880x1600-26.11.jpg"
                         alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100"
                         src="https://thaicong.com/wp-content/uploads/2019/12/A-Ngon-P-Khach-2880x1600.jpg"
                         alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100"
                         src="https://thaicong.com/wp-content/uploads/2019/12/A-Binh-P-Khach-2880x1600.jpg"
                         alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </a>
        </div>
    </div>
    <div class="group-product pt100">
        <div class="wrap-main">
            <div class="tt-1 text-center">
                BÁN CHẠY NHẤT
            </div>
            <div class="text-center mt10">
                <a href="{{route('home.allProducts')}}" class="link">XEM TẤT CẢ</a>
            </div>
            <div class="row-product">
                @foreach($products as $product)
                    <div>
                        <div class="item-product-store">
                            <div class="img">
                                <img style="width: 100%" src="{{asset('storage/'.substr($product->image1,7))}}" alt="">
                            </div>
                            <div class="brand">{{$product->brand->name}}</div>
                            <div class="proName">{{$product->name}}</div>
                            <div class="proPrice">{{number_format($product->price)}}₫</div>
                            <a href="{{route('client.showProductDetails',$product->id)}}" class="full-link"></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="pt100"></div>
    <div class="line no-space"></div>
    <div class="group-brand text-center pt50">
        <div class="wrap-main">
            <a href="{{route('brand.show',3)}}">
                <img src="https://onlinestore.thaicong.com/wp-content/uploads/2020/04/baccarat-logo.jpg" alt="">
            </a>
            <a href="{{route('brand.show',4)}}">
                <img src="https://onlinestore.thaicong.com/wp-content/uploads/2020/04/trudon-logo.jpg" alt="">
            </a>
            <a href="{{route('brand.show',5)}}">
                <img src="https://onlinestore.thaicong.com/wp-content/uploads/2020/04/arcahorn-logo.jpg" alt="">
            </a>
            <a href="{{route('brand.show',6)}}">
                <img src="https://onlinestore.thaicong.com/wp-content/uploads/2020/04/fur-logo.jpg" alt="">
            </a>
            <a href="{{route('brand.show',7)}}">
                <img src="https://onlinestore.thaicong.com/wp-content/uploads/2020/04/riviere-logo.jpg" alt="">
            </a>
            <a href="{{route('brand.show',8)}}">
                <img src="https://onlinestore.thaicong.com/wp-content/uploads/2020/04/lauren-logo.jpg" alt="">
            </a>
        </div>
    </div>
    <div class="group-categories pt50">
        <div class="box-flex">
            <div class="box-flex">
                <a href="{{route('category.show',3)}}">
                    <div class="item-categories small">
                        <div class="img">
                            <img src="https://onlinestore.thaicong.com/wp-content/uploads/2020/04/Category-1.jpg"
                                 alt="">
                        </div>
                        <div class="box">
                            <div class="tt-2">
                                NẾN THƠM
                            </div>
                            <div class="mt10">
                                <a href="" class="link">XEM TẤT CẢ</a>
                            </div>
                            <a href="" class="full-link"></a>
                        </div>
                    </div>
                </a>
                <a href="{{route('category.show',4)}}">
                    <div class="item-categories small">
                        <div class="img">
                            <img src="https://onlinestore.thaicong.com/wp-content/uploads/2020/04/Baccarat-3.jpg"
                                 alt="">
                        </div>
                        <div class="box">
                            <div class="tt-2">
                                BÌNH HOA
                            </div>
                            <div class="mt10">
                                <a href="{{route('category.show',4)}}" class="link">XEM TẤT CẢ</a>
                            </div>
                            <a href="" class="full-link"></a>
                        </div>
                    </div>
                </a>
            </div>
            <div class="box-flex">
                <a href="{{route('category.show',5)}}">
                    <div class="item-categories small">
                        <div class="img">
                            <img src="https://onlinestore.thaicong.com/wp-content/uploads/2020/04/Category-3.jpg"
                                 alt="">
                        </div>
                        <div class="box">
                            <div class="tt-2">
                                KHUNG HÌNH
                            </div>
                            <div class="mt10">
                                <a href="{{route('category.show',5)}}" class="link">XEM TẤT CẢ</a>
                            </div>
                            <a href="" class="full-link"></a>
                        </div>
                    </div>
                </a>
                <a href="{{route('category.show',6)}}">
                    <div class="item-categories small">
                        <div class="img">
                            <img src="https://onlinestore.thaicong.com/wp-content/uploads/2020/04/Baccarat-5.jpg"
                                 alt="">
                        </div>
                        <div class="box">
                            <div class="tt-2">
                                ĐỒ PHA LÊ
                            </div>
                            <div class="mt10">
                                <a href="{{route('category.show',6)}}" class="link">XEM TẤT CẢ</a>
                            </div>
                            <a href="" class="full-link"></a>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="box-flex">
            <div class="box-flex">
                <a href="{{route('category.show',7)}}">
                    <div class="item-categories small">
                        <div class="img">
                            <img src="https://onlinestore.thaicong.com/wp-content/uploads/2020/04/Category-13.jpg"
                                 alt="">
                        </div>
                        <div class="box">
                            <div class="tt-2">
                                ĐỒ NHÀ TẮM
                            </div>
                            <div class="mt10">
                                <a href="" class="link">XEM TẤT CẢ</a>
                            </div>
                            <a href="" class="full-link"></a>
                        </div>
                    </div>
                </a>
                <a href="{{route('category.show',8)}}">
                    <div class="item-categories small">
                        <div class="img">
                            <img src="https://onlinestore.thaicong.com/wp-content/uploads/2020/04/Category-7.jpg"
                                 alt="">
                        </div>
                        <div class="box">
                            <div class="tt-2">
                                ĐỒ TRANG TRÍ
                            </div>
                            <div class="mt10">
                                <a href="" class="link">XEM TẤT CẢ</a>
                            </div>
                            <a href="" class="full-link"></a>
                        </div>
                    </div>
                </a>
            </div>
            <div class="box-flex">
                <a href="{{route('category.show',10)}}">
                    <div class="item-categories small">
                        <div class="img">
                            <img src="https://onlinestore.thaicong.com/wp-content/uploads/2020/04/Baccarat-1.jpg"
                                 alt="">
                        </div>
                        <div class="box">
                            <div class="tt-2">
                                KHAY
                            </div>
                            <div class="mt10">
                                <a href="" class="link">XEM TẤT CẢ</a>
                            </div>
                            <a href="" class="full-link"></a>
                        </div>
                    </div>
                </a>
                <a href="{{route('category.show',9)}}">
                    <div class="item-categories small">
                        <div class="img">
                            <img src="https://onlinestore.thaicong.com/wp-content/uploads/2020/04/Baccarat-4.jpg"
                                 alt="">
                        </div>
                        <div class="box">
                            <div class="tt-2">
                                ĐÈN
                            </div>
                            <div class="mt10">
                                <a href="" class="link">XEM TẤT CẢ</a>
                            </div>
                            <a href="" class="full-link"></a>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
