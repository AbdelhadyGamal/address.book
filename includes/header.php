<?php

?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UX-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo TITLE; ?></title>


<!-- Latest compiled and minified CSS -->

<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<link rel="stylesheet" href="styles.css">



</head>

<body style="padding-top: 60px;">
    <nav class="navbar navbar-default navbar-fixed-top navbar-inverse">


	<div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
      	<span class="sr-only">Toggle navigation</span>
      	<span class="icon-bar"></span>
      	<span class="icon-bar"></span>
      	<span class="icon-bar"></span>
	   </button>
	   <a class="navbar-brand" href="clients.php">CLIENT<strong>MANGER</strong></a>
	</div>
	<div class="collapse navbar-collapse" id="navbar-collapse">
		
		<?php
      
        
        if(isset($_SESSION['loggedInUser']))
        { ?>
		<ul class="nav navbar-nav navbar-right">
			<li>
				<a href="clients.php">My clients</a>
			</li>
			<li>
				<a href="add.php">Add Client</a>
			</li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<p class="navbar-text">Aloha, Brad!</p>
			<li>
				<a href="logout.php">log out</a>
			</li>
		</ul>
		<?php 
			}else{
		?>
			<ul class="nav navbar-nav navbar-right">
			<li>
				<a href="index.php">log in</a>
			</li>
			<?php 
				}
			?>
		</ul>

	</div>
	



	


        
	</div>
</nav>
<div class="container">



</div>
	<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
		integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
		crossorigin="anonymous"></script>
	<script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
	<script src="../../../../assets/js/vendor/popper.min.js"></script>
	<script src="../../../../dist/js/bootstrap.min.js"></script>
	<script src="../../../../assets/js/vendor/holder.min.js"></script>
	<script>
      Holder.addTheme('thumb', {
        bg: '#55595c',
        fg: '#eceeef',
        text: 'Thumbnail'
      });
    </script>

	<!-- jQueary -->
	<script scr="https://code.jquery.com/jquery-2.x-git.min.js"></script>
	<!-- Bootstrap JS -->
	<script
		scr="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script scr="http://maxcdn.bootstrapcdn.com/bootsrap.min.js">
    </script>
</body>
</html>
