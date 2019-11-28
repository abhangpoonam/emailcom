<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset='utf-8'>
<meta name='viewport' content='width=device-width,initial-scale=1'>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>




@include('css') {{-- Include css file --}}  
<title>@yield('title')</title>
</head>
<body>
	
    @include('header') {{-- Include sidebar file --}}  
  
  <div class="main">
  
    
    @yield("middle_content")
  </div>

</body>
</html>