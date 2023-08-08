@extends('layouts.master')

@section('title','index')


@section('content')
<!-- DONT CHANGE ANYTHING in the following div !-->
<div style="width: 100%; margin-top: 50px; background-color:rgb(31,30,30);">
<img src="asset/images/news.png" style="margin-left:auto; margin-right:auto;display: block;width: 20%; height">

</div>

<div style="width: 100%;background-color:rgb(51,50,50); height: 100%; display: flex; padding-top: 30px;">
<!-- This div down below has all the front end code for posts. Change the code as the names suggest: !-->
@foreach ($news as $post)
<div style="display: flex; width: 100%; margin-left:10%;margin-right:10%;">
    <div style="padding: 10px; height: 100%; background-color: black; width: auto; border-radius:1rem; margin-right:5%">
        <b style="font-size: 23px; color: rgb(121,120,120);">{{ $post->author }}</b>
        <b style="font-size: 18px; color: rgb(91,90,90);">
            {{ \Carbon\Carbon::parse($post->uploaded_at)->format('F d, Y g:i A') }}
        </b> <hr>
        <a href="{{ route('news.show', ['id' => $post->id]) }}">  <img src="{{ $post->image }}" style="width:99%; height:35%; display: block; border-radius: 1rem;"> </a>
        <b style="font-size: 23px; color: white;">{{ $post->title }}</b>
        <p style="font-size: 18px; color: rgb(121,120,120);">{{ str_limit($post->description, $words = 50, $end = '...') }}</p>
        <b style="font-size: 18px; color: rgb(91,90,90);">Sources:</b>
        @foreach ($post->sources as $source)
        {{-- {{ dd($post->sources) }} --}}
        <a href="{{ $source['url'] }}">{{ $source['platform'] }}</a>
        @endforeach




        <br>
        <b style="font-size: 15px; color: rgb(131,130,130)">{{ $post->views }} views</b>
    </div>


 <!-- DONT TOUCH THIS: <div style="padding: 10px; height: 100%; background-color: black; width: auto; border-radius:1rem;">
    <b style="font-size: 23px; color: rgb(121,120,120);">(Username)<b>
    <b style="font-size: 18px; color: rgb(91,90,90);">(Date)<b> <hr>
    <img src="asset/images/background.jpg" style="width:99%; height:35%; display: block; border-radius: 1rem;">
    <b style="font-size: 23px; color: white;">Lorem Ipsum <b>
     <p style="font-size: 18px; color: rgb(121,120,120);">Lorem Ipsum Lorem Ipsum Lorem Ipsun Lorem IpsumLorem Ipsum Lorem Ipsum Lore<p>
        <b style="font-size: 18px; color: rgb(91,90,90);">Sources:<b>
    <a href="#">Discord</a>
    <a href="#">Twitter</a>
    <br>
    <b style="font-size: 15px; color: rgb(131,130,130)">(View Count) views<b>
  </div> !-->
</div>
@endforeach
</div>



</div>

@endsection!


