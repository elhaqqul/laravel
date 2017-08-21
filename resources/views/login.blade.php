<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
  
  
  
      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
  <body>
	<div class="login">
		<div class="login-screen">
			<div class="app-title">
				<h1>Login</h1>
			</div>

			<div class="login-form">
				<form action="login" method="post">
					<div class="control-group">
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<input type="text" class="login-field" value="" name="username" placeholder="username" id="login-name">
					<label class="login-field-icon fui-user" for="login-name"></label>
					</div>

					<div class="control-group">
					<input type="password" class="login-field" value="" name="password" placeholder="password" id="login-pass">
					<label class="login-field-icon fui-lock" for="login-pass"></label>
					</div>

					<button class="btn btn-primary btn-large btn-block" href="#" type="submit">login</button>
					<a class="login-link" href="#">Lost your password?</a>
				</form>
				<?php
					if(Session::has('msg')){
						echo "<p style='color:red;'>Username Or password Invalid</p>";
					}
				?>
			</div>
		</div>
	</div>
</body>
  
  
</body>
</html>
