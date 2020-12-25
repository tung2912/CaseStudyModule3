@extends('customers.layout.master')
@section('breadcrumb')
    <div class="content">
    </div>
    <div class="breadcrumb-main">
        <ol class="breadcrumb">
            <li><a href="{{route('client.showIndex')}}">Trang chủ</a></li>
            <li><a href="#">Liên hệ</a></li>
        </ol>
    </div>
@endsection
@section('content')
    <div style="background-color: #f1f1f1">
        <div class="wrap-contact wrap-store-info pt100">

            <h2>THÔNG TIN LIÊN HỆ</h2>
            <p>Dịch vụ chăm sóc khách hàng của Công ty Thái Công không chỉ hỗ trợ khách hàng khi có vấn đề phát sinh, mà còn lắng nghe và tiếp thu những ý kiến đóng góp của khách hàng. Chỉ cần liên hệ, chúng tôi sẵn sàng hỗ trợ bạn!</p><br><br>
            <p>
                <strong>CÔNG TY TNHH TUNG LUXURY VIỆT NAM</strong><br>
                Thứ 2 - Chủ nhật (10:00 - 19:00)<br>
                Tel: 0987.XXX.XXX<br>
                Email: <br>
                28 Nguyễn Tri Phương, Phú Nhuận, Huế, Việt Nam<br><br>
                <a href="tel:+84914938844" class="load-more" style="display: inline-block">HOTLINE&nbsp;&nbsp;|&nbsp;&nbsp;+84XXXXXXXX</a>
            </p>
            <div class="line s50"></div>
            <form action="" id="form__contact" onsubmit="return false">
                <div style="font-size: 13px">
                    <div class="form-group">
                        <label>HỌ TÊN *</label>
                        <input type="text" class="form-control" disabled name="fullname">
                    </div>
                    <div class="form-group">
                        <label>EMAIL *</label>
                        <input type="text" class="form-control" disabled name="email">
                    </div>
                    <div class="form-group">
                        <label>ĐIỆN THOẠI <span>(OPTIONAL)</span></label>
                        <input type="text" class="form-control" disabled name="phone">
                    </div>
                    <div class="form-group">
                        <label>NỘI DUNG *</label>
                        <textarea class="form-control" disabled rows="3" name="message"></textarea>
                    </div>
                </div>

                <div class="mt20">
                    <a href="#" class="load-more btn-submit-contact">Gửi</a>
                </div>
            </form>
        </div>
        <div class="pt100"></div>
    </div>

@endsection
