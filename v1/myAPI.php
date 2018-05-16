<?php
// Connect to database
 include("../connection.php");
 $db = new dbObj();
 $connection =  $db->getConnstring();
 
 $request_method=$_SERVER["REQUEST_METHOD"];

switch($request_method)
 {
 case 'GET':
 // Retrive Products
 if(!empty($_GET["steamid"]))
 {
 $id=intval($_GET["steamid"]);
 get_info($steamid);
 }
 else
 {
 get_info();
 }
 break;

 default:
 // Invalid Request Method
 header("HTTP/1.0 405 Method Not Allowed");
 break;
case 'POST':
// Insert Product
insert_info();
break;

 }
function get_info()
	{
		global $connection;
		$query="SELECT * FROM API";
		$response=array();
		$result=mysqli_query($connection, $query);
		while($row=mysqli_fetch_assoc($result))
		{
			$response[]=$row;
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}



function insert_info()
	{
		global $connection;

		$data = json_decode(file_get_contents('php://input'), true);
		$steamid=$data["steamid"];
		$visibility=$data["visibility"];
		$profilestate=$data["profilestate"];
		echo $query="INSERT INTO myAPI SET steamid='".$steamid."', visibility='".$visibility."', profilestate='".$profilestate."'";
		if(mysqli_query($connection, $query))
		{
			$response=array(
				'status' => 1,
				'status_message' =>'User Added Successfully.'
			);
		}
		else
		{
			$response=array(
				'status' => 0,
				'status_message' =>'User Addition Failed.'
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}
?>