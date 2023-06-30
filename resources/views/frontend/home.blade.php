@extends('frontend/frontendLayout')
@section('title','Traders')
@section('content')

<link rel="stylesheet" href="/css/frontend/style-home.css">

<!--- Landing Page --->
<section class="home">
    <div class="swiper homepage-bg-slider">
        <div class="swiper-wrapper">
            <div class="swiper-slide landing-page-swiper-slide">
                <img style="filter:brightness(70%);" src="images/frontend/home/bg1.jpg" alt="">

                <div class="text-content">
                    <h2 class="title">Traders Hotel</h2>
                    <p>A welcome retreat in the heart of the city. Traders, always your choice!</p>
               </div>
            </div>

            <div class="swiper-slide landing-page-swiper-slide dark-layer">
                <img style="filter:brightness(70%);" src="images/frontend/home/bg2.jpg" alt="">

                <div class="text-content">
                    <h2 class="title">Kuala Lumpur</h2>
                    <p>A modern and exotic capital city of Malaysia waiting for you to explore.</p>
                </div>
            </div>

            <div class="swiper-slide landing-page-swiper-slide dark-layer">
                <img style="filter:brightness(70%);" src="images/frontend/home/bg3.jpg" alt="">

                <div class="text-content">
                    <h2 class="title">Stunning View</h2>
                    <p>Every room at our hotel offers not just a high level of comfort, but also an amazing city view.</p>
                </div>
            </div>

            <div class="swiper-slide landing-page-swiper-slide">
                <img style="filter:brightness(70%);" src="images/frontend/home/bg4.jpg" alt="">

                <div class="text-content">
                    <h2 class="title">Best Dishes</h2>
                    <p>At our restaurant, we offer a variety of dishes inspired by world cuisines and cooked by real professionals.</p>
                </div>
            </div>
        </div>
    </div>
   
    <div class="prev-next-arrow">
        <div class="swiper-button-next landing-page-next"></div>
        <div class="swiper-button-prev landing-page-prev"></div>
    </div>
   
    <div class="homepage-bg-slider-thumbs">
        <div class="swiper-wrapper thumbs-container">
           <img src="images/frontend/home/bg1.jpg" class="swiper-slide landing-page-swiper-slide" alt="">
           <img src="images/frontend/home/bg2.jpg" class="swiper-slide landing-page-swiper-slide" alt="">
           <img src="images/frontend/home/bg3.jpg" class="swiper-slide landing-page-swiper-slide" alt="">
           <img src="images/frontend/home/bg4.jpg" class="swiper-slide landing-page-swiper-slide" alt="">
        </div>
    </div>
</section>
   
<!--- About Us --->
<section class="section home-about">
    <div class="heading flex-center">
        <h1>WELCOME</h1>
        <h2>Traders Hotel</h2>
    </div>

    <div class="about-container flex-center">
        <div class="left"></div>

        <div class="right">
            <div class="content">
                <h1>About Us</h1>
                <p>Traders Hotel Kuala Lumpur by Shangri-La is located in the heart of Kuala Lumpur City Centre (KLCC) and offers the panoramic view of the Petronas Twin Towers, KLCC Park and the city's skyline.</p>
                <a href="" class="btn">Read More</a>
            </div>
        </div>
    </div>
</section>

<!--- VIDEO --->
<!--- <section class="video">
    <h2 class="video-title">Video Tour</h2>
   
    <div class="video-container container">
        <p class="video-description">Find out more with our video of the most beautiful and pleasant places for you and your family.</p>
   
        <div class="video_content">
            <video id="video-file">
                <source src="video/description.mp4" type="video/mp4">
            </video>
   
            <button class="button button--flex video_button" id="video-button">
                <i class="ri-play-line video_button-icon" id="video-icon"></i>
            </button>
        </div>
    </div>
</section> --->

<!--- ROOMS --->
<section class="section home-rooms">
    <div class="container">
        <div class="heading flex-center">
            <h1>EXPLORE</h1>
            <h2>Our Rooms</h2>
        </div>

        <div class="room-container swiper">
            <div class="swiper-wrapper"> 
                @foreach($room as $r)
                    <article class="popular-room-card swiper-slide"> 
                        @foreach($r->roomImgs as $index=>$img) 
                            <div class="images">
                                @if($index > 0)
                                    <img class="zoom" style="display:none;" src="{{asset('storage/room/'.$img->img_src)}}" alt="" >
                                @else
                                    <img class="zoom" src="{{asset('storage/room/'.$img->img_src)}}" alt="" >
                                @endif
                            </div>
                        @endforeach

                    <div class="popular-room-data">
                        <div class="popular-room-data-price">
                            <div class="popular-room-type-price">
                                <span class="popular-room-title"><span>{{$r->title}}
                                <div class="home-rooms-info-icon">
                                    <i class="fa-solid fa-bed"></i>{{$r->bed}} 
                                    &nbsp;<i class="fa-solid fa-house-chimney"></i>{{$r->pax}}
                                    </div>
                                </div>

                                <p class="popular-room-description">{{$r->description}}</p>

                                <div class="popular-room-readMore">
                                    <a href="{{url('viewRoom/'.Str::slug($r->title).'/'.$r->id)}}">Read More</a>
                                    <i class="fas fa-angle-right"></i>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <!--- Add Pagination -->
            <div class="swiper-room-btn">
                <div class="swiper-button-next room-next">
                    <i class='bx bx-chevron-right' ></i>                        
                </div>

                <div class="swiper-button-prev room-previous">
                    <i class='bx bx-chevron-left'></i>   
                </div>
            </div>
        </div>
    </div>
</section>
      
<!--- Services --->
<section class="section home-service">
    <div class="heading flex-center">
        <h1>Services</h1>
        <h2>Amenities</h2>
    </div>

    <div class="wrapper">
        <div class="center-line"></div>
            <div class="row row-1">
                <section>
                    <i class="icon fa-solid fa-wifi"></i>
                        <div class="details">
                            <span class="title">High-Speed Wi-Fi</span>
                        </div>
                    <p>We provide our guests with free high-speed Wi-Fi connection throughout the whole hotel area.</p>
                </section>
            </div>

            <div class="row row-2">
                <section>
                    <i class="icon fa-solid fa-spa"></i>
                        <div class="details">
                            <span class="title">Spa</span>
                        </div>
                    <p>The spa and wellness facilities include a sauna and treatment rooms. All massages, manicures/pedicures and facials are free</p>            
                </section>
            </div>

            <div class="row row-1">
                <section>
                    <i class="icon fa-solid fa-person-swimming"></i>
                        <div class="details">
                            <span class="title">Swimming Pool</span>
                        </div>
                    <p>One of the main attractions at the hotel is our extensive, luxurious 100-metres indoor swimming pool.</p>
                </section>
            </div>

            <div class="row row-2">
                <section>
                    <i class="icon fa-solid fa-gear"></i>
                        <div class="details">
                            <span class="title">Room Service</span>
                        </div>
                    <p>Room Service is 24 hours available. You can order the breakfast menu from 6.30 am until 11.00 am or other delights from the Restaurant Menu until 23.00.</p>
                </section>
            </div>

            <div class="row row-1">
                <section>
                    <i class="icon fa-solid fa-dumbbell"></i>
                        <div class="details">
                            <span class="title">Fully Equipped Fitness Room</span>
                        </div>
                    <p>Provide plenty amount of gym equipped for guests to continue your workout routines while traveling.</p>
                </section>
            </div>

            <div class="row row-2">
                <section>
                    <i class="icon fa-solid fa-square-parking"></i>
                        <div class="details">
                            <span class="title">On Site Free Parking</span>
                        </div>
                    <p>No Worry About Your Transportation! We provide one slot of free parking for our guests. It will be convenient, especially in our city</p>
                </section>
            </div>

            <div class="row row-1">
                <section>
                    <i class="icon fa-solid fa-champagne-glasses"></i>
                        <div class="details">
                            <span class="title">Champagne Bar</span>
                        </div>
                    <p>An abundance of champagne will give your hotel a lavish and glamorous atmosphere. We will roll out a cart of choice champagne to give you some added splendor during your stay.</p>
                </section>
            </div>

            <div class="row row-2">
                <section>
                    <i class="icon fa-solid fa-shirt"></i>
                        <div class="details">
                            <span class="title">Laundry Services</span>
                        </div>
                    <p>Support to refresh your wardrobes mid-trip. Folding services as well, including the delivery of freshly-folded clothes back to your rooms.</p>
                </section>
            </div>
</section>

<!--- Newsletter Section --->
<section class="section home-newsletter">
    <div class="newsletter-container">
        <div class="newsletter-wrapper">
            <h2>Subscribe to our Newsletter</h2>
            <p class="normal-para">Subscribe to receive email updates on new events announcement, speical promotions, gift ideas and more!</p>
                <form action="" method="" class="subscribe-form">                         
                    <div class="email-box">
                        <i class="fas fa-envelope"></i>
                        <input class="box" type="text" name="userEmail" value="" placeholder=" Enter your email">
                        <input class="sub-btn" name="subscribe" type="submit" value = "Subscribe">
                    </div>

                    <div class="error-msg animated tada">
                        <span></span>
                    </div>
                </form>
        </div>
    </div>
</section>
      
<!--React Gallery Slider-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/react/17.0.1/umd/react.production.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/react-dom/17.0.1/umd/react-dom.production.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/classnames/2.2.6/index.min.js"></script>

<!--Swiper JS library-->
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
<script>
    /*--- Room Swiper ---*/
    var roomSwiper = new Swiper(".room-container", {
        effect: 'coverflow',
        spaceBetween: 150, 
        centeredSlides: true,
        slidesPerView: 'auto',
        grabCursor: 'true',
        loop: true,
        coverflowEffect: {
            rotate: 0,
            slideShadows: false,
        },

        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },

        navigation: {
            nextEl: ".room-next",
            prevEl: ".room-previous",
        },
    });

    /* Scroll Reveal Animation */
    const sr = ScrollReveal({
        origin: 'top',
        distance: '60px',
        duration: 1500,
        delay: 200,
        easing   : 'ease-in-out',
        })
        
        sr.reveal('.heading, .video-title, .video-description',{  delay: 200})
        sr.reveal('.left, .right, .video__content, .places',{origin: 'left', delay: 300})
        sr.reveal('.room-container', {scale: 0.7, duration: 1000, delay: 800} )
        sr.reveal('.wrapper', {delay: 800,  duration: 1000, origin: 'bottom'})
</script>

@endsection
