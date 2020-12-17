
@extends('admin.layout.master')
@section('page-title','Edit Category')
@section('content')
    <!-- Main content -->
    <section class="content">
        <form method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Category Information</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
{{--                            <div class="form-group">--}}
{{--                                <label for="inputName">Image</label>--}}
{{--                                <input type="file" accept=".png, .jpg, .jpeg" name="image1" id="inputName"--}}
{{--                                       class="form-control">--}}
{{--                                @error('name')--}}
{{--                                <div style="color: red">{{ $message }}</div>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
                            <div class="form-group">
                                <label for="inputName">Category Name</label>
                                <input type="text" name="categoryName" id="inputName" placeholder="Input product name"
                                       class="form-control" value="{{$category->name}}">
                                @error('categoryName')
                                <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <label for="floatingTextarea">Description</label>
                                <textarea class="form-control" name="description" placeholder="Input description"
                                          id="floatingTextarea">{{$category->description}}</textarea>

                                @error('description')
                                <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Edit" class="btn btn-success">
                                <a href="{{route('categories.index')}}" class="btn btn-secondary">Back</a>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </form>
    </section>
@endsection
