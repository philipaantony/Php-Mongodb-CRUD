<?php
include "dbconnection.php";

$id = $_GET['id'];
$objectId = new MongoDB\BSON\ObjectID($id);
$item = $collection->findOne(['_id' => $objectId]);

if (isset($_POST['submit'])) 
{
    $name = $_POST['name'];
    $email = $_POST['email'];
	$place = $_POST['place'];
	$updateData = ['$set' => ['name' => $name, 'email' => $email,'place' =>$place]];
							 
	$myid = ['_id' => $objectId];
	
	$result = $collection->updateOne($myid, $updateData);
	header("Location: viewdata.php");
	
}


?>
<html>
<head>
    <title>Form </title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
 

<body>
<center>
    <h1>Registration Form</h1>
    <form method="POST" action="#">
        <label for="name">Full Name:</label>
        <input type="text" value="<?php echo $item["name"]; ?>" name="name" id="name" required><br><br>

        <label for="email">Email:</label>
        <input type="email"  value="<?php echo $item["email"]; ?>" name="email" id="email" required><br><br>
		
		<label for="name">Place:</label>
        <input type="text"  value="<?php echo $item["place"]; ?>" name="place" id="place" required><br><br>

		<input type="submit" name="submit" value="Submit">
    </form>
	<a href="viewdata.php">Go Back</a>
	</center>
</body>
</html>
