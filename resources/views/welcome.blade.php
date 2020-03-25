<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon"  href="./ico/logo.png">
        <link rel="stylesheet" href="{{asset('./css/app.css')}}">
        <title>BetterLife</title>

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
                        <p>Join us to make the world a better world and life a better life</p>
                    </div>                  
                  </div>
                  <div class="carousel-item">
                    <img src="./wallpapers/bg_2.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Be a part of our comunity</h5>
                        <p>Join us to make the world a better world and life a better life</p>
                    </div>
                  </div>
                </div>
              </div>
        </div>

            <div id="welcome-content">
                <div class="row px-md-5 pt-md-4 justify-content-center mx-2">
                    <div class="col-md-5 col1 px-5 pb-4 pt-3 mt-5">
                        <div class="row pt-md-3">
                            <div class="col-md-3 text-center mb-md-2"><img src="./ico/logo.png" alt="logo" width="100px"></div>
                            <div class="col-md-9"><h1 class="text-center text-md-left mt-3 mt-md-0">Better Life</h1></div>
                        </div>                       
                        <p class="pb-3 p-md-4">
                            Nature is the best teacher. Nature teaches us through its universal laws. All what we are longing to achieve on 
                            our planet earth is related to the Nature. Let us be friends of the Nature. Go Green, green and green.
                    </div>
                    <div class="col-md-6 col2">
                        <img src="./wallpapers/tm.jpg" alt="" width="100%">
                    </div>
                </div>
            </div>
            <div class="fruits-container py-md-5">
                <h4>Healthy Foods </h4>
                <p class="text-center text-muted font-weight-bold">All vitamins exist in fruits and vegetables.</p>
                <div class="row m-4 mb-5 px-md-5 justify-content-center fruits-inner-container">
                    <div class="col-md-2 mx-md-3">
                        <img src="/wallpapers/product-1.jpg" alt="" width="100%">
                        <p>Vitamin C</p>
                    </div>
                    <div class="col-md-2 mx-md-3">
                        <img src="/wallpapers/product-5.jpg" alt="" width="100%">
                        <p> Vitamin D</p>
                    </div>
                    <div class="col-md-2 mx-md-3">
                        <img src="/wallpapers/product-10.jpg" alt="" width="100%">
                        <p>Vitamin D</p>
                    </div>
                    <div class="col-md-2 mx-md-3">
                        <img src="/wallpapers/product-12.jpg" alt="" width="100%">
                        <p>Vitamin C + A + antibiotics</p>
                    </div>
                </div>
            </div>
            <div class="advice-container mb-5">
                <div class="row container-fluid">
                    <div class="col-md-6"></div>
                    <div class="col-md-6 pt-md-5">
                        <span>Start your day with </span>
                        <p class="adv-title">a good thought </p>
                        <p class="adv">You are what you eat. Take care of what you eat
                             because you are taking care of your health.

                             Thenafter your health will take care of your body and mind.

                             Living healthy is enjoying life at the full. 

                        </p>
                    </div>
                </div>
            </div>
            <Foot></Foot>
        </div>
    </body>
</html>
