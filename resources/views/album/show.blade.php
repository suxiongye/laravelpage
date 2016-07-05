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
                        <a href="{{ url('/') }}" class="btn btn-lg btn-primary">返回</a>

                        @foreach ($album->hasManyPhotos as $photo)
                            <hr>
                            <div class="article">
                                <h4>{{ $photo->name }}</h4>

                                <div class="content">
                                    <p>
                                        <a href="{{$photo->url}}" target="_blank"><img src="{{$photo->url}}" alt="pic"/></a>
                                    </p>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection