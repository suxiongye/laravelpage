@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">编辑图片</div>
                    <div class="panel-body">

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>编辑失败</strong> 输入不符合要求<br><br>
                                {!! implode('<br>', $errors->all()) !!}
                            </div>
                        @endif

                        <form action="{{ url('admin/photo/'.$photo->id) }}" method="POST">
                            {!! csrf_field() !!}
                            {{ method_field('PUT') }}
                            图片名
                            <input type="text" name="name" class="form-control" required="required" placeholder="请输入图片名"
                                   value="{{$photo->name}}">
                            <br>
                            <input type="hidden" name="album_id" class="form-control" required="required"
                                   value="{{$photo->album_id}}">
                            <br>
                            图片url
                            <textarea name="url" rows="10" class="form-control"
                                      placeholder="请输入图片url">{{$photo->url}}</textarea>
                            <br>
                            <button class="btn btn-lg btn-info">编辑图片</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection