<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<footer class="bg-dark text-center text-white">
    <div class="container p-4">

        <section class="mb-4">



            <a class="btn btn-outline-light btn-floating m-1" href="https://x.com/GD_Network_" role="button"><i
                    class="fab fa-twitter"></i></a>

            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                    class="fab fa-google" onclick="copyLink()"></i></a>

        </section>



        <section class="">
            <form action="{{ route('newsletter.subscribe') }}" method="POST">
                @csrf

                <div class="row d-flex justify-content-center">

                    <div class="col-auto">
                        <p class="pt-2">
                            <strong>Sign up for our newsletter</strong>
                        </p>
                    </div>



                    <div class="col-md-5 col-12">

                        <div class="form-outline form-white mb-4">
                            <input name="email" type="email" id="form5Example21" class="form-control"
                                placeholder="Your email address" />
                            <label class="form-label" for="email">Email address</label>
                        </div>
                    </div>



                    <div class="col-auto">

                        <button type="submit" class="btn btn-outline-light mb-4">
                            Subscribe
                        </button>
                    </div>

                </div>

            </form>
        </section>



        <section class="mb-4">
            <p style="color: red">
                We will only send the most important news to your email - we will try our best not to spam your inbox!
            </p>
            <p>
This site is completely unofficial and has nothing to do with RobTopGames (the developer of Geometry Dash). If you wish to get this website taken down or to remove a certain part of it, please make sure to contact us via Twitter on: @GD_Network_ OR @thewallyhimself (I recommend this one for a faster response). Website developed and ran by ignWally (@thewallyhimself on twitter, @ignWally on discord) and DrSkillers (@dr.skillers on discord). Some assets on this site might have been taken from Geometry Dash. Geometry Dash font taken from <a href="https://gdcolon.com/gdfont">GD Font Generator</a> by GD Colon.
        </p>
        </section>



        <section class="">
            <div class="row">

                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Links</h5>

                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="#!" class="text-white">Link 1</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white">Link 2</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white">Link 3</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white">Link 4</a>
                        </li>
                    </ul>
                </div>



                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Links</h5>

                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="#!" class="text-white">Link 1</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white">Link 2</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white">Link 3</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white">Link 4</a>
                        </li>
                    </ul>
                </div>



                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Links</h5>

                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="#!" class="text-white">Link 1</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white">Link 2</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white">Link 3</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white">Link 4</a>
                        </li>
                    </ul>
                </div>



                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Links</h5>

                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="#!" class="text-white">Link 1</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white">Link 2</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white">Link 3</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white">Link 4</a>
                        </li>
                    </ul>
                </div>

            </div>
        </section>

    </div>



    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        &copy; {{ date('Y') }} Copyright:
        <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
    </div>

</footer>
<script>
    function copyLink(){
    navigator.clipboard.writeText("Website Link");
    Swal.fire({
            icon: 'success',
            title: 'Link Copied!',
            text: 'Website link has been copied to your clipboard!',
            timer: 3000
    });
    }

    @if(session('subscribed'))
        Swal.fire({
            icon: 'success',
            title: 'Subscribed!',
            text: 'You have successfully subscribed to our newsletter!',
            timer: 3000
        });
    @endif

    @if ($errors->has('email'))
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ $errors->first('email') }}'
        });
    @endif
                </script>
