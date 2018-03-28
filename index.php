<?php
define("TITLE", "Client Address Book");
session_start();
$loginError = " ";
$formEmail="";
$formPass="";
include ('includes/functions.php');
include ('includes/connection.php');

if (isset($_POST['login'])) {

    // create variable
    // warp data with validate function

    $formEmail = validateFormData($_POST['email']);
    $formPass = validateFormData($_POST['password']);

    // connect to database

    // create query

    $query = "SELECT name,password FROM users WHERE email= '$formEmail' ";
    $result = mysqli_query($conn, $query);


    // verify if result is returned
    // mysqli_num_rows($result)>0
    if (mysqli_num_rows($result)>0) {

        // store basic user data in variables
        while ($row = mysqli_fetch_assoc($result)) {
            $name = $row['name'];
            $hashedPass = $row['password'];
            // code...
        }

        // verify hashed password with submitted password
        if (password_verify($formPass, $hashedPass)) {
            // correct login details!
            // store data in session variables
            $_SESSION['loggedInUser'] = $name;

            // redirect user to clients page
            header("Location: clients.php");
        } else {
            $loginError = "<div class='alert alert-danger'>Wrong username / password comination. Try again.<a class='close' data-dismiss='alert'>&times;</a></div>";
        }
    } else {
        $loginError = "<div class='alert alert-danger'>No such user in database.Please Try again.<a class='close' data-dismiss='alert'>&times;</a></div>";
    }
}
mysqli_close($conn);

include ('includes/header.php');

/*
 * // To create a hashed password
 * $password= password_hash("abc123",PASSWORD_DEFAULT);
 * echo $password;
 */
?>






<!--

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UX-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo TITLE; ?></title>
<!-- Latest compiled and minified CSS --/>
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<link rel="stylesheet" href="styles.css">

</head>
-->
<body>
	<div class="container">
		<h1><?php echo TITLE;?></h1>



		<p class="lead">Log in to your account.</p>

	<?php echo $loginError;?>
        	<form class="form-inline"
			action="<?php echo(htmlspecialchars($_SERVER['PHP_SELF'])); ?>"
			method="post">
			<div class="form-group">
				<label for="login-email" class="sr-only">Email</label> <input
					id="login-email" type="text" class="form-control"
					placeholder="email" name="email" value="<?php echo $formEmail;?>">
			</div>
			<div class="form-group">
				<label for="login-password" class="sr-only">Password</label> <input
					id="login-password" type="password" class="form-control"
					placeholder="password" name="password">
			</div>


			<button type="submit" class="btn btn-primary" name="login">Login</button>

		</form>
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
