@extends('frontend/frontendLayout')
@section('title','Room')
@section('content')

<link rel="stylesheet" href="/css/frontend/style-room.css">
<link rel="stylesheet" href="/css/frontend/style-home.css">
<script src="/js/custom/main.js"></script>

<section class="room-page-bg">
    <div class="room-bg-content flex-center">
        <h1>Room</h1>
        <div class="line">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <p>Book your stay with us, and you'll be happy to come back</p>
    </div>
</section>

<section class="section room-listing">
    <div class="room-list-container">
        @foreach($room as $r)  
            <div class="rooms">
                @foreach($r->roomimgs as $index => $img) 
                    <div class="rooms-img">
                        @if($index > 0)
                            <img class="hide" style="display:none;" src="{{asset('storage/room/'.$img->img_src)}}" alt="" >
                        @else
                            <img class="" src="{{asset('storage/room/'.$img->img_src)}}" alt="" >
                        @endif
                    </div>
                @endforeach

                <div class="rooms-info">
                    <p>{{$r->roomtype->type}}</p>
                    <h1>{{$r->title}}</h1>
                    <div class="rooms-info-icon">
                        <i class="fa-solid fa-bed"></i>{{$r->bed}} / 
                        <i class="fa-solid fa-house-chimney"></i>{{$r->pax}}
                    </div>

                    <p class="room-description">{{$r->description}}</p>

                    <div class="read-more-price">
                        <a href="{{url('viewRoom/'.Str::slug($r->title).'/'.$r->id)}}">Read More<i class="fa-solid fa-circle-arrow-right"></i></a>
                        <p class="room-price">RM {{$r->price}} per night</p>
                    </div>
                </div>
            </div>
        @endforeach

        {{$room->links()}}
    </div>
</section>

<script src="/js/scrollreveal.min.js"></script>
<script>
/* --- Scroll Reveal --- */
const sr = ScrollReveal({
  origin: 'top',
  distance: '100px',
  duration: 1500,
  delay: 200,
  easing: 'ease-out',
  reset: true
})

sr.reveal('.room-bg-content',{delay: 100})
sr.reveal('.rooms',{interval: 100})

</script>
@endsection('content')