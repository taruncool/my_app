<?php

require_once('loader.php');


$response["desis"]=array();

$query=mysql_query("select * from ebooks");

if(mysql_num_rows($query)>0)
{
while($row=mysql_fetch_array($query))
{
$image=$row['url'];
if($image!='')
{
$urls="http://192.168.0.104/live/uploads/";// this the string url
echo $image=$urls.$row['url']."<br>"; // this is the image url
}
else
{
$image="http://192.168.0.104/live/uploads/1.png";
}

$desis["image"]=$image;

array_push($response["desis"],$desis);
}

$response["success"]=1;

//echo json_encode($response);

$jsenc = json_encode($response);
	
$jsdec = json_decode($jsenc);

echo "Json decoded string:";

print_r($jsdec);
}
else
{
$response["failure"]=1;
$response["message"]="No Users Found";

}


?>