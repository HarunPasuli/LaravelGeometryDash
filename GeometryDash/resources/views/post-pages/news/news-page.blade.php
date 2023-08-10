@extends('layouts.master')

@section('title',$post->title)

@section('content')

<style>    body {
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
                    <p class="post-sources">Sources:
                @foreach ($post->sources as $source)
                <a href="{{ $source['url'] }}">{{ $source['platform'] }}</a>
                @endforeach
            </p>
                    <p class="post-uploaded-at">Uploaded date:
                        {{ \Carbon\Carbon::parse($post->uploaded_at)->format('F d, Y') }}</p>
                    <p class="post-author">Author: {{ $post->author }}</p>
                    <p class="post-views">Views: {{ $post->views }}</p>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection