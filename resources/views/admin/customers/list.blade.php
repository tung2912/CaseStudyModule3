@extends('admin.layout.master')
@section('page-title','Customers List')
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
                                    <th>Customer name</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    @forelse($customers as $key => $customer)
                                        <td>{{++$key}}</td>
                                        <td>{{$customer->name}}</td>
                                        <td>{{$customer->address}}</td>
                                        <td>{{$customer->email}}</td>
{{--                                        <td>--}}
{{--                                            <button value="{{$product->id}}" class="btn btn-success description">Detail</button>--}}
{{--                                            <span style="display: none" class="descriptionHTML{{$product->id}}">{!!$product->description!!}</span>--}}
{{--                                        </td>--}}
                                        <td>{{$customer->phone}}</td>
                                        <td>
                                            <div>
                                                <a data-placement="top"
                                                   href="{{route('products.edit',$customer->id)}}">
                                                    <i class="nav-icon fas fa-edit"></i>Edit
                                                </a>
                                                <a class="text-danger"
                                                   onclick="return confirm('Are you sure you want to delete')"
                                                   href="{{route('products.delete',$customer->id)}}">
                                                    <i class="nav-icon far fa-trash-alt"></i>Delete</a>
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
                                    <th>Customer name</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Phone</th>
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
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
        $('body').on('click','.description',function (){
            let id = $(this).val();
            let html = $('.descriptionHTML'+id).html();
            $('.modal-body').html(html)
            $('#staticBackdrop').modal('show')
        })
    </script>
@endsection
