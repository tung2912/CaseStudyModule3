@extends('admin.layout.master')
@section('page-title','Products List')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-12 col-md-6"></div>
                                <div class="col-12 col-md-6" style="text-align: right">
                                    <a href="{{route('products.create')}}" class="btn btn-success">+ Add Product</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped data-table">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Product name</th>
                                    <th>Image</th>
                                    <th>Price</th>
                                    <th>Descriptions</th>
                                    <th>Instock</th>
                                    <th>Sold</th>
                                    <th>Category</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    @forelse($products as $key => $product)
                                        <td>{{++$key}}</td>
                                        <td>{{$product->name}}</td>
                                        <td><img style="width: 100px; height: 100px"
                                                 src="{{asset('storage/'.substr($product->image1,7))}}"></td>
                                        <td>{{number_format($product->price)}} VND</td>
                                        <td>
                                            <button value="{{$product->id}}" class="btn btn-success description">Detail</button>
                                            <span style="display: none" class="descriptionHTML{{$product->id}}">{!!$product->description!!}</span>
                                        </td>
                                        <td>{{$product->instock}}</td>
                                        <td>{{$product->sold}}</td>
                                        <td>{{$product->category->name}}</td>
                                        <td>
                                            <div>
                                                <a data-placement="top"
                                                   href="{{route('products.edit',$product->id)}}">
                                                    <i class="nav-icon fas fa-edit"></i>Edit
                                                </a>
                                                <a class="text-danger"
                                                   onclick="return confirm('Are you sure you want to delete')"
                                                   href="{{route('products.delete',$product->id)}}">
                                                    <i class="nav-icon far fa-trash-alt"></i>Delete</a>
                                            </div>
                                        </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">Không có dữ liệu</td>
                                    </tr>
                                @endforelse
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Product name</th>
                                    <th>Image</th>
                                    <th>Price</th>
                                    <th>Descriptions</th>
                                    <th>Instock</th>
                                    <th>Sold</th>
                                    <th>Category</th>
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
