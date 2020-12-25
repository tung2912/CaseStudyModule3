@extends('admin.layout.master')
@section('page-title','Add Product')
@section('content')
    <!-- Main content -->
    <section class="content">
        <form method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12 col-md-10">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Product Information</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Image1</label>
                                <input type="file" accept=".png, .jpg, .jpeg" name="image1" id="inputName"
                                       class="form-control">
                                @error('image1')
                                <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputName">Image2</label>
                                <input type="file" accept=".png, .jpg, .jpeg" name="image2" id="inputName"
                                       class="form-control">
                                @error('image2')
                                <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputName">Product Name</label>
                                <input type="text" name="productName" id="inputName" placeholder="Input product name"
                                       class="form-control">
                                @error('productName')
                                <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputName">Price</label>
                                <input type="text" name="price" id="inputName" placeholder="Input price"
                                       class="form-control">
                                @error('price')
                                <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputName">Views</label>
                                <input type="text" name="views" id="inputName" placeholder="Input views"
                                       class="form-control">
                                @error('views')
                                <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <label for="floatingTextarea">Description</label>
                                <textarea  class="form-control" name="description" placeholder="Input description"
                                          id="ckeditor1"></textarea>

                                @error('description')
                                <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputName">Instock</label>
                                <input type="text" name="instock" id="inputName" placeholder="Input instock"
                                       class="form-control">
                                @error('instock')
                                <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputName">Sold</label>
                                <input type="text" name="sold" id="inputName" placeholder="Input sold"
                                       class="form-control">
                                @error('sold')
                                <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Category</label>
                                <select name="category_id" class="form-control custom-select">
                                    @foreach($categories as $key => $category)
                                        <option
                                            value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Brand</label>
                                <select name="brand_id" class="form-control custom-select">
                                    @foreach($brands as $key => $brand)
                                        <option
                                            value="{{$brand->id}}">{{$brand->name}}</option>
                                    @endforeach
                                </select>
                                @error('brand_id')
                                <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Add" class="btn btn-success">
                                <a href="{{route('products.index')}}" class="btn btn-secondary">Back</a>
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
@section('js')
    <script>
        CKEDITOR.replace('ckeditor1')
    </script>
@endsection
