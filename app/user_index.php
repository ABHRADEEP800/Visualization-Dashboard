<?php
require('../env/database.php');
session_start();
if(!isset($_SESSION['user'])){
    header("Location:../index.php");
}

//Get Data From Api 
$url = "http://localhost/Assignment/app/data_api.php";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result=curl_exec($ch);
curl_close($ch);
$data = json_decode($result, true);
$row=$data['data'];
//print_r($row);


$sql="SELECT `source`  FROM `data` 
 GROUP BY `source`";
 $result=mysqli_query($conn,$sql);   
$source=mysqli_num_rows($result);

$sql="SELECT `topic`  FROM `data` 
 GROUP BY `topic`";
 $result=mysqli_query($conn,$sql);   
$topic=mysqli_num_rows($result);

$sql="SELECT `sector`  FROM `data` 
 GROUP BY `sector`";
 $result=mysqli_query($conn,$sql);   
$sector=mysqli_num_rows($result);

$sql="SELECT `insight`  FROM `data` 
 GROUP BY `insight`";
 $result=mysqli_query($conn,$sql);
 $insight=mysqli_num_rows($result);


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
    <div class="col-md-10 mx-auto ">
    <div class="row">
    <div class="col-xl-3 col-lg-6">
            <div class="card l-bg-cherry">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon pe-2 card-icon-large"><i class="fas fa-file"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Total Topic</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                <?=$topic?>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="card l-bg-orange-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon pe-2 card-icon-large"><i class="fas fa-shopping-cart"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Total Source</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                <?=$source?>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="card l-bg-blue-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon pe-2 card-icon-large"><i class="fas fa-users"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Total Sector</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                <?=$sector?>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="card l-bg-green-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon pe-2 card-icon-large"><i class="fas fa-dollar-sign"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Total Insight</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h3 class="d-flex align-items-center mb-0">
                                <?=$insight?>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-end">
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card l-bg-green-dark">
            <div class="card-statistic-3 p-4">
                <div class="card-icon pe-2 card-icon-large"><i class="fas fa-filter"></i></div>
                <div class="mb-4">
                    <h5 class="card-title mb-0">Filters</h5>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-7">
                            <form action="user_index.php" method="post">
                                <select name="filter" id="filter" class="form-control">
                                    <option >Select Filter</option>
                                    <option value="endyear">End year</option>
                                    <option value="2">Source</option>
                                    <option value="3">Sector</option>
                                </select>
                                </div>
                                <div class="col-5">
                                <input type="submit" name="filter_submit" value="Apply" class="btn btn-primary mt-2">
                                </div>
                            </form>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
                    

    </div>

</div>
<div class="row">
    <div class="col-md-6 col-lg-6 col-sm-12 mx-auto">
        <div class="card">
            
            <div class="card-body">
                <canvas id="Intensity" width="400" height="200"></canvas>
            </div>
        </div>

    </div>
    <div class="col-md-6 col-lg-6 col-sm-12 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4>Insight</h4>
            </div>
            <div class="card-body">
                <canvas id="myChart" width="400" height="200"></canvas>
            </div>
        </div>

    </div>

</div>
 </body>
 </html>

 <script src="../assets/js/main.js"></script>
 <?php
 if(isset($_POST['filter_submit'])){
    $filter= $_POST['filter'];
    if($filter =='endyear'){
    
// Assuming that you have already fetched data from your database and stored it in the $rows variable
// The $rows variable should contain an array of associative arrays, where each associative array represents a row from your database table

// Create an empty array to store the end years and their corresponding intensity sums
$endyear_intensity_sum = [];

foreach ($row as $row) {
  $endyear = $row['end_year'];
  $intensity = $row['intensity'];
  
  // If the current end year already exists in the $endyear_intensity_sum array, then add the current intensity to the existing sum
  if (isset($endyear_intensity_sum[$endyear])) {
    $endyear_intensity_sum[$endyear] += $intensity;
  }
  // If the current end year does not exist in the $endyear_intensity_sum array, then create a new entry with the current end year and intensity
  else {
    $endyear_intensity_sum[$endyear] = $intensity;
  }
}
//sort array in year assending
ksort($endyear_intensity_sum);


// Convert the $endyear_intensity_sum array to a JSON string so that it can be passed to JavaScript
$endyear_intensity_sum_json = json_encode($endyear_intensity_sum);


echo "
<script>
  var endyear_intensity_sum = '$endyear_intensity_sum_json'
  console.log(endyear_intensity_sum);
</script>";



    }

}
 ?>
