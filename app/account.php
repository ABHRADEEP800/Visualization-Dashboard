<?php
require('../env/database.php');
session_start();
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
    // getting user details from database
  $user_email = $_SESSION['user'];
  $sql = "SELECT * FROM user WHERE email = '$user_email'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $user_name = $row['name'];
  $user_id = $row['id'];
  $fname = explode(" ", $user_name)[0];
  $lname = explode(" ", $user_name)[1];
  // update account name
  // checking if update button is clicked
  if(isset($_POST['update'])){
    $user_name = $_POST['fname']." ".$_POST['lname'];
   
    // updating user name in database
    $sql = "UPDATE user SET name = '$user_name' WHERE email = '$user_email'";
    $result = mysqli_query($conn, $sql);
    if($result){
      echo "<script>alert('Account Updated Successfully')</script>";
      echo "<script>window.location.href = 'account.php'</script>";
    }
    else{
      echo "<script>alert('Account Updation Failed')</script>";
    }
  } // end of update button
  ?>
  <div class="d-flex justify-content-center">
    <div class="card mb-4 mt-5 col-lg-8">
                <div class="card-header">
                    <h3 class="mb-0 text-center">Account Details</h3>
                </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-3 ">
                    <p class="mb-0 ">Full Name</p>
                  </div>
                  <div class="col-sm-9">
                    <div class="row">
                    <div class="col-sm-6">
                      <input type="text" class="form-control mb-2" name="fname" value="<?=$fname?>" placeholder="First Name" required>
                    </div> 
                    <div class="col-sm-6">
                      <input type="text" class="form-control" name="lname" value="<?=$lname?>" placeholder="Last Name" required>
                    </div>
                    </div>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Email</p>
                  </div>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" value="<?=$user_email?>" disabled>
                  </div>
                </div>
                <hr>
              
                <div class="row d-flex justify-content-center">
                  <div class=" col-sm-3">
                    <input type="submit" name="update" class="btn btn-primary form-control" value="Update Details">
                  </div>
                </div>
              </div>
            </div>
            </div>

</body>
</html>
