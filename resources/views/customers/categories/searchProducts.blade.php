@extends('customers.layout.master')
@section('content')
    <div class="content">
    </div>
    <div class="banner-global"
         style="background-image: url('https://onlinestore.thaicong.com/wp-content/uploads/2020/04/Raphlauren2880x750-2.jpg')">
        <div class="banner-global-content">
            <div class="banner-text">
                <div class="tt-1">TÌM KIẾM SẢN PHẨM</div>
            </div>
        </div>
    </div>
    @if(count($products)>0)
        <div class="wrap-main" style="background: #f1f1f1">
            <div class="pt50 text-center text-bold">
                <h2>Có {{count($products)}} sản phẩm được tìm thấy</h2>
            </div>
            <div class="row-product">
                @foreach($products as $product)
                    <div>
                        <div class="item-product-store">
                            <div class="img">
                                <img style="width: 100%" src="{{$product->getNameImage1()}}" alt="">
                            </div>
                            <div class="brand">{{$product->brand->name}}</div>
                            <div class="proName">{{$product->name}}</div>
                            <div class="proPrice">{{number_format($product->price)}} VNĐ</div>
                            <a href="{{route('client.showProductDetails',$product->id)}}" class="full-link"></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <div class="pt50 text-center text-bold" style="background: #f1f1f1;font-size: 40px">
            KHÔNG TÌM THẤY SẢN PHẨM NÀO
        </div>
    @endif
    <div class="pt100"></div>
@endsection
