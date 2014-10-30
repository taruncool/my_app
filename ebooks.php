<?php
require_once('loader.php');

$response["desis"]=array();

$query=mysql_query("select * from ebooks");

if(mysql_num_rows($query)>0)
{
while($row=mysql_fetch_array($query))
{
$id=$row['id'];
$title=$row['title'];
$image=$row['img_path'];
$url=$row['url'];

if($image!='')
{
$image="http://avishkr.com/live/images/".$image;
}
else
{
$image="http://avishkr.com/live/images/1.png";
}
if($url!='')
{
$url="http://avishkr.com/live/uploads/".$url;
}

$desis["id"]=$id;
$desis["title"]=$title;
$desis["image"]=$image;
$desis["url"]=$url;

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


?>
