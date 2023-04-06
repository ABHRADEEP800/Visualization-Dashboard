<?php
require('../env/database.php');
session_start();
//chceck user login or not
if(!isset($_SESSION['user'])){
    header("Location: ../index.php");
}
//sql Get Data 
 $sql="SELECT `end_year`, SUM(`intensity`) AS intensity ,SUM(`likelihood`)AS likelihood,SUM(`relevance`)AS relevance,COUNT(DISTINCT`topic`) AS topic,COUNT(DISTINCT`country`)AS country,COUNT(DISTINCT`start_year`) AS start_year,COUNT(DISTINCT`region`) AS region,COUNT(DISTINCT`city`) AS city
 FROM data 
 GROUP BY `end_year`;";

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