<?php
require('../env/database.php');
session_start();
if(!isset($_SESSION['user'])){
    header("Location:../index.php");
}


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
     <script>
 // alert function
function Alertshow(type, msg){
    document.getElementById("alert").style.display = "block";
    document.getElementById("msg").innerHTML = msg;
    document.getElementById("alert").classList.add(type);

    // dismiss alert after 3 seconds
    setTimeout(function() {
        document.getElementById("alert").style.display = "none";
    }, 15000);
}
</script>

    <!-- ----------------------------------------------------Main Content-------------------------------------------------------- -->
    <div class="col-md-12 mx-auto mt-5 ">
    <div class="row">
    <div class="col-xl-3 col-lg-6">
            <div class="card l-bg-cherry">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon pe-2 card-icon-large"><i class="fas fa-file"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Total Topics</h5>
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
                    <div class="card-icon pe-2 card-icon-large"><i class="fas fa-search-location"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Total Sources</h5>
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
                    <div class="card-icon pe-2 card-icon-large"><i class="fas fa-building"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Total Sectors</h5>
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
                    <div class="card-icon pe-2 card-icon-large"><i class="fas fa-lightbulb"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Total Insights</h5>
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
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-12" >
    <!-- alert message -->
    <div class="alert alert-dismissible fade show" id="alert" style="display: none;">
            <h5 class="" id="msg"></h4>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
    </div>
   
   
    <div class="col-md-4 col-lg-4 col-sm-12 pe-5">
        <form action="" method="post">
            <label for="filter">Filter By</label>
            <div class="input-group mb-3">
                <select class="form-select" name="filter" id="filter">
                    <option value="endyear">End Year</option>
                    <option value="topic">Topic</option>
                    <option value="sector">Sector</option>
                    <option value="region">Region</option>
                    
                </select>
                <button class="btn btn-primary pe-2" type="submit" name="filter_submit">Filter</button>
            </div>
        </form>
                    

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
            <div class="card-body">
                <canvas id="likelihood1" width="400" height="200"></canvas>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 col-lg-6 col-sm-12 mx-auto">
        <div class="card">
            
            <div class="card-body">
                <canvas id="relevence" width="400" height="200"></canvas>
            </div>
        </div>

    </div>
    <div class="col-md-6 col-lg-6 col-sm-12 mx-auto">
        <div class="card">
            <div class="card-body">
                <canvas id="topic" width="400" height="200"></canvas>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 col-lg-6 col-sm-12 mx-auto">
        <div class="card">
            
            <div class="card-body">
                <canvas id="country" width="400" height="200"></canvas>
            </div>
        </div>

    </div>
    <div class="col-md-6 col-lg-6 col-sm-12 mx-auto">
        <div class="card">
            <div class="card-body">
                <canvas id="start_year" width="400" height="200"></canvas>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 col-lg-6 col-sm-12 mx-auto">
        <div class="card">
            
            <div class="card-body">
                <canvas id="region" width="400" height="200"></canvas>
            </div>
        </div>

    </div>
    <div class="col-md-6 col-lg-6 col-sm-12 mx-auto">
        <div class="card">
            <div class="card-body">
                <canvas id="city" width="400" height="200"></canvas>
            </div>
        </div>
    </div>
</div>
 

 
 <?php
 if(isset($_POST['filter_submit'])){
    $filter= $_POST['filter'];

if($filter ==='endyear'){
$url = "http://localhost/Assignment/app/api_end_year.php";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result=curl_exec($ch);
curl_close($ch);
$data = json_decode($result, true);
//get data from each array 
$end_year = array_column($data['data'], 'end_year');
//get data from $year and format it like [1,2,3]
$label = implode(",", $end_year);
//store $label into a javascript var
echo "<script>var label = [$label];</script>";

$intensity = array_column($data['data'], 'intensity');
//get data from $year and format it like [1,2,3]
$intensity = implode(",", $intensity);
//store $label into a javascript var
echo "<script>var intensity = [$intensity];</script>";

$likelihood = array_column($data['data'], 'likelihood');
//get data from $year and format it like [1,2,3]
$likelihood = implode(",", $likelihood);
//store $label into a javascript var
echo "<script>var likelihood = [$likelihood];</script>";

$relevance = array_column($data['data'], 'relevance');
$relevance = implode(",", $relevance);
echo "<script>var relevance = [$relevance];</script>";

$topic = array_column($data['data'], 'topic');
$topic = array_map(function($n) { return $n - 1; }, $topic);
$topic = implode(",", $topic);
echo "<script>var topic = [$topic];</script>";

$country = array_column($data['data'], 'country');
$country = array_map(function($n) { return $n - 1; }, $country);
$country = implode(",", $country);
echo "<script>var country = [$country];</script>";

$start_year = array_column($data['data'], 'start_year');
$start_year = array_map(function($n) { return $n - 1; }, $start_year);
$start_year = implode(",", $start_year);
echo "<script>var start_year = [$start_year];</script>";

$region = array_column($data['data'], 'region');
$region = array_map(function($n) { return $n - 1; }, $region);
$region = implode(",", $region);
echo "<script>var region = [$region];</script>";

$city = array_column($data['data'], 'city');
$city = array_map(function($n) { return $n - 1; }, $city);
$city = implode(",", $city);
echo "<script>var city = [$city];</script>";
echo "<script>Alertshow('alert-success', 'End year filter applied');</script>";


}
elseif($filter ==='topic'){
    
    $url = "http://localhost/Assignment/app/api_topic.php";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result=curl_exec($ch);
    curl_close($ch);
    $data = json_decode($result, true);
    //get data from each array
    $label = array();
    foreach($data['data'] as $key => $value){
        $label[]= $value['topic'];
    }
    //store $label string array into a javascript string type array
    echo "<script>var label = ".json_encode($label).";</script>";
    $intensity = array_column($data['data'], 'intensity');
    //get data from $year and format it like [1,2,3]
    $intensity = implode(",", $intensity);
    //store $label into a javascript var
    echo "<script>var intensity = [$intensity];</script>";
    
    $likelihood = array_column($data['data'], 'likelihood');
    //get data from $year and format it like [1,2,3]
    $likelihood = implode(",", $likelihood);
    //store $label into a javascript var
    echo "<script>var likelihood = [$likelihood];</script>";
    
    $relevance = array_column($data['data'], 'relevance');
    $relevance = implode(",", $relevance);
    echo "<script>var relevance = [$relevance];</script>";
    
    $topicc= array_column($data['data'], 'topicc');
    $topicc = array_map(function($n) { return $n - 1; }, $topicc);
    $topicc = implode(",", $topicc);
    echo "<script>var topic = [$topicc];</script>";
    
    $country = array_column($data['data'], 'country');
    $country = array_map(function($n) { return $n - 1; }, $country);
    $country = implode(",", $country);
    echo "<script>var country = [$country];</script>";
    
    $start_year = array_column($data['data'], 'start_year');
    $start_year = array_map(function($n) { return $n - 1; }, $start_year);
    $start_year = implode(",", $start_year);
    echo "<script>var start_year = [$start_year];</script>";
    
    $region = array_column($data['data'], 'region');
    $region = array_map(function($n) { return $n - 1; }, $region);
    $region = implode(",", $region);
    echo "<script>var region = [$region];</script>";
    
    $city = array_column($data['data'], 'city');
    $city = array_map(function($n) { return $n - 1; }, $city);
    $city = implode(",", $city);
    echo "<script>var city = [$city];</script>";
    echo "<script>Alertshow('alert-success', 'Topic filter applied');</script>";
   
  
    
}
elseif($filter ==='sector'){
    
    $url = "http://localhost/Assignment/app/api_sector.php";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result=curl_exec($ch);
    curl_close($ch);
    $data = json_decode($result, true);
    //get data from each array
    $label = array();
    foreach($data['data'] as $key => $value){
        $label[]= $value['sector'];
    }
    //store $label string array into a javascript string type array
    echo "<script>var label = ".json_encode($label).";</script>";

    $intensity = array_column($data['data'], 'intensity');
    //get data from $year and format it like [1,2,3]
    $intensity = implode(",", $intensity);
    //store $label into a javascript var
    echo "<script>var intensity = [$intensity];</script>";
    
    $likelihood = array_column($data['data'], 'likelihood');
    //get data from $year and format it like [1,2,3]
    $likelihood = implode(",", $likelihood);
    //store $label into a javascript var
    echo "<script>var likelihood = [$likelihood];</script>";
    
    $relevance = array_column($data['data'], 'relevance');
    $relevance = implode(",", $relevance);
    echo "<script>var relevance = [$relevance];</script>";
    
    $topicc= array_column($data['data'], 'topicc');
    $topicc = array_map(function($n) { return $n - 1; }, $topicc);
    $topicc = implode(",", $topicc);
    echo "<script>var topic = [$topicc];</script>";
    
    $country = array_column($data['data'], 'country');
    $country = array_map(function($n) { return $n - 1; }, $country);
    $country = implode(",", $country);
    echo "<script>var country = [$country];</script>";
    
    $start_year = array_column($data['data'], 'start_year');
    $start_year = array_map(function($n) { return $n - 1; }, $start_year);
    $start_year = implode(",", $start_year);
    echo "<script>var start_year = [$start_year];</script>";
    
    $region = array_column($data['data'], 'region');
    $region = array_map(function($n) { return $n - 1; }, $region);
    $region = implode(",", $region);
    echo "<script>var region = [$region];</script>";
    
    $city = array_column($data['data'], 'city');
    $city = array_map(function($n) { return $n - 1; }, $city);
    $city = implode(",", $city);
    echo "<script>var city = [$city];</script>";
    echo "<script>Alertshow('alert-success', 'Sector filter applied');</script>";
   
  
    
}
elseif($filter ==='region'){
    
    $url = "http://localhost/Assignment/app/api_region.php";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result=curl_exec($ch);
    curl_close($ch);
    $data = json_decode($result, true);
    //get data from each array
    $label = array();
    foreach($data['data'] as $key => $value){
        $label[]= $value['region'];
    }
    //store $label string array into a javascript string type array
    echo "<script>var label = ".json_encode($label).";</script>";

    $intensity = array_column($data['data'], 'intensity');
    //get data from $year and format it like [1,2,3]
    $intensity = implode(",", $intensity);
    //store $label into a javascript var
    echo "<script>var intensity = [$intensity];</script>";
    
    $likelihood = array_column($data['data'], 'likelihood');
    //get data from $year and format it like [1,2,3]
    $likelihood = implode(",", $likelihood);
    //store $label into a javascript var
    echo "<script>var likelihood = [$likelihood];</script>";
    
    $relevance = array_column($data['data'], 'relevance');
    $relevance = implode(",", $relevance);
    echo "<script>var relevance = [$relevance];</script>";
    
    $topicc= array_column($data['data'], 'topicc');
    $topicc = array_map(function($n) { return $n - 1; }, $topicc);
    $topicc = implode(",", $topicc);
    echo "<script>var topic = [$topicc];</script>";
    
    $country = array_column($data['data'], 'country');
    $country = array_map(function($n) { return $n - 1; }, $country);
    $country = implode(",", $country);
    echo "<script>var country = [$country];</script>";
    
    $start_year = array_column($data['data'], 'start_year');
    $start_year = array_map(function($n) { return $n - 1; }, $start_year);
    $start_year = implode(",", $start_year);
    echo "<script>var start_year = [$start_year];</script>";
    
    $region = array_column($data['data'], 'regionc');
    $region = array_map(function($n) { return $n - 1; }, $region);
    $region = implode(",", $region);
    echo "<script>var region = [$region];</script>";
    
    $city = array_column($data['data'], 'city');
    $city = array_map(function($n) { return $n - 1; }, $city);
    $city = implode(",", $city);
    echo "<script>var city = [$city];</script>";
    echo "<script>Alertshow('alert-success', 'Region filter applied');</script>";
   
  
    
}
 }
 else
 {
    $url = "http://localhost/Assignment/app/api_end_year.php";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result=curl_exec($ch);
curl_close($ch);
$data = json_decode($result, true);
//get data from each array 
$end_year = array_column($data['data'], 'end_year');
//get data from $year and format it like [1,2,3]
$label = implode(",", $end_year);
//store $label into a javascript var
echo "<script>var label = [$label];</script>";

$intensity = array_column($data['data'], 'intensity');
//get data from $year and format it like [1,2,3]
$intensity = implode(",", $intensity);
//store $label into a javascript var
echo "<script>var intensity = [$intensity];</script>";

$likelihood = array_column($data['data'], 'likelihood');
//get data from $year and format it like [1,2,3]
$likelihood = implode(",", $likelihood);
//store $label into a javascript var
echo "<script>var likelihood = [$likelihood];</script>";

$relevance = array_column($data['data'], 'relevance');
$relevance = implode(",", $relevance);
echo "<script>var relevance = [$relevance];</script>";

$topic = array_column($data['data'], 'topic');
$topic = array_map(function($n) { return $n - 1; }, $topic);
$topic = implode(",", $topic);
echo "<script>var topic = [$topic];</script>";

$country = array_column($data['data'], 'country');
$country = array_map(function($n) { return $n - 1; }, $country);
$country = implode(",", $country);
echo "<script>var country = [$country];</script>";

$start_year = array_column($data['data'], 'start_year');
$start_year = array_map(function($n) { return $n - 1; }, $start_year);
$start_year = implode(",", $start_year);
echo "<script>var start_year = [$start_year];</script>";

$region = array_column($data['data'], 'region');
$region = array_map(function($n) { return $n - 1; }, $region);
$region = implode(",", $region);
echo "<script>var region = [$region];</script>";

$city = array_column($data['data'], 'city');
$city = array_map(function($n) { return $n - 1; }, $city);
$city = implode(",", $city);
echo "<script>var city = [$city];</script>";
echo "<script>Alertshow('alert-success', 'By Default End year filter applied');</script>";

 }
 ?>
<script src="../assets/js/main.js"></script>
</body>
 </html>


 
 
