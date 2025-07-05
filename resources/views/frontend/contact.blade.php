@extends('frontend.inc.main')
@section('title')
    <title>Hotel Kuta | KONTAK KAMI</title>
@endsection

@section('content')
    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">CONTACT US</h2>
        {{--
  <div class="h-line bg-dark"></div> --}}
        {{-- <p class="text-center mt-3">
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat.
  </p> --}}
    </div>

    <div class="container mb-5">
        <div style="margin-bottom:140px" class="bg-white rounded shadow p-4">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-8 col-md-6 mb-5 px-4">
                        <iframe class="w-100 rounded" height="320px"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.734492691161!2d106.79730077587176!3d-6.555164864083095!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c40de0f72211%3A0xbd963a080fe6b8dd!2sBSI%20Cilebut!5e0!3m2!1sen!2sid!4v1749014498829!5m2!1sen!2sid" allowfullscreen=""
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="map"></iframe>
                    </div>
                    <div class="col-lg-4">
                        <h5>Address</h5>
                        <a href="https://goo.gl/maps/jy8CDHNPpsyBHVHYA" target="_blank"
                            class="d-inline-block text-decoration-none text-dark mb-2">
                            <i class="bi bi-geo-alt-fill">Jl. Raya Cilebut No.3a, RT.01/RW.04, RTO1 RW04, Kec. Tanah Sereal, Kota Bogor, Jawa Barat 16165</i>
                        </a>
                        <h5 class="mt-4">Call us</h5>
                        <a href="#" class="d-inline-block mb-2 text-decoration-none text-dark"><i
                                class="bi bi-telephone-fill"></i> 08531232211</a>
                        <br>
                        <a href="#" class="d-inline-block mb-2 text-decoration-none text-dark"><i
                                class="bi bi-telephone-fill"></i> 08531232211</a>
                        <h5 class="mt-4">Email</h5>
                        <a href="#" class="d-inline-block mb-2 text-decoration-none text-dark"><i
                                class="bi bi-envelope-fill"></i> hotel@gmail.com</a>

                        <h5 class="mt-4">Follow us</h5>
                        <a href="#" class="d-inline-block text-dark fs-5 me-2">
                            <i class="bi bi-twitter me-1"></i>
                        </a>

                        <a href="#" class="d-inline-block text-dark fs-5 me-2">
                            <i class="bi bi-facebook me-1"></i>
                        </a>

                        <a href="#" class="d-inline-block text-dark fs-5">
                            <i class="bi bi-instagram me-1"></i>

                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
