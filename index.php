<?php
//include 'global.php';
//$session_username= $_SESSION['username'];
//$entity = new Entity;
//if("login"){
   if(isset($_POST['login'])){
    //get for data
   // echo "Welcome to Bucket<br>";
   // $username = strip_tags($_POST["username"]);
       $con=mysqli_connect("localhost", "root", "", "phplogin");
       if (mysqli_connect_errno($con))
    {
        echo "MySql Error: " . mysqli_connect_error();
        }
    $username = mysql_real_escape_string($_POST['username']);
     session_start();
  //$x = 100;
  $_SESSION['sessionVar'] = $username;
  //echo "$x";
    $password = strip_tags($_POST["password"]);
    $missing = '<font color="red">Username or password missing!</font>';
    $inc = '<font color="red">User not exist!</font>';
    $pas = '<font color="red">Incorrect password!</font>';
   // $login;
    
    if(!$username||!$password){
        echo $missing;
    }
    else{
        //log in
       // $login=  mysql_query("SELECT username FROM phplogin WHERE username='$username'");
        $login=mysqli_query($con,"SELECT * FROM phplogin WHERE username LIKE '$username'");
        $count=mysqli_num_rows($login);
        echo 'Rows found = ';
        echo $count;
    if ($count==0)
    {
        echo $inc;
    }
        else{
            while ($login_row = mysqli_fetch_assoc($login)){
                //get database password
                $password_db=$login_row['password'];
                //encript form password
                $password=md5($password);
                //check password
                if($password!=$password_db){
                    echo $pas;
                }
                else{
                    //check if active
                   // $active=$login_row['activate'];
                    $active=1;
                    $email=$login_row['email'];
                    if($active==0){
                        echo "You have'nt activated your account, please check your email($email)";
                    }
                    else{
                        $_SESSION['username']=$username;//assign session
                        header("Location: login.php");//refresh
                        
                    }
                }
            }
        }
    }
     mysqli_close($con);
}

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
  <h1>Welcome to Bucket</h1>
  <p>Write Username and Password.</p>
  
</body>
       <form action='index.php' method='POST'>
               username: <input type='text' name='username'><br>
               Password: <input type='password' name='password'><br>
               <input type='submit' name="login" value='login'>
               
               
        </form>  <p>
            <a 
               
                href="register.php"><re>Register<re>
                
        </a>


</html>
