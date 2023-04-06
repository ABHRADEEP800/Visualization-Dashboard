<?php
require('../env/database.php');
session_start();
if(!isset($_SESSION['user'])){
    header("Location: ../index.php");
}
//Get Data From Api
 $sql="SELECT data.pestle, SUM(`intensity`) AS intensity ,SUM(`likelihood`)AS likelihood,SUM(`relevance`)AS relevance,COUNT(DISTINCT`topic`) AS topicc,COUNT(DISTINCT`country`)AS country,COUNT(DISTINCT`start_year`) AS start_year,COUNT(DISTINCT`region`) AS regionc,COUNT(DISTINCT`city`) AS city
 FROM data
 WHERE data.pestle != ' ' 
 GROUP BY data.pestle;";

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