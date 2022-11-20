
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sign in</title>
  <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/cosmo/bootstrap.min.css" rel="stylesheet" integrity="sha384-qdQEsAI45WFCO5QwXBelBe1rR9Nwiss4rGEqiszC+9olH1ScrLrMQr1KmDR964uZ" crossorigin="anonymous">
  <style>
    .wrapper{ 
      width: 500px; 
      padding: 20px; 
    }
    .wrapper h2 {text-align: center}
    .wrapper form .form-group span {color: red;}
  </style>
  
      <script src="https://www.google.com/recaptcha/api.js" async defer></script>
	  <script>
	  $('input$submit_code').on('click', function(){
		  var google_code = $('input$google_code).val();
		  if (google_code.length > 4) {
			  $.post('ajax/log2fa.php',{google_code: google_code}, function(result) {
				  if (result == 1) {
					  $('div$login_status').text('Logged in!);
					  #('div$login_form').hide();
				  }else{
					  $('div$login status').text("Login Failed!");
				  }
			  });
		  }
	  });
	  </script>
</head>
<body>
  <main>
    <section class="container wrapper">
      <h2 class="display-4 pt-3">Login</h2>
          <p class="text-center">Please fill this form to create an account.</p>
          <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <div class="form-group <?php (!empty($username_err))?'has_error':'';?>">
              <label for="username">Username</label>
              <input type="text" name="username" id="username" class="form-control" value="<?php echo $username ?>">
              <span class="help-block"><?php echo $username_err;?></span>
            </div>

            <div class="form-group <?php (!empty($password_err))?'has_error':'';?>">
              <label for="password">Password</label>
              <input type="password" name="password" id="password" class="form-control" pattern="(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,15}" title="Must contain at least one number and one uppercase and lowercase letter, special symbol and at least 8 or more characters" requireds value="<?php echo $password ?>">
              <span class="help-block"><?php echo $password_err;?></span>
            </div>
			 <div class="g-recaptcha" data-sitekey="6LeC0B8jAAAAAGU5mUukWLA_xJOkZnU2WZxNGozi"></div>
            <div class="form-group">
				<?php 
					if ($_SESSION["login_attempts"]>2)
					{
						$_SESSION["locked"] = time();
					echo "<p>Please wait for 30 seconds</p>";
					} else {
					
				?>
				
              <input type="submit" class="btn btn-block btn-outline-primary" value="login">
					<?php }?>
            </div>
            <p>Don't have an account? <a href="register.php">Sign in</a>.</p>
          </form>
    </section>
  </main>
</body>
</html>