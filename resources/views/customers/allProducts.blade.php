@extends('customers.layout.master')
@section('content')
    <div class="content">
    </div>
    <div class="banner-global"
         style="background-image: url('https://onlinestore.thaicong.com/wp-content/themes/thaicong/assets/images/Sanpham2880x750-1.jpg')">
        <div class="banner-global-content">
            <div class="banner-text">
                <div class="tt-1">SẢN PHẨM</div>
            </div>
        </div>
    </div>
    <div class="group-product">
        <div class="wrap-main">
            @foreach($categories as $category)
                <div class="pt50">
                    <div class="top-product">
                        <span class="tt-2">{{$category->name}}</span>
                        <a href="{{route('category.show',$category->id)}}" class="link">XEM TẤT CẢ</a>
                    </div>
                    <div class="row-product">
                        @foreach($category->products as $key=>$product)
                            <div>
                                <div class="item-product-store">
                                    <div class="img">
                                        <img style="width: 100%" src="{{$product->getNameImage1()}}"
                                             alt="">
                                    </div>
                                    <div class="brand">{{$product->brand->name}}</div>
                                    <div class="proName">{{$product->name}}</div>
                                    <div class="proPrice">{{number_format($product->price)}}₫</div>
                                    <a href="{{route('client.showProductDetails',$product->id)}}" class="full-link"></a>
                                </div>
                            </div>
                            @break($key == 3)
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt20"></div>
    </div>

@endsection
