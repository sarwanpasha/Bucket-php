<?php
$Color = "green";
 session_start();
  $username = $_SESSION['sessionVar'];
  echo '<div style="Color:'.$Color.'">'.'Welcome '.$username.'</div>';
?>
<html>
<head>
<style>
  body {background-color:lightgray}
  h1   {color:blue}
  p    {color:green}
  re   {color:blue }
</style>
</head>

<body>
    <p>You have logged_in Successfully .</p>
    <form action="login.php" method="POST">
        <a href="logout.php"style="color:green ;position:absolute; top:10px; left:1270px" name="log_out" value="Sign out">Logout</a>    
        </form>
  <h1>Welcome to PASHA's Bucket</h1>
  <textarea
 input type='text' name='text_area' class="longInput" cols="165" rows="35">
Welcome to Sarwan pasha;s website, i am sure this will be a great experiance for you, Please give your feedbacks
  </textarea>
   <textarea readonly>
Welcome to Sarwan pasha;s website, i am sure this will be a great experiance for you, Please give your feedbacks
   </textarea> 

  
</body>
      


</html>
