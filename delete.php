<?php
require_once __DIR__ . '/vendor/autoload.php';

$client = new MongoDB\Client('mongodb://localhost:27017');
$db = $client->Event;
$collection = $db->List;

if (isset($_GET['id'])) {
    $eventid = $_GET['id'];

    $deleteResult = $collection->deleteOne(['_id' => new MongoDB\BSON\ObjectID($eventid)]);

    if ($deleteResult->getDeletedCount() > 0) {
        echo '<script>alert("Event deleted successfully!");</script>';
    } else {
        echo '<script>alert("Event not found.");</script>';
    }
} else {
    echo '<script>alert("Event ID not provided.");</script>';
}

header("Location: view.php"); // Redirect back to the view page after deletion
exit();
?>
