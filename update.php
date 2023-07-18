<?php
require_once __DIR__ . '/vendor/autoload.php';

$client = new MongoDB\Client('mongodb://localhost:27017');
$db = $client->Event;
$collection = $db->List;

$eventid = isset($_GET['id']) ? $_GET['id'] : null;

if ($eventid === null) {
    echo '<script>alert("Event ID not provided.");</script>';
    // You may redirect the user or display an error message here
} else {
    $event = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID($eventid)]);

    if ($event === null) {
        echo '<script>alert("Event not found.");</script>';
        // You may redirect the user or display an error message here
    }
}

if (isset($_POST['is_submit'])) {
    try {
        $updateResult = $collection->updateOne(
            ['_id' => new MongoDB\BSON\ObjectID($eventid)],
            ['$set' => [
                'name' => $_POST['name'],
                'mobno' => $_POST['mobno'],
                'address' => $_POST['address'],
                'age' => $_POST['age'],
                'bgroup' => $_POST['bgroup']
            ]]
        );

        if ($updateResult->getModifiedCount() > 0) {
            echo '<script>alert("Event details updated successfully!");</script>';
        } else {
            echo '<script>alert("No changes made.");</script>';
        }
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
?>

<html>

<head>
    <title>Update Event Details</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <h2>Edit Event Details</h2>
    <form method="post">
        <table>
            <tr>
                <td>Event Name:</td>
                <td><input type="text" name="name" value="<?php echo $event['name'] ?? ''; ?>"></td>
            </tr>
            <tr>
                <td>Mob No:</td>
                <td><input type="text" name="mobno" value="<?php echo $event['mobno'] ?? ''; ?>"></td>
            </tr>
            <tr>
                <td>Address:</td>
                <td><input type="text" name="address" value="<?php echo $event['address'] ?? ''; ?>"></td>
            </tr>
            <tr>
                <td>Date:</td>
                <td><input type="text" name="age" value="<?php echo $event['age'] ?? ''; ?>"></td>
            </tr>
            <tr>
                <td>Time:</td>
                <td><input type="text" name="bgroup" value="<?php echo $event['bgroup'] ?? ''; ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Update" name="is_submit"></td>
            </tr>
        </table>
    </form>
    <a href="view.php">Back</a>
</body>

</html>