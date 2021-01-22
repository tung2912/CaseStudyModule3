@extends('admin.layout.master')
@section('page-title','Oder Details')
@section('content')

        <div class="row">
            <div class="col-12 col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Customer Informations</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                    data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputName">Customer Name</label>
                            <input type="text" value="{{$order->customer->name}}" disabled
                                   class="form-control ">
                        </div>
                        <div class="form-group">
                            <label for="inputName">Email</label>
                            <input type="text" value="{{$order->customer->email}}" disabled
                                   class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputName">Address</label>
                            <input type="text" value="{{$order->customer->address}}" disabled
                                   class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputName">Phone</label>
                            <input type="text" value="{{$order->customer->phone}}" disabled
                                   class="form-control">
                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-12 col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Oder Informations</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                    data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputName">Order number</label>
                            <input type="text" value="{{$order->id}}" disabled
                                   class="form-control ">
                        </div>
                        <div class="form-group">
                            <label for="inputName">Order date</label>
                            <input type="text" value="{{$order->created_at}}" disabled
                                   class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputName">Total Price</label>
                            <input type="text" value="{{$order->total?{{ number_format($order->total) }}.VND:""}}" disabled
                                   class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputName">Notes</label>
                            <input type="text" value="{{$order->notes}}" disabled
                                   class="form-control">
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>

            <a href="{{route('orders.confirm',$order->id)}}" class="confirmButton">
                Confirm Order
            </a>
        <a href="{{route('orders.index')}}" class="backButton">
            Back
        </a>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-12 col-md-6"></div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped data-table">
                                <thead>
                                <tr>
                                    <th>Product name</th>
                                    <th>Quantity</th>
                                    <th>Image</th>
                                    <th>Price each</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    @forelse($order->products as $product)
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->pivot->buy_quantity}}</td>
                                        <td><img style="width: 100px; height: 100px"
                                                 src="{{$product->getNameImage1()}}"></td>
                                        <td>{{number_format($product->pivot->priceEach)}} Đ</td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">No data</td>
                                    </tr>
                                @endforelse
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Product name</th>
                                    <th>Quantity</th>
                                    <th>Image</th>
                                    <th>Price each</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
@endsection
