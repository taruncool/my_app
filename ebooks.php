<?php

require_once('loader.php');
$did=1;
if($did)
{
$id=$did;

$response["desis"]=array();

$query=mysql_query("select * from ebooks where d_id='$id'");

if(mysql_num_rows($query)>0)
{
while($row=mysql_fetch_array($query))
{
$id=$row['id'];
$title=$row['title'];
$image=$row['url'];
if($image!='')
{
$image="http://192.168.0.104/live/uploads/".$row['url'];
}
else
{
$image="http://192.168.0.104/live/uploads/1.png";
}

$desis["id"]=$id;
$desis["title"]=$title;
$desis["image"]=$image;

array_push($response["desis"],$desis);

}

$response["success"]=1;

echo json_encode($response);
}
else
{
$response["failure"]=1;
$response["message"]="No Users Found";

}

}

?>