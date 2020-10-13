@extends('layouts.app')
@section('post_meta')
    <meta name="keyword" content="{{ $post->postMeta->meta_key??'' }}">
<meta name="description" content="{{ $post->postMeta->meta_content??'' }}">
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Post Details <a href="{{route('home')}}" class="btn btn-primary float-right">Back</a></div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->user->name }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->body }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
