@extends('customers.layout.master')
@section('content')
    <div class="content">
        <div class="pt100"></div>
        <div class="group-cart">
            <div class="tt-1 text-center">GIỎ HÀNG CỦA BẠN</div>
            @if(session()->has('cart'))
                <div class="fs16 fw200 mt15 text-center">Hiện đang có {{$cart->totalQty}} sản phẩm</div>
                <div class="pt50"></div>
                <div class="item-cart">
                    @foreach($cart->items as $item)
                        <div class="row">
                            <div class="col-sm-7">
                                <div class="d-flex al-start">
                                    <div class="img-pr">
                                        <a href=""><img style="width: 100%" src="{{asset('storage/'.substr($item['product']->image1,7))}}" alt=""></a>
                                    </div>
                                    <div class="text">
                                        <p>
                                            <span>Mã sản phẩm</span>
                                            {{$item['product']->id}}
                                        </p>
                                        <p>{{$item['product']->brand->name}}</p>
                                        <p class="fs16">{{$item['product']->name}}</p>
                                        <p>
                                            <span>Đơn giá:</span>
                                            {{number_format($item['product']->price)}}₫
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="d-flex justify-content-between">
                                    <a href="{{route('cart.decrease',$item['product']->id)}}" class="box-sl">-</a>
                                    <input class="box-sl" type="text" value="{{$item['totalQty']}}">
                                    <a href="{{route('cart.addToCart',$item['product']->id)}}" class="box-sl">+</a>
                                    <div class="payment">
                                        <p>
                                            <span>Thành tiền</span>
                                            <span class="product-subtotal">{{number_format($item['totalPrice'])}}₫</span>
                                        </p>
                                        <a href="{{route('cart.delete',$item['product']->id)}}">XÓA</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="cartLine"></div>
                </div>
                <div class="price text-right">
                    Tổng cộng:
                    <span>{{number_format($cart->totalPrice)}} VNĐ</span>
                </div>
                <div class="text-right mt20">
                    <a href="{{route('client.showIndex')}}" class="link">TIẾP TỤC MUA HÀNG</a>
                    <a href="{{route('cart.remove')}}" class="btn-page btn-2 black ml10">
                        <span>XÓA GIỎ HÀNG</span>
                    </a>
                    <a href="{{route('cart.checkout')}}" class="btn-page btn-2 red ml10">
                        <span>THANH TOÁN NGAY</span>
                    </a>
                </div>
            @else
                <div class="cart-alert cart-alert-warning">
                    Chưa có sản phẩm nào trong giỏ hàng
                </div>
                <div class="back-to-shop">
                    <a href="{{route('client.showIndex')}}" class="btn-page w100 text-center btn-2 black">
                        <span style="font-size: 14px">Tiếp tục mua sắm</span>
                    </a>
                </div>
            @endif
            <div class="pt100"></div>
        </div>
    </div>
    @if(\Illuminate\Support\Facades\Session::has('successDelete'))
        <script>
            toastr.success("{!! Session::get('successDelete') !!}")
        </script>
    @endif
@endsection
@section('js')

@endsection
