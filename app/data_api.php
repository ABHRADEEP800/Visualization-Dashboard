<?php
require('../env/database.php');
session_start();
if(!isset($_SESSION['user'])){
    header("Location: ../index.php");
}
//Get Data From Api
 $sql="SELECT * FROM `data`";

$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
header('Content-Type:application/json');
if($num>0){
    while($row=mysqli_fetch_assoc($result)){
        $arr[]=$row;
    }
    echo json_encode(['status'=> true ,'data'=> $arr , 'result'=>'found']);

}
else{
    echo json_encode(['status'=> false ,'data'=> 'No Data Found' , 'result'=>'not found']);
}


?>