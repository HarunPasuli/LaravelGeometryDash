@extends('layouts.master')

@section('title',$post->title)

@section('content')
<link rel="stylesheet" href="{{ asset('asset/css/post-page-news.css') }}">
<div class="container">
    <div class="post">
        <h2 class="post-title">{{ $post->title }}</h2>
        <img src="{{ asset($post->image) }}" alt="Post Image" class="post-image">
        <div class="post-description">
            <p>{{ $post->description }}</p>
        </div>
        <div class="post-meta">
            <p class="post-uploaded-at">Uploaded at: {{ $post->uploaded_at->format('F d, Y') }}</p>
            <p class="post-author">Author: {{ $post->author }}</p>
            <p class="post-sources">Sources:
                @foreach ($post->sources as $source)
                <a href="{{ $source['url'] }}">{{ $source['platform'] }}</a>
                @endforeach
            </p>
            <p class="post-views">Views: {{ $post->views }}</p>
        </div>
    </div>
</div>
@endsection

