<?php
	// Initialize session
	session_start();

	if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] !== false) {
		header('location: login.php');
		exit;
	}    
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome</title>
	<link href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/cosmo/bootstrap.min.css" rel="stylesheet" integrity="sha384-qdQEsAI45WFCO5QwXBelBe1rR9Nwiss4rGEqiszC+9olH1ScrLrMQr1KmDR964uZ" crossorigin="anonymous">
	<style>
        .wrapper{ 
        	width: 500px; 
        	padding: 20px; 
        }
        .wrapper h2 {text-align: center}
        .wrapper form .form-group span {color: red;}
	</style>
</head>
<body>
	<main>
		<section class="container wrapper">
			<div class="page-header">
				<h2 class="display-5">2FA <?php echo $_SESSION['username']; ?></h2>
			</div>

			
			<a href="password_reset.php" class="btn btn-block btn-outline-warning">Reset Password</a>
			<a href="logout.php" class="btn btn-block btn-outline-danger">Sign Out</a>
			
			<div id = "login_status"> Not logged in</div>
			<div class="s">
			Token : <input type="text" id"google_code">
			<input type="submit" id="submit_code">
			<script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>
			<script>
	  $('input#submit_code').on('click', function(){
		  var google_code = $('input#google_code').val();
		  
			  $.post('generate.php',{google_code: google_code}, function(checkResult) {
				  if ($checkResult = "OK") {
					  $('div#login_status').text('Logged in!');
					  $('div#login_form').hide();
				  }else{
					  $('div#login_status').text("Login Failed!");
				  }
			  });
		  
	  });
	  </script>
		</section>
	</main>
</body>
</html>