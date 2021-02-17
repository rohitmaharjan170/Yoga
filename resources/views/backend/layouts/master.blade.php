<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf_token" content="{{csrf_token() }}">

    <title>Yoga Admin Panel</title>

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="icon" href="{{asset('images/favicon/favicon.png')}}" type="image/png" sizes="16x16">
    <link rel="stylesheet"
          href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
       <style>
           [data-toggle="collapse"] .fa:before {  
  content: "\f139";
}

[data-toggle="collapse"].collapsed .fa:before {
  content: "\f13a";
}
       </style>
    <script src="{{ asset('plugins/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">

    <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="box-shadow:none;">

        <!-- Left navbar links -->
        <ul class="navbar-nav ml-auto admin-navigation">

            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
            </li>
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false" v-pre>
                    <span class="caret"> {{Auth::user()->name}}</span>
                   
                    <i class="fas fa-chevron-down"></i></a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('admin.logout') }}"
                       onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('admin.logout') }}" method="get" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>

        </ul>


        <!-- Right navbar links -->

    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{route('openingindex')}}" class="brand-link text-center">
            <span class="brand-text font-weight-light">YogaLife</span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item">

                        <a href="{{ route('admin.dashboard')}}" class="nav-link" active-class="active">
                            <i class="fas fa-box mr-2"></i>&nbsp;

                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/yogakarnalipanel/userlist" class="nav-link " active-class="active">
                        <i class="fas fa-chalkboard-teacher mr-2"></i>&nbsp;
                        <p>Users</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/yogakarnalipanel/package" class="nav-link" active-class="active">
                            <i class="fas fa-box mr-2"></i>&nbsp;
                            <p>Package</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/yogakarnalipanel/bookingdetail" class="nav-link" active-class="active">
                            <i class="fas fa-book-reader mr-2"></i>&nbsp;
                            <p>Booking</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/yogakarnalipanel/homeslider" class="nav-link" active-class="active">
                            <i class="fas fa-sliders-h mr-2"></i>&nbsp;
                            <p>Slider</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/yogakarnalipanel/enquiry" class="nav-link" active-class="active">
                            <i class="fas fa-comment-alt mr-2"></i>&nbsp;
                            <p>Enquiry</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/yogakarnalipanel/galleries" class="nav-link" active-class="active">
                            <i class="fas fa-photo-video mr-2"></i>&nbsp;
                            <p>Gallery</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/yogakarnalipanel/instructor" class="nav-link" active-class="active">
                            <i class="fas fa-chalkboard-teacher mr-2"></i>
                            <p>Instructor</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/yogakarnalipanel/class-schedule" class="nav-link " active-class="active">
                            <i class="fas fa-calendar-week mr-2"></i>&nbsp;
                            <p>Classes Table</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/yogakarnalipanel/yogatype" class="nav-link " active-class="active">
                            <i class="fab fa-yoast mr-2"></i>&nbsp;
                            <p>Yoga Types</p>
                        </a>
                    </li>
                    
                </ul>
            </nav>

            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">


        @yield('content')

    </div>


    <!-- Main Footer -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2019-2022 <a href="yashrisoft.com">Yashri Soft Pvt. Ltd</a>.</strong> All rights
        reserved.
    </footer>
</div>
<!-- ./wrapper -->

<script src="{{asset('js/app.js')}}"></script>

<script>
    CKEDITOR.replace('description-ckeditor');
    CKEDITOR.replace('overview-ckeditor');
    CKEDITOR.replace('iteneraries-ckeditor');
    CKEDITOR.replace('cost-ckeditor');
    CKEDITOR.replace('information-ckeditor');
</script>
<script>
    // Instructor
    $('#edit').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget) // Button that triggered the modal
        var name = button.data('myname')
        var designation = button.data('mydesignation')
        var description = button.data('mydescription')
        var instructor_id = button.data('instructorid')
        var modal = $(this)

        modal.find('.modal-body #name').val(name);
        modal.find('.modal-body #designation').val(designation);
        modal.find('.modal-body #description').val(description);
        modal.find('.modal-body #instructor_id').val(instructor_id);

    })
    $('#show').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget) // Button that triggered the modal
        var name = button.data('myname')
        var designation = button.data('mydesignation')
        var description = button.data('mydescription')
        var instructor_id = button.data('instructorid')
        var image_src = button.data('myimage')
        var modal = $(this)

        modal.find('.modal-body #name').text(name);
        modal.find('.modal-body #designation').text(designation);
        modal.find('.modal-body #description').text(description);
        modal.find('.modal-body #instructor_id').val(instructor_id);
        modal.find('.modal-body #image').attr('src', image_src);
})

    $('#bookingShow').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget) // Button that triggered the modal
    var name = button.data('myname')
    var email = button.data('myemail')
    var mobileNo = button.data('mobileno')
    var country = button.data('country')
    var description = button.data('mydescription')
    var booking_id = button.data('bookingid')
    var issuedate = button.data('issuedate')
    var modal = $(this)

    modal.find('.modal-body #name').text(name);
    modal.find('.modal-body #email').text(email);
    modal.find('.modal-body #mobileNo').text(mobileNo);
    modal.find('.modal-body #country').text(country);
    modal.find('.modal-body #description').text(description);
    modal.find('.modal-body #issuedate').text(issuedate);
    modal.find('.modal-body #booking_id').val(booking_id);

    })

    $('#yogaTypeShow').on('show.bs.modal', function (event) {

var button = $(event.relatedTarget) // Button that triggered the modal
var name = button.data('myname')
var description = button.data('mydescription')
var image_src = button.data('myimage')
var modal = $(this)
modal.find('.modal-body #name').text(name);
modal.find('.modal-body #description').text(description);
modal.find('.modal-body #image').attr('src', image_src);
})

    $('#delete').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget) // Button that triggered the modal

        var instructor_id = button.data('instructorid')
        var modal = $(this)

        modal.find('.modal-body #instructor_id').val(instructor_id);

    })


    // YogaClass
    $('#classedit').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget) // Button that triggered the modal
        var time = button.data('mytime')
        var sunday = button.data('sun')
        var monday = button.data('mon')
        var tuesday = button.data('tue')
        var wednesday = button.data('wed')
        var thursday = button.data('thurs')
        var friday = button.data('fri')
        var saturday = button.data('sat')
        var yogaclass_id = button.data('yogaclassid')
        var modal = $(this)

        modal.find('.modal-body #time').val(time);
        modal.find('.modal-body #sunday').val(sunday);
        modal.find('.modal-body #monday').val(monday);
        modal.find('.modal-body #tuesday').val(tuesday);
        modal.find('.modal-body #wednesday').val(wednesday);
        modal.find('.modal-body #thursday').val(thursday);
        modal.find('.modal-body #friday').val(friday);
        modal.find('.modal-body #saturday').val(saturday);
        modal.find('.modal-body #yogaclass_id').val(yogaclass_id);

    })

    $('#classdelete').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget) // Button that triggered the modal

        var yogaclass_id = button.data('yogaclassid')
        var modal = $(this)
        modal.find('.modal-body #yogaclass_id').val(yogaclass_id);

    })

    // YogaType
    $('#typeedit').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget) // Button that triggered the modal
        var name = button.data('myname')
        var description = button.data('mydescription')
        var yogatype_id = button.data('yogatypeid')
        var modal = $(this)

        modal.find('.modal-body #name').val(name)
        modal.find('.modal-body #description').val(description);
        modal.find('.modal-body #yogatype_id').val(yogatype_id);

    })

    $('#typedelete').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget) // Button that triggered the modal

        var yogatype_id = button.data('yogatypeid')
        var modal = $(this)

        modal.find('.modal-body #yogatype_id').val(yogatype_id);

    })
    //
    $('#packagedelete').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget) // Button that triggered the modal
        var package_id = button.data('packageid')
        var action_delete =  'package/' + package_id
        var modal = $(this)
        modal.find('.modal-body #package_id').val(package_id);
        modal.find('.modal-content #modal-form').attr('action', action_delete);

    })
    $('#bookingDelete').on('show.bs.modal', function (event) {

var button = $(event.relatedTarget) // Button that triggered the modal
var booking_id = button.data('bookingid')
var action_delete =  'bookingdetail/' + booking_id
var modal = $(this)
modal.find('.modal-body #booking_id').val(booking_id);
modal.find('.modal-content #modal-form').attr('action', action_delete);

})

$('#sliderDelete').on('show.bs.modal', function (event) {

var button = $(event.relatedTarget) // Button that triggered the modal
var slider_id = button.data('sliderid')
var action_delete =  'homeslider/' + slider_id
var modal = $(this)
modal.find('.modal-body #slider_id').val(slider_id);
modal.find('.modal-content #modal-form').attr('action', action_delete);
})

$('#enquiriesDelete').on('show.bs.modal', function (event) {

var button = $(event.relatedTarget) // Button that triggered the modal
var enquiries_id = button.data('enquiriesid')
var action_delete =  'enquiry/' + enquiries_id
var modal = $(this)
modal.find('.modal-body #enquiries_id').val(enquiries_id);
modal.find('.modal-content #modal-form').attr('action', action_delete);

})

$('#galleriesDelete').on('show.bs.modal', function (event) {

var button = $(event.relatedTarget) // Button that triggered the modal
var galleries_id = button.data('galleriesid')
var action_delete =  'galleries/' + galleries_id
var modal = $(this)
modal.find('.modal-body #galleries_id').val(galleries_id);
modal.find('.modal-content #modal-form').attr('action', action_delete);

})
    $(document).ready(function () {
        $('#table').DataTable();
    });


</script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script
        src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js">
</script>

@include('sweetalert::alert')

</body>
</html>
