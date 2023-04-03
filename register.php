<?php
  session_start();
  // including database file
  require('env/database.php');
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Register</title>
    <link rel="icon" type="image/x-icon" href="assets/image/logo.svg">

    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
    />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script
      src="https://kit.fontawesome.com/db79afedbd.js"
      crossorigin="anonymous"
    ></script>
    <script src="jquery.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/main.css" />
  </head>
  <body>
    <!------------------------------------------------------Loading Screen-------------------------------------------------------- -->
     <div id="loading"></div>
     <script>
         var loader =document.getElementById("loading");
         window.addEventListener("load",function(){
             loader.style.display="none";
         })
     </script>
     
    <!-------------------------------------------------body----------------------------------------------------------->
    <div class="container-fluid mt-2">
       
        <div class="row d-flex justify-content-center align-items-center ">
          <div class="col col-xl-10">
            <div class="card" style="border-radius: 1rem">
              <div class="row g-0 align-items-center">
                <div class="col-md-6 col-lg-5 d-md-block ">
                  <img
                    src="assets/image/register-logo.svg"
                    alt="register form"
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
                        class="fw-normal mb-2 pb-2"
                        style="letter-spacing: 1px"
                      >
                      Create your account
                      </h5>

                      <div class="my-2 d-flex">
                        <div class="form-floating col-6 pe-1">
                          <input
                            type="text"
                            class="form-control"
                            id="floatingInputFname"
                            placeholder="First Name"
                            name="fname"
                          />
                          <label for="floatingInputFname">First Name</label>
                        </div>

                        <div class="form-floating col-6 ps-1">
                          <input
                            type="text"
                            class="form-control"
                            id="floatingInputLname"
                            placeholder="Last Name"
                            name="lname"
                          />
                          <label for="floatingInputLname">Last Name</label>
                        </div>
                      </div>
                      <div class="form-floating my-2">
                        <input
                          type="email"
                          class="form-control"
                          id="floatingInput"
                          placeholder="name@example.com"
                          name="email"
                        />
                        <label for="floatingInput">Email address</label>
                      </div>
                      <div class="form-floating my-2">
                        <input
                          type="password"
                          class="form-control"
                          id="floatingPassword"
                          placeholder="Password"
                          name="pass"
                        />
                        <label for="floatingPassword">Password</label>
                      </div>
                      <div class="form-floating my-2">
                        <input
                          type="password"
                          class="form-control"
                          id="floatingPassword1"
                          placeholder="Confirm Password"
                          name="cpass"
                        />
                        <label for="floatingPassword1">Confirm Password</label>
                      </div>
                      <img src="captcha.php" alt="captcha" />
                      <div class="form-floating my-2">
                        <input
                          type="text"
                          class="form-control"
                          id="floatingPassword"
                          placeholder="Captcha"
                          name = "captcha"
                        />
                        <label for="floatingPassword">Captcha</label>
                      </div>
                    
                      <div class="pt-1 mb-1">
                        <button
                          class="btn btn-dark btn-lg btn-block"
                          type="submit"
                          name="register"
                        >
                          Register
                        </button>
                      </div>
                      <p class="mb-1 pb-lg-1" style="color: #393f81">
                        Already have an account?
                        <a href="index.php" style="color: #393f81">Login Here</a>
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
