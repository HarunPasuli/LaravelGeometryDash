@extends('layouts.master')

@section('title', 'index')

@section('content')
<div style="width: 100%; margin-top: 50px; background-color: rgb(31, 30, 30);">
    <img src="{{ asset('asset/images/logo (12).png') }}" style="margin-left: auto; margin-right: auto; display: block; width: 50%;">
</div>

<div style="width: 100%; background-color: rgb(51, 50, 50); display: flex; flex-wrap: wrap; padding-top: 30px;">

@foreach ($communityNews as $index => $post)
        @if ($index % 2 == 0)
        <div style="width: 100%; display: flex; justify-content: center;"> <!-- Center the content -->
        @endif

        <div id="big" style="width: calc(50% - 15px); margin: 0 5px; margin-bottom: 20px;"> <!-- Added margin-bottom -->
        <div style="padding: 10px; background-color: black; width: 70%; border-radius: 1rem; margin-right: 5%;">
                <b style="font-size: 23px; color: rgb(121, 120, 120);">{{ $post->author }}</b>
                <b style="font-size: 18px; color: rgb(91, 90, 90);"> -
                    {{ \Carbon\Carbon::parse($post->uploaded_at)->format('F d, Y g:i A') }}
                </b>
                <hr>
                <b style="font-size: 23px; color: white;">{{ $post->title }}</b>
                <a href="{{ route('news.show', ['id' => $post->id]) }}">

                    <img src="{{ $post->image }}" style="width: 50%; display: block; border-radius: 1rem; margin-left: auto; margin-right: auto;">
                </a>

                <p style="font-size: 18px; color: rgb(121, 120, 120);">{{ \Illuminate\Support\Str::limit($post->description, $limit = 50, $end = '...') }}</p>
                <b style="font-size: 18px; color: rgb(91, 90, 90);">Sources:</b>
                @foreach ($post->sources as $source)
                    {{-- {{ dd($post->sources) }} --}}
                    <a href="{{ $source['url'] }}">{{ $source['platform'] }}</a>
                @endforeach
            </div>
        </div>

        @if ($index % 2 != 0 || $index == count($news) - 1)
        </div>
        @endif
    @endforeach
</div>
@endsection
