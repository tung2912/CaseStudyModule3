@extends('admin.layout.master')
@section('page-title','Orders List')
@section('content')
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
                                    <th>No</th>
                                    <th>Oder number</th>
                                    <th>Customer name</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    @forelse($orders as $key => $order)
                                        <td>{{++$key}}</td>
                                        <td>{{$order->id}}</td>
                                        <td>
                                            <a href="{{route('customers.show',$order->customer->id)}}">{{$order->customer->name}}</a>
                                        </td>
                                        <td style="    align-items: center;margin: 2px 25%;"
                                            class="badge {{$order->status == 1? "badge-danger":"badge-info"}}">{{$order->status == 1? "WAITING":"CONFIRMED"}}</td>
                                        <td>
                                            <div>
                                                <a data-placement="top"
                                                   href="{{route('orders.show',$order->id)}}">
                                                    <i class="nav-icon fas fa-edit"></i>Details
                                                </a>
                                            </div>
                                        </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">No data</td>
                                    </tr>
                                @endforelse
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Order number</th>
                                    <th>Customer name</th>
                                    <th>Status</th>
                                    <th>Actions</th>
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
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Description</h5>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@section('js')
    <script>
        $('body').on('click', '.description', function () {
            let id = $(this).val();
            let html = $('.descriptionHTML' + id).html();
            $('.modal-body').html(html)
            $('#staticBackdrop').modal('show')
        })
    </script>
@endsection
