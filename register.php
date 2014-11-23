<?php
echo "<h1>Register </h1>";
$submit = isset($_POST["submit"]);
//form data
$fullname =  strip_tags("fullname");
$username = strip_tags("username");
$password = strip_tags("password");
$repeatpassword = strip_tags("repeatpassword");
$email=  strip_tags("email");
$date=  date("Y-M-D");
    $pass = '<font color="red">You password doesnot match!</font>';

 //md5("sarwan");//to encript


if($submit){
 //echo "$username/$password/$repeatpassword/$fullname"   ;
 //check for existance
    if($fullname&&$username&&$password&&$repeatpassword&&$email){
      
      if($password==$repeatpassword){
          //check char length
          if(strlen($username)>25||  strlen($fullname)>25){
        echo"Max limite Exceeded";
    }
 else {
    //check password length
     if(strlen($password)>25||strlen($password)<6){
         echo 'Password must be greater then 6 and smaller then 25 characters';
         
     }
 else {
     //encript password
        $password=md5($password);
      $repeatpassword=md5($repeatpassword);
     
    //open database
      $connect=  mysql_connect("localhost","root","");
      mysql_select_db("phplogin");
       //check duplicate username
      $check=  mysql_query("SELECT * FROM phplogin WHERE username='$username'");
      if(mysql_num_rows($check)>=1){
          echo 'Username already exists';
      }
      else {
          //generate randome code
          $code= rand(11111111, 99999999);
          //send activation email
          $to= $email;
          $subject="Activate your account";
          $header="From : Sarwan pasha";
          $body="Hellow $username,\n\nYou have registered and need to activate your account,\nClick on the link to activate\n\nhttp://localhost/PhpProject2/activate.php?code=$code\n\nThanks";
          if(!mail($to, $subject, $body,$header)){
              echo 'We could not signup this time, please try again later';
          }
          else{
             $register= mysql_query("
            INSERT INTO phplogin VALUES('','$fullname','$username','$password','$date','$email','$code','0')
            ");
           echo "You have been register successfully! please check your email($email) to activate your account";
           die ('\n<a href="index.php"> Return to login page</a>');
          }
             
           }
        }
            
    
    }
      }
      else{
          echo $pass;
      }
    
   
      
    }
 else {
    echo"please fill in <b>all</b> fields";    
    }
}
?>
<html>
    <head>
<style>
  body {background-color:lightgray}
  h1   {color:blue}
</style>
</head>
    <form action="register.php" method="POST">
        <table>
    
            <tr>
                <td>
                Your full name:
                </td>
                <td> 
                    <input type="text" name="fullname" value="<?php echo $fullname; ?>">
                </td>
               
            </tr>
            <tr> 
             <td>
                Chose a username:
                </td>
                <td> 
                    <input type="text" name="username" value="<?php echo $username; ?>">
                </td>
            </tr>
              <tr> 
             <td>
                Choose a Password:
                </td>
                <td> 
                    <input type="password" name="password">
                </td>
            </tr>
              <tr> 
             <td>
                Repeat password:
                </td>
                <td> 
                    <input type="password" name="repeatpassword">
                </td>
            </tr>
             <tr> 
             <td>
                Email:
                </td>
                <td> 
                    <input type="text" name="email">
                </td>
            </tr>

    </table>
        <p>
           <input type="submit" name="submit" value="Register">

</form>
    
    
    
</html>
