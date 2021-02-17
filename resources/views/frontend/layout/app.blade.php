<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{asset('images/favicon/favicon.png')}}" type="image/png" sizes="16x16">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    {{--<title>Yogalife</title>--}}
    <style>
        [data-toggle="collapse"] .fa:before {  
content: "\f068";
}

[data-toggle="collapse"].collapsed .fa:before {
content: "\f067";
}
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title','Yogalife')</title>
</head>
<body>
@include('sweetalert::alert')
@include('frontend.layout.header')

@yield('content')
@include('frontend.layout.footer')

<script src="{{asset('js/app.js') }}"></script>
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
<script>
    baguetteBox.run('.tz-gallery');
</script>
  
</body>
</html>