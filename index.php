<?php
session_start();

// including database connection file
require('env/database.php');

//check cookie
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
    setcookie("user", "", time() - 3600, "/");
    echo"<script>alert('Your session has expired. Please login again.')</script>";
    echo"<script>window.location.href='index.php'</script>";
    

} else {
    // setting session variable for customer
    $_SESSION['user'] = $email;

    // if customer redirecting to  index page
    echo "<script>window.location.href='app/user_index.php'</script>";
  }

}


  


// if user is logged in, redirect to index page
if (isset($_SESSION['user'])) {
  header('location: app/user_index.php');
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
    <link rel="icon" type="image/x-icon" href="assets/image/logo.svg">

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
<!----------------------------login Form---------------------------->

    <div class="container-fluid mt-2">
    
        <div class="row d-flex justify-content-center align-items-center ">
          <div class="col col-xl-10">
            <div class="card" style="border-radius: 1rem">
              <div class="row g-0 align-items-center">
                <div class="col-md-6 col-lg-5 d-md-block ">
                  <img
                    src="assets/image/login-logo.svg"
                    alt="login form"
                    class="img-fluid"
                    
                   
                     />
                  </div>
                  <div class="col-md-6 col-lg-7 d-flex align-items-center">
                   <div class="card-body p-4 p-lg-5 text-black">
                    <form method = "post" action="manage_user.php">
                      <div class="d-flex align-items-center mb-3 pb-1">
                        <img
                          src="assets/image/logo-1.svg"
                          alt=""
                          width="70"
                          class="me-3"
                        />
                        <span class="h2 fw-bold mb-0">Astron</span>
                      </div>

                      <h5
                        class="fw-normal mb-3 pb-3"
                        style="letter-spacing: 1px"
                      >
                        Sign into your account
                      </h5>

                      <div class="form-floating my-3">
                        <input
                          type="email"
                          class="form-control"
                          id="floatingInput"
                          placeholder="name@example.com"
                          name = "email"
                          value="demo@mail.com"
                        />
                        <label for="floatingInput">Email address</label>
                      </div>
                      <div class="form-floating my-3">
                        <input
                          type="password"
                          class="form-control"
                          id="floatingPassword"
                          placeholder="Password"
                          name = "pass"
                          value="12345"
                        />
                        <label for="floatingPassword">Password</label>
                      </div>
                      <img src="captcha.php" alt="captcha" />
                      <div class="form-floating my-3">
                        <input
                          type="text"
                          class="form-control"
                          id="floatingPassword"
                          placeholder="Captcha"
                          name = "captcha"
                        />
                        <label for="floatingPassword">Captcha</label>
                      </div>
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

                      <div class="pt-1 mb-2">
                        <button
                          class="btn btn-dark btn-lg btn-block"
                          type="submit"
                          name = "login"
                        >
                          Login
                        </button>
                        </div>

                      
                      <p class="mb-5 pb-lg-2" style="color: #393f81">
                        Don't have an account?
                        <a href="register.php" style="color: #393f81">Register here</a>
                      </p>
                      
                    </form>
                    </div>
                   </div>
                   <div class="row">
                    <div class="col-12">
                      <div class="text-center">
                      <p class=" mb-1">
                     Made with
                     <i class="fa-solid fa-heart fa-beat" style="color: #ff0000;"></i>
                      in India
                      </p>
                      </div>
                    </div>
                 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

</div>

</body>
</html>
