<?php
session_start();
ob_start();
// including database connection file
require('env/database.php');

if(isset($_COOKIE['user']))
{
  $data = unserialize($_COOKIE['user']);
  $email = $data['email'];
  $session_id = $data['session_id'];
 

 

  // checking if session id is correct
  $sql = "SELECT * FROM session WHERE email = '$email' AND session_id='$session_id'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $expdate = $row['exp_date'];
  $expiry_timestamp = strtotime($expdate);
  if (time() > $expiry_timestamp) {
    setcookie("customer", "", time() - 3600, "/");
    echo"<script>alert('Your session has expired. Please login again.')</script>";
    echo"<script>window.location.href='login.php'</script>";
    

} else {
    // setting session variable for customer
    $_SESSION['customer'] = $email;

    // if customer redirecting to  index page
    echo "<script>window.location.href='index.php'</script>";
  }

}


  


// if user is logged in, redirect to index page
if (isset($_SESSION['user'])) {
  header('location: user_index.php');
exit;
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Login</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="icon" type="image/x-icon" href="assets/svg-logo/logo1.svg">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/db79afedbd.js" crossorigin="anonymous"></script>
    <script src="jquery.js"></script> 
    <link rel='stylesheet' type='text/css' media='screen' href='assets/css/main.css'>
    
</head>
<body>
  <!-- ----------------------------------------------------Loading Screen-------------------------------------------------------- -->
     <div id="loading"></div>
     <script>
         var loader =document.getElementById("loading");
         window.addEventListener("load",function(){
             loader.style.display="none";
         })
     </script>


<!-------------------------------------------------body----------------------------------------------------------->
<style>
  .divider:after,
  .divider:before {
  content: "";
  flex: 1;
  height: 1px;
  background: #eee;
  }
  .h-custom {
  height: calc(100% - 73px);

  }
  @media (max-width: 450px) {
    .h-custom {
    height: 100%;
    }

  }
</style>


  <div class="container-fluid mt-5">
    <div class="row d-flex justify-content-center align-items-center ">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="assets/image/login-logo.svg"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form method="post">

        <div class="divider d-flex align-items-center my-4">
            <H2 class="text-center">Login</H2>
          </div>

          <!-- Email input -->
          <div class="form-outline mb-4">
          <label class="form-label" for="form3Example3">Email address</label>
            <input type="email" name="email" id="form3Example3" class="form-control form-control-lg"
              placeholder="Enter a valid email address" />
            
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
          <label class="form-label" for="form3Example4">Password</label>
            <input type="password" name="pass" id="form3Example4" class="form-control form-control-lg"
              placeholder="Enter password" />            
          </div> 

          <!-- show captcha -->
          <div class="form-outline mb-3">
            <label class="form-label" for="form3Example4">Captcha</label><br>
            <img src="captcha.php" alt="captcha" /><br><br>

            <!-- input captcha  -->
            <input type="text" name="captcha" id="form3Example4" class="form-control form-control-lg"
              placeholder="Enter Captcha Code" />            
          </div>
          
          <!-- remember me -->
          <div class="form-check mb-2">
            <input
              class="form-check-input me-2"
              type="checkbox"
              value=""
              id="form2Example3"
              name = "remember"
            />
            <label class="form-check-label" for="form2Example3"> Remember me </label>
            </div>
          
          <!-- Submit button -->
          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" name="login" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
              

          </div>
          <div class="mt-5">
            <p class="text-center">Don't have an account? <a href="register.php">Register</a></p>
          </div>
        </form>
      </div>
    </div>
  </div>  

<div class="d-flex justify-content-center">
  
            <p>
              Made with
              <i class="fa-solid fa-heart fa-beat" style="color: #ff0000;"></i>
              in India
            </p>

 
</div>

<!----------------- footer  -------------->

</body>
</html>
<?php
    $session_id = substr(str_shuffle("23456789abcdefghjkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ"), 0, 10);
    // checking if login button is clicked
    if(isset($_POST['login'])){

      // checking if captcha is correct
      if($_SESSION['captcha'] == $_POST['captcha']){

        // getting email and password from form
        $email = $_POST['email'];
        $password = $_POST['pass'];
        $password =md5($password);

        // fetching user details from database
        $sql = "SELECT * FROM user WHERE user_email = '$email'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        // taking user type and password from database
        $pass = $row['user_pass'];

        // checking if user is seller and matching password
        if($row['user_type'] == 'Seller' && $pass == $password){
            session_start();
            unset($_SESSION['captcha']);
             // if remember me is checked
          if(isset($_POST['remember'])){
            // Create an array with multiple data
            $data = array(
              'email' => $email,
              'session_id' => $session_id,
              'user_type' => 'Seller'
            );

            // Serialize the array into a string
            $data_string = serialize($data);

            // setting cookie for customer
            setcookie("seller", $data_string, time() + (7 * 24 * 60 * 60) , "/");

            // Set the duration of the cookie (in seconds)
            $cookie_duration = 7 * 24 * 60 * 60; // 7 days

            // Calculate the expiry timestamp
            $expiry_timestamp = time() + $cookie_duration;

            // Convert the expiry timestamp to a SQL date format
            $expiry_date = date('Y-m-d H:i:s', $expiry_timestamp);
            //delete previous session id from database
            $sql = "DELETE FROM session WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);

            // updating session id in database
            $sql = "INSERT INTO session (session_id, email, exp_date) VALUES ('$session_id', '$email', '$expiry_date')";
            $result = mysqli_query($conn, $sql);

            // setting session variable for seller
            $_SESSION['seller'] = $row['user_email'];

            // if seller redirecting to seller index page
            echo "<script>window.location.href='app/seller_index.php'</script>";
          }
          else{
            // setting session variable for seller
            $_SESSION['seller'] = $row['user_email'];

            // if seller redirecting to seller index page
            echo "<script>window.location.href='app/seller_index.php'</script>";
          }
        }

        // checking if user is customer and matching password
        else if($row['user_type'] == 'Customer' && $pass == $password){
          session_start();
          unset($_SESSION['captcha']);

          // if remember me is checked
          if(isset($_POST['remember'])){
            // Create an array with multiple data
            $data = array(
              'email' => $email,
              'session_id' => $session_id,
              'user_type' => 'Customer'
            );
            if($row['2fa']== 'ON'){
              $_SESSION['remember'] = 'ON';
              $_SESSION['email'] = $email;
              $_SESSION['data'] = $data;
              $otp = rand(100000,999999);
              $_SESSION['2faotp'] = $otp;
            include 'smtp.php';
            $mail->addAddress($email);     //Add a recipient
            
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'OTP for Login';
            $mail->Body    = 'OTP for Login is - '.$otp;

            if($mail->send()){
              echo "<script>alert('OTP sent to your email')</script>";
              echo "<script>window.location.href='twoFa.php'</script>";
              exit;
            }
            else{
              echo "<script>alert('Something went wrong')</script>";
              echo "<script>window.location.href='login.php'</script>";
              exit;
            }
            }

          

            // Serialize the array into a string
            $data_string = serialize($data);

            // setting cookie for customer
            setcookie("customer", $data_string, time() + (7 * 24 * 60 * 60) , "/");

            // Set the duration of the cookie (in seconds)
            $cookie_duration = 7 * 24 * 60 * 60; // 7 days

            // Calculate the expiry timestamp
            $expiry_timestamp = time() + $cookie_duration;

            // Convert the expiry timestamp to a SQL date format
            $expiry_date = date('Y-m-d H:i:s', $expiry_timestamp);
            //delete previous session id from database
            $sql = "DELETE FROM session WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);

            // updating session id in database
            $sql = "INSERT INTO session (session_id, email, exp_date) VALUES ('$session_id', '$email', '$expiry_date')";
            $result = mysqli_query($conn, $sql);

            // setting session variable for customer
            $_SESSION['customer'] = $row['user_email'];

            // if customer redirecting to  index page
            echo "<script>window.location.href='index.php'</script>";

          }else{
            if($row['2fa']== 'ON'){
              $_SESSION['remember'] = 'OFF';
              $_SESSION['email'] = $email;
              $otp = rand(100000,999999);
              $_SESSION['2faotp'] = $otp;
            include 'smtp.php';
            $mail->addAddress($email);     //Add a recipient
            
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'OTP for Login';
            $mail->Body    = 'OTP for Login is - '.$otp;

            if($mail->send()){
              echo "<script>alert('OTP sent to your email')</script>";
              echo "<script>window.location.href='twoFa.php'</script>";
              exit;
            }
            else{
              echo "<script>alert('Something went wrong')</script>";
              echo "<script>window.location.href='login.php'</script>";
              exit;
            }
            }

            // setting session variable for customer
            $_SESSION['customer'] = $row['user_email'];

            // if customer redirecting to  index page
            echo "<script>window.location.href='index.php'</script>";
          }
        }else{
            echo "<script>alert('Invalid Email or Password')</script>";
        }
      }
      else{
          echo "<script>alert('Invalid Captcha')</script>";
      }
    }
    ob_end_flush();
?>