<?php 
session_start(); // Start the session
ob_start();
require('env/database.php');



if($_SERVER["REQUEST_METHOD"]=="POST") // check if form is submitted
{
    // checking if login button is clicked
    if(isset($_POST['login'])){

      // checking if captcha is correct
      if($_SESSION['captcha'] == $_POST['captcha']){
        $session_id = substr(str_shuffle("23456789abcdefghjkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ"), 0, 10);

        // getting email and password from form
        $email = $_POST['email'];
        $password = $_POST['pass'];
        $password =md5($password);

        // fetching user details from database
        $sql = "SELECT * FROM user WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        // taking user pass and match with database
        $pass = $row['pass'];

        
        if($pass == $password){
            
            unset($_SESSION['captcha']);
             // if remember me is checked
          if(isset($_POST['remember'])){
            // Create an array with multiple data
            $data = array(
              'email' => $email,
              'session_id' => $session_id,
              
            );

            // Serialize the array into a string
            $data_string = serialize($data);

            // setting cookie for customer
            setcookie("user", $data_string, time() + (7 * 24 * 60 * 60) , "/");

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


            // setting session variable for user
            $_SESSION['user'] = $row['email'];

            //  redirecting to  index page
            echo "<script>window.location.href='app/user_index.php'</script>";
          }
          else{
            // setting session variable for user
            $_SESSION['user'] = $row['email'];

            // redirecting to index page
            echo "<script>window.location.href='app/user_index.php'</script>";
          }
        }

       
        else{
          // redirecting to login page if email or password didnot matches
            echo "<script>alert('Invalid Email or Password')</script>";
            echo "<script>window.location.href='index.php'</script>";
        }
      }
      else{
        //if captcha did not match
          echo "<script>alert('Invalid Captcha')</script>";
          echo "<script>window.location.href='index.php'</script>";
      }
    }


    //  check if signup button is clicked
      if(isset($_POST['register'])){

        // check if captcha is correct
        if($_SESSION['captcha'] == $_POST['captcha']){

          // checking for empty fields
          if(($_POST['email'] == "") || ($_POST['pass'] == "") || ($_POST['cpass'] == "") ||  ($_POST['fname'] == "") || ($_POST['lname'] == "")){
            echo "<script>alert('Please fill all the fields')</script>";
            echo "<script>window.location='register.php'</script>";
          }

          // if all fields are not empty
          else{

            // taking form data into variables
            $email=$_POST['email'];
            $pass=$_POST['pass'];
            $cpass=$_POST['cpass'];
            $name=$_POST['fname']." ".$_POST['lname'];

            // check if email already exists
            $sql=
            "SELECT * FROM `user` WHERE `email`='$email'";
            $result=mysqli_query($conn,$sql);
            $num=mysqli_num_rows($result);

            // if email already exists
            if($num==1){
              echo "<script>alert('Email Already Exists')</script>";
              echo "<script>window.location='index.php'</script>";
              exit;
            } // end of if

            // if email does not exists
            else{

              // check if password and confirm password matches
              if($pass==$cpass){
                //chcek password terms
                if (preg_match('/^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/', $pass)) {

                // encrypting password
                $pass=md5($pass);

                // inserting data into database
                $query="INSERT INTO `user`(`email`,`name`, `pass`) VALUES ('$email','$name','$pass')";
                $result=mysqli_query($conn,$query);
     
                if($result){
                    // if data inserted 
                    unset($_SESSION['captcha']); 
                    echo "<script>alert('Registered Successfully')</script>";
                    echo "<script>window.location='index.php'</script>";
                }
                else{
                  // if data not inserted
                    echo "<script>alert(' Registration Failed')</script>";
                    echo "<script>window.location='register.php'</script>";
                }
              }else
              {
                // if password does not match policy
                echo "<script>alert('Password must contain atleast 8 characters, 1 uppercase, 1 lowercase, 1 number and 1 special character')</script>";
                echo "<script>window.location='register.php'</script>";
               
              }
              }
            
              else{
                // if password and confirm password does not match
                echo "<script>alert('Password and Confirm Password does not match')</script>";
                echo "<script>window.location='register.php'</script>";
              }
            
            }
          }
        }

        // if captcha does not match
        else{
          echo "<script>alert('Captcha does not match')</script>";
          echo "<script>window.location='register.php'</script>";
        }
      }
}

    ob_end_flush();
?>

