@extends('customers.layout.master')
@section('breadcrumb')
    <div class="content">
    </div>
    <div class="breadcrumb-main">
        <ol class="breadcrumb">
            <li><a href="{{route('client.showIndex')}}">Trang chủ</a></li>
            <li><a href="">Sản phẩm</a></li>
            <li><a href="{{route('category.show',$product->category_id)}}">{{$product->category->name}}</a></li>
            <li class="active"><a href="">{{$product->name}}</a></li>
        </ol>
    </div>
@endsection
@section('content')
    <div class="product-detail-content">
        <div class="wrap-main wrap-main-productDetail">
            <div class="notice-wrapper">
            </div>
            <div class="row">
                <div class="col-7">
                    <div class="row">
                        <div class="col-3">
                            <img class="smallImg mb-3" src="{{$product->getNameImage1()}}" alt="" onclick="myFunction(this);">
                            <img class="smallImg mb-3" src="{{$product->getNameImage2() ?? ""}}" alt="" onclick="myFunction(this);">
                        </div>
                        <div class="col-9"><img class="bigImg" id="expandedImg" src="{{$product->getNameImage1()}}" alt=""></div>
                    </div>
                </div>
                <div class="col-5">
                    <div class="brand"><i>{{$product->brand->name}}</i></div>
                    <div class="tt-2">{{$product->name}}</div>
                    <div class="pro-price-detail">{{number_format($product->price)}}₫</div>
                    <div class="dsc-detail mt20">
                        {!!$product->description!!}
                        <div class="pro-detail-line"></div>
                    </div>
                    <div class="sl-amount mt10 d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">

                            <input type="text" disabled class="box-sl" id="qty-inp" value="1" min="1">

                            <span style="margin-left: 10px">Chỉ còn {{$product->instock}} sản phẩm</span>
                        </div>
                    </div>
                    <div class="mt20">
                        <a href="{{route('cart.addToCart', $product->id)}}" class="addBtn">
                            <span class="ic-store mr-5"><img src="https://onlinestore.thaicong.com/wp-content/themes/thaicong/assets/images/icon/ic_store.svg" alt=""></span>
                            <span>THÊM VÀO GIỎ HÀNG</span>
                        </a>
                    </div>
                    <div class="mt20">
                        <a href="{{route('cart.showCart')}}" class="checkoutNowBtn">
                            <span>THANH TOÁN NGAY</span>
                        </a>
                    </div>
                    <div class="pro-detail-line"></div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script>
        function myFunction(imgs) {
            var expandImg = document.getElementById("expandedImg");
            expandImg.src = imgs.src;
            expandImg.parentElement.style.display = "block";
        }
    </script>
@endsection
