<!doctype html>
<html lang="en">
<head>
    <title>TUNG LUXURY - CHECKOUT</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('customer_resource/css/checkOut.css')}}"></link>
</head>
<body>
<div class="container">
    <div class="row flex-wrap-reverse">
        <div class="col">
            <form action="{{route('cart.finishCheckout')}}" method="POST">
                @csrf
                <div class="my-5">
                    <div class="title">
                        TUNG LUXURY
                    </div>
                    <div class="shipInfo mt-4">
                        <div class="label-shipInfo">
                            <label for="">Thông tin giao hàng</label>
                        </div>
                        <div class="form-group">
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Full name">
                            @error('name')
                            <div style="color: red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Address">
                            @error('address')
                            <div style="color: red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone Number">
                            @error('phone')
                            <div style="color: red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email address">
                            @error('email')
                            <div style="color: red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <textarea name="notes"  placeholder="Ghi chú"></textarea>
                        </div>
                        <div class="float-left mt-2">
                            <a href="{{route('cart.showCart')}}" class="cart_return">
                                <span style="color: red"> < </span>
                                Giỏ hàng
                            </a> </div> <div class="float-right mt-2">
                            <input type="submit" class="btn btn-danger p-3" value="HOÀN TẤT ĐƠN HÀNG">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col payment-right my-4" style="background: #fafafa;">
            <div class="mr-3">
                <div class="my-2 checkoutHeader">
                    Thông tin đơn hàng
                </div>
                <div class="">
                    <table class="table">
                        <tbody>
                        @foreach($products->items as $item)
                            <tr>
                                <td>
                                    <div class="img_wrapper">
                                        <img src="{{$item['product']->getNameImage1()}}" alt="" class="imgCheckout">
                                        <span class="qtyCheckout">
                                            {{$item['totalQty']}}
                                        </span>
                                    </div>
                                </td>
                                <td>
                                    <div class="checkoutItemName">
                                        {{$item['product']->name}}
                                    </div>
                                </td>
                                <td>
                                    <div class="checkoutItemPrice">
                                        {{number_format($item['totalPrice'])}}₫
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-2 checkoutFooter">
                    <div class="float-left ml-3 left">
                        Tạm tính
                    </div>
                    <div class="float-right right">
                        {{number_format($products->totalPrice)}}₫
                    </div>
                    <div class="clearfix"></div>
                    <div class="float-left ml-3 left">
                        Shipping
                    </div>
                    <div class="float-right right">
                        Free
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="mt-2 checkoutFooter">
                    <div style="color: #767979; font-size: 20px" class="float-left ml-3 left">
                        Tổng tiền
                    </div>
                    <div style="font-size: 24px" class="float-right right">
                        <span style="color: #939090; font-size: 14px">VND</span> {{number_format($products->totalPrice)}}₫
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>
