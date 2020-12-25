
@extends('admin.layout.master')
@section('page-title','Create brand')
@section('content')
    <!-- Main content -->
    <section class="content">
        <form method="post" enctype="multipart/form-data" action="{{route('brands.store')}}">
            @csrf
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Brand Information</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Brand Name</label>
                                <input type="text" name="brandName" id="inputName" placeholder="Input brand name"
                                       class="form-control @error('brandName') is-invalid @enderror">
                                @error('brandName')
                                <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputName">Image</label>
                                <input type="text" name="image" id="inputimage" placeholder="Input Image"
                                       class="form-control @error('image') is-invalid @enderror">
                                @error('image')
                                <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Add" class="btn btn-success">
                                <a href="{{route('brands.index')}}" class="btn btn-secondary">Back</a>
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
