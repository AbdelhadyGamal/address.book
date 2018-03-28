<?php

 

    if (isset($_COOKIE[session_name()])) {
        
        setcookie(session_name(),'',time()-86400,'/');
        
    }
    
    session_unset();

//session_destroy();
/*
echo "You've been logged out! See you next time <br>";


echo "<p><a href='login.php'>log back in</a></p>";*/
   include('includes/header.php');
?>
<h1>Logged out</h1>
<p class="lead">You've benn logged out. See you next time!</p>
<p><a href='index.php'>log back in</a></p>
<?php 
include('includes/footer.php');
?> 