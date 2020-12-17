@extends('admin.layout.master')
@section('page-title','Edit User Profile')
@section('content')

    <!-- Main content -->
    <section class="content">
        <form action="{{route('users.edit', $user->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Thông tin</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">User Name</label>
                                <input required value="{{$user->name}}" type="text" name="name" id="inputName" placeholder="Nhập tên lớp" class="form-control">
                                @error('name')
                                <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
{{--                            <div class="form-group">--}}
{{--                                <label for="inputName">Ảnh</label>--}}
{{--                                <input type="file" accept=".png, .jpg, .jpeg" name="image" id="inputName"--}}
{{--                                       class="form-control">--}}
{{--                                @error('name')--}}
{{--                                <div style="color: red">{{ $message }}</div>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="inputName">Tên tài khoản</label>--}}
{{--                                <input required value="{{$user->username}}" type="text" name="username" id="inputName" placeholder="Nhập tên tài khoản" class="form-control">--}}
{{--                                @error('username')--}}
{{--                                <div style="color: red">{{ $message }}</div>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
                            <div class="form-group">
                                <label for="inputName">Email address</label>
                                <input required value="{{$user->email}}" type="text" name="email" id="inputName" placeholder="Nhập email" class="form-control">
                                @error('email')
                                <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Vai trò</label>
                                <select name="role_id" class="form-control custom-select">
                                    @foreach($roles as $key => $role)
                                        <option
                                            @if($role->id == $user->role_id)
                                            selected
                                            @endif
                                            value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                                @error('title')
                                <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Update" class="btn btn-success">
                                <a href="{{route('users.index')}}" class="btn btn-secondary">Back</a>
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
