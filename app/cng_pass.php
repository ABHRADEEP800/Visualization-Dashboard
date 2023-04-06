<?php
require('../env/database.php');
session_start();
//chceck user login or not
if(!isset($_SESSION['user'])){
    header("Location:../index.php");
}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="icon" type="image/x-icon" href="../assets/image/logo.svg">
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"/>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"
    ></script>
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
    ></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="../assets/css/main.css" />
</head>

<?php
//including navbar
    include 'navbar.php';
?>

<body>
    <!-- ----------------------------------------------------Loading Screen-------------------------------------------------------- -->
     <div id="loading"></div>
     <script>
         var loader =document.getElementById("loading");
         window.addEventListener("load",function(){
             loader.style.display="none";
         })
     </script>

    <!-- ----------------------------------------------------Main Content-------------------------------------------------------- -->
    <?php
    //get data from session
            $email=$_SESSION['user']; // Get the admin email from the session.
        ?>

               <!--------- Change pass form------>
                <div class="d-flex justify-content-center mt-2">
                <div class="card col-lg-6 col-md-6 col-sm-11 mt-4">
                <div class="card-header">
                    <h3 class="mb-0 text-center">Change Password</h3>
                </div>
                    <div class="card-body">
                    <form method="post" enctype="multipart/form-data">
                <div class="flex mx-auto  " >
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form4Example1">Email</label>
                        <input type="text" name="email" id="form4Example1" value="<?=$email?>" disabled class="form-control" />
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form4Example2">Enter Old Password</label>
                        <input type="password" name="old_pass" id="form4Example2" placeholder="Enter Old Password" class="form-control" />
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form4Example2">Enter New Password</label>
                        <input type="password" name="new_pass" id="form4Example2" placeholder="Enter new Password" class="form-control" />
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form4Example3">Confirm Password</label>
                        <input type="password" class="form-control" name="cnf_pass" id="form4Example3" placeholder="Retype Password" rows="4"></input>
                    </div>
                </div>
                <!-- Submit button -->
                <div class="d-flex justify-content-center">
                    <button type="submit" name="update" class="btn btn-primary btn-block  mb-4">Change Password</button>
                    </div>
                    </form>
                    </div>
                  </div>
               
            
              </div>
            </div>
    

<?php
if(isset($_POST["update"])) 
{ 
    $sql="SELECT * FROM user WHERE email='$email'"; // Check if the old password is correct.
    $result=mysqli_query($conn,$sql); 
    $row=mysqli_fetch_assoc($result);
    $opassword = $_POST['old_pass'];
    $opassword =md5($opassword);

    if ($row['pass'] == $opassword) { // If the old password is correct, update the password.
        $new_pass = $_POST['new_pass']; // Get the new password from the form.
        $cnf_pass = $_POST['cnf_pass']; // Get the confirm password from the form.
        if ($new_pass == $cnf_pass) { // If the new password and confirm password matches, update the password.
            if (preg_match('/^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/', $new_pass)) {
            $new_pass = md5($new_pass); // Encrypt the new password.
            $sql = "UPDATE user SET pass='$new_pass' WHERE email='$email'"; // Update the password.
            mysqli_query($conn, $sql); 
            echo '<script>
                alert("Password changed successfully");
                window.location.href="../app/user_index.php";
            </script>';
            }
            else{
                echo '<script>
                alert("Password must contain atleast 8 characters, 1 uppercase, 1 lowercase, 1 number and 1 special character");
            </script>';
            }
        } else {
            echo '<script>
                alert("Password does not match");
            </script>';
        }
    }else{
        echo '<script>
                alert("Old Password is incorrect");
            </script>';
        }
}
?>
    </body>
     </html>