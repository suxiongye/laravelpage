@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">{{$album->name}}</div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                {!! implode('<br>', $errors->all()) !!}
                            </div>
                        @endif

                        <a href="{{ url('admin/photo/'.$album->id.'/create') }}" class="btn btn-lg btn-primary">新增</a>
                        <a href="{{ url('admin/album') }}" class="btn btn-lg btn-primary">返回</a>

                        @foreach ($album->hasManyPhotos as $photo)

                            <div class="article" style="float: left;">
                                <h4>{{ $photo->name }}</h4>

                                <div class="content">
                                    <div style="max-height: 300px; max-width: 300px;float: left;">
                                        <a href="{{$photo->url}}" target="_blank"><img style="max-width: 100%; max-height: 100%;" src="{{$photo->url}}" alt="pic"/></a>
                                    </div>
                                </div>
                                <a href="{{ url('admin/photo/'.$photo->id.'/edit') }}" class="btn btn-success">编辑</a>
                                <form action="{{ url('admin/photo/'.$photo->id) }}" method="POST" style="display: inline;">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger">删除</button>
                                </form>
                            </div>

                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection