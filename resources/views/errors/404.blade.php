
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404 - Sayfa Bulunamadı - Exxefy</title>

    <link rel="icon" href="{{ asset('assets\img\exxefy-fav.png') }}" sizes="20x20" type="image/png">
    <link rel="stylesheet" href="{{ asset('assets\css\animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets\css\bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets\css\magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets\css\owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets\css\font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets\css\line-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets\css\themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets\css\flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets\css\slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets\css\animated-slider.css') }}">
    <link rel="stylesheet" href="{{ asset('assets\css\style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets\css\responsive.css')  }}">


</head>
<body>
    <div class="preloader" id="preloader">
        <div class="preloader-inner">
            <div class="spinner">
                <div class="dot1"></div>
                <div class="dot2"></div>
            </div>
        </div>
    </div>

    <!-- error area start -->
    <div class="error-area text-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4 col-7">
                    <div class="error-page-left-img">
                        <div class="top-image">
                            <img class="error-img-1" src="{{ asset('assets/img/others/3.png') }}" alt="404">
                            <span>Oops !</span>
                        </div>
                        <img src="{{ asset('assets/img/others/2.png') }}" alt="404">
                    </div>
                </div>
                <div class="col-md-8 text-center">
                    <img src="{{ asset('assets/img/others/1.png') }}" alt="404">
                    <div class="error-back-to-home">
                        <a class="btn" href="{{ route('home') }}">Anasayfaya dön...</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- error area end -->

    <div class="back-to-top">
        <span class="back-top"><i class="fa fa-angle-up"></i></span>
    </div>

    <script src="{{ asset('assets\js\jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('assets\js\popper.min.js') }}"></script>
    <script src="{{ asset('assets\js\bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets\js\jquery.magnific-popup.js') }}"></script>
    <script src="{{ asset('assets\js\wow.min.js') }}"></script>
    <script src="{{ asset('assets\js\owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets\js\slick.js') }}"></script>
    <script src="{{ asset('assets\js\jquery.cssslider.min.js') }}"></script>
    <script src="{{ asset('assets\js\waypoints.min.js') }}"></script>
    <script src="{{ asset('assets\js\jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets\js\imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets\js\isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets\js\worldmap-libs.js') }}"></script>
    <script src="{{ asset('assets\js\worldmap-topojson.js') }}"></script>
    <script src="{{ asset('assets\js\mediaelement.min.js') }}"></script>
    <script src="{{ asset('assets\js\main.js') }}"></script>

</body>
</html>
