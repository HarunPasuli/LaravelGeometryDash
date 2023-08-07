<div class="bg-black"
    style="width: 95%; border-color: black; margin-left:2.5%;margin-top: 30px; border-radius:1rem ;padding-top: 10px; padding-left: 30px; padding-right: 30px;">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4">
        <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
            <img src="{{ asset('asset/images/logo.png') }}" alt="" class="class="bi me-2 width="60"
                height="60" role="img" aria-label="Bootstrap" style="border-radius: 1rem;">
        </a>

        @php
            $min_id = DB::table('levels')->min('lid');
            $max_id = DB::table('levels')->max('lid');
            $random_id = random_int($min_id, $max_id);
        @endphp
        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0" style="font-size: 19px; color: white;">
            <li><a href="#" class="nav-link px-2" style="color:white;">Home</a></li>
            <li><a href="#" class="nav-link px-2" style="color:white;">News</a></li>
            <li><a href="#" class="nav-link px-2k" style="color:white;">Community</a></li>
            <li><a href="#" class="nav-link px-2" style="color:white;">Threads</a></li>
            <li><a href="/level-guesser/{{ $random_id }}" class="nav-link px-2k" style="color:white;">Level
                    Guessing</a></li>
        </ul>

        <div class="col-md-3 text-end">
            @auth
                <p style="color: white;">Hello, {{ Auth::user()->name }}</p>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-link" style="color: white;">Logout</button>
                </form>
            @else
                <button type="button" class="btn btn-outline-primary me-2"
                    onclick="window.location.href='/login'">Login</button>
                <button type="button" class="btn btn-primary" onclick="window.location.href='/register'">Sign-up</button>
            @endauth
        </div>


    </header>
</div>
