<?php
include "dbconnection.php";

$id = $_GET['id'];

$objectId = new MongoDB\BSON\ObjectID($id);
$data = ['_id' => $objectId];

$collection->deleteOne($data);
header("Location: viewdata.php");


?>