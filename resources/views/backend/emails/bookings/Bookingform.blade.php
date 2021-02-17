@component('mail::message')

# THANK YOU FOR BOOKING OUR PACKAGE.

<br>Here are all the details about booking of a package.
<br><br><br><strong>Package Name:</strong>&nbsp;{{$data['package_name']}}
<br><br><strong>Person's Name:</strong>&nbsp;{{$data['name']}}
<br><br><strong>Email:</strong>&nbsp;{{$data['email']}}
<br><br><strong>Mobile Number:</strong>&nbsp;{{$data['mobileNo']}}
<br><br><strong>Country:</strong>&nbsp;{{$data['country']}}
<br><br><strong>Description:</strong>&nbsp;{{$data['description']}}
<br><br><strong>Issue:</strong>&nbsp;{{$data['description']}}

{{-- <br><br><strong>Package Id:</strong>&nbsp;{{$data['package_id']}} --}}


@endcomponent
