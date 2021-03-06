@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">图片管理</div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                {!! implode('<br>', $errors->all()) !!}
                            </div>
                        @endif

                        <a href="{{ url('admin/photo/create') }}" class="btn btn-lg btn-primary">新增</a>

                        @foreach ($photos as $photo)
                            <hr>
                            <div class="article">
                                <h4>{{ $photo->name }}</h4>
                                <div class="content">
                                    <p>
                                        {{ $photo->url}}
                                    </p>
                                </div>
                            </div>
                            <a href="{{ url('admin/photo/'.$photo->id.'/edit') }}" class="btn btn-success">编辑</a>
                            <form action="{{ url('admin/photo/'.$photo->id) }}" method="POST" style="display: inline;">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger">删除</button>
                            </form>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection