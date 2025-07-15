@extends('frontend.inc.main')
@section('title') <title>Hotel Kuta | HOTEL MEWAH DENGAN HARGA MURAH</title>@endsection

@section('content')
<section class="swiper-image-content">
@include('frontend.sectionindex.swiper')
</section>

 <!-- check avilability form-->
 <section class="form" id="form">
    @include('frontend.sectionindex.form')
 </section>

 <!-- Rooms -->
 <section class="kamar-index py-5" id="kamar-index">
    @include('frontend.sectionindex.kamar')
 </section>



 <!-- Contact -->
 <section class="contact-index py-5" id="contact-index">
    @include('frontend.sectionindex.contact')
 </section>
@endsection



