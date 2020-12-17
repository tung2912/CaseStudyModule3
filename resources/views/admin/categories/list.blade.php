
@extends('admin.layout.master')
@section('page-title','Categories List')
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
                                    <a href="{{route('categories.create')}}" class="btn btn-success">+ Add Category</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped data-table">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Category name</th>
{{--                                    <th>Image</th>--}}
                                    <th>Descriptions</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    @forelse($categories as $key => $category)
                                        <td>{{++$key}}</td>
                                        <td>{{$category->name}}</td>
{{--                                        <td><img style="width: 100px; height: 100px"--}}
{{--                                                 src="{{asset('storage/'.substr($product->image1,7))}}"></td>--}}
                                        <td>{{$category->description}}</td>
                                        <td>
                                            <div>
                                                <a data-placement="top"
                                                   href="{{route('categories.edit',$category->id)}}">
                                                    <i class="nav-icon fas fa-edit"></i>Edit
                                                </a>
                                                <a class="text-danger"
                                                   onclick="return confirm('Are you sure you want to delete')"
                                                   href="{{route('categories.delete',$category->id)}}">
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
                                    <th>Category name</th>
{{--                                    <th>Price</th>--}}
                                    <th>Descriptions</th>
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
