<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xml:lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Cows And Bulls</title>
	<meta content="text/html; charset=utf-8" http-equiv="content-type" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Bootstrap -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<script src="assets/js/jquery.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<style>
		input:focus 
		{
    		outline:0px !important;
    		-webkit-appearance:none;
        }
        a:focus 
		{
    		outline:0px !important;
    		-webkit-appearance:none;
        }
        button:focus 
		{
    		outline:0px !important;
    		-webkit-appearance:none;
        }
	</style>
	<script type="text/javascript">
	function signInModalBringUp()
	{
		$('#signInModal').modal('toggle');
	}

	function signUpModalBringUp()
	{
		$('#signUpModal').modal('toggle');
	}

	function validateSignUp()
	{
		var username = document.getElementById('signUpUsername').value;
		var pass1 = document.getElementById('signUpPass1').value;
		var pass2 = document.getElementById('signUpPass2').value;
		if(username == "" || pass1 == "" || pass2 == "")
		{
			alert('Fields cannot be left blank.');
			return false;
		}
		if(pass1 != pass2)
		{
			alert('Passwords don\'t match.');
			document.getElementById('signUpPass1').value="";
			document.getElementById('signUpPass2').value="";
			return false;
		}

		$.post("signUp.php", { username: username, password: pass1 })
		.done(function(data)
		{	
			if(data == 'success')
				window.location = 'options.php';
			else
				alert('Registration failed.\n'+data);
		});
	}

	function validateSignIn()
	{
		var username = document.getElementById('signInUsername').value;
		var pass = document.getElementById('signInPassword').value;
		if(username == "" || pass == "")
		{
			alert('Fields cannot be left blank.');
			return false;
		}
		$.post("signIn.php", { username: username, password: pass })
		.done(function(data)
		{	
			if(data == 'success')
				window.location = 'options.php';
			else
			{
				alert('Login failed.\n'+data);
				document.getElementById('signInPassword').value="";
			}
		});
	}
	</script>
</head>
<body>
	<!-- Carousel -->
	<div id="carousel-example-generic" class="carousel slide">
		<!-- Navbar -->
		<span style='margin:20px'></span>
		<div class="navbar-wrapper">
      	<div class="container">
	
        	<div class="navbar navbar-inverse ">
          	<div class="container">
            	<div class="navbar-header">
              	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                	<span class="icon-bar"></span>
                	<span class="icon-bar"></span>
                	<span class="icon-bar"></span>
              	</button>
              	<a class="navbar-brand" href="javascript:void(0);">Cows and Bulls</a>
            	</div>
            	<div class="navbar-collapse collapse">
              	<ul class="nav navbar-nav">
                	<li class="active"><a href="index.php">Home</a></li>
                	<li><a href="#aboutModal" data-toggle="modal">About</a></li>
                	<li><a href="https://github.com/architshukla/Cows-And-Bulls">Fork Us!</a></li>
              	</ul>
              	<ul class="nav navbar-nav navbar-right">
              		&nbsp;
              		<button class='btn btn-info navbar-btn' onclick="signUpModalBringUp()">Sign Up!</button>
              		&nbsp;
              		<button class='btn btn-success navbar-btn' onclick="signInModalBringUp()">Sign In</button>
              	</ul>
            	</div>
          	</div>
        	</div>
       	</div>
    	</div>

  		<!-- Indicators -->
  		<ol class="carousel-indicators">
    		<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    		<li data-target="#carousel-example-generic" data-slide-to="1"></li>
    		<li data-target="#carousel-example-generic" data-slide-to="2"></li>
  		</ol>

  		<!-- Wrapper for slides -->
  		<div class="carousel-inner">
    		<div class="item active" align='center'>
      			<img id='carouselImage1' src="assets/img/1.jpg" alt="Practice" height="600" width="545">
      			<div class="carousel-caption">
        		<h2 class='text-primary'><strong>Hone Your Skills!</strong></h2>
        		<h3>Practice against the computer.</h3>
        		<input type='button' class='btn btn-primary btn-lg' value='Start Now!'>
        		<br>
      			</div>
    		</div>
    		<div class="item" align='center'>
      			<img id='carouselImage2' src="assets/img/2.jpg" alt="Double1" height="600" width="545">
      			<div class="carousel-caption">
        		<h2 class='text-primary'><strong>Play With a Friend!</strong></h2>
        		<h3>Challenge your friends to a game.</h3>
        		<input type='button' class='btn btn-primary btn-lg' value='Start Now!'>
        		<br>
      			</div>
    		</div>
    		<div class="item" align='center'>
      			<img id='carouselImage3' src="assets/img/3.jpg" alt="Double2" height="600" width="545">
      			<div class="carousel-caption">
        		<h2 class='text-primary'><strong>Fastest Guesser First!</strong></h2>
        		<h3 >Guess the word in lesser tries than your opponent.</h3>
        		<input type='button' class='btn btn-primary btn-lg' value='Start Now!'>
        		<br>
        		</div>
      		</div>
    	</div>
  		
  		<!-- Controls -->
  		<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
    		<span class="icon-prev"></span>
  		</a>
  		<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
    		<span class="icon-next"></span>
  		</a>
	</div>

  <!-- Sign In Modal -->
	<div class="modal fade" id="signInModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    	<div class="modal-dialog">
      		<div class="modal-content">
        	<div class="modal-header">
          	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          	<h4 class="modal-title">Sign In Form</h4>
        	</div>
        	<div class="modal-body">
          		<form>
          			<input type="text" id='signInUsername' class="form-control" placeholder='Enter Your Username' autofocus>
          			<br>
          			<input type="password" id='signInPassword' class="form-control" placeholder='Enter Your Password'>
          			<br>
          			<input type="button" class='btn btn-success' value='Log In!' onclick="validateSignIn()">
          			<input type="reset" class='btn btn-default' value='Clear'>
          		</form>
        	</div>
        	<div class="modal-footer">
          		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        	</div>
      	</div>
    	</div>
  	</div>

  	<!-- Sign Up Modal -->
	<div class="modal fade" id="signUpModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    	<div class="modal-dialog">
      		<div class="modal-content">
        	<div class="modal-header">
          	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          	<h4 class="modal-title">Sign Up Form</h4>
        	</div>
        	<div class="modal-body">
          		<form>
          			<input type="text" id='signUpUsername' class="form-control" placeholder='Enter A Username'>
          			<br>
          			<input type="password" id='signUpPass1' class="form-control" placeholder='Enter A Password'>
          			<br>
          			<input type="password" id='signUpPass2' class="form-control" placeholder='Re-enter Password'>
          			<br>
          			<input type="button" class='btn btn-info' value='Register' onclick='validateSignUp()'>
          			<input type="reset" class='btn btn-default' value='Clear'>
          		</form>
        	</div>
        	<div class="modal-footer">
          		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        	</div>
      	</div>
    	</div>
  	</div>

  	<!-- About Modal -->
	<div class="modal fade" id="aboutModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    	<div class="modal-dialog">
      		<div class="modal-content">
        	<div class="modal-header">
          	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          	<h4 class="modal-title">About - Cows and Bulls</h4>
        	</div>
        	<div class="modal-body">
          		<p> Cows and Bulls </p>
          		<!-- TODO -->
        	</div>
        	<div class="modal-footer">
          		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        	</div>
      	</div>
    	</div>
  	</div>
  	<script>
  		$('.carousel').carousel({interval: 5000});
  	</script>
</body>
</html>