@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">相册管理</div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                {!! implode('<br>', $errors->all()) !!}
                            </div>
                        @endif

                        <a href="{{ url('admin/album/create') }}" class="btn btn-lg btn-primary">新增</a>

                        @foreach ($albums as $album)
                            <hr>
                            <div class="article">
                                <a href="{{url('admin/album/'.$album->id)}}" ><h4>{{ $album->name }}</h4></a>
                                <div class="content">
                                    <p>
                                        {{ $album->describe}}
                                    </p>
                                </div>
                            </div>
                            <a href="{{ url('admin/album/'.$album->id.'/edit') }}" class="btn btn-success">编辑</a>
                            <form action="{{ url('admin/album/'.$album->id) }}" method="POST" style="display: inline;">
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