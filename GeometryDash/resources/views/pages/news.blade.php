@extends('layouts.master')

@section('title', 'index')

@section('content')
<style>
    .article-container {
        flex: 0 0 33%;
    }
    @media (max-width: 1000px) {
        .article-container {
            flex: 0 0 50%;
        }
    }
    @media (max-width: 700px) {
        .article-container {
            flex: 0 0 100%;
        }
    }
</style>
<div style="width: 100%; margin-top: 50px; background-color: rgb(31, 30, 30);">
    <img src="{{ asset('asset/images/news.png') }}" style="margin-left: auto; margin-right: auto; display: block; width: 20%;">
</div>

<div style="background-color: rgb(51, 50, 50);">

@foreach ($news->chunk(3) as $row)
    <div class="d-flex flex-wrap justify-content-center">
        @foreach ($row as $post)
         <a href="{{ route('news.show', ['id' => $post->id]) }}" style="text-decoration:none">
            <div id="big" class="article-container p-4" >

                  <div class="p-3" style="background-color: black; border-radius: 1rem;height: 400px;overflow-y: scroll;">
                    <b style="font-size: 23px; color: rgb(121, 120, 120);">{{ $post->author }}</b>
                    <b style="font-size: 18px; color: rgb(91, 90, 90);"> -
                        {{ \Carbon\Carbon::parse($post->uploaded_at)->format('F d, Y g:i A') }}
                    </b>
                    <hr>
                    <b style="font-size: 23px; color: white;">{{ $post->title }}</b>

                        <!-- <img src="{{ $post->image }}" style="height: 128px; width: 50%; display: block; border-radius: 1rem; margin-left: auto; margin-right: auto;"> -->
                        <div style="background-image:url('{{ $post->image }}');height: 200px;background-size: cover;background-position: center;"></div>

                    <p style="font-size: 18px; color: rgb(121, 120, 120);">{{ \Illuminate\Support\Str::limit($post->description, $limit = 100, $end = '...') }}</p>
                    <b style="font-size: 18px; color: rgb(91, 90, 90);">Sources:</b>
                    @foreach ($post->sources as $source)
                        <a href="{{ $source['url'] }}">{{ $source['platform'] }}</a>
                    @endforeach
                </a>
                </div>
            </div>
        @endforeach
    </div>
@endforeach

</div>
@endsection
