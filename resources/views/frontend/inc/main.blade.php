<!DOCTYPE html>
<html>
<head>
    @yield('title')
	<!-- CSS only -->
@include('frontend.inc.links')
@yield('link')
@yield('css')
{{-- <link rel="shortcut icon" href="/img/logo.png"> --}}
<style type="text/css">
        .availability-form{
			margin-top: -50px;
			z-index: 2;
			position: relative;
		}

		.bg-custom,.btn-custom {
			background-color: rgb(218, 218, 218);
		}
        .btn-custom:hover{
            background-color: rgb(171, 172, 171);
        }

		.swiper-slide img {
			width: 100%;
			height: auto;
            object-fit: cover;
            object-position: center;
		}

		@media screen and (max-width: 575px) {
			.availability-form{
				margin-top: 25px;
				padding: 0 35px;
			}

            .swiper-slide img {
                width: 100%;
                height: 50vh;
            }
		}
        .pop:hover{
            border-top-color: var(--teal) !important;
            transform: scale(1.03);
            transition: all 0.3s;
        }
        .navbar {
        background-color: rgb(255, 255, 255); /* Warna latar belakang navbar */
        transition: background-color 0.3s ease; /* Efek transisi saat mengubah warna latar belakang */
        }


        .box{
            border-top-color: var(--teal) !important;
        }

</style>
</head>
<body>

@include('frontend.inc.header')
<!-- Swiper Carousal-->
@include('frontend.inc.logout')

@yield('content')


 <hr class="mt-4">
 <section class="bg-custom footer-index" id="footer-index">
     @include('frontend.inc.footer')
 </section>
    @include('vendor.sweetalert.alert')


    <section class="script" id="script">
       @include('frontend.inc.scripts')
    </section>

</body>
</html>


