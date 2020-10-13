@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-8 offset-sm-2">
                <div class="card">
                    <div class="card-header">
                        Post Meta form
                    </div>
                    <div class="card-body">
                        <form action="{{ route('post.metas.store') }}" method="post">
                            @csrf
                            <input type="hidden" value="{{ $post->id }}" name="post_id">
                            <div class="form-group">
                                <label for="">Post Title</label>
                                <input type="text" class="form-control" value="{{ $post->title }}" disabled>
                            </div>

                            <div class="form-group">
                                <label for="">Meta Title</label>
                                <input type="text" name="meta_key" class="form-control @error('meta_key') is-invalid @enderror" value="{{ $post->postMeta->meta_key??old('meta_key') }}">
                                @error('meta_key')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Body Text</label>
                                <textarea name="meta_content" class="form-control @error('meta_content') is-invalid @enderror">{{ $post->postMeta->meta_content??old('meta_content') }}</textarea>
                                @error('meta_content')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <input type="submit" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection