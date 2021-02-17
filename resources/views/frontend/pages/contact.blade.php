@extends('frontend.layout.app')
@section('title','Contact us')
@section('content')

<div class="banner-contact" style="background-color:ghostwhite; height:275px;"  >
     <div class="contact-title d-flex flex-column" align="center">
        <h1 class="con-title pt-5" style="font-family: Bebas Neue; ">CONTACT US</h1>
        <img src="/images/yogaicon.png" class="yoga-icon mt-4" >
      </div>
</div>

<div class="con_form  d-flex mb-4">
   <div class="contact-details col-lg-6 px-md-5" >
      Here are the contact details of our center. you can place any of your enquiry through email, phone or you can visit our center as well.
      <div class="details my-4">
         <div class="d-flex details1">
            <div class="col-lg-6 details-sec mr-2 py-4" align="center">
               <i class="fas fa-search-location fa-lg p-3"></i>
               <h5 class="aboutus-footer-title font-weight-bold  pb-2">Address</h5>
               <h6>Chaksibari, Thamel</h6>
               <h6>Kathmandu</h6>
            </div>
            <div class="col-lg-6 details-sec py-4" align="center">
               <i class="fas fa-phone-alt p-3 fa-lg"></i>
               <h5 class="aboutus-footer-title font-weight-bold  pb-2">Contact</h5>
               <h6>9876544333</h6>
               <h6>01 456677</h6>
            </div>
         </div>
         <div class="d-flex mt-4 details2" >
            <div class="col-lg-6 details-sec mr-2 py-4" align="center">
               <i class="fas fa-envelope fa-lg p-3"></i>
               <h5 class="aboutus-footer-title font-weight-bold  pb-2">Email</h5>
               <h6>ityashri@gmail.com</h6>
            </div>
            <div class="col-lg-6 details-sec py-4" align="center">
               <i class="fas fa-globe fa-lg p-3"></i>
               <h5 class="aboutus-footer-title font-weight-bold  pb-2">Web</h5>
               <h6>www.yashri.com</h6>
            </div>
         </div>
      </div>
   </div>
   <div class="form col-lg-6 px-md-5">
     <h1 class="any-enquiry"> Do you have any enquiry?</h1>
      <form class="form mt-4 contact-form-flex"  action=" {{ route('enquiry.store') }} " method="post"  onsubmit="javascript:alert('Successfully done');">
         @csrf
         <div class="form-group">
            <input type="text" class="form-control" placeholder="Full name" name="name" required> 
            <span style="color:red">{{$errors->first('name')}}</span>
         </div>
         <div class="form-group ">
            <input type="email" class="form-control mt-4" placeholder="Email" name="email" required> 
            <span style="color:red">{{$errors->first('email')}}</span>
         </div>
         <div class="form-group ">
            <input type="text" class="form-control mt-4" placeholder="Subject" name="subject" required> 
            <span style="color:red">{{$errors->first('subject')}}</span>
         </div>
         <div class="form-group">
            <textarea class="form-control rounded-0 mt-4" placeholder="Enter description here" id="exampleFormControlTextarea1" rows="5" name="description" required></textarea>
            <span style="color:red">{{$errors->first('description')}}</span>
         </div>
         <button type="submit" class="btn btn-default btn-block booking-btn" align="center" > Submit</button>
      </form>
   </div>
</div>

<div class="faq mb-5">
   <h1 class="mb-5" style="font-family: 'Titillium web'">Frequently Asked Questions</h1>
   <div class="questions">
     <div class="q1">
      <a class="collapsed row justify-content-between m-0 p-0" style="color: #000;" href="#faq1" data-toggle="collapse" aria-expanded="false">
         <div class="h5 col-10 p-0">
            I'm Not Flexible, Can I Do Yoga?
         </div>
         <div class="lead col-1 d-flex justify-content-end p-0">
            <i class="fa" aria-hidden="true"></i>
         </div>
      </a>
     </div> <hr>
     <div class="collapse" id="faq1">
      <div class=" card-body mb-4">
         Yes, you can. It is not required for one to be flexible in order to practice yoga.
         Our classes are designed to help beginners practice yoga so come as you are and we will 
         help you find balance and flexibity within.
      </div>
   </div>
    
     <div class="q2">
      <a class="collapsed row justify-content-between m-0 p-0" style="color: #000;" href="#faq2" data-toggle="collapse" aria-expanded="false">
         <div class="h5 col-10 p-0">
            What do I need to begin?
         </div>
         <div class="lead col-1 d-flex justify-content-end p-0">
            <i class="fa" aria-hidden="true"></i>
         </div>
      </a>
     </div> <hr>
      <div class="collapse" id="faq2">
         <div class=" card-body mb-4">
            All you need is a bit of excitement and willingness to start yoga.
            But it wil be helpful to have a pair of yoga leggings, or shorts along
            with a t-shirt that's not too baggy.
            You will be barefoot during yoga so no special footgear is required.
            It will be better if you bring your own towel and yoga mat although they 
            are provided in class.
         </div>
      </div>
   <div class="q3">
      <a class="collapsed row justify-content-between m-0 p-0" style="color: #000;" href="#faq3" data-toggle="collapse" aria-expanded="false">
         <div class="h5 col-10 p-0">
            How can I book a yoga retreat?
         </div>
         <div class="lead col-1 d-flex justify-content-end p-0">
            <i class="fa" aria-hidden="true"></i>
         </div>
      </a>
   </div> <hr>
   <div class="collapse" id="faq3">
      <div class=" card-body mb-4">
         To book a retreat click on the retreats link in the navigation menu and
         select the retreat you want to book. This will open the detail page of selected
         retreat where you can click book now button to book the retreat.

         You can also call us or email us to book a retreat.
      </div>
   </div>
   <div class="q4">
      <a class="collapsed row justify-content-between m-0 p-0" style="color: #000;" href="#faq4" data-toggle="collapse" aria-expanded="false">
         <div class="h5 col-10 p-0">
            Can I cancel a booked retreat package?
         </div>
         <div class="lead col-1 d-flex justify-content-end p-0">
            <i class="fa" aria-hidden="true"></i>
         </div>
      </a>
   </div> <hr>
   <div class="collapse" id="faq4">
      <div class=" card-body mb-4">
         To cancel booked retreat contact us by phone or email.
         *It might take more than 2 business days to respond to your email.
      </div>
   </div>
   <div class="q5">
      <a class="collapsed row justify-content-between m-0 p-0" style="color: #000;" href="#faq5" data-toggle="collapse" aria-expanded="false">
         <div class="h5 col-10 p-0">
            I am pregnant, can I do yoga?
         </div>
         <div class="lead col-1 d-flex justify-content-end p-0">
            <i class="fa" aria-hidden="true"></i>
         </div>
      </a>
   </div> <hr>
   <div class="collapse" id="faq5">
      <div class=" card-body mb-4">
         Yes, you can but please check with your doctors before starting yoga.
         If your doctor approves. You can check our prenatal and postnatal yoga classes.
      </div>
   </div>
   </div>

</div>


@endsection