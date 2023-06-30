@extends('frontend/frontendLayout')
@section('title','Room')
@section('content')

<!-- SweetAlert CDN for Pop Up Box --> 
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<link rel="stylesheet" href="/css/frontend/style-viewRoom.css">

<section class="view-room-page-bg">
    <div class="view-room-bg-content flex-center">
        <p>{{$roomDetail->roomtype->type}}</p>
        <div class="line">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <h1>{{$roomDetail->title}} </h1>
    </div>
</section>

<div class="room-section">
    <div class="room-slider-container">
        <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper main-room-swiper">
            <div class="swiper-wrapper room-wraper">
                @foreach($roomDetail->roomImgs as $img)
                    <div class="swiper-slide room-slide">     
                        <img src="{{asset('storage/room/'.$img->img_src)}}">        
                    </div>
                @endforeach
            </div>
   
            <div class="swiper-button-next room-next-btn"></div>
            <div class="swiper-button-prev room-prev-btn"></div>
        </div>
   
        <div thumbsSlider="" class="swiper thumbnail-room-swiper">
            <div class="swiper-wrapper room-wrapper">
                @foreach($roomDetail->roomImgs as $img)
                    <div class="swiper-slide room-slide">
                        <img src="{{asset('storage/room/'.$img->img_src)}}">
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="view-room-content">
        <p>{{$roomDetail->roomtype->type}}</p>
        <h1>{{$roomDetail->title}} </h1>

        <div class="rooms-info-icon">
            <i class="fa-solid fa-bed"></i>&nbsp;{{$roomDetail->bed}} / 
            <i class="fa-solid fa-house-chimney"></i>&nbsp;{{$roomDetail->pax}}
        </div>
            
        <p class="view-room-description">{{$roomDetail->description}}</p>
            
        <div class="book-now-price">
            @if(Session::has('customerlogin'))
               <a href="{{url('booking')}}">BOOK NOW<i class="fa-solid fa-circle-arrow-right"></i></a>
               @else
               <a href="{{url('customer/login')}}">BOOK NOW<i class="fa-solid fa-circle-arrow-right"></i></a>
            @endif
            
            <p class="room-price">RM {{$roomDetail->price}} per night</p>
        </div>
    </div>
</div>

<section class="amenities-info">
    <h1 class="amenities-title">Room Detail</h1>
    
    <div class="amenities-detail">
        <p>Category:<span>{{$roomDetail->roomtype->type}}</span></p>
        <span class="facilities">Facilities:&nbsp;</span>
               
        @php
            $amenities = json_decode($roomDetail->amenities)
        @endphp
          
        @foreach($amenities as $a)
            <ul class="amenities-list">
                <li><i class="fa-solid fa-check"></i>{{$a}}</li>
            </ul>        
        @endforeach
        
        <p class="amenities-pax">Pax:<span>{{$roomDetail->pax}}</p></span>
        <p>Bed:<span>{{$roomDetail->bed}}</p></span>
    </div>

    &nbsp;
</section>

<script src="/js/scrollreveal.min.js"></script>

<!--Swiper JS library-->
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
<script>
    var thumbnailRoom = new Swiper(".thumbnail-room-swiper", {
        spaceBetween: 10,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesProgress: true,
        });

    var mainRoom = new Swiper(".main-room-swiper", {
        spaceBetween: 10,
        navigation: {
        nextEl: ".room-next-btn",
        prevEl: ".room-prev-btn",
    },
    thumbs: {
        swiper: thumbnailRoom,
    },
    });

    //--- Scroll Reveal Animation ---//
    const sr = ScrollReveal({
        origin: 'top',
        distance: '100px',
        duration: 1500,
        delay: 200,
        easing: 'ease-out',
        reset: true
    })
    
    sr.reveal('.view-room-bg-content',{delay: 100})
    sr.reveal('.room-slider-container', {delay: 400, origin: 'left'})
    sr.reveal('.view-room-content', {delay: 400, origin: 'right'})
    sr.reveal('.amenities-info',{interval: 100})
</script>

@endsection('content')