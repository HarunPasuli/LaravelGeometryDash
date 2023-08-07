@extends('layouts.master')

<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')
<img src="{{ asset('asset/images/guesser.png') }}">
    <h1> Admin </h1>
        <p> css is my passion </p>
<form action="{{ route('level-guesser.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    Select image to upload:
        <input type="file" name="filename" id="fileToUpload"><br><br>
    <h3> Name </h3>
        <input type="text" name="level" id="fileToUpload"><br><br>
    <h3> AltName1 </h3>
        <input type="text" name="alt1" id="fileToUpload"><br><br>
    <h3> AltName2 </h3>
        <input type="text" name="alt2" id="fileToUpload"><br><br>
    <h3> AltName3 </h3>
        <input type="text" name="alt3" id="fileToUpload"><br><br>
    <h3> Difficulty: 1 - Easy | 2 - Medium | 3 - Hard </h3>
    <input type="number" name="difficulty" id="fileToUpload" min="1" max="3"><br><br>
<button type="submit" class="btn btn-primary">Create Level</button>
</form>
@endsection
