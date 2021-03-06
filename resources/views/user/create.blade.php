@extends('layout.home')
@section('title','新建用户')
@section('content')
    <div class="container">
        <div class="create-user col-xs-4 col-md-offset-4">
            <div class="page-header text-center">
                <h1>新建用户</h1>
            </div>
            <form action="{{route('user.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="user-name">用户名</label>
                    <input value="{{old('user_name')}}" type="text" class="form-control" id="user-name" name="user_name">
                </div>
                <div class="form-group">
                    <label for="user-password">密码</label>
                    <input value="{{old('user_password')}}" type="password" class="form-control" id="user-password" name="user_password">
                </div>
                <div class="form-group">
                    <input value="提交" type="submit" class="form-control" >
                </div>
            </form>
            @include('err.default')
        </div>
        
    </div>
@endsection