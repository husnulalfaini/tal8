<!DOCTYPE html>
<html>
<head>
	<title>Login pengguna web porang</title>
	<link rel="stylesheet" href="{{asset('public/asset/dist/css/login_native.css')}}">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<img class="wave" src="{{asset('public/asset/dist/img/wave.png')}}">
	<div class="container">
		<div class="img">
			<img src="{{asset('public/asset/dist/img/bg.svg')}}">
		</div>
		<div class="login-content">
		<form action="{{route('reset') }}" method="post">
          @csrf
				<img src="{{asset('public/asset/dist/img/avatar.svg')}}">
           		<div class="input-div user">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<input type="name" class="form-control" name="name" placeholder="Nama">
           		   </div>
           		</div>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-envelope"></i>
           		   </div>
           		   <div class="div">
           		   		<input type="email" class="form-control" name="email" placeholder="Email">
           		   </div>
           		</div>
           		<div class="input-div telepon">
           		   <div class="i">
           		   		<i class="fas fa-phone"></i>
           		   </div>
           		   <div class="div">
           		   		<input type="number" class="form-control" name="telepon" placeholder="Telepon">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<input type="password" class="form-control" name="password" placeholder="password">
            	   </div>
            	</div>
            	<input type="submit" class="btn" value="Reset">
            </form>
        </div>
    </div>
    <script src="{{asset('public/asset/dist/js/login_native.js')}}"></script>
</body>
</html>
