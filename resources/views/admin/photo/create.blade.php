@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">新增图片</div>
                    <div class="panel-body">

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>新增失败</strong> 输入不符合要求<br><br>
                                {!! implode('<br>', $errors->all()) !!}
                            </div>
                        @endif

                        <form action="{{ url('admin/photo') }}" method="POST">
                            {!! csrf_field() !!}
                            图片名：
                            <input type="text" name="name" class="form-control" required="required"
                                   placeholder="请输入图片名">
                            <br>
                            <input type="hidden" name="album_id" class="form-control" required="required" value="{{$album->id}}">
                            <br>
                            图片url：
                            <textarea name="url" rows="10" class="form-control" placeholder="请输入图片url"></textarea>
                            <br>
                            <button class="btn btn-lg btn-info">新增图片</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection