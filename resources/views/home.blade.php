@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard <a href="{{route('posts.create')}}" class="btn btn-primary float-right">Create Post</a></div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Id</th>
                            <th>UserName</th>
                            <th>Title</th>
                            <th>Body</th>
                            <th>Action</th>
                        </tr>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $post->user->name }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->body }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('post.metas',$post->id) }}" class="btn btn-primary">Create Post Metas</a>
                                        <a href="{{ route('posts.show',$post->id) }}" class="btn btn-info">View</a>
                                        <a href="{{ route('posts.delete',$post->id) }}" class="btn btn-danger">Delete</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
