<!doctype html>
<html lang="en">
<head>
    <title>TUNG LUXURY</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('customer_resource/css/mycss.css')}}">
    <link rel="stylesheet" href="{{asset('customer_resource/css/productdetail.css')}}">
    <link rel="stylesheet" href="{{asset('customer_resource/css/category.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
          integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
          crossorigin="anonymous"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400&display=swap" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark header">
    <div class="container">
        <a class="navbar-brand" href="{{route('client.showIndex')}}">TUNG LUXURY</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse mynavbar" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto w-100 justify-content-end" style="font-size: 1.2rem; font-weight:600">

                <li class="nav-item dropdown">
                    <a class="nav-link my-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        SẢN PHẨM
                    </a>
                    <div class="dropdown-menu myMenu" aria-labelledby="navbarDropdown">
                        @foreach($categories as $category)
                            <a class="dropdown-item myItem my-link" href="{{route('category.show',$category->id)}}">{{$category->name}}</a>
                        @endforeach
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link my-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        THƯƠNG HIỆU
                    </a>
                    <div class="dropdown-menu myMenu" aria-labelledby="navbarDropdown">
{{--                        @forelse($brands as $brand)--}}
{{--                            <a class="dropdown-item myItem my-link" href="{{route('brand.show',$brand->id)}}">{{$brand->name}}</a>--}}
{{--                        @endforelse--}}
{{--                    </div>--}}
                </li>
                <li class="nav-item">
                    <a class="nav-link my-link" href="{{route('home.about')}}">GIỚI THIỆU</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link my-link" href="{{route('home.contact')}}">LIÊN HỆ</a>
                </li>
                <li class="nav-item">
                    <form class="nav-link" action="{{route('category.search')}}" method="POST">
                        @csrf
                        <input type="text" name="searchValue" class="form-control" placeholder="Search Product">
                    </form>
                </li>
                <li class="nav-item cartIcon">
                    <a class="nav-link" href="{{route('cart.showCart')}}">
                        <img src="https://theme.hstatic.net/1000319111/1000411564/14/cart-icon.png?v=1032" alt=""
                             style="width:25px; display:block">
                        <span class="cartNumber">
                            {{session('cart')?session('cart')->totalQty:" "}}
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
@yield('breadcrumb')
@yield('content')
<div class="wrap-ship">
    <div class="d-flex">
        <div>
            <span class="ic-ship-1"><img
                    src="https://onlinestore.thaicong.com/wp-content/themes/thaicong/assets/images/icon/ic_ship_1.svg"
                    alt=""></span>
            <span class="text">THANH TOÁN DỄ DÀNG VÀ <br>BẢO MẬT</span>
        </div>
        <div>
            <span class="ic-ship-1"><img
                    src="https://onlinestore.thaicong.com/wp-content/themes/thaicong/assets/images/icon/ic_ship_2.svg"
                    alt=""></span>
            <span class="text">GIAO HÀNG ĐẢM BẢO<br>TOÀN QUỐC</span>
        </div>
        <div>
            <span class="ic-ship-1"><img
                    src="https://onlinestore.thaicong.com/wp-content/themes/thaicong/assets/images/icon/ic_ship_3.svg"
                    alt=""></span>
            <span class="text">HOTLINE 090XXXXXXX <br>(10:00 - 19:00)</span>
        </div>
        <div>
            <span class="ic-ship-1"><img
                    src="https://onlinestore.thaicong.com/wp-content/themes/thaicong/assets/images/icon/ic_ship_4.svg"
                    alt=""></span>
            <span class="text">CAM KẾT SẢN PHẨM <br>CHÍNH HÃNG</span>
        </div>
    </div>
</div>
<footer>
    <div class="top">
        <div class="wrap-main">
            <div class="row list-row">
                <div class="col-xs-2">
                    <ul>
                        <li>
                            <a href="{{route('client.showIndex')}}">TRANG CHỦ</a>
                        </li>
                        <li>
                            <a href="{{route('home.allProducts')}}">SẢN PHẨM</a>
                        </li>
                        <li>
                            <a href="{{route('home.about')}}">GIỚI THIỆU</a>
                        </li>
                        <li>
                            <a href="{{route('home.contact')}}">LIÊN HỆ</a>
                        </li>
                    </ul>
                </div>
                <div class="col-xs-2">
                    <ul>
                        <li>
                            <a href="">hướng dẫn</a>
                        </li>
                        <li>
                            <a href="">chính sách đổi trả</a>
                        </li>
                        <li>
                            <a href="">câu hỏi thường gặp</a>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-2 col-xs-4">
                    <ul>
                        <li>PHƯƠNG THỨC THANH TOÁN</li>
                        <li>
                            <div class="ic-visa mr5">
                                <img
                                    src="https://onlinestore.thaicong.com/wp-content/themes/thaicong/assets/images/icon/ic_visa.svg"
                                    alt="">
                            </div>
                            <div class="ic-mscard mr5">
                                <img
                                    src="https://onlinestore.thaicong.com/wp-content/themes/thaicong/assets/images/icon/ic_mscard.svg"
                                    alt="">
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-2 col-xs-4">
                    <ul>
                        <li>KẾT NỐI VỚI CHÚNG TÔI</li>
                        <li>
                            <div class="ic-fb">
                                <img
                                    src="https://onlinestore.thaicong.com/wp-content/themes/thaicong/assets/images/icon/ic_fb.svg"
                                    alt="">
                            </div>
                            <div class="ic-insta ml10">
                                <img
                                    src="https://onlinestore.thaicong.com/wp-content/themes/thaicong/assets/images/icon/ic_insta.svg"
                                    alt="">
                            </div>
                            <div  class="ic-yt ml10">
                                <img
                                    src="https://onlinestore.thaicong.com/wp-content/themes/thaicong/assets/images/icon/ic_ytb.svg"
                                    alt="">
                            </div>
                        </li>
                    </ul>

                </div>
                <div class="col-sm-4">
                    <ul>
                        <li>
                            <h3 style="text-align: center">TUNG LUXURY</h3>
                        </li>
                        <li style="font-style: italic; text-align: center">
                            EVERY PIECE IS AN ART
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom">
        <div class="wrap-main d-flex justify-content-between align-items-center">
            <div class="copy">
                <span class="cpright">Copyright © 2017 Tung Luxury.</span>
                <a href="#">Chính sách</a>
                <span>|</span>
                <a href="#">Quy chế hoạt động</a>
                <span>|</span>
                <a href="#">Điều khoản và điều kiện</a>
                <span>|</span>
                <a href="#">Chủ sở hữu</a>
            </div>
            <div class="share d-flex align-items-center">
                <a href="" class="ic-bct">
                    <img src="https://onlinestore.thaicong.com/wp-content/themes/thaicong/assets/images/icon/ic_bct.svg"
                         alt="">
                </a>
            </div>
        </div>
    </div>
</footer>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script
    src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous"></script>
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
@if(\Illuminate\Support\Facades\Session::has('checkOutSuccess'))
    <script>
        toastr.success("{!! Session::get('checkOutSuccess') !!}")
    </script>
@endif
@if(\Illuminate\Support\Facades\Session::has('successDecrease'))
    <script>
        toastr.success("{!! Session::get('successDecrease') !!}")
    </script>
@endif
@if(\Illuminate\Support\Facades\Session::has('successAddToCart'))
    <script>
        toastr.success("{!! Session::get('successAddToCart') !!}")
    </script>
@endif
@if(\Illuminate\Support\Facades\Session::has('successDelete'))
    <script>
        toastr.success("{!! Session::get('successDelete') !!}")
    </script>
@endif
@yield('js')
</body>
</html>
