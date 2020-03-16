<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('./css/app.css')}}">
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Poppins&display=swap" rel="stylesheet">  

        <!-- script -->
        <script src="{{ asset('js/app.js') }}" defer></script> 

    </head>
    <body class="welcome-body">
        <div id="app">
        @include('layouts/navbar')

        <div class="show-case">
            <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="./wallpapers/bg_1.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Be a part of our comunity</h5>
                        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                    </div>                  
                  </div>
                  <div class="carousel-item">
                    <img src="./wallpapers/bg_2.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Be a part of our comunity</h5>
                        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                    </div>
                  </div>
                </div>
              </div>
        </div>

            <div id="welcome-content">
                <div class="row px-md-5 pt-md-4 justify-content-center mx-2">
                    <div class="col-md-5 col1 px-5 pb-4 pt-3 mt-5">
                        <h1 class="text-center">GREEN<br>CONVERSATION</h1>
                        <p class="pb-3">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem praesentium reiciendis iure rerum suscipit 
                            maxime velit perspiciatis maiores magnam ullam ut odio, deserunt dicta culpa, cumque consequuntur, atque 
                        </p>                       
                    </div>
                    <div class="col-md-6 col2">
                        <img src="./wallpapers/tm.jpg" alt="" width="100%">
                    </div>
                </div>
            </div>
            <div class="fruits-container py-md-5">
                <h4>Awsome Food</h4>
                <p class="text-center text-muted font-weight-bold">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quia, provident?</p>
                <div class="row m-4 mb-5 px-md-5 justify-content-center fruits-inner-container">
                    <div class="col-md-2 mx-md-3">
                        <img src="/wallpapers/product-1.jpg" alt="" width="100%">
                        <p>For Vitamin C</p>
                    </div>
                    <div class="col-md-2 mx-md-3">
                        <img src="/wallpapers/product-5.jpg" alt="" width="100%">
                        <p>For Vitamin D</p>
                    </div>
                    <div class="col-md-2 mx-md-3">
                        <img src="/wallpapers/product-10.jpg" alt="" width="100%">
                        <p>Vitamin C</p>
                    </div>
                    <div class="col-md-2 mx-md-3">
                        <img src="/wallpapers/product-12.jpg" alt="" width="100%">
                        <p>So hot</p>
                    </div>
                </div>
            </div>
            <div class="advice-container">
                <div class="row container-fluid">
                    <div class="col-md-6"></div>
                    <div class="col-md-6 pt-md-5">
                        <span>Start your day</span>
                        <p class="adv-title">Advice of the day</p>
                        <p class="adv">Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                        Aliquid nemo et quidem quis laudantium odit autem a doloremque nihil possimus.
                        </p>
                    </div>
                </div>
            </div>
            <Foot></Foot>
        </div>
    </body>
</html>
