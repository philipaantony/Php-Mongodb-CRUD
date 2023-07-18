<?php
include "dbconnection.php";

$mydata = $collection->find();

?>

<html>
<head>

</head>
<link rel="stylesheet" type="text/css" href="table.css">
<body>
<center><br><br><br>

  <table border="1" id="customers">
     <tr>
        <th>Name</th>
		<th>Email</th>
		<th>Place</th>
		<th>Edit</th>
		<th>Delete</th>
     </tr>
	 
	 <?php
	 foreach ($mydata as $document) 
	 {
	 ?>
	 <tr>
	 <td> <?php echo $document["name"] ?></td>
	 <td> <?php echo $document["email"] ?></td>
	 <td> <?php echo $document["place"] ?></td>
	 <td>
	      <a href="edit.php?id=<?php echo $document["_id"]; ?>">Edit</a> </td>
	 <td><a 
	      href="delete.php?id=<?php echo $document["_id"];?>"
		  onClick="return confirm('Are you want to delete')">Delete</a></td>
	 </tr>
	 <?php
	 }
	 ?>
	 
  </table>
  <a href="register.php">Go Back</a>
  </center>
</body>
</html>
