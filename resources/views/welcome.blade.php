<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="_token" content="{{ csrf_token() }}">
        <title>Live Search</title>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: block; 
                justify-content: center;
            } 

            /* .flex-new {
                  display: flex; 
            } */
/* 
             .position-ref {
                position: relative;
            }  */

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            } 

            .content {
                text-align: center;
                
            } 

        
             .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            } 

            .m-b-md {
                margin-bottom: 30px;
                margin-top: 100px;
            }   
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links flex-new">
                    @auth
                        <a href="{{ url('/allAds') }}">LIST OF ADS</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        
            <div class="content">
                <div class="title m-b-md">
                <div class="container">
                <div class="row">
                <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Search Ads </h3>
                </div>
                <div class="panel-body">
                <div class="form-group">
                    <input type="text" class="form-controller" id="search" name="search"></input>
                </div>
                    <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Ad Title</th>
                    <th>Description</th>
                    <th>Location</th>
                    <th>Image</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
                </table>
                </div>
                </div>
                </div>
                </div>
                </div>
            </div>
        </div>
    </body>
</html>
        <script type="text/javascript">
            $('#search').on('keyup',function(){
            $value=$(this).val();
            $.ajax({
            type : 'get',
            url : '{{URL::to('search')}}',
            data:{'search':$value},
            success:function(data){
            $('tbody').html(data);
            }
            });
            })
            </script>
            <script type="text/javascript">
            $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
        </script>
    </body>
</html>
