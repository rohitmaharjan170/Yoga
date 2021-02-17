@extends('frontend.layout.app')
@section('title','About us')
@section('content')
<div class="banner mb-3 row" style="background-color:#f7f9f9;">
   <div class="saying col-12 col-md-6">
      <h1 class="about-title pt-5" style="font-family: Bebas Neue; ">ABOUT US</h1> 
   </div>
   <img class="banner-image col-12 col-md-6" src="{{ asset('images/gyoga.png') }}"
      alt="banner">
</div>
<div class="aboutus d-flex mx-5 mt-5">
   <div class="about-img">
      <img src="images/about1.jpg">
   </div>
   <div class="about" align="justify" style="font-size:1.1em; line-height: 1.7em;">
      KarnaliYoga is a meditation and yoga center, which empowers people by providing knowledge on meditation and yoga. This center is established in 2019 November 18 in Kathmandu. Doing meditation and yoga in this center will help you in mental peace, physical health, self-power, willpower etc.
           <br>
      We have big hearts and a deep love of yoga, coming together to bring yoga right to you. 
      All our trainers are very knowledgeable and qualified in several fields and are expertise. At Yogalife, we do not only teach yoga, we seek to create a yoga community where we can share daily matters, stress at work or problems in life. Yoga is the great recipe to communicate and balance your mind and body.
     <br>
     
      We also try to fulfill the social responsibility by donating 1% of each booking of the package. This way we try to do a little contribution in society by donating to orphanage,
      old age home, help homeless and poor people etc.
      Therefore, join us to heal your pain, stress, improve your mental and physical health, change the perspective to live life.
      
   </div>
</div>
<div class="vision d-flex my-5 mx-5">
   <div class="our_vision p-4"  align="center"  style="background-color:#e7f2f1; flex:2;">
      <div class="title ">
         <h2>OUR VISION</h2>
      </div>
      <div class="vision-img mb-2">
         <img  align="center" height="12%" width="12%" src="{{ asset('images/yellow_vision.png') }}">
      </div>
      <span class="vision-detail">Our vision is as simple as it is profound to empower as many people as possible to live a happier and more fulfilling lifestyle.
      Yogalife is founded with our passion for yoga and we would love to spread that love to more and more people.
      </span>     
   </div>
   <div class="donation p-4"  style="background-color:#e7f2f1; flex:1;"  align="center">
      <div class="title ">
         <h2>DONATION</h2>
      </div>
      <div class="vision-img mb-2 p-2">
         <img height="20%" width="20%" src="{{ asset('images/donation.png') }}">
      </div>
      <span class="donation-detail">
      One percent of each booking of a package will be donated to orphanage, old age home, homeless and poor people.
      </span> 
   </div>
</div>
@endsection