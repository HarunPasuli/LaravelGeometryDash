@extends('layouts.master')

@section('title','index')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <img src="asset/images/logo (3).png" style="margin-left: auto; margin-right: auto; display: block; width: 60%"></img> 
    <div style="background-color: black; width: 100%; border-radius: 1rem 1rem 0rem 0rem; margin-bottom: 0%;">
    <br> <br>
    <h1 style="font-weight: 30px;;color: white; text-align: center;">Welcome to the Geometry Dash Network!</h1>
    <p style="color: rgb(200,200,200); font-size: 22px; margin-left: 5%; margin-right: 5%;"> Welcome to the *unofficial* Geometry Dash Network Website! Discuss with others about everything GD, news and more! Make your voice heard by voting on polls! Learn every new detail regarding upcoming updates and more! Test your GD Level knowledge by playing the Level Guesser!</p> <hr style="color: white; margin-left: 10%;margin-right: 10%">
    <h1 style="color: white; text-align: center; font-weight: 30px;">News & Community News</h1>
     <p style="color: rgb(200,200,200); font-size: 22px; margin-left: 5%; margin-right: 5%;"> Read the latest news regarding upcoming updates and features being added into the games in the news section. We will also mention theories on upcoming features, news regarding award shows, predictions on when upcoming updates could come out, and potential other important news regarding the base game. <span style="font-weight: 15px;">Community News </span> contains news about the player base such as results and nominees of the awards shows in case you miss them, new rated levels, important demon list changes such as new top 1s and verifications, and more!</p> <br>
  </div>
  <div style="background-color: rgb(20,20,20); width: 100%; border-radius: 0rem">
<br>
    <h1 style="font-weight: 30px;;color: white; text-align: center;">Threads & Polls</h1>
  <p style="color: rgb(200,200,200); font-size: 22px; margin-left: 5%; margin-right: 5%;"> Authors can start threads and polls that people who are signed in can vote on and discuss! Users can reply to other people's comments to more-directly talk to them. (Exclusive to people with accounts!)</p> <br>
    <h1 style="color: white; text-align: center; font-weight: 30px;">Level Guesser</h1>
     <p style="color: rgb(200,200,200); font-size: 22px; margin-left: 5%; margin-right: 5%;"> Can you guess famous geometry dash levels from just one picture of the level? Test your geometry dash level guessing knowledge in a short & fun minigame!</p> <br>
  </div>
</body>
</html>



@endsection
