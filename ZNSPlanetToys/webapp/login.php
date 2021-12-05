<?php
if  (isset($_POST["submit"]))  { 
    include  'dbconnect.php';
    $email  =  $_POST["email"];
    $pass  =  sha1($_POST["password"]);
    $stmt = $conn->prepare("SELECT * FROM table_admin WHERE email = '$email AND password = '$pass'");
    $stmt->execute();
    $number_of_rows  =  $stmt->fetchColumn();
    if  ($number_of_row >  0)  {
    session_start();
    $_SESSION["sessionid"]= session_id();
    echo  "<script> alert('Login  Success');</script>";
    echo "<script> window.location.replace ('php/mainpage.php)</script>" ;
    }  else  {
    echo  "<script>alert('Login  Failed');</script>";
    }
}    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta  charset="UTF-8">
    <meta  http-equiv="X-UA-Compatible"  content="IE=edge">
    <meta  name="viewport"  content="width=device-width,  initial-scale=1.0">
    <link  rel="stylesheet"  href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="css/style.css">
    <script src= "javaScript/script.js"></script>
    <title>Login</title>
</head>

<body onload="loadcookies()">
    <div class="w3-header  w3-display-container  w3-teal  w3-padding-32  w3-center">
    <h1 style="font-size:calc(8px  +  4vw);">ZNS PLANET TOYS</h1>
    <p style="font-size:calc(8px  +  1vw);;">THE BEST CHILDREN TOYS EVER</p>
</div>

    <div  class="w3-container  w3-padding-64 form-container">
        <div  class="w3-card-4  w3-round">
            <div  class="w3-container  w3-teal">
                <h2>Login</h2>
            </div>
              <form  name="loginForm"  class="w3-container"  action="login.php" method="post">
                <p>
                    <label  class="w3-text-black"><b>EMAIL</b></label>
                    <input  class="w3-input  w3-border  w3-round"  name="email"  type="email" id="idemail"  required>
                </p>
                <p>
                     <label  class="w3-text-black"><b>PASSWORD</b></label>
                     <input  class="w3-input  w3-border  w3-round"  name="password"  type="password" id="idpass"  required>
                </p>
                <p>
                    <input  class="w3-check"  type="checkbox"  id="idremember" name="remeber" onclick="rememberMe()">
                    <label>Remember  Me</label>
                </p>
                <p>
                    <button  class="w3-btn  w3-round  w3-teal  w3-block"  name="submit">Login</button>
                </p>
            </form>


    </div>
</div>

    <footer  class="w3-container  w3-teal  w3-center">
        <p>Copyright:  ZNS Planet Toys</p>
    </footer>



</body>

</html>