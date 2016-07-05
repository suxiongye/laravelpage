@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">新增相册</div>
                    <div class="panel-body">

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>新增失败</strong> 输入不符合要求<br><br>
                                {!! implode('<br>', $errors->all()) !!}
                            </div>
                        @endif

                        <form action="{{ url('admin/album') }}" method="POST">
                            {!! csrf_field() !!}
                            <input type="text" name="name" class="form-control" required="required" placeholder="请输入相册名">
                            <br>
                            <textarea name="describe" rows="10" class="form-control" required="required" placeholder="请输入相册描述"></textarea>
                            <br>
                            <button class="btn btn-lg btn-info">新增相册</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection