<!-- Footer -->

<div class="why-choose">
    <div class="first-section row">
        <div class="teacher-training mb-4 col-12 col-md-6">
            <img src="/images/buddha.png">
            <div class="desc">
                <h4><a href="{{Route('classlist')}}">Teacher Training Sessions</a></h4>
                <span>Are you looking for Yoga Teachers Training course in Nepal where legends hold
                    the truth and heaven meets the earth? We have YTT courses taught by award ...</span>
            </div>
        </div>
        <div class="teacher-training mb-4 col-12 col-md-6">
            <img src="/images/corporate.png">
            <div class="desc">
                <h4><a href="{{Route('private')}}">Private Yoga Sessions</a></h4>
                <span>Taking a break at work with yoga has proven to be one of the most
                    effective ways in helping employees relieve stress and become . . .</span>
            </div>
        </div>
    </div>
    <div class="first-section row">
        <div class="teacher-training mb-4 col-12 col-md-6">
            <img src="/images/yoga-retreat.png">
            <div class="desc">
                <h4><a href="{{Route('packages')}}">Nepal Yoga Retreats</a></h4>
                <span>Nepal Yoga is a sanctuary tucked in the green hills of the Kathmandu valley,
                    surrounded by temples. A center where you will find, simple and....</span>
            </div>
        </div>
        <div class="teacher-training mb-4 col-12 col-md-6">
            <img src="/images/teacher-training.png">
            <div class="desc">
                <h4><a href="{{Route('yogaNepal')}}">Nepal, Home of Yoga</a></h4>
                <span>Nepal is the original home of yoga, many Eastern philosophers and deep wisdom.
                Since ancient times, thousands of yogis and Rishis (sages) have meditated and....</span>
            </div>
        </div>
    </div>
</div>
<footer class="page-footer font-small mdb-color pt-4 pb-4">
    <!-- Footer Links -->
    <div class="container text-center text-md-left">

        <!-- Footer links -->
        <div class="row text-center text-md-left mt-3 pb-3">

            <!-- Grid column -->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                <h5 class="text-uppercase mb-4 font-weight-bold">Services</h5>
                <p>
                <a href="{{ Route('classlist') }}">Classes</a>
                </p>
                <p>
                    <a href="{{ Route('class-schedule') }}">Class Schedule</a>
                </p>
                <p>
                    <a href="{{ Route('trainer') }}">Trainers</a>
                </p>
                <p>
                    <a href="{{ Route('packages') }}">Packages</a>
                </p>
                <p>
                    <a href="{{ Route('gallery') }}">Gallery</a>
                </p>
            </div>
            <!-- Grid column -->

            <hr class="w-100 clearfix d-md-none">

            <!-- Grid column -->
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                <h5 class="text-uppercase mb-4 font-weight-bold">Useful links</h5>
                <p>
                    <a href="{{ Route('about') }}">About Us</a>
                </p>
                <p>
                    <a href="{{ Route('private') }}">Private Session</a>
                </p>
                <p>
                    <a href="{{route('privacy')}}">Privacy Policy</a>
                </p>
                <p>
                    <a href="{{ Route('contact') }}">FAQs and Contact</a>
                </p>
            </div>

            <!-- Grid column -->
            <hr class="w-100 clearfix d-md-none">

            <!-- Grid column -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                <h5 class="text-uppercase mb-4 font-weight-bold">Contact</h5>
                <p>
                    <i class="fas fa-home mr-3"></i> Bhagwhan Bhahal 26</p>
                <p>
                    <i class="fas fa-envelope mr-3"></i> info@karnaliyoga.com</p>
                <p>
                    <i class="fas fa-phone mr-3"></i>+01 4701833</p>
                <p>
                    <i class="fas fa-phone mr-3"></i> + 977 9851214726</p>
            </div>
            <hr class="w-100 clearfix d-md-none">
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                <h5 class="text-uppercase mb-4 font-weight-bold">Yogalife</h5>
                <p>Sawar Meditation and Yoga Center is an authorized tested place, which provides knowledge on meditation and yoga.</p>

                <form class="footer-subs" action="{{Route('newsletter.store')}}" method="post">
                    <input class="email" type="email" placeholder="Enter your email address" name="user_email">
                    {{ csrf_field() }}
                    <input class="subscribe" type="submit" value="Subscribe">
                </form>
            </div>
  
           
            <!-- Grid column -->

        </div>
        <!-- Footer links -->

        <hr>

        <!-- Grid row -->
        <div class="row d-flex align-items-center">

            <!-- Grid column -->
            <div class="col-md-7 col-lg-8">

                <!--Copyright-->
                <p class="text-center text-md-left">© 2019 Copyright:
                    All Rights Reserved By<strong> YogaLife </strong>Website Powered By
                    <strong> Yashri Pvt.Ltd</strong>
                </p>

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-5 col-lg-4 ml-lg-0">

                <!-- Social buttons -->
                <div class="text-center text-md-right">
                    <ul class="list-unstyled list-inline">
                        <li class="list-inline-item">
                            <a class="btn-floating btn-sm rgba-white-slight mx-1">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="btn-floating btn-sm rgba-white-slight mx-1">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="btn-floating btn-sm rgba-white-slight mx-1">
                                <i class="fab fa-google-plus-g"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="btn-floating btn-sm rgba-white-slight mx-1">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
            <!-- Grid column -->

        </div>
        <!-- Grid row -->

    </div>
    <!-- Footer Links -->
</footer>
<!-- Footer -->