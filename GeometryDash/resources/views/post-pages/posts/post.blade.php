@extends('layouts.master')

@section('title',$post->title)
<meta name="csrf-token" content="{{ csrf_token() }}">
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
            <p class="post-uploaded-at">Uploaded at: {{ \Carbon\Carbon::parse($post->uploaded_at)->format('F d, Y') }}</p>
            <p class="post-author">Author: {{ $post->author }}</p>
            <p class="post-views">Views: {{ $post->views }}</p>
        </div>
    </div>
</div>

<div class="comment-section">
    <h3>Comments</h3>
    <form action="{{ route('comments.store') }}" method="POST">
        @csrf
        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <textarea name="content" placeholder="Write your comment here"></textarea>
        <button type="submit">Post Comment</button>
    </form>

    {{-- Check if there are comments --}}
    @if ($post->comments->count() > 0)
        <ul>
            @foreach ($post->comments as $comment)
                <li>
                    <p>{{ $comment->content }}</p>
                    <small>By {{ $comment->user->name }} on {{ $comment->created_at->format('F d, Y') }}</small>
                    <form action="{{ route('replies.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                        <textarea name="content" placeholder="Write your reply here"></textarea>
                        <button type="submit">Post Reply</button>
                    </form>
                    <ul>
                        @foreach ($comment->replies as $reply)
                            <li>
                                <p>{{ $reply->content }}</p>
                                <small>By {{ $reply->user->name }} on {{ $reply->created_at->format('F d, Y') }}</small>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    @else
        <p>No comments yet.</p>
    @endif
</div>
@endsection
