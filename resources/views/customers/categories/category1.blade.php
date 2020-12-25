@extends('customers.layout.master')
@section('content')
<div class="content">
</div>
<div class="banner-global" style="background-image: url('{{$category->image ?? $brand->image}}')">
    <div class="banner-global-content">
        <div class="banner-text">
            <div class="tt-1">{{$category->name ?? $brand->name}}</div>
        </div>
    </div>
</div>
<div class="wrap-main" style="background: #f1f1f1">
    <div class="row-product">
        @foreach($products as $product)
            <div>
                <div class="item-product-store">
                    <div class="img">
                        <img style="width: 100%" src="{{asset('storage/'.substr($product->image1,7))}}" alt="">
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
    <div class="pt100"></div>



@endsection
