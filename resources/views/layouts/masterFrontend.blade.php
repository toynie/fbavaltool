
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- <title>{{ config('app.name', 'Valuation Tool') }}</title> -->
  <title>FBA Valuation Tool</title>

  <!-- Scripts -->

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
 <link rel="preconnect" href="https://fonts.gstatic.com">
 <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <!-- Styles -->

  <style>
    *{ font-family: 'Quicksand', sans-serif;}

    @font-face {
        font-family: helveticaRound;
        src: url('/fonts/HelveticaRoundedLT-Bold.otf');
    }

    .tooltip-inner {
    background-color: #081b53!important;
    color: #081b53;
    margin-left:160px;
    }


    /* #\36  > div > div.col-md-4.padding-right\:0.padding-right\:0 > div > div */

  </style>



  <link href="{{ asset('css/app.css') }}" rel="stylesheet">




    <style>

        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }

        #footer-logo > img {
            max-width: 180px;
        }
        .body{
        }

        .jumbotron  {
            background: -webkit-linear-gradient(340deg, #182b62 30%, #393ba3 100%);
            background: -o-linear-gradient(340deg, #182b62 30%, #393ba3 100%);
            background: linear-gradient(110deg, #182b62 30%, #393ba3 100%);
            position: relative;
        }

        .answer .answer-multi-letter {
            border-right:  solid #182b62 !important;
            background-color: #5bd1a1;
            width: 300px;
        }

        .answer-multi-text:hover{
            background: #ededed;
        }

        .card-body {
            border:3px solid #182b62;
        }

        .answer-yesno{
            border-style: solid;
            border-color: #5bd1a1;
        }

        .answer-val , #questions-body div  select{
            border-radius: 0;
            border: 1px solid #182b62;
        }

        .caret{border-top:4px solid red;}
        @yield('custom-style');


        input .btn .btn-outline-success .btn-lg .btn-block .btnyesno{
            border-radius: 0 !important;
            border: 3px solid transparent !important;
        }


        .blueback-radient{
            background: linear-gradient(110deg, #182b62 30%, #393ba3 100%);
            color: white;
        }

        .blueback{
            /* background-color: #182b62; */
            color: white;
        }
        .speedometer{

        }


        .dfbThickBorder{
            border-width: thick !important;
        }
        .dfbMediumBorder{
            border-width: medium !important;
        }

        .dfbPriceCard-child-left, .dfbPriceCard-child-right {
            max-width: 33%;
            width: 33%;
        }

        .dfbSelectAnser .dfbSelectAnser-left{
            max-height: 50px;
        }

        .dfbSelectAnser .custom-radio .custom-control-label::before {
            visibility: hidden;
        }

        #dfb-frontend-header-bg {
            /* background-image: url(/img/banner_calc.png), url(/img/dfb-frontend-header-bg.png); */
            /* background-image: url(), url(/img/dfb-frontend-header-bg.png); */
            /* background-image:url(/img/dfb-frontend-header-bg.png);
            background-size:contain,cover;
            background-position: 70% bottom, left top;
            background-repeat: no-repeat, repeat;
            padding: 15px;
            margin-left: 100px,; */
            background-image: url(/img/dfb-frontend-header-bg.png); */
            background-image: url("/w3images/photographer.jpg");
            background-color: #cccccc;
            /* height: ; */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
        }
        hr.header-hr{
            border-top: 3px solid #5bd0a0;

        }




        /* Small devices (landscape phones, 576px and up) */
        @media only screen and (min-width: 567px) {
            #dfb-frontend-header-bg  h1{
            font-size:5rem; line-height:4rem
            }
            #dfb-frontend-header-bg  h3{
                font-size:3rem; line-height:3rem
            }
        }


        /* Medium devices (tablets, 768px and up) */
        @media only screen and (min-width: 768px) {
            #dfb-frontend-header-bg  h1{
                font-size:4rem; line-height:4rem
            }
            #dfb-frontend-header-bg  h3{
                font-size:2.5rem; line-height:2.5rem
            }
            /* #dfb-frontend-header-bg  h2{ */
            h2{
                font-family:helveticaRound;
                font-size: 4rem; line-height: 4rem;
            }
        }

        #footer-email{
            background-image: url("https://dealflowbrokerage.com/wp-content/themes/dealflow/dist/images/subscribe-bg.png");
            background-color: #182b62;
            height: 200px;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
        }

        /* Large devices (desktops, 992px and up) */
        @media only screen and (min-width: 992px) {

        }

        /* Extra large devices (large desktops, 1200px and up) */
        @media only screen and (min-width: 1200px) {
            #dfb-frontend-header-bg  h1{
                font-size:4rem; line-height:4rem;
            }
            #dfb-frontend-header-bg  h2{
                font-size: 3rem; line-height: 3rem;
            }
            #dfb-frontend-header-bg  h3{
                font-size:3rem; line-height:3rem
            }
            #dfb-frontend-header-bg  h4{
                font-size:2rem; line-height:2rem
            }

            .tofadeinscroll{
                /* border: 1em solid #fff;
                border-bottom: 4em solid #fff;
                border-radius: .25em;
                box-shadow: 1em 1em 2em .25em rgba(0,0,0,.2);
                margin: 2em auto; */
                opacity: 0;
                /* transform: translateY(4em) rotateZ(-5deg); */
                transition: transform 4s .25s cubic-bezier(0,1,.3,1),
                            opacity .8s .85s ease-out;
                max-width: 600px;
                /* width: 90%; */
                will-change: transform, opacity;
            }

            .tofadeinscroll.is-visible {
                /* opacity: 1; */
                /* transform: rotateZ(-2deg); */
            }

            header {
            opacity: 0;
            transition: opacity .5s .25s ease-out;
            }

            header.is-visible {
            opacity: 1;
            }

            .main-photo {
            transform: scale(.8);
            }

            .heading {
            transform: translate(-50%, calc(-50% + 1em));
            }

            .is-visible .main-photo {
            transform: none;
            }

            .is-visible .heading {
            transform: translate(-50%, -50%);
            }

            .main-photo,.heading {
            transition: transform 4s .25s cubic-bezier(0,1,.3,1),
                        filter 10s 2s ease-out;
            will-change: transform;
            }
        }

        #footer-continue .btn-outline-primary{
            border-color: #182b62;
            border-width: 2px;
            border-radius: 0px;
        }

        #footer-continue .btn-secondary{
            border-color: none;
            background-color: Gainsboro;
            border-width: 2px;
        }

        /* #dfb-frontend-header-bg  h1{ */
            h1,h2,h3,h4,h5{
            font-family:helveticaRound !important;
        }

        #dfb-frontend-header-bg  h2{
            font-family:helveticaRound;
        }

        html {
        scroll-behavior: smooth;
        }
        .tooltip.top .tooltip-arrow {
            border-top-color: #182b62 !important;
        }
    </style>

    @stack('stack-styles')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>
<body >
    <div class="container-fluid">
        <div class="row ">
            <div class="col-12 p-0">
                <div id="dfb-frontend-header-bg" style="" class=" jumbotron jumbotron-fluid text-center m-0 bg-info d-flex flex-column justify-content-center">
                    @if(!Route::is('/'))
                        <a href="/">
                            <img src="https://dealflowbrokerage.com/wp-content/themes/dealflow/dist/images/logo.svg" style="height: 48px;" />
                        </a>
                    @endif
                    @if (Route::current()->getName() == 'freeOutput'  && request()->get('part')==2)

                        {{-- <div class="row  ">
                            <div class="col text-center">
                                <p class="" style="    font-size: 2rem;}">The World's Most Accurate</p>
                            </div>
                        </div> --}}
                        <div class="row mb-5">
                            <div class="col text-center">
                                <h2>Business Valuation Report</h2>
                            </div>
                        </div>
                         <div class="row  ">
                            <div class="col text-center">
                                <h5>Current market value is between</h5>
                                <h2>${{ number_format($result['valuationRange$'][0]) }} - ${{ number_format($result['valuationRange$'][1]) }}</h2>
                                <br>
                                <h5>Multiple</h5>
                                <h5  style=" font-size: 2rem;">3.14x - 3.44x</h5>
                                <center>
                                    <button style="min-width: 250px;" onclick="Calendly.initPopupWidget({url: 'https://calendly.com/dealflowteam/fba-business-valuation-meeting-call'});return false;" id="tellusmore" type="button" class="btn btn-primary btn-lg my-5">
                                        <h5 class="mb-0"Sell Business for ${{ number_format($result['valuationDollar']) }}</h5>
                                    </button>
                                </center>
                            </div>
                        </div>

                    @else
                        <div class="container my-5">

                            {{-- @if(Route::current()->getName() != 'freeOutput') --}}
                            @if(Request::is('/') || Request::is('selectBusiness'))
                                @include('includes.frontend_banner_calc')
                            @endif
                            <div class="row  ">
                                <div class="col text-center">
                                    <p class="" style="font-size: 2rem; margin-bottom: 0;">The World's Most Accurate</p>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col text-center">
                                    @if(Route::is('/') || !isset($businessType))
                                        <h2>Amazon FBA Business Valuation Tool</h2>
                                    @else
                                        <h2>{{ $businessType->name }} Valuation Tool</h2>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 ">
                                    <img class='img-fluid tofadeinscroll ' src="/img/banner-icon-1.png" alt="" />
                                    <h5>INSTANT</h5>
                                    <p>Discover your business' market value in 5 minutes.</p>
                                </div>
                                <div class="col-md-3 ">
                                    <img class='img-fluid tofadeinscroll ' src="/img/banner-icon-2.png" alt="" />
                                    <h5>NO COST</h5>
                                    <p>Free valuation, no strings attached.</p>
                                </div>
                                <div class="col-md-3 ">
                                    <img class='img-fluid tofadeinscroll' src="/img/banner-icon-3.png" alt="" />
                                    <h5>ACCURATE</h5>
                                    <p>Dataset uses thousands of sold internet business.</p>
                                </div>
                                <div class="col-md-3 ">
                                    <img class='img-fluid tofadeinscroll' src="/img/banner-icon-4.png" alt="" />
                                    <h5>CONFIDENTIAL</h5>
                                    <p>You don't have to disclose the business name of URL</p>
                                </div>
                            </div>
                        </div>
                    @endif



                </div>
            </div>
        </div>
    </div>
        @yield('content')
  </div>



  {{-- <div class="container-fluid" id="footer-email">
    <div class="container h-100">

        <div class="row align-items-center h-100 ">
            <div class="col-md-6">
                <h4 class="font-weight-light" style="color:white">NEW LISTINGS DIRECTLY TO YOUR INBOX</h4>
            </div>
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <input type="text" class="form-control footer-email-input" style="    background-color: #00000021;" placeholder="Enter Email" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-outline-secondary" style="    background-color: #54d19f; color:white" type="button"><b>SUBSCRIBE</b></button>
                    </div>
                  </div>
            </div>
        </div>
    </div>
  </div> --}}

  <div class="container footer-primary py-5">
      <div class="row">
        <div class="col-md-3  p-3" id="footer-logo">
            {{-- logo --}}
            <img src="/img/dealflow_logo.png"  alt="">
        </div>


        <div class="col-md-6  p-3" id="footer-menu">
            <div class="row "><div class="col"><h5>Menu</h5><br></div></div>
            <div class="row">
                <div class="col-md-4">
                    <p class="menu-items"><span><a href="#" class="text-secondary">Buy</a></span></p>
                    <p class="menu-items"><span><a href="#" class="text-secondary">Process</a></span></p>
                    <p class="menu-items"><span><a href="#" class="text-secondary">About</a></span></p>
                    <p class="menu-items"><span><a href="#" class="text-secondary">Privacy Policy</a></span></p>
                </div>
                <div class="col-md-4">
                    <p class="menu-items"><span><a href="#" class="text-secondary">Sell</a></span></p>
                    <p class="menu-items"><span><a href="#" class="text-secondary">Blog</a></span></p>
                    <p class="menu-items"><span><a href="#" class="text-secondary">Contact</a></span></p>
                    <p class="menu-items"><span><a href="#" class="text-secondary">Terms of Use</a></span></p>
                </div>
                <div class="col-md-4">
                    <p class="menu-items"><span><a href="#" class="text-secondary">Exit Plan</a></span></p>
                    <p class="menu-items"><span><a href="#" class="text-secondary">Referrals</a></span></p>
                    <p class="menu-items"><span><a href="#" class="text-secondary">About</a></span></p>
                    <p class="menu-items"><span><a href="#" class="text-secondary">Careers</a></span></p>
                </div>
            </div>
        </div>
        <div class="col-md-3  p-3  border border-right-0 border-top-0 border-bottom-0" id="footer-menu">
            <div class="row pl-5 "><div class="col"><h5>Social</h5><br></div></div>
            <div class="row pl-5">
                <div class="col-md">
                    <p class="menu-items"><span><a href="#" class="text-secondary">Facebook</a></span></p>
                    <p class="menu-items"><span><a href="#" class="text-secondary">Linkedin</a></span></p>
                    <p class="menu-items"><span><a href="#" class="text-secondary">Twitter</a></span></p>
                    <p class="menu-items"><span><a href="#" class="text-secondary">Youtube</a></span></p>
                </div>
            </div>
        </div>

      </div>

  </div>


  <script>


    @if(Session::has('success'))


    swal("{{ Session::get('success')}}");


    @endif

    var scroll = window.requestAnimationFrame ||
             // IE Fallback
    function(callback){ window.setTimeout(callback, 1000/60)};

    //get al element to fade in
    var elementsToShow = document.querySelectorAll('.tofadeinscroll');
    function loop() {

        //loop to them
        elementsToShow.forEach(function (element) {
            if (isElementInViewport(element)) {
                // element.classList.add('ddd');
                // element.classList.add('is-visible');
                element.classList.add('animate__animated');
                element.classList.add('animate__fadeIn');
                element.classList.add('animate__delay-500ms');
                // element.classList.add('animate__animated animate__fadeInLeft animate__delay-90s');
            } else {
                element.classList.remove('is-visible');
            }
        });
        scroll(loop);
    }

    // Call the loop for the first time
    loop();

    // Helper function from: http://stackoverflow.com/a/7557433/274826
    function isElementInViewport(el) {
        // special bonus for those using jQuery
        if (typeof jQuery === "function" && el instanceof jQuery) {
            el = el[0];
        }
        var rect = el.getBoundingClientRect();
        return (
            (rect.top <= 0
            && rect.bottom >= 0)
            ||
            (rect.bottom >= (window.innerHeight || document.documentElement.clientHeight) &&
            rect.top <= (window.innerHeight || document.documentElement.clientHeight))
            ||
            (rect.top >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight))
        );
    }


  </script>


  <script src="{{ asset('js/app.js') }}" defer></script>

<script>
    function swal_info($title,$message){
        swal({
            icon: 'info',
            title: $title,
            text: $message,
        });
    }



    </script>
</body>
</html>
