<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" type="text/css" href="{{asset('gentelellaAssets/bootstrap/dist/css/bootstrap.min.css')}}">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #f1ffc8eb;
                color: #000;
                font-family:  sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
                
            }

            .title {
                font-size: 84px;
            }

            .links > a{
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .btn-link{
                
                color:#000;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .dropdown-menu{
                font-size: 20px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <div class="dropdown linker col-md-2 col-md-offset-1 pullright">
                            <button class="btn btn-link dropdown-toggle" type="button" data-toggle="dropdown">
                                Student<span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('student.login') }}">Login</a></li>
                                <li><a href="{{ route('student.register') }}">Register</a></li>
                            </ul>
                        </div> 

                        <div class="dropdown linker col-md-2 col-md-offset-1  pullright">
                            <button class="btn btn-link dropdown-toggle" type="button" data-toggle="dropdown">
                                Researcher<span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('researcher.login') }}">Login</a></li>
                                <li><a href="{{ route('researcher.register') }}">Register</a></li>
                            </ul>
                        </div>


                        <div class="dropdown linker col-md-2 col-md-offset-2 ">
                            <button class="btn btn-link dropdown-toggle" type="button" data-toggle="dropdown">
                                verifier<span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('verifier.login') }}">Login</a></li>
                                <li><a href="{{ route('verifier.register') }}">Register</a></li>
                            </ul>
                        </div> 
                        
                    @endauth
                </div>
            @endif
            
            <div class="content">
                <div class="title m-b-md">
                    Course Recommender
                </div>
                <p style="font-size: 22px; font-weight: 550;">
                    This system helps students in making informed choices when they choose a course to do in universities and colleges. 
                    The system performs recommendations to students based on the information they provide when they register and log in.
                </p> 
                
            </div>
        </div>
        <script type="text/javascript" src="{{asset('gentelellaAssets/jquery/dist/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('gentelellaAssets/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    </body>
</html>
