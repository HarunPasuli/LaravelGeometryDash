@extends('layouts.master')

@section('title', $level->title)
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')
    <div class="bg" style="height: 100%">
        <div style="width: 100%">
            <img src="{{ asset('asset/images/guesser.png') }}"
                style="margin-left: auto; margin-right: auto;   display: block; width:70%"> <br>
        </div>
        <div
            style="background-color: rgb(31,30,30); color: white; width: 75%; display: block; margin-left: auto; margin-right: auto; border-color: black; border-radius: 1rem; padding: 10px;">
            <p style="text-align: center; font-size: 30px;"> Guess the level!</p>
            <div>
                <div style="width: 45%;margin-left: auto; margin-right: auto; border-radius: 1rem; display:block;">
                    <img src="{{ asset($level->filename) }}"
                        style="width: 100%; margin-left: auto; margin-right: auto; border-radius: 1rem; display:block;"><br>
                </div>
                <div
                    style="background-color: rgb(51,50,50);width: 75%;margin-left: auto; margin-right: auto; border-radius: 1rem; display:block;">
                    <br>
                    <h4 style="text-align: center;"> Difficulty: <span id="difficulty1"> </span> | Time Left: <span
                            id="countdowntimer" style="color: red">15 </span> </h4>
                    <h3 style="text-align: center;"> What is this level called? </h3>
                    <div style="width: 100%;">
                        <form id="answerForm" onsubmit="return false">
                            <div style="margin-left: auto; margin-right: auto; display: block; width: 40%;">
                                <input type="text" name="bigman" id="fileToUpload"
                                    style="height: 25px; padding-bottom: 0px; width: 100%">
                            </div>
                            <br>


                            <div style="display: flex; justify-content:center">
                                <button class="disabled"
                                    style="width:27%; border-color: rgba(0,0,0,0); background-color:rgb(0,220,0); color:rgb(0,0,0);"
                                    onclick="submitCheckAnswer()">Submit</button>
                                <button style="width:27%; border-color: rgba(0,0,0,0); background-color:rgb(255,0,0); color:rgb(0,0,0);"
                                    onclick="giveUp()" class="disabled">Skip</button>
                        </form>
                    </div>


                </div>
                <div style="text-align: center; font-size: 23px;">
                    <p style="display: inline;" id="levelwas">
                    <p style="display: none; color: rgb(255,100,100)" id="levelwasPHP"> @{{ levelWasContent }} </p>
                    </p>
                    <p style="display: inline; color: green;" id="levelcorrect"></p>
                    <button id="myButton"
                        style="display: none; margin-left: auto; margin-right: auto; width: 30%; border-radius: 1rem; border-color: rgba(0,0,0,0);"
                        onclick="window.location.reload();">Next</button>
                </div>
                <br>
            </div>
        </div>
    </div>
    <div style="height: 200px; color: black;">

    </div>






    <script type="text/javascript">
        var timeleft = 15;
        var downloadTimer = setInterval(function() {
            timeleft--;
            var buttons = document.getElementsByClassName("disabled");
            document.getElementById("countdowntimer").textContent = timeleft;
            if (timeleft <= 0) {
                clearInterval(downloadTimer);
                document.getElementById("levelwas").textContent = "The Level Was: ";
                document.getElementById("levelwasPHP").style.display = "inline";
                document.getElementById("levelwasPHP").textContent =
                    "{{ $levelWasContent }}";
                // Get all buttons with the class "disabled"


                // Loop through each button and disable them

                buttons[0].disabled = true;
                buttons[1].disabled = true;
                document.getElementById("myButton").style.display = "block";

            }
        }, 1000);

        function submitCheckAnswer() {
            //laravel code: if text box text is equal to LevelName OR alt1 OR alt2, run the following js code:
            document.getElementById("myButton").style.display = "block";
            document.getElementById("levelcorrect").textContent = "That was correct!";

            clearInterval(downloadTimer);

            preventDefault();


            //ELSE, run this js code: timeleft = 1;

        }

        function giveUp() {
            timeleft = 1;
        }
    </script>
    <script>
        var difficulty = {{ $difficulty }};
        //VAR DIFFICULTY^^ should be set to the difficulty from the table (1-3) and if possible convert it into js. If not, translate the following stamement into php
        console.log(difficulty);
        if (difficulty == 1) {
            document.getElementById("difficulty1").textContent = "Easy";
            console.log("1");
        } else if (difficulty == 2) {
            document.getElementById("difficulty1").textContent = "Medium";
            console.log("2");
        } else {
            document.getElementById("difficulty1").textContent = "Hard";
            console.log("3");
        }
    </script>
@endsection
