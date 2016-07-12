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

                        <br>
                        @foreach ($album->hasManyPhotos as $photo)

                            <div class="article" style="float: left;margin-left: 10%;text-align: center;">
                                <h4>{{ $photo->name }}</h4>

                                <div class="content">

                                    <div style="max-height: 300px; max-width: 300px;">
                                        <a href="{{$photo->url}}" target="_blank"><img
                                                    style="max-width: 100%; max-height: 100%;" src="{{$photo->url}}"
                                                    alt="pic"/></a>
                                    </div>

                                </div>
                            </div>

                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection