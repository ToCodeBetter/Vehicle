@extends('layout.home')
@section('title','用户列表')
@section('content')
    <div class="container">
       <div class="show-user panel panel-default">
           <div class="panel-heading text-center"><h1>用户列表</h1></div>
           <div class="panel-body">
               @isset($data)
                    <table class="table  table-hover table-bordered">
                        <thead><tr><th>用户名</th><th>角色</th><th>操作</th></tr></thead>
                        <tbody>
                            @foreach($data as $u)
                                <tr>
                                    <td>{{$u->userName()}}</td><td>{{$u->userRole()}}</td>
                                    <td>
                                        <form action="{{route('user.delete')}}" method="post" class="pull-left" >
                                            @csrf
                                            @method('delete')
                                            <input type="hidden" name="id" value="{{$u->id}}">
                                            <input type="submit" class="btn btn-danger btn-sm" value="删除">

                                        </form>
                                        <div class="pull-left">&nbsp;</div>
                                        <a href="{{route('user.edit',['id'=>$u->id])}}" class="btn btn-warning btn-sm">修改</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr><td colspan="3" class="text-right"><a href="{{route('user.create')}}" class="btn btn-primary">新建</a></td></tr>
                        </tfoot>
                    </table>
               @endisset
           </div>
       </div>
    </div>
@endsection