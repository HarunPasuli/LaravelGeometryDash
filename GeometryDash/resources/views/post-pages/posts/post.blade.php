<script>
    function showReplies(button) {
        var parentDiv = button.parentElement;
        var repliesDiv = parentDiv.querySelector(".replies");
        var showButton = parentDiv.querySelector(".show");
        var hideButton = parentDiv.querySelector(".hide");

        repliesDiv.style.display = "block";
        showButton.style.display = "none";
        hideButton.style.display = "block";
    }

    function hideReplies(button) {
        var parentDiv = button.parentElement;
        var repliesDiv = parentDiv.querySelector(".replies");
        var showButton = parentDiv.querySelector(".show");
        var hideButton = parentDiv.querySelector(".hide");

        repliesDiv.style.display = "none";
        showButton.style.display = "block";
        hideButton.style.display = "none";
    }
</script>
@extends('layouts.master')

@section('title', $post->title)
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    body {
        border-color: rgba(0, 0, 0, 0);
    }


    .lackBorder {
        background-color: rgb(51, 50, 50);
        border-color: rgba(0, 0, 0, 0);
        border-radius: 1rem;
    }

    /* Style for the main comment section */
    ul.comment-list {
        list-style-type: none;
        padding: 0;
    }

    ul.comment-list li {
        border: 1px solid #ddd;
        padding: 10px;
        margin: 10px 0;
    }

    ul.comment-list li p {
        margin: 0;
    }

    ul.comment-list li small {
        color: #777;
    }

    /* Style for reply form */
    ul.comment-list li form {
        margin-top: 10px;
    }

    ul.comment-list li form textarea {
        width: 100%;
        padding: 5px;
    }

    ul.comment-list li form button {
        background-color: #333;
        color: white;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
    }

    /* Style for reply list */
    ul.comment-list li ul {
        list-style-type: none;
        padding: 0;
        margin-top: 10px;
    }

    ul.comment-list li ul li {
        border: 1px solid #ddd;
        padding: 10px;
        margin: 10px 0;
    }

    ul.comment-list li ul li small {
        color: #777;
    }
</style>
@section('content')
    <link rel="stylesheet" href="{{ asset('asset/css/post-page-news.css') }}">
    <div id="divid" style="width: 100%; background-color: black; padding: 30px;">
        <div class="container lackBorder">

            <div class="" style="width: 60%; display: inline;">
                <h2 class="post-title" style="color: white; font-weight:bold; text-align: center;">{{ $post->title }}</h2>
                <img src="{{ asset($post->image) }}" alt="Post Image" class="post-image"
                    style="margin-left: auto; margin-right: auto; display: block;">
                <div class="post-description" style="color: white;">
                    <p>{{ $post->description }}</p>
                </div>
                <div class="post-meta">
                    <p class="post-uploaded-at">Uploaded date:
                        {{ \Carbon\Carbon::parse($post->uploaded_at)->format('F d, Y') }}</p>
                    <p class="post-author">Author: {{ $post->author }}</p>
                    <p class="post-views">Views: {{ $post->views }}</p>
                </div>
            </div>
            <hr style="color: white;">
            {{-- Comment section  --}}
            <div class="comment-section" style="width: 30%; display: inline;">
                <h3 style="color: white; text-align: center;">Comments</h3>
                @auth
                    <form action="{{ route('comments.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <textarea name="content" placeholder="Write your comment here"
                            style="resize: none; width: 100%; background-color: rgba(0,0,255,0.2); color: white; border-radius: 1rem; padding: 10px;"
                            rows="2"dfgdgeger></textarea>
                        <button type="submit"
                            style="padding-top: 3px; padding-bottom: 3px; background-color: rgba(0,0,255);color:white; margin-top: 5px; border: none; border-radius: 1rem; padding-left: 10px; padding-right: 10px;">Post</button>
                    </form>
                @else
                    <p>Please <a href="{{ route('login') }}">log in</a> to leave a comment.</p>
                @endauth

                {{-- Check if there are comments --}}
                @if ($post->comments->count() > 0)


                    @foreach ($post->comments as $comment)
                        <div style="background-color: rgb(31,30,30); color: white; border-radius: 1rem; padding: 10px;">


                            <small style="color: gray;">By {{ $comment->user->name }} |
                                {{ $comment->created_at->format('F d, Y') }}</small>
                            <p style="color: white;">{{ $comment->content }}</p>

                            @auth
                            <form action="{{ route('replies.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                                <textarea name="content" placeholder="Write your reply here"
                                    style="resize: none; width: 100%; background-color: rgba(0,0,100,0.1); color: white; border-radius: 1rem; padding: 10px;"></textarea>
                                <button type="submit"
                                    style="padding-top: 3px; padding-bottom: 3px; background-color: rgba(0,0,100);color:white; margin-top: 5px; border: none; border-radius: 1rem; padding-left: 10px; padding-right: 10px;">Reply</button>
                            </form>
                            @endauth
                            <button class="show"
                                style="color: rgb(100,100,255); background-color: rgba(0,0,0,0); border: none;"
                                onclick="showReplies(this)">Show Replies</button>
                            <button class="hide"
                                style="color: rgb(100,100,255); background-color: rgba(0,0,0,0); border: none; display: none;"
                                onclick="hideReplies(this)">Hide Replies</button>
                            <div class="replies" style="display: none;">
                                <h4> Replies </h4>
                                <ul>
                                    @foreach ($comment->replies as $reply)
                                        <li>
                                            <div
                                                style="background-color: rgb(21,20,20); color: white; border-radius: 1rem; padding: 10px;">
                                                <small style="color: gray;">By {{ $reply->user->name }} |
                                                    {{ $reply->created_at->format('F d, Y') }}</small>
                                                <p style="white-space: normal; word-wrap: break-word;">
                                                    {{ $reply->content }}</p>
                                            </div>
                                            <br>
                                        </li>
                                    @endforeach
                                    <p style="color: gray;"> There are no more replies </p>
                            </div>
                        </div>
                        </ul>
                        </li>
                        <br>
                    @endforeach
                @else
                    <p>No comments yet.</p>
                @endif

            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
